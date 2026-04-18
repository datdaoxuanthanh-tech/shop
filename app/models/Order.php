<?php
require_once "config/database.php";

class Order {

    public function createOrder($user_id, $total) {
        $conn = connectDB();

        $stmt = $conn->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
        $stmt->bind_param("id", $user_id, $total);

        $stmt->execute();

        return $conn->insert_id; // lấy order_id
    }

    public function addItem($order_id, $name, $price, $qty) {
        $conn = connectDB();

        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, qty) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isdi", $order_id, $name, $price, $qty);

        return $stmt->execute();
    }
}