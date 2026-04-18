<?php
require_once __DIR__ . "/../../config/db.php";

class ProductController {

    public function index(){
        $db = connectDB(); // ✅ sửa DB() -> connectDB()

        $products = $db->query("SELECT * FROM products");

        require __DIR__ . "/../views/product/index.php";
    }

    public function createForm(){
        require __DIR__ . "/../views/product/create.php";
    }

    public function store(){
        $db = connectDB();

        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $description = $_POST['description'];

        // ✅ chống lỗi SQL + sạch hơn
        $stmt = $db->prepare("INSERT INTO products(name,price,image,description) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $price, $image, $description);
        $stmt->execute();

        header("Location: /shop/public/");
    }

    public function delete(){
        $db = connectDB();

        $id = $_GET['id'];

        $stmt = $db->prepare("DELETE FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        header("Location: /shop/public/");
    }
}