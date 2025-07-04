<?php
$conn = pg_connect("host=localhost dbname=kapau_db user=your_pg_user password=your_pg_password");
$result = pg_query($conn, "SELECT * FROM orders ORDER BY ordered_at DESC");

echo "<h2>All Orders</h2><ul>";
while ($row = pg_fetch_assoc($result)) {
  echo "<li>{$row['name']} ordered {$row['menu_item']} - {$row['phone']} at {$row['ordered_at']}</li>";
}
echo "</ul>";
?>
