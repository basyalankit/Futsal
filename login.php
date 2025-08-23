<?php

require "conn.php";
session_start();


$email    = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? LIMIT 1 ";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL Error: " . $conn->error); // debug
}
$stmt->bind_param("s",  $email);

if ($stmt->execute()) {
    echo "Registration successful. <a href='login.php'>Login Here</a>";
} else {
    echo "Error: " . $stmt->error;
}
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
        // Store session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['email']   = $user['email'];

        header("Location: index.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
