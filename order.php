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
  <div>
  <form method="POST" action="submit_order.php">
    <label for="fname">Nama Pemesan</label>
    <input type="text" id="fname" name="name" required placeholder="Your name..">

    <label for="lname">Nomer Telfon</label>
    <input type="text" id="lname" name="phone" required placeholder="Your Phone..">

    <label for="menu_item">Menu Makanan</label>
    <select name="menu_item" required>
        <?php while ($row = pg_fetch_assoc($result)): ?>
          <option value="<?= htmlspecialchars($row['name']) ?>" <?= ($row['name'] == $selected ? 'selected' : '') ?>>
            <?= htmlspecialchars($row['name']) ?>
          </option>
        <?php endwhile; ?>
    </select>

    <label for="qty">Jumlah</label>
    <select id="qty" name="qty" required>
      <option value=1>1 Porsi</option>
      <option value=2>2 Porsi</option>
      <option value=3>3 Porsi</option>
      <option value=4>4 Porsi</option>
      <option value=5>5 Porsi</option>
      <option value=6>6 Porsi</option>
      <option value=7>7 Porsi</option>
    </select>

    <input type="submit" value="Submit">
  </form>
</div>
 
</body>
</html>
