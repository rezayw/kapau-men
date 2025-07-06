<?php
// Koneksi ke database
require_once 'config.php';

// Ambil data dari form
$name      = trim($_POST['name'] ?? '');
$phone     = trim($_POST['phone'] ?? '');
$menu_name = trim($_POST['menu_item'] ?? ''); // kirim sebagai NAMA, bukan ID
$qty       = intval($_POST['qty'] ?? 0);

// Validasi input dasar
if ($name === '' || $phone === '' || $menu_name === '' || $qty <= 0) {
    echo "<p style='color:red;'>❌ Input tidak valid. Pastikan semua field diisi dan jumlah > 0.</p>";
    echo "<a href='order.php'>🔙 Kembali ke Form Order</a>";
    exit;
}

// Ambil harga berdasarkan NAMA menu
$query = "SELECT price FROM menu_items WHERE name = $1";
$result = pg_query_params($conn, $query, [$menu_name]);

if (!$result || pg_num_rows($result) === 0) {
    echo "<p style='color:red;'>❌ Menu tidak ditemukan di database.</p>";
    echo "<a href='order.php'>🔙 Kembali ke Form Order</a>";
    exit;
}

// Ambil harga dari hasil query
$menu = pg_fetch_assoc($result);
$price = intval($menu['price']);
$total_price = $qty * $price;

// Simpan ke tabel orders
$insert = pg_query_params($conn,
    "INSERT INTO orders (name, phone, menu_item, qty, total_price) VALUES ($1, $2, $3, $4, $5)",
    [$name, $phone, $menu_name, $qty, $total_price]
);

// Tampilkan hasil
if ($insert) {
    echo "<h2>✅ Order berhasil disimpan!</h2>";
    echo "<ul>
            <li><strong>Nama Pemesan:</strong> " . htmlspecialchars($name) . "</li>
            <li><strong>No. HP:</strong> " . htmlspecialchars($phone) . "</li>
            <li><strong>Menu:</strong> " . htmlspecialchars($menu_name) . "</li>
            <li><strong>Jumlah:</strong> $qty</li>
            <li><strong>Harga Satuan:</strong> Rp " . number_format($price, 0, ',', '.') . "</li>
            <li><strong>Total Harga:</strong> Rp " . number_format($total_price, 0, ',', '.') . "</li>
          </ul>";
    echo "<a href='index.php'>🔙 Kembali ke Beranda</a>";
} else {
    echo "<p style='color:red;'>❌ Terjadi kesalahan saat menyimpan pesanan.</p>";
    echo "<a href='order.php'>🔙 Kembali ke Form Order</a>";
}
?>
