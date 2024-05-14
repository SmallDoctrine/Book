<?php

namespace App\Repositories\token\Services\AbstractApi;
use GuzzleHttp\Client;

class AbstractApiServices
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://exchange-rates.abstractapi.com/v1/',
            'timeout' => 2.0,
        ]);

    }
//https://exchange-rates.abstractapi.com/v1/live/?api_key=ed676777e0f744699cf0a58f28e0e4c5&base=USD&target=EUR
    public function  live ()
    {
       $response =  $this->client->get('live',[
            'query'=> [
                'api_key'=>getenv('API_ABSTRACT_KEY'),
                'base'=>'USD'
            ]
        ]);
       return json_decode($response->getBody());
    }
}
