<?php
include 'config.php'; 

function transferUang($namaPengirim, $namaPenerima, $jumlah) {
    global $conn;

    // Lakukan transfer dengan mengurangi saldo pengirim dan menambah saldo penerima
    $queryUpdateSaldoPengirim = "UPDATE data_transaksi SET saldo = saldo - $jumlah WHERE name = '$namaPengirim'";
    $queryUpdateSaldoPenerima = "UPDATE data_transaksi SET saldo = saldo + $jumlah WHERE name = '$namaPenerima'";

    // Eksekusi query
    if ($conn->query($queryUpdateSaldoPengirim) === TRUE && $conn->query($queryUpdateSaldoPenerima) === TRUE) {
        return true; // Transfer berhasil
    } else {
        return false; // Transfer gagal
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle permintaan POST
    $namaPengirim = $_POST['nama_pengirim'];
    $namaPenerima = $_POST['nama_penerima'];
    $jumlah = $_POST['jumlah'];

    // Lakukan transfer
    $hasilTransfer = transferUang($namaPengirim, $namaPenerima, $jumlah);

    if ($hasilTransfer) {
        $respon = array('success' => true, 'message' => 'Transfer berhasil.');
    } else {
        $respon = array('success' => false, 'message' => 'Transfer gagal.');
    }

    header('Content-Type: application/json');
    echo json_encode($respon); 
}
?>
