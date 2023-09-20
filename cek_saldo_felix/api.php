<?php
// Konfigurasi koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "it_perbankan";

// Koneksi database
$mysqli = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi database
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

// Saldo berdasarkan nomor rekening
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["account_number"])) {
    $accountNumber = $_GET["account_number"];

    // Query untuk mendapatkan saldo
    $query = "SELECT balance FROM bank_accounts WHERE account_number = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $accountNumber);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    $stmt->close();

    // Validasi rekening
    if ($balance !== null) {
        $response = array("saldo" => $balance);
        echo json_encode($response);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Rekening tidak ditemukan"));
    }
}
?>
