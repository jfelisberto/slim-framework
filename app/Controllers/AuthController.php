<?php

namespace app\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController
{
    public function index(Request $request, Response $response) {

        // return  view($response, 'auth.login');
        // return  view($response, 'auth.login', ['title' => 'Login']);

    }
}
