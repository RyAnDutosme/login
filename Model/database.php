<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS cite";
    if ($conn->query($sql) === TRUE) {
        // echo "Database created successfully";
    } else {
        // echo "Error creating database: " . $conn->error;
    }

    $conn->select_db("cite");

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(255),
        last_name VARCHAR(255),
        email VARCHAR(255),
        password VARCHAR(255)
    )";
    if ($conn->query($sql) === TRUE) {
        // echo "Table created successfully";
    } else {
        // echo "Error creating table: " . $conn->error;
    }

?>
