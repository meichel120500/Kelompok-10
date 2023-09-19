<?php
// Include file koneksi database
include('connect.php');


function cek_transaksi($request) {
    global $conn;

    if(!isset($request['nama'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $nama = $request['nama'];

    $query = "SELECT id as id_transaksi, nama, tanggal_transaksi, jenis_transaksi, jumlah_transaksi FROM histori_transaksi WHERE nama = ? ORDER BY tanggal_transaksi DESC LIMIT 1";

    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $stmt->bind_param("s", $nama);

    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result = $stmt->get_result();
    $data_transaksi = $result->fetch_assoc();

    make_response($data_transaksi, 200);
}

?>
