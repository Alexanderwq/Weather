<?php

namespace Api\Domain\Common\Data;

abstract class AbstractWeatherRequest
{
    public string $key;

    public string $q;
}