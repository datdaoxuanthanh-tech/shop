<?php require "../app/views/layout/header.php"; ?>

<h2 style="text-align:center;">Giỏ hàng</h2>

<table border="1" width="80%" align="center">
<tr>
    <th>Tên</th>
    <th>Giá</th>
    <th>SL</th>
    <th></th>
</tr>

<?php if(isset($_SESSION['cart'])): ?>
<?php foreach($_SESSION['cart'] as $id => $item): ?>
<tr>
    <td><?= $item['name'] ?></td>
    <td><?= number_format($item['price']) ?></td>
    <td><?= $item['qty'] ?></td>
    <td><a href="/shop/public/cart/remove?id=<?= $id ?>">Xóa</a></td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
</table>

<div style="text-align:center; margin:20px;">
    <a href="/shop/public/checkout">Thanh toán</a>
</div>

<?php require "../app/views/layout/footer.php"; ?>