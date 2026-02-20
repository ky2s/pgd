<?php

namespace App\Model;

use App\Database\Connection;

class GoldRepository
{
    public function getLatestDailyPrice()
    {
        $conn = Connection::get();

        $sql = 'SELECT name, weight, price, selling_price, created_at FROM gold_daily ORDER BY created_at DESC LIMIT 1';
        $stmt = $conn->query($sql);

        $row = null;
        if ($stmt && $stmt->num_rows > 0) {
            $row = $stmt->fetch_assoc();
        }

        $conn->close();

        return $row;
    }

    public function getDailyPriceByDate($date)
    {
        $conn = Connection::get();

        $sql = 'SELECT name, weight, price, selling_price, created_at FROM gold_daily WHERE DATE(created_at) = ? ORDER BY created_at DESC LIMIT 1';
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            $conn->close();
            return null;
        }

        $stmt->bind_param('s', $date);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = null;
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }

        $stmt->close();
        $conn->close();

        return $row;
    }
}
