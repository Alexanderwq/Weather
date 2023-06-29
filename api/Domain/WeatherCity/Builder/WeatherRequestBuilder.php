<?php

namespace Api\Domain\WeatherCity\Builder;

use Api\Domain\WeatherCity\Data\WeatherRequest;

class WeatherRequestBuilder
{
    private WeatherRequest $weatherRequest;

    private CONST DAYS = '3';

    public function __construct()
    {
        $this->weatherRequest = new WeatherRequest();
    }

    public function getWeatherRequest(): WeatherRequest
    {
        return $this->weatherRequest;
    }

    public function setCity(string $city): static
    {
        $this->weatherRequest->q = $city;

        return $this;
    }

    public function setKey(): static
    {
        $this->weatherRequest->key = $_ENV['API_KEY'];

        return $this;
    }

    public function setDays(): static
    {
        $this->weatherRequest->days = self::DAYS;

        return $this;
    }
}