<?php 

ini_set( 'display_errors', 1 );   
error_reporting( E_ALL );

function sendWA($phone_receiver, $msg){
    // Initialize cURL session
    $ch = curl_init();

    // URL to send the POST request to
    $url = "https://apivalen.waviro.com/api/sendwa";

    // Array of data to send in POST request
    $postData = [
        'nohp' => $phone_receiver,
        'pesan' => $msg
    ];

    $header = array(
        'SecretKey: 0zmrbqirmfhI7fKAbSHh',
        'Content-Type: application/json'
    );
    

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header); // Set the POST fields

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Output the response
        echo 'Response: ' . $response;
    }

    // Close the cURL session
    curl_close($ch);

    return $response;
}
?>