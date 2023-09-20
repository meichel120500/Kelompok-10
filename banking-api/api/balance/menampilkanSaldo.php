<?php
    //koneksi ke database
    include "conn.php";

    // tema jason
    header('Content-Type: application/json');

    // Mendapatkan ID nasabah dari parameter URL
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    
    // Memeriksa apakah ID nasabah ada dalam data
    if(!empty($id)){
    $sql = "SELECT * FROM data_transaksi WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $saldo = $row['saldo'];
        $nama = $row['name'];
        echo json_encode(array("nama" => $nama,"saldo" => $saldo));
    } else {
        echo json_encode(array("message" => "Nasabah tidak ditemukan."));
    }
}   else {
    echo json_encode(array("message" => "ID nasabah harus disertakan dalam permintaan."));
}
// Tutup koneksi database
mysqli_close($conn);
?>