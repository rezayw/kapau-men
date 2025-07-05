<?php
require_once 'config.php';
$result = pg_query($conn, "SELECT name FROM menu_items ORDER BY id ASC");
$selected = $_GET['menu'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kapau-Men Resto</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h1>Order Pesanan Sekarang Juga!</h1>
  <nav>
    <a href="index.php">Menu</a>
    <a href="order.php">Order Now</a>
    <a href="view_orders.php">My Order</a>
  </nav>
  <h2>Place Your Order</h2>
  <form method="POST" action="submit_order.php">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Phone: <input type="text" name="phone" required></label><br>
    <label>Menu Item:
      <select name="menu_item">
        <?php while ($row = pg_fetch_assoc($result)): ?>
          <option value="<?= htmlspecialchars($row['name']) ?>" <?= ($row['name'] == $selected ? 'selected' : '') ?>>
            <?= htmlspecialchars($row['name']) ?>
          </option>
        <?php endwhile; ?>
      </select>
    </label><br>
    <button type="submit">Submit</button>
  </form>
</body>
</html>
