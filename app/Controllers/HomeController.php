<?php

namespace app\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response)
    {
        view('pages/home', ['name' => 'Juliano Felisberto', 'title' => 'Site com Slim Framework']);

        return $response;
    }
}
