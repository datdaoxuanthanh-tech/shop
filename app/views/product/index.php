<?php require __DIR__ . "/../layout/header.php"; ?>

<div style="background:#f5f5f5; padding:80px; text-align:center;">
    <h1>NEW COLLECTION</h1>
</div>

<style>
.grid {
    display:grid;
    grid-template-columns: repeat(4,1fr);
    gap:20px;
    padding:40px;
}
.card {
    border:1px solid #eee;
    padding:15px;
    text-align:center;
}
.card img {
    width:100%;
    height:200px;
    object-fit:cover;
}
</style>

<div class="grid">
<?php while($row = $products->fetch_assoc()): ?>
    <div class="card">
        <img src="/shop/public/images/<?= $row['image'] ?>">
        <h3><?= $row['name'] ?></h3>
        <p><?= number_format($row['price']) ?> VNĐ</p>
    </div>
<?php endwhile; ?>
</div>

<?php require __DIR__ . "/../layout/footer.php"; ?>