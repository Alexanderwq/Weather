<?php

use Api\Action\GetWeatherCityAction;
use Api\Action\SearchCitiesAction;
use App\Action\HomeAction;
use Slim\App;

return function (App $app) {
    $app->get('/', HomeAction::class);

    $app->post('/get_weather_city', GetWeatherCityAction::class);

    $app->post('/search_cities', SearchCitiesAction::class);
};
