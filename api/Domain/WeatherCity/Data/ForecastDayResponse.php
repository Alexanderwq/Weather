<?php

namespace Api\Domain\WeatherCity\Data;

class ForecastDayResponse
{
    public string $date;

    public DayResponse $day;
}