<?php

class CartController {

    public function index() {
        session_start();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        require "app/views/cart/index.php";
    }

    public function add() {
        session_start();

        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // ✅ Nếu có rồi → tăng số lượng
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $name,
                'price' => $price,
                'qty' => 1
            ];
        }

        header("Location: /cart");
    }

    public function remove() {
        session_start();

        $id = $_GET['id'];

        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        header("Location: /cart");
    }

    public function update() {
        session_start();

        if (isset($_POST['qty'])) {
            foreach ($_POST['qty'] as $id => $qty) {
                if ($qty <= 0) {
                    unset($_SESSION['cart'][$id]);
                } else {
                    $_SESSION['cart'][$id]['qty'] = $qty;
                }
            }
        }

        header("Location: /cart");
    }
}