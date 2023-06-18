<?php

use Api\Action\GetWeatherCityAction;
use App\Action\HomeAction;
use Slim\App;

return function (App $app) {
    $app->get('/', HomeAction::class);

    $app->post('/get_weather_city', GetWeatherCityAction::class);
};
