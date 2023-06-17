<?php

namespace App\Domain\CurrentWeather\Builder;

use App\Domain\CurrentWeather\Data\CurrentWeatherData;

class CurrentWeatherRequestBuilder
{
    /**
     * @var CurrentWeatherData
     */
    private $currentWeather;

    private CONST DAYS = '3';

    public function __construct()
    {
        $this->currentWeather = new CurrentWeatherData();
    }

    public function build($city): CurrentWeatherRequestBuilder
    {
        $this->setCity($city);
        $this->setDays();
        $this->setKey();

        return $this;
    }

    public function getArray()
    {
        return json_decode(json_encode($this->currentWeather), true);
    }

    private function setCity(string $city)
    {
        $this->currentWeather->q = $city;
    }

    private function setKey()
    {
        $this->currentWeather->key = '47c435aa3b4f42fabda191228232405';
    }

    private function setDays()
    {
        $this->currentWeather->days = self::DAYS;
    }
}