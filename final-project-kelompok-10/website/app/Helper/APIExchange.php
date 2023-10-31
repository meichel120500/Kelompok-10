<?php

namespace App\Helper;

use Illuminate\Support\Facades\Http;

class APIExchange
{
    
    public static string $base_api = "http://api.exchangeratesapi.io/v1/";
    public static string $api_key = "01378ead89af57180e9fd2a2c8d092ca";

    public static function get($endpoint, $query_param)
    {
        try {
            $query_param['access_key'] = self::$api_key;
            $response = Http::get(self::$base_api . $endpoint, $query_param);
            
            if ($response->successful()) {
                $data = $response->json(); 
                return $data;
            } else {
                return [['error' => 'API request failed'], $response->status()];
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return ['error' => $e->getMessage()];
        }
    }
}


