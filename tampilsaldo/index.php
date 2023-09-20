<?php
// Set header untuk response berupa JSON
header('Content-Type: application/json');

// Data saldo (simulasi data dari database)
$saldo_akun = array(
    '12345' => 5000,  
);

// Ambil ID akun dari parameter GET
if (isset($_GET['id_akun'])) {
    $id_akun = $_GET['id_akun'];

    // Periksa apakah ID akun valid
    if (array_key_exists($id_akun, $saldo_akun)) {
        $saldo = $saldo_akun[$id_akun];
        $response = array('saldo' => $saldo);
    } else {
        $response = array('error' => 'ID akun tidak valid');
    }
} else {
    $response = array('error' => 'ID akun tidak diberikan');
}

// Menghasilkan output dalam format JSON
echo json_encode($response);
?>