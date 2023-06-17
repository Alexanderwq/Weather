<?php

namespace App\Domain\CurrentWeather\Builder;

use App\Domain\CurrentWeather\Data\WeatherRequest;

class CurrentWeatherDataBuilder
{
    private WeatherRequest $currentWeather;

    private CONST DAYS = '3';

    public function __construct()
    {
        $this->currentWeather = new WeatherRequest();
    }

    public function getCurrentWeather(): WeatherRequest
    {
        return $this->currentWeather;
    }

    public function setCity(string $city): static
    {
        $this->currentWeather->q = $city;

        return $this;
    }

    public function setKey(): static
    {
        $this->currentWeather->key = $_ENV['API_KEY'];

        return $this;
    }

    public function setDays(): static
    {
        $this->currentWeather->days = self::DAYS;

        return $this;
    }
}