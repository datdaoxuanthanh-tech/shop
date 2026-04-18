<h1><?= $product['name'] ?></h1>

<img src="/shop/assets/images/<?= $product['image'] ?>" width="200">

<p><?= $product['description'] ?></p>
<p><?= number_format($product['price']) ?> đ</p>

<form method="POST" action="/shop/public/cart/add">
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <button>Add to cart</button>
</form>