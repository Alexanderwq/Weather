<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    LoggerInterface::class => function (ContainerInterface $container) {
        $loggerSettings = $container->get('settings')['logger'];

        $logger = new Logger($loggerSettings['name']);
        $handler = new StreamHandler($loggerSettings['file'], $loggerSettings['level']);
        $formatter = new LineFormatter(
            LineFormatter::SIMPLE_FORMAT . PHP_EOL,
            NormalizerFormatter::SIMPLE_DATE,
            true,
            true
        );
        $handler->setFormatter($formatter);
        $logger->pushHandler($handler);

        return $logger;
    },

    App::class => function (ContainerInterface $container) {
        return AppFactory::createFromContainer($container);
    },

    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get('settings')['error'];

        return new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool) $settings['display_error_details'],
            (bool) $settings['log_errors'],
            (bool) $settings['log_error_details'],
            $container->get(LoggerInterface::class)
        );
    },
];