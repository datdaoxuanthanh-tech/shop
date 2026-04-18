<?php
function connectDB() {
    $conn = new mysqli("localhost", "root", "", "shop");

    if ($conn->connect_error) {
        die("Kết nối DB lỗi");
    }

    return $conn;
}