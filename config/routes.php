<?php

use Api\Action\GetWeatherAction;
use App\Action\HomeAction;
use Slim\App;

return function (App $app) {
    $app->get('/', HomeAction::class);

    $app->post('/get_current_weather', GetWeatherAction::class);
};
