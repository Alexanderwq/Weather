<?php

use Monolog\Logger;

$settings = [
    'logger' => [
        'name' => 'error',
        'file' => __DIR__ . '/../logs/error.log',
        'level' => Logger::WARNING,
    ],
    'error' => [
        'display_error_details' => ($_ENV['ENV'] === 'DEV'),
        'log_errors' => true,
        'log_error_details' => true,
    ],
];

return $settings;