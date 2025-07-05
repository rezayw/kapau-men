<?php
require_once 'config.php';
$result = pg_query($conn, "SELECT * FROM orders ORDER BY ordered_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order List - Kapau-Men</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h1>Daftar Pesanan</h1>
  <ul>
    <?php while ($row = pg_fetch_assoc($result)): ?>
      <li>
        <?= htmlspecialchars($row['name']) ?> memesan 
        <strong><?= htmlspecialchars($row['menu_item']) ?></strong> 
        (<?= htmlspecialchars($row['phone']) ?>) 
        pada <?= date('d M Y H:i', strtotime($row['ordered_at'])) ?>
      </li>
    <?php endwhile; ?>
  </ul>
</body>
</html>
