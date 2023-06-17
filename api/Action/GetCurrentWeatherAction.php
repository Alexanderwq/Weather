<?php

namespace Api\Action;

use App\Domain\Common\Service\GuzzleClient;
use App\Domain\CurrentWeather\Builder\CurrentWeatherDataBuilder;
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

        $currentWeatherData = (new CurrentWeatherDataBuilder())
            ->setCity($city)
            ->setDays()
            ->setKey()
            ->getCurrentWeather();
        $currentWeatherDataAsArray = json_decode(json_encode($currentWeatherData), true);

        $client = new GuzzleClient();
        $response->getBody()->write($client->call($currentWeatherDataAsArray));

        return $response;
    }
}