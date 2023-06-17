<?php

use Api\Action\GetCurrentWeatherAction;
use App\Action\HomeAction;
use Slim\App;

return function (App $app) {
    $app->get('/', HomeAction::class);

    $app->post('/get_current_weather', GetCurrentWeatherAction::class);
};
