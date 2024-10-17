<?php

use app\Controllers\HomeController;
use app\Controllers\UserController;
use Slim\App;

return function(App $app) {

    $app->get('/', [HomeController::class, 'index']);

    $app->get('/user/create', [UserController::class, 'create']);
    $app->post('/user/store', [UserController::class, 'store']);

};
