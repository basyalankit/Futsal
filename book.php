<?php
require "conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $futsal_id = $_POST['futsal_id'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $user_id = 1; // Later get from session/login

    // Check if futsal already booked
    $check = $conn->prepare("SELECT * FROM bookings 
                             WHERE futsal_id = ? 
                             AND date = ? 
                             AND (
                                (start_time <= ? AND end_time > ?) OR
                                (start_time < ? AND end_time >= ?) OR
                                (? <= start_time AND ? >= end_time)
                             )");
    $check->bind_param("isssssss", $futsal_id, $date, $start_time, $start_time, $end_time, $end_time, $start_time, $end_time);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo "<p style='color:red;'>❌ Sorry, this futsal is already booked for that time.</p>";
        echo "<a href='view_futsal.php'>Go Back</a>";
    } else {
        $stmt = $conn->prepare("INSERT INTO bookings (futsal_id, date, start_time, end_time, user_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $futsal_id, $date, $start_time, $end_time, $user_id);
        if ($stmt->execute()) {
            echo "<p style='color:green;'>✅ Booking Confirmed!</p>";
            echo "<a href='view_futsal.php'>Go Back</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
