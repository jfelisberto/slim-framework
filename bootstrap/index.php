<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as SlimAppFactory;

require '../vendor/autoload.php';

/**
 * Instantiate App
 *
 * In order for the factory to work you need to ensure you have installed
 * a supported PSR-7 implementation of your choice e.g.: Slim PSR-7 and a supported
 * ServerRequest creator (included with Slim PSR-7)
 */
$container = new Container;
$settings = require __DIR__ . '/../app/settings.php';
$settings($container);
$app = SlimAppFactory::create($container);

/**
 * The routing middleware should be added earlier than the ErrorMiddleware
 * Otherwise exceptions thrown from it will not be handled by the middleware
 */
$app->addRoutingMiddleware();

/**
 * Add Error Middleware
 */
$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

/**
 * Define app routes
 */
$routes = include '../app/Routes/web.php';
$routes($app);

/**
 * Run app
 */
$app->run();
