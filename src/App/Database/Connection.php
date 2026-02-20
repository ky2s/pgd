<?php

namespace App\Database;

class Connection
{
    public static function get()
    {
        $servername = getenv('DB_HOST') ?: '172.20.160.53';
        $username = getenv('DB_USER') ?: 'username';
        $password = getenv('DB_PASS') ?: 'password';
        $dbname = getenv('DB_NAME') ?: 'pgd_crawl';

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            throw new \RuntimeException('Koneksi gagal: ' . mysqli_connect_error());
        }

        mysqli_set_charset($conn, 'utf8mb4');

        return $conn;
    }
}
