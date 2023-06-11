<?php

use Psr\Log\LoggerInterface;
use Slim\App;
use Slim\Middleware\ErrorMiddleware;

return function (App $app) {
    $app->addErrorMiddleware(
        ($_ENV['ENV'] === 'DEV'),
        true,
        true,
        $app->getContainer()->get(LoggerInterface::class)
    );

    $app->add(ErrorMiddleware::class);
};
