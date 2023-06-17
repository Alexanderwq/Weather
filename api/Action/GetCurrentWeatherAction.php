<?php

namespace Api\Action;

use App\Domain\Common\Service\GuzzleClient;
use App\Domain\CurrentWeather\Builder\CurrentWeatherDataBuilder;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetCurrentWeatherAction
{
    private GuzzleClient $guzzleClient;
    private CurrentWeatherDataBuilder $currentWeatherDataBuilder;

    public function __construct(
        GuzzleClient $guzzleClient,
        CurrentWeatherDataBuilder $currentWeatherDataBuilder,
    )
    {
        $this->guzzleClient = $guzzleClient;
        $this->currentWeatherDataBuilder = $currentWeatherDataBuilder;
    }

    /**
     * @throws GuzzleException
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

        $response->getBody()->write($json);

        return $response;
    }
}