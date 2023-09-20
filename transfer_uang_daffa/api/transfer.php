<?php
// Include file koneksi database
include('connect.php');

// Fungsi untuk melakukan transfer uang
function transfer($from, $to, $amount) {
    global $conn; // Gunakan koneksi dari connect.php

    // Periksa apakah akun sumber dan akun tujuan ada dalam database
    $query = "SELECT nilai_saldo FROM data_transaksi_bank WHERE nama = '$from' OR nama = '$to'";
    $result = $conn->query($query);

    if ($result->num_rows != 2) {
        return "Akun sumber atau akun tujuan tidak ditemukan.";
    }

    $row1 = $result->fetch_assoc();
    $row2 = $result->fetch_assoc();

    $saldo_from = $row1['nilai_saldo'];
    $saldo_to = $row2['nilai_saldo'];

    if ($saldo_from < $amount) {
        return "Saldo tidak mencukupi.";
    }

    // Mulai transaksi
    $conn->begin_transaction();

    // Update saldo akun sumber
    $query1 = "UPDATE data_transaksi_bank SET nilai_saldo = nilai_saldo - $amount WHERE nama = '$from'";
    $conn->query($query1);

    // Update saldo akun tujuan
    $query2 = "UPDATE data_transaksi_bank SET nilai_saldo = nilai_saldo + $amount WHERE nama = '$to'";
    $conn->query($query2);

    // Commit transaksi
    $conn->commit();

    return "Transfer berhasil.";
}

// Handle request transfer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $result = transfer($from, $to, $amount);
    echo $result;
}

// Tutup koneksi ke database
$conn->close();
?>
