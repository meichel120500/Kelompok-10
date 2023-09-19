<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transaksi_it_perbankan";

// Create connection
try{
  $conn = new mysqli($servername, $username, $password, $database);
}catch(\Exception $e){
  die("Connection failed: " . $e->getMessage());
}


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};
?>