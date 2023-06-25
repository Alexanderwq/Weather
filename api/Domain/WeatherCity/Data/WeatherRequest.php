<?php

namespace Api\Domain\WeatherCity\Data;

use Api\Domain\Common\Data\AbstractWeatherRequest;

class WeatherRequest extends AbstractWeatherRequest
{
    public string $days;
}