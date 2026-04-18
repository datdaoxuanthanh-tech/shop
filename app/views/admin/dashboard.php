<h1>🔥 ADMIN DASHBOARD PRO</h1>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;">

<div>👤 Users: <?= $stats['users'] ?></div>
<div>🛍 Products: <?= $stats['products'] ?></div>
<div>📦 Orders: <?= $stats['orders'] ?></div>
<div>💰 Revenue: <?= number_format($stats['revenue']) ?>đ</div>

</div>