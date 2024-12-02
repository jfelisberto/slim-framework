<?php

namespace app\Controllers;

class BaseController
{

    protected $db;

    public function __construct()
    {
        $this->db = dbConnection();
    }
}
