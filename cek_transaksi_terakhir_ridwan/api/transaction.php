<?php
// Database Configuration
$dbHost = '127.0.0.1';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'transaksi_it_perbankan';

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// API Endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Query to get the last transactions
    $query = "SELECT * FROM mutasi_rekening ORDER BY tanggal_transaksi DESC LIMIT 10";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $transactions = array();

        while ($row = $result->fetch_assoc()) {
            $transactions[] = $row;
        }

        // Return the JSON response
        header('Content-Type: application/json');
        echo json_encode($transactions);
    } else {
        // No transactions found
        http_response_code(404);
        echo json_encode(array("message" => "No transactions found."));
    }
} else {
    // Invalid HTTP method
    http_response_code(405);
    echo json_encode(array("message" => "Invalid request method."));
}

// Close the database connection
$conn->close();
?>
