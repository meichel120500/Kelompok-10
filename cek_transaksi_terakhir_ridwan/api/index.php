<?php
// URL API
$apiUrl = 'http://localhost/transaction.php';

// Membuat permintaan GET ke API
$response = file_get_contents($apiUrl);

// Memeriksa apakah permintaan berhasil
if ($response === FALSE) {
    die('Error accessing API.');
}

// Menguraikan respons JSON
$data = json_decode($response, true);

// Memeriksa apakah respons tidak kosong
if (empty($data)) {
    die('No transactions found.');
}

// Menampilkan data transaksi
foreach ($data as $transaction) {
    echo 'ID: ' . $transaction['id'] . '<br>';
    echo 'Nama: ' . $transaction['nama'] . '<br>';
    echo 'Tanggal Transaksi: ' . $transaction['tanggal_transaksi'] . '<br>';
    echo 'Jenis Transaksi: ' . $transaction['jenis_transaksi'] . '<br>';
    echo 'Jumlah Transaksi: ' . $transaction['jumlah_transaksi'] . '<br>';
    echo '<hr>';
}
?>
