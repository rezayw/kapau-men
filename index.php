<?php
require_once 'config.php';
$result = pg_query($conn, "SELECT * FROM menu_items ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kapau-Men Resto</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h1>Welcome to Kapau-men Restorante</h1>
  <nav>
    <a href="index.php">Menu</a> |
    <a href="order.php">Order</a> |
    <a href="view_orders.php">My Order</a>
  </nav>
  <div class="card-container">
    <?php while ($row = pg_fetch_assoc($result)): ?>
      <div class="menu-card">
        <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
        <h2><?= htmlspecialchars($row['name']) ?></h2>
        <p><?= htmlspecialchars($row['description']) ?></p>
        <p><strong>Rp <?= number_format($row['price'], 0, ',', '.') ?></strong></p>
        <a href="order.php?menu=<?= urlencode($row['name']) ?>" class="order-btn">Pesan Sekarang</a>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>
