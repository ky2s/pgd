<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Model\GoldRepository;
use App\Security\SecurityHelper;

SecurityHelper::setSecurityHeaders();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method tidak diizinkan']);
    exit;
}

$ip = SecurityHelper::getClientIp();
if (SecurityHelper::isRateLimited('api_gold_' . $ip, 60, 60)) {
    http_response_code(429);
    echo json_encode(['status' => 'error', 'message' => 'Rate limit terlampaui']);
    exit;
}

$expectedApiKey = getenv('GOLD_API_KEY') ?: '';
if ($expectedApiKey !== '') {
    $providedApiKey = SecurityHelper::getApiKeyFromRequest();
    if ($providedApiKey === '' || !hash_equals($expectedApiKey, $providedApiKey)) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'API key tidak valid']);
        exit;
    }
}

$date = isset($_GET['date']) ? trim((string)$_GET['date']) : '';
if ($date !== '' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Format date harus YYYY-MM-DD']);
    exit;
}

$repository = new GoldRepository();
$data = $date !== '' ? $repository->getDailyPriceByDate($date) : $repository->getLatestDailyPrice();

if (!$data) {
    http_response_code(404);
    echo json_encode(['status' => 'error', 'message' => 'Data harga emas tidak ditemukan']);
    exit;
}

echo json_encode([
    'status' => 'success',
    'data' => [
        'name' => $data['name'],
        'weight' => (float)$data['weight'],
        'buy_price' => (int)$data['price'],
        'sell_price' => (int)$data['selling_price'],
        'created_at' => $data['created_at'],
    ],
], JSON_UNESCAPED_UNICODE);
