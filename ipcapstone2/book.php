<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['user'];
    $bookingType = $_POST['type'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO bookings (username, type, destination, date) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$username, $bookingType, $destination, $date])) {
        echo "Booking successful!";
    } else {
        echo "Error during booking!";
    }
}
?>
