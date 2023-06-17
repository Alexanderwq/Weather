<?php

namespace App\Domain\CurrentWeather\Builder;

use App\Domain\CurrentWeather\Data\CurrentWeatherData;

class CurrentWeatherDataBuilder
{
    private CurrentWeatherData $currentWeather;

    private CONST DAYS = '3';

    public function __construct()
    {
        $this->currentWeather = new CurrentWeatherData();
    }

    public function getCurrentWeather(): CurrentWeatherData
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