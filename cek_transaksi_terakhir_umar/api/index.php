<?php 

include('functions.php');

// $requestUrl = isset($_GET['url']) ? $_GET['url'] : '/';
$request_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/api/transactions' => [
        "method" => "POST",
        "file" => "CekTransaksiTerakhir.php",
        "function" => "cek_transaksi"
    ],  
];

if (array_key_exists($request_url, $routes)) {
    $controller = $routes[$request_url];
    if($_SERVER['REQUEST_METHOD'] !== strtoupper($controller['method'])){
        make_response(['error' => "Method Not Allowed"], 405);
    }
    
    $request = get_request_data();
    if($request === null){
        make_response(['error' => "Method Not Allowed"], 405);
    }

    include($controller['file']);

    call_user_func_array($controller['function'], [$request]);
} else {
    make_response(['error' => "Not Found"], 404);
}

?>