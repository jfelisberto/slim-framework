<?php

use app\Controllers\AuthController;
use app\Controllers\HomeController;
use app\Controllers\UserController;
use app\Controllers\KolossusController;
use app\Controllers\SpedController;
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use PSr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

return function(App $app) {

    $app->get('/', [AuthController::class, 'index']);

    $app->get('/home', [HomeController::class, 'index']);

    $app->get('/user/create', [UserController::class, 'create']);
    $app->post('/user/store', [UserController::class, 'store']);

    $app->get('/kolossus', [KolossusController::class, 'index']);

    $app->get('/sped', [SpedController::class, 'index']);
    $app->get('/sped/{id}', [SpedController::class, 'show']);

    $app->group('/api', function(RouteCollectorProxy $group) {

        $group->get('/products', function(Request $request, Response $response) {

            $db = dbConnection();

            $data = $db->readData('SELECT * FROM parametriza_cronjob');

            $body = json_encode($data);

            $response->getBody()->write($body);

            return $response;
        })->setName('products');

    });


};
