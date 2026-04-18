<?php require "../app/views/layout/header.php"; ?>

<h2 style="text-align:center;">Quản lý đơn hàng</h2>

<table border="1" width="90%" align="center">
<tr>
    <th>ID</th>
    <th>User</th>
    <th>Total</th>
    <th>Status</th>
    <th></th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= number_format($row['total']) ?></td>
    <td><?= $row['status'] ?></td>
    <td>
        <a href="/shop/public/admin/orders/show?id=<?= $row['id'] ?>">Xem</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<?php require "../app/views/layout/footer.php"; ?>