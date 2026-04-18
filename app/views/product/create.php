<?php $base="/shop/public"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/app.css">
</head>
<body>

<div class="container">

    <h2>➕ Create Product</h2>

    <form method="POST" action="<?= $base ?>/product/store">

        <input name="name" placeholder="Product Name" required>

        <input name="price" placeholder="Price" required>

        <input name="image" placeholder="Image filename (ex: a1.jpg)" required>

        <textarea name="description" placeholder="Description"></textarea>

        <button type="submit">Save Product</button>

    </form>

    <a href="<?= $base ?>/">← Back Home</a>

</div>

</body>
</html>