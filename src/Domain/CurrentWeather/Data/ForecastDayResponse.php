<?php

namespace App\Domain\CurrentWeather\Data;

class ForecastDayResponse
{
    public string $date;

    public DayResponse $day;
}