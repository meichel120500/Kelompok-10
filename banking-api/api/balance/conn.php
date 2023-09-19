<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dataabse = "transaksi perbankan";

    $conn = mysqli_connect($servername, $username, $password, $dataabse);
    if(!$conn) {
        die("koneksi tidak berhasil");
    }

?>