<?php
require "conn.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $address  = $_POST['address'];
    $phone    = $_POST['phone'];

    // Validate phone number (exactly 10 digits)
    $phone = preg_replace('/\D/', '', $phone); // remove non-digits
    if (strlen($phone) != 10) {
        die("Phone number must be exactly 10 digits.");
    }

    $sql = "INSERT INTO users (name, email, password, address, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    // Bind 5 parameters (all strings)
    $stmt->bind_param("sssss", $name, $email, $password, $address, $phone);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login Here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }
    </style>
</head>

<body>

    <form method="POST" action="">
        <h2>Register</h2>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="phone" placeholder="Phone">
        <button type="submit">Register</button>
    </form>

</body>

</html>