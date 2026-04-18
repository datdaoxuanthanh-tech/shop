<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember'])) {

    $token = $_COOKIE['remember'];

    $result = $conn->query("SELECT * FROM users WHERE remember_token='$token'");
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
    }
}
?>