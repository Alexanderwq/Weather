<?php

namespace App\Domain\Common\Service;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class GuzzleClient
{
    /**
     * @var Client
     */
    private $guzzleClient;

    public function __construct()
    {
        $this->guzzleClient = new Client();
    }

    public function call($params): string
    {
        $response = $this->guzzleClient->request('GET', "http://api.weatherapi.com/v1/forecast.json?", [
            RequestOptions::QUERY => $params
        ]);

        return (string) $response->getBody();
    }
}