<?php

namespace App\Domain\CurrentWeather\Data;

class WeatherRequest
{
    public string $key;

    public string $q;

    public string $days;
}