<?php $base="/shop/public"; ?>

<link rel="stylesheet" href="<?= $base ?>/assets/css/app.css">

<div class="topbar">🛍 SHOPEE PRO MAX</div>

<div class="search">
    <input placeholder="Search sản phẩm...">
</div>

<div class="banner">
    🔥 SALE 70% - HÔM NAY DUY NHẤT
</div>

<div class="products">

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