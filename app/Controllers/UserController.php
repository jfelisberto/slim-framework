<?php

namespace app\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends BaseController
{
    public function create(Request $request, Response $response)
    {

        // return  view($response, 'pages.users.create', ['title' => 'Criar usuário']);

        view('pages/users/create', ['title' => '']);
        return $response;

    }

    public function store(Request $request, Response $response)
    {
        dump($request);

        return $response;
    }
}
