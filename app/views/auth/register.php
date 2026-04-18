<?php require __DIR__ . "/../layout/header.php"; ?>

<h2 style="text-align:center;">Đăng ký</h2>

<form method="POST" action="/shop/public/register" style="text-align:center;">
    
    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <input type="password" name="confirm_password" placeholder="Nhập lại Password" required><br><br>

    <button>Register</button>
</form>

<p style="text-align:center;">
    <a href="/shop/public/login">Đã có tài khoản? Đăng nhập</a>
</p>

<?php require __DIR__ . "/../layout/footer.php"; ?>