<?php

namespace Api\Domain\WeatherCity\Data;

class WeatherRequest
{
    public string $key;

    public string $q;

    public string $days;
}