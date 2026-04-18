<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
.navbar {
    display:flex;
    justify-content:space-between;
    padding:20px 40px;
    border-bottom:1px solid #eee;
    background:#fff;
}

.nav-left a, .nav-right a {
    margin-right:20px;
    text-decoration:none;
    color:#000;
    font-weight:500;
}

.nav-right a:hover {
    color:red;
}
</style>

<div class="navbar">

    <!-- LEFT -->
    <div class="nav-left">
        <a href="/shop/public/">SHOP</a>
        <a href="/shop/public/">Sản phẩm</a>
    </div>

    <!-- RIGHT -->
    <div class="nav-right">

        <a href="/shop/public/cart">Giỏ hàng</a>

        <?php if(isset($_SESSION['user'])): ?>

            <span><?= $_SESSION['user']['email'] ?></span>

            <!-- 👑 ADMIN MENU -->
            <?php if($_SESSION['user']['role'] == 'admin'): ?>
                <a href="/shop/public/admin/orders" style="color:red;">Admin</a>
            <?php endif; ?>

            <a href="/shop/public/logout">Logout</a>

        <?php else: ?>

            <a href="/shop/public/login">Login</a>
            <a href="/shop/public/register">Register</a>

        <?php endif; ?>

    </div>

</div>