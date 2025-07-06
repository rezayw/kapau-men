<?php
require_once 'config.php';

header('Content-Type: text/csv; charset=utf-8');

// Set the filename for download

$timestamp = date("Y-m-d_H-i");
header("Content-Disposition: attachment; filename=orders_export_$timestamp.csv");


// BOM for UTF-8 compatibility with Excel
echo "\xEF\xBB\xBF";

// Output stream
$output = fopen('php://output', 'w');

// Kolom header
fputcsv($output, [
    'No Pesanan',
    'Tanggal Pesanan',
    'Menu Item',
    'Jumlah Item',
    'Total Harga',
    'Nama Pemesan',
    'No Telp Pemesan'
], ',', '"', '\\');

// Query data dari DB
$result = pg_query($conn, "SELECT * FROM orders ORDER BY ordered_at ASC");

while ($row = pg_fetch_assoc($result)) {
    fputcsv($output, [
        $row['id'],
        date('d-m-Y H:i', strtotime($row['ordered_at'])),
        $row['menu_item'],
        $row['qty'],
        $row['total_price'],
        $row['name'],
        $row['phone']
    ], ',', '"', '\\');
}

fclose($output);
exit;
?>
