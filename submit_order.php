<?php
require_once 'config.php';

$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$menu = $_POST['menu_item'] ?? '';

if (!$name || !$phone || !$menu) {
  die("Invalid input.");
}

pg_query_params($conn,
  "INSERT INTO orders (name, phone, menu_item) VALUES ($1, $2, $3)",
  [$name, $phone, $menu]
);

echo "Order submitted successfully! <a href='index.php'>Back to home</a>";
?>
