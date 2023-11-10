<?php
// Include file koneksi database
include('connect.php');

function get_data_bank($request)
{
    global $conn;

    if(!isset($request['user_id'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $user_id = $request['user_id'];

    $qbank_data = "SELECT * FROM data_transaksi_bank WHERE user_id = ? LIMIT 1";
    $stmt = $conn->prepare($qbank_data);
    $stmt->bind_param("s", $user_id);
    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result_bank = $stmt->get_result();
    $bank = $result_bank->fetch_assoc();
    
    make_response($bank, 200);
}

function cek_transaksi($request) {
    global $conn;

    if(!isset($request['user_id'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $user_id = $request['user_id'];

    $qbank_id = "SELECT id FROM data_transaksi_bank WHERE user_id = ?";
    $stmt = $conn->prepare($qbank_id);
    $stmt->bind_param("s", $user_id);
    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result_bank = $stmt->get_result();
    $bank = $result_bank->fetch_assoc();
    $bank_id = $bank['id'];

    $qdata_transaksi = "SELECT id as id_transaksi, tanggal_transaksi, jenis_transaksi, jumlah_transaksi FROM histori_transaksi WHERE bank_id = ? ORDER BY tanggal_transaksi DESC LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $bank_id);

    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result = $stmt->get_result();
    $data_transaksi = $result->fetch_assoc();

    make_response($data_transaksi, 200);
}

?>
