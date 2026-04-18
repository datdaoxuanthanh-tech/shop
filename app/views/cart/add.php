<?php
session_start();
include '../config/db.php';

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$result = $conn->query("SELECT * FROM cart WHERE user_id=$user_id AND product_id=$product_id");

if ($result->num_rows > 0) {
    $conn->query("UPDATE cart SET quantity = quantity + 1 
    WHERE user_id=$user_id AND product_id=$product_id");
} else {
    $conn->query("INSERT INTO cart(user_id, product_id, quantity)
    VALUES ($user_id, $product_id, 1)");
}

header("Location: view.php");
?>