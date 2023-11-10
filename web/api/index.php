<?php 

include('functions.php');

// $requestUrl = isset($_GET['url']) ? $_GET['url'] : '/';
$request_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    // AUTH
    '/api/login' => [
        "method" => "POST",
        "file" => "UserAuth.php",
        "function" => "login"
    ],
    '/api/check_email_exists' => [
        "method" => "POST",
        "file" => "UserAuth.php",
        "function" => "check_email_exists"
    ],
    '/api/reset_password' => [
        "method" => "POST",
        "file" => "UserAuth.php",
        "function" => "reset_password"
    ],
    '/api/change_password' => [
        "method" => "POST",
        "file" => "UserAuth.php",
        "function" => "change_password"
    ],

    // PERBANKAN
    '/api/perbankan/user_bank_data' => [
        "method" => "POST",
        "file" => "PerBankan.php",
        "function" => "get_data_bank"
    ],  
    '/api/perbankan/user_transactions' => [
        "method" => "POST",
        "file" => "PerBankan.php",
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
    make_response(['error' => "API route not Found"], 404);
}

?>