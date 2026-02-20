<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/helper/security.php';
include_once __DIR__ . '/model/gold_model.php';
include_once __DIR__ . '/model/user_model.php';

startSecureSession();
setSecurityHeaders();
$csrfToken = generateCsrfToken();

startSecureSession();
setSecurityHeaders();
$csrfToken = generateCsrfToken();

// today
$dailyText = 0;
$dailySellText = 0;
$result = getDaily();
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dailyText = $row['price'];
    $dailySellText = $row['selling_price'];
}

// yesterday
$dailyYesText = 0;
$resultYes = getYesterday();
if ($resultYes && $resultYes->num_rows > 0) {
    $row = $resultYes->fetch_assoc();
    $dailyYesText = $row['price'];
}

// getDaily
$dayRows = get7days();
$days = [];
if ($dayRows && $dayRows->num_rows >= 1) {
    while ($r = $dayRows->fetch_assoc()) {
        $days[] = [
            'day' => $r['day'],
            'price' => $r['price'],
        ];
    }
}

$daysMap = array_map(function ($item) {
    return $item['day'];
}, $days);

$days_json = json_encode($daysMap);

$price = array_map(function ($item_price) {
    return $item_price['price'];
}, $days);

$price_json = json_encode($price);

// getMonthly
$monthlyRows = get30days();
$monthly = [];
if ($monthlyRows && $monthlyRows->num_rows >= 1) {
    while ($r = $monthlyRows->fetch_assoc()) {
        $monthly[] = [
            'day' => $r['day'],
            'price' => $r['price'],
        ];
    }
}

$monthlyMap = array_map(function ($item) {
    return $item['day'];
}, $monthly);

$monthly_json = json_encode($monthlyMap);

$monthly_price = array_map(function ($item_monthly_price) {
    return $item_monthly_price['price'];
}, $monthly);

$monthly_price_json = json_encode($monthly_price);

// ajax process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $ip = getClientIp();
    if (isRateLimited('subscribe_' . $ip, 5, 600)) {
        http_response_code(429);
        echo json_encode(['status' => 'error', 'message' => 'Terlalu banyak request. Coba lagi beberapa saat.']);
        exit;
    }

    $csrf = $_POST['csrf_token'] ?? '';
    if (!verifyCsrfToken($csrf)) {
        http_response_code(403);
        echo json_encode(['status' => 'error', 'message' => 'Token keamanan tidak valid.']);
        exit;
    }

    $name = isset($_POST['name']) ? trim((string)$_POST['name']) : '';
    $email = isset($_POST['email']) ? trim((string)$_POST['email']) : '';

    if (empty($name) || empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Nama dan email harus diisi.']);
        exit;
    }

    if (mb_strlen($name) > 100) {
        echo json_encode(['status' => 'error', 'message' => 'Nama terlalu panjang.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Format email tidak valid.']);
        exit;
    }

    $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safeEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    $data = $safeName . ' - ' . $safeEmail . "\n";
    file_put_contents('subscribers.txt', $data, FILE_APPEND | LOCK_EX);

    $is_status = true;
    $save = insertUser($safeName, $safeEmail, $is_status);
    if ($save) {
        $msg = 'Terima kasih, ' . $safeName . '. Mulai sekarang, Kami akan kirimkan update harga emas terbaru langsung ke email kamu setiap hari jam 09.00 pagi.';
        echo json_encode(['status' => 'success', 'data' => $safeEmail, 'message' => $msg]);
        exit;
    }

    echo json_encode(['status' => 'failed', 'message' => 'Kemungkinan email sudah terdaftar. Coba gunakan email lain.']);
    exit;
}
