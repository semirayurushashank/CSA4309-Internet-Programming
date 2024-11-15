<?php
$host = 'localhost';
$db = 'capstone';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($pdo) echo "connected succesfully";}
 catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
