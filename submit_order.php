<?php
$conn = pg_connect("host=localhost dbname=kapau_db user=your_pg_user password=your_pg_password");

$name = $_POST['name'];
$phone = $_POST['phone'];
$menu = $_POST['menu_item'];

pg_query_params($conn, "INSERT INTO orders (name, phone, menu_item) VALUES ($1, $2, $3)", [$name, $phone, $menu]);

echo "Order submitted successfully! <a href='index.html'>Back to home</a>";
?>
