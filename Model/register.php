<?php
    include "database.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO users(first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

        if($conn->query($sql) === TRUE) {
            echo "Success";
            include "Config/routes.php";
            header("Location: ../?request=register");
        } else {
            echo "Failed";
        }
    }
?>