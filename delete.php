<?php
require_once 'config.php';

// Eksekusi perintah delete
$query = "DELETE FROM orders";
$result = pg_query($conn, $query);

// Cek hasil
if ($result) {
    echo "Semua data pesanan berhasil dihapus.";
    echo "<a href='view_order.php'>🔙 Kembali ke Form Order</a>";
} else {
    echo "Gagal menghapus data: " . pg_last_error($conn);
    echo "<a href='view_order.php'>🔙 Kembali ke Form My Order</a>";
}

pg_close($conn);

?>