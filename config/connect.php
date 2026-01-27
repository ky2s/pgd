<?php 

// Membuat koneksi
function DB(){

    $servername = "172.20.160.53";
    $username = "username";
    $password = "password";
    $dbname = "pgd_crawl";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    
    return $conn;
}
?>