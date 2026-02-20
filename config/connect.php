<?php

// Membuat koneksi
function DB()
{
    $servername = getenv('DB_HOST') ?: '172.20.160.53';
    $username = getenv('DB_USER') ?: 'username';
    $password = getenv('DB_PASS') ?: 'password';
    $dbname = getenv('DB_NAME') ?: 'pgd_crawl';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if (!$conn) {
        die('Koneksi gagal: ' . mysqli_connect_error());
    }

    mysqli_set_charset($conn, 'utf8mb4');

    return $conn;
}
