<?php

include('db/dbconn.php');

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Use prepared statements to prevent SQL Injection
    $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there's a matching record
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if the password matches
        if ($row['password'] === $password) {
            // Start a session and store user information
            session_start();
            $_SESSION['id'] = $row['customerid'];

            // Redirect to the home page
            header("Location: home.php");
            exit();
        } else {
            // Display an error message if the password is incorrect
            echo "<script>alert('Mật khẩu không chính xác')</script>";
        }
    } else {
        // Display an error message if the email does not exist
        echo "<script>alert('Email không tồn tại');</script>";
    }

    // Automatically focus on the login modal when login fails
    echo "<script>document.addEventListener('DOMContentLoaded', function() {
        $('#login').modal('show');
        document.getElementById('login-email').focus();
    });</script>";
}
