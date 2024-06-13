<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cite";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select database
$conn->select_db($dbname);

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    user_type ENUM('TEACHER', 'ACCOUNTING', 'STUDENT') NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Function to insert user with hashed password
function insertUser($conn, $first_name, $last_name, $email, $password, $user_type) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (first_name, last_name, email, password, user_type)
            VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$user_type')";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error inserting user: " . $conn->error . "<br>";
    }
}

// Insert TEACHER user
insertUser($conn, "Mira", "Smith", "mira.smith@example.com", "password123", "TEACHER");

// Insert STUDENT user
insertUser($conn, "John", "Smith", "john.smith@example.com", "password456", "STUDENT");

// Insert ACCOUNTING user
insertUser($conn, "Jane", "Smith", "jane.smith@example.com", "password789", "ACCOUNTING");

// Close connection
$conn->close();
?>
