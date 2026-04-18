<?php require "../app/views/layout/header.php"; ?>

<h2>Chi tiết đơn #<?= $order['id'] ?></h2>

<p>Trạng thái: <?= $order['status'] ?></p>

<form method="POST" action="/shop/public/admin/orders/update">
    <input type="hidden" name="id" value="<?= $order['id'] ?>">

    <select name="status">
        <option value="pending">Pending</option>
        <option value="processing">Processing</option>
        <option value="done">Done</option>
    </select>

    <button>Cập nhật</button>
</form>

<hr>

<?php while($item = $items->fetch_assoc()): ?>
    <p><?= $item['product_name'] ?> - <?= $item['qty'] ?></p>
<?php endwhile; ?>

<?php require "../app/views/layout/footer.php"; ?>