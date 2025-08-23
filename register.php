<?php

require "conn.php";

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone= $_POST['phone'];
$image = $_POST['image'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password, address, phone, image) VALUES (?, ?, ?,?,?,?)";
    $stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL Error: " . $conn->error); // debug
}
    $stmt->bind_param("ssssss", $name, $email, $password, $address, $phone, $image);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login Here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

