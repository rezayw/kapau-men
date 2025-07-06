<?php
require_once 'config.php';
$result = pg_query($conn, "SELECT * FROM orders ORDER BY ordered_at ASC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order List - Kapau-Men</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h1>Daftar Pesanan</h1>
  <table>
    <thead>
      <tr>
        <th>No Pesanan</th>
        <th>Tanggal Pesanan</th>
        <th>Menu Item</th>
        <th>Jumlah Item</th>
        <th>Total Harga</th>
        <th>Nama Pemesan</th>
        <th>No Telp Pemesan</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = pg_fetch_assoc($result)): ?>
        <tr>
          <td><strong><?= htmlspecialchars($row['id']) ?></strong></td>
          <td><?= date('d M Y H:i', strtotime($row['ordered_at'])) ?></td>
          <td><?= htmlspecialchars($row['menu_item']) ?></td>
          <td><?= htmlspecialchars($row['qty']) ?></td>
          <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['phone']) ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>