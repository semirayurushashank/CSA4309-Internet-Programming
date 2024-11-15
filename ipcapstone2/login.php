<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] = $user['username'];
        echo "Login Succesful";
        header("refresh:5;url=index.html");
    } else {
        echo " Invalid credentials!";
        header("refresh:5;url=login.html");

    }
}
?>
