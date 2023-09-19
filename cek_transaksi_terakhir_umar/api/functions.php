<?php

function getRequestData()
{
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        return $_POST;
    }else if($_SERVER['REQUEST_METHOD'] === "POST"){
        return $_GET;
    }

    return null;
}

function make_response($data, $code)
{
    if(empty($data)){
        $data = '';
    }

    http_response_code($code);
    echo json_encode($data);
    exit;
}

?>