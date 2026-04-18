<?php
require_once "config/database.php";

class AdminOrderController {

    // ✅ check admin
    private function checkAdmin() {
        session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            die("Không có quyền truy cập");
        }
    }

    // 📋 danh sách đơn
    public function index() {
        $this->checkAdmin();

        $conn = connectDB();

        $sql = "SELECT orders.*, users.email 
                FROM orders 
                JOIN users ON orders.user_id = users.id
                ORDER BY orders.id DESC";

        $result = $conn->query($sql);

        require "app/views/admin/orders/index.php";
    }

    // 🔍 chi tiết đơn
    public function show() {
        $this->checkAdmin();

        $conn = connectDB();

        $id = $_GET['id'];

        // đơn hàng
        $stmt = $conn->prepare("SELECT * FROM orders WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $order = $stmt->get_result()->fetch_assoc();

        // sản phẩm
        $stmt2 = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
        $items = $stmt2->get_result();

        require "app/views/admin/orders/show.php";
    }

    // 🔄 update trạng thái
    public function update() {
        $this->checkAdmin();

        $conn = connectDB();

        $id = $_POST['id'];
        $status = $_POST['status'];

        $stmt = $conn->prepare("UPDATE orders SET status=? WHERE id=?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();

        header("Location: /admin/orders");
    }
}