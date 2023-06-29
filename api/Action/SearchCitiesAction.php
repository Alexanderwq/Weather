<?php

namespace Api\Action;

use Api\Common\Service\GuzzleClient;
use Api\Domain\SearchCity\Builder\SearchResponseBuilder;
use Api\Domain\WeatherCity\Builder\WeatherRequestBuilder;
use GuzzleHttp\Exception\GuzzleException;
use JsonMapper_Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SearchCitiesAction
{
    private const URL = 'http://api.weatherapi.com/v1/search.json';
    private GuzzleClient $guzzleClient;
    private WeatherRequestBuilder $weatherRequestBuilder;
    private SearchResponseBuilder $searchResponseBuilder;

    public function __construct(
        GuzzleClient          $guzzleClient,
        WeatherRequestBuilder $weatherRequestBuilder,
        SearchResponseBuilder $searchResponseBuilder,
    )
    {
        $this->guzzleClient = $guzzleClient;
        $this->weatherRequestBuilder = $weatherRequestBuilder;
        $this->searchResponseBuilder = $searchResponseBuilder;
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
            ->setKey()
            ->getWeatherRequest();
        $weatherRequestAsArray = json_decode(json_encode($weatherRequest), true);

        $json = $this->guzzleClient->call(self::URL, $weatherRequestAsArray);

        $searchResponse = $this->searchResponseBuilder->build(json_decode($json));
        $responseJson = json_encode($searchResponse);

        $response->getBody()->write($responseJson);

        return $response;
    }
}