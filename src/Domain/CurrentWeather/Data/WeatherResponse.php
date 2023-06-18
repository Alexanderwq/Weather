<?php

namespace App\Domain\CurrentWeather\Data;

class WeatherResponse
{
    /**
     * @var ForecastResponse - данные о погоде по дням
     */
    public ForecastResponse $forecast;

    /**
     * @var LocationResponse - данные о локации
     */
    public LocationResponse $location;

    /**
     * @var CurrentResponse - текущая погода в городе
     */
    public CurrentResponse $current;
}