<?php

namespace App\Domain\CurrentWeather\Data;

class CurrentResponse
{
    public int $feelslike_c;
    public int $temp_c;
    public string $wind_dir;
    public int $wind_kph;
    public int $humidity;
}