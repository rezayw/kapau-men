<?php
$db_host = 'localhost';
$db_name = 'kapau_db';
$db_user = 'postgres';
$db_pass = 'admin';

$conn = pg_connect("host=$db_host dbname=$db_name user=$db_user password=$db_pass");
if (!$conn) {
    die("Database connection failed.");
}
?>
