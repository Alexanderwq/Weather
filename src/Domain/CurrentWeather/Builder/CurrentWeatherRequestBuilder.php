<?php

namespace App\Domain\CurrentWeather\Builder;

use App\Domain\CurrentWeather\Data\CurrentWeatherData;

class CurrentWeatherRequestBuilder
{
    private CurrentWeatherData $currentWeather;

    private CONST DAYS = '3';

    public function __construct()
    {
        $this->currentWeather = new CurrentWeatherData();
    }

    public function build(string $city): CurrentWeatherRequestBuilder
    {
        $this->setCity($city);
        $this->setDays();
        $this->setKey();

        return $this;
    }

    public function getCurrentWeather(): CurrentWeatherData
    {
        return $this->currentWeather;
    }

    private function setCity(string $city): void
    {
        $this->currentWeather->q = $city;
    }

    private function setKey(): void
    {
        $this->currentWeather->key = getenv('API_KEY');
    }

    private function setDays(): void
    {
        $this->currentWeather->days = self::DAYS;
    }
}