<?php

namespace App\Domain\CurrentWeather\Data;

class ForecastResponse
{
    /**
     * @var ForecastDayResponse[]
     */
    public array $forecastday;
}