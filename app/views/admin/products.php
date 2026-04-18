<h1>PRODUCTS</h1>

<?php while($p = $products->fetch_assoc()): ?>
    <p><?= $p['name'] ?> - <?= $p['price'] ?></p>
<?php endwhile; ?>