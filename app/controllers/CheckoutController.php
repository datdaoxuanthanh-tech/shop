<?php
require_once "app/models/Order.php";

class CheckoutController {

    public function index() {
        session_start();

        // ✅ phải login
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        if (empty($_SESSION['cart'])) {
            die("Giỏ hàng trống");
        }

        require "app/views/checkout/index.php";
    }

    public function placeOrder() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        if (empty($_SESSION['cart'])) {
            die("Không có sản phẩm");
        }

        $user_id = $_SESSION['user']['id'];
        $cart = $_SESSION['cart'];

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $orderModel = new Order();

        // ✅ tạo order
        $order_id = $orderModel->createOrder($user_id, $total);

        // ✅ thêm item
        foreach ($cart as $item) {
            $orderModel->addItem(
                $order_id,
                $item['name'],
                $item['price'],
                $item['qty']
            );
        }

        // ✅ xóa giỏ hàng
        unset($_SESSION['cart']);

        echo "Đặt hàng thành công!";
    }
}