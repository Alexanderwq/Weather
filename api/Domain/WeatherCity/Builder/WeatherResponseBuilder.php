<?php

namespace Api\Domain\WeatherCity\Builder;

use Api\Domain\WeatherCity\Data\WeatherResponse;
use JsonMapper;
use JsonMapper_Exception;

class WeatherResponseBuilder
{
    private JsonMapper $mapper;

    public function __construct(JsonMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @throws JsonMapper_Exception
     */
    public function build(object $weatherData)
    {
        return $this->mapper->map($weatherData, WeatherResponse::class);
    }
}