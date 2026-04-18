<?php
require_once __DIR__ . "/../../config/db.php";

class User {

    public static function findByEmail($email){
        $db = connectDB();

        $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($email, $password){
        $db = connectDB();

        // hash password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $db->prepare("INSERT INTO users(email,password,role) VALUES(?,?, 'user')");
        $stmt->bind_param("ss", $email, $hash);

        return $stmt->execute();
    }
}