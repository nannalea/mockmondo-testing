<?php

require_once 'environment.php';

class Weather
{
    const BASE_URL = 'http://api.weatherstack.com/current';

    public string $city;
    private string $api_key;

    public function __construct($city)
    {
        $this->city = $city;
        $this->api_key = '?access_key=' . getenv('API_KEY');
    }

    private function apiCall(string $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);
     
        return $response;
    }

    public function call(){
        $data = $this->apiCall(self::BASE_URL . $this->api_key . "&query=$this->city" );
        
        //if invalid city/string is passed
        if(count($data) <= 2){
            if($data['success'] === false){
                $data = $this->apiCall(self::BASE_URL . $this->api_key . "&query=Copenhagen" );
                return $data;
            }
        } else{
            return $data;
        }
    }
}

// $signup = new Weather('Copenhagen');
// echo json_encode($signup->call());