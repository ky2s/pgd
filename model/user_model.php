<?php
ini_set( 'display_errors', 1 );   
error_reporting( E_ALL );

function insertUser($name, $email, $is_status)
{
    $conn = DB();

    $sql = "INSERT INTO users (name, email, is_status, created_at) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";

    // Mempersiapkan dan mengeksekusi statement
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $name, $email, $is_status);

    if ($stmt === false) {
        die("Error mempersiapkan statement: " . $conn->error);
    }
    
    if (!$stmt->execute()) {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }

    $conn->close();
    $stmt->close();


    return true;
}

function getUserRows(){

    $conn = DB();

    $sql = "select * from users where is_status is true";
    $stmt = $conn->query($sql);
    $conn->close();

    return $stmt;
}
?>