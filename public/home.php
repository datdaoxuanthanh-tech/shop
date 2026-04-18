<?php $base="/shop/public"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopee Clone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/app.css">
</head>

<body>

<!-- TOP BAR -->
<div class="topbar">
    🛍 Shopee Pro Max
</div>

<!-- SEARCH -->
<div class="searchbar">
    <input type="text" placeholder="Tìm sản phẩm...">
</div>

<!-- BANNER -->
<div class="banner">
    🔥 Sale 70% hôm nay
</div>

<!-- CATEGORY -->
<div class="category">
    <div>👕 Áo</div>
    <div>👖 Quần</div>
    <div>👟 Giày</div>
    <div>🎒 Túi</div>
</div>

<!-- PRODUCTS -->
<div class="grid">

<?php while($p=$products->fetch_assoc()): ?>

<div class="card">
    <img src="<?= $base ?>/assets/images/<?= $p['image'] ?>">
    <h3><?= $p['name'] ?></h3>
    <p><?= number_format($p['price']) ?>đ</p>

    <form method="POST" action="<?= $base ?>/cart/add">
        <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
        <button>Thêm vào giỏ</button>
    </form>
</div>

<?php endwhile; ?>

</div>

<!-- BOTTOM NAV (APP STYLE) -->
<div class="bottom-nav">
    <div>🏠 Home</div>
    <div>🔎 Search</div>
    <div>🛒 Cart</div>
    <div>👤 Profile</div>
</div>

</body>
</html>