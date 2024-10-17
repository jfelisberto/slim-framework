<?php

namespace app\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    public function create(Request $request, Response $response)
    {

        view('pages/users/form');

        return $response;
    }
}
