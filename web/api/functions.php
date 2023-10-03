<?php

function get_request_data()
{
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        return $_POST;
    }else if($_SERVER['REQUEST_METHOD'] === "GET"){
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

function check_all_params_exist($request, $params)
{
    foreach($params as $param){
        if(!isset($request[$param])){
            return false;
        }
    }

    return true;
}

?>