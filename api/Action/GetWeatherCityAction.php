<?php

namespace Api\Action;

use Api\Common\Service\GuzzleClient;
use Api\Domain\WeatherCity\Builder\WeatherRequestBuilder;
use Api\Domain\WeatherCity\Builder\WeatherResponseBuilder;
use GuzzleHttp\Exception\GuzzleException;
use JsonMapper_Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetWeatherCityAction
{
    private GuzzleClient $guzzleClient;
    private WeatherRequestBuilder $weatherRequestBuilder;
    private WeatherResponseBuilder $weatherResponseBuilder;

    public function __construct(
        GuzzleClient          $guzzleClient,
        WeatherRequestBuilder $weatherRequestBuilder,
        WeatherResponseBuilder $weatherResponseBuilder,
    )
    {
        $this->guzzleClient = $guzzleClient;
        $this->weatherRequestBuilder = $weatherRequestBuilder;
        $this->weatherResponseBuilder = $weatherResponseBuilder;
    }

    /**
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $city = $request->getParsedBody()['city'];

        $weatherRequest = $this->weatherRequestBuilder
            ->setCity($city)
            ->setDays()
            ->setKey()
            ->getCurrentWeather();
        $weatherRequestAsArray = json_decode(json_encode($weatherRequest), true);

        $json = $this->guzzleClient->call($weatherRequestAsArray);

        $weatherResponse = $this->weatherResponseBuilder->build(json_decode($json));
        $responseJson = json_encode($weatherResponse);

        $response->getBody()->write($responseJson);

        return $response;
    }
}