<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $message])) {
            echo "Your message has been sent successfully!";
        } else {
            echo "Error submitting your message!";
        }
    } catch (PDOException $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
