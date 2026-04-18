<h1>Cart</h1>

<?php while($c = $cart->fetch_assoc()): ?>
<p><?= $c['name'] ?> - <?= $c['price'] ?></p>
<?php endwhile; ?>

<a href="/shop/public/checkout">Checkout</a>