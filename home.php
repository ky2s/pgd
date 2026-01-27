<?php 

ini_set( 'display_errors', 1 );   
error_reporting( E_ALL );

include('model/gold_model.php');
include('model/user_model.php');

// today
$dailyText=0;
$result = getDaily();
if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $dailyText = $row['price'];
    $dailySellText = $row['selling_price'];
}

//yesterday
$dailyYesText = 0;
$resultYes = getYesterday();
if ($resultYes->num_rows > 0) {

    $row = $resultYes->fetch_assoc();
    $dailyYesText = $row['price'];
}

// getDaily
$dayRows = get7days();
$days = [];
if($dayRows->num_rows >=1 ){
    
    while($r = $dayRows->fetch_assoc()){
        $days[] = array(
            "day"=> $r['day'],
            "price"=> $r['price']
        );
    }
}


$daysMap = array_map(function($item) {
    return $item['day'];
}, $days);

$days_json = json_encode($daysMap);


$price = array_map(function($item_price) {
    return $item_price['price'];
}, $days);

$price_json = json_encode($price);


// getMonthly
$monthlyRows = get30days();
$monthly = [];
if($monthlyRows->num_rows >=1 ){
    
    while($r = $monthlyRows->fetch_assoc()){
        $monthly[] = array(
            "day"=> $r['day'],
            "price"=> $r['price']
        );
    }
}


$monthlyMap = array_map(function($item) {
    return $item['day'];
}, $monthly);

$monthly_json = json_encode($monthlyMap);


$monthly_price = array_map(function($item_monthly_price) {
    return $item_monthly_price['price'];
}, $monthly);

$monthly_price_json = json_encode($monthly_price);



// ajax process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (empty($name) || empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Nama dan email harus diisi.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Format email tidak valid.']);
        exit;
    }

    // Simpan data ke database (contoh sederhana menggunakan file)
    $data = $name . ' - ' . $email . "\n";
    file_put_contents('subscribers.txt', $data, FILE_APPEND);

    // save
    $is_status=true;
    $save=insertUser($name, $email, $is_status);
    if($save){
        $msg = "Terima kasih, ".$name.". Mulai sekarang, Kami akan kirimkan update harga emas terbaru langsung ke email kamu setiap hari jam 09.00 pagi.";
        echo json_encode(['status' => 'success', 'data'=>$email, 'message' => $msg]);
        exit;
    }
    echo json_encode(['status' => 'failed', 'message' => 'Kemungkinan email sudah terdaftar. Coba gunakan email lain.']);
    exit;
}

?>
