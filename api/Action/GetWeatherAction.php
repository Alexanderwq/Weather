<?php

namespace Api\Action;

use App\Domain\Common\Service\GuzzleClient;
use App\Domain\CurrentWeather\Builder\WeatherRequestBuilder;
use App\Domain\CurrentWeather\Builder\WeatherResponseBuilder;
use GuzzleHttp\Exception\GuzzleException;
use JsonMapper_Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetWeatherAction
{
    private GuzzleClient $guzzleClient;
    private WeatherRequestBuilder $currentWeatherDataBuilder;
    private WeatherResponseBuilder $weatherResponseBuilder;

    public function __construct(
        GuzzleClient          $guzzleClient,
        WeatherRequestBuilder $currentWeatherDataBuilder,
        WeatherResponseBuilder $weatherResponseBuilder,
    )
    {
        $this->guzzleClient = $guzzleClient;
        $this->currentWeatherDataBuilder = $currentWeatherDataBuilder;
        $this->weatherResponseBuilder = $weatherResponseBuilder;
    }

    /**
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $city = $request->getParsedBody()['city'];

        $currentWeatherData = $this->currentWeatherDataBuilder
            ->setCity($city)
            ->setDays()
            ->setKey()
            ->getCurrentWeather();
        $currentWeatherDataAsArray = json_decode(json_encode($currentWeatherData), true);

        $json = $this->guzzleClient->call($currentWeatherDataAsArray);

        $weatherResponse = $this->weatherResponseBuilder->build(json_decode($json));
        $responseJson = json_encode($weatherResponse);

        $response->getBody()->write($responseJson);

        return $response;
    }
}