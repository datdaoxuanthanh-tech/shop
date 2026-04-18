<?php
require_once __DIR__ . "/../models/User.php";

class AuthController {

    // ✅ HIỂN THỊ FORM LOGIN
    public function loginForm(){
        require __DIR__ . "/../views/auth/login.php";
    }

    // ✅ XỬ LÝ LOGIN
    public function login(){
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if($user && password_verify($password, $user['password'])){
            $_SESSION['user'] = $user;
            header("Location: /shop/public/");
        } else {
            echo "Sai tài khoản hoặc mật khẩu";
        }
    }

    // ✅ FORM REGISTER
    public function registerForm(){
        require __DIR__ . "/../views/auth/register.php";
    }

    // ✅ REGISTER
    public function register(){
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if($password !== $confirm){
            echo "Mật khẩu không khớp";
            return;
        }

        if(User::findByEmail($email)){
            echo "Email đã tồn tại";
            return;
        }

        User::create($email, $password);

        header("Location: /shop/public/login");
    }

    // ✅ LOGOUT
    public function logout(){
        session_destroy();
        header("Location: /shop/public/login");
    }
}