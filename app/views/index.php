<h1>All Products</h1>

<?php while($p = $products->fetch_assoc()): ?>
    <div>
        <h3><?= $p['name'] ?></h3>
        <p><?= $p['price'] ?></p>
    </div>
<?php endwhile; ?>