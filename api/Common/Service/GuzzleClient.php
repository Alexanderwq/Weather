<?php

namespace Api\Common\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class GuzzleClient
{
    private Client $guzzleClient;

    public function __construct()
    {
        $this->guzzleClient = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function call($params): string
    {
        $response = $this->guzzleClient->request('GET', "http://api.weatherapi.com/v1/forecast.json?", [
            RequestOptions::QUERY => $params
        ]);

        return (string) $response->getBody();
    }
}