<?php require __DIR__ . "/../layout/header.php"; ?>

<h2 style="text-align:center;">Đăng nhập</h2>

<form method="POST" action="/shop/public/login" style="text-align:center;">
    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button>Login</button>
</form>

<p style="text-align:center;">
    <a href="/shop/public/register">Chưa có tài khoản? Đăng ký</a>
</p>

<?php require __DIR__ . "/../layout/footer.php"; ?>