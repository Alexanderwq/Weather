<?php

namespace Api\Action;

use App\Domain\Common\Service\GuzzleClient;
use App\Domain\CurrentWeather\Builder\CurrentWeatherRequestBuilder;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetCurrentWeatherAction
{
    /**
     * @throws GuzzleException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $city = $request->getParsedBody()['city'];

        $client = new GuzzleClient();
        $currentWeatherData = (new CurrentWeatherRequestBuilder())
            ->build($city)
            ->getArray();

        $response->getBody()->write($client->call($currentWeatherData));

        return $response;
    }
}