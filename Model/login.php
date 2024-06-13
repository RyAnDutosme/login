<?php
session_start(); // Start session to store login state

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Query database for user with given email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, check password
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Password correct, log user in
        $_SESSION['user_id'] = $user['id']; // Store user ID in session for further use
        $_SESSION['user_type'] = $user['user_type']; // Store user type in session for role-based access
        header("Location: dashboard.php"); // Redirect to dashboard or wherever you want to go after login
        exit();
    } else {
        // Password incorrect
        echo "Invalid password";
    }
} else {
    // User not found
    echo "User not found";
}

// Close connection
$conn->close();
?>
