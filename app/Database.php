<?php

declare(strict_types=1);

namespace app;

use PDO;

class Database
{
    protected $db;

    public function __construct()
    {
        $this->db = self::getConnection();

        // self::getConnection();
    }

    private function getConnection(): PDO
    {

        // $db_host = '127.0.0.1';
        // $db_name = 'integramaisDev';
        // $db_user = 'erp';
        // $db_pswd = 'uTo7aVsIA1ATCAtD';

        $db_host = '65.108.133.109';
        $db_name = 'parametriza';# production
        $db_user = 'parametriza_externo'; # production
        $db_pswd = 'Oq718~%MN;1y'; # production
        // $db_name = 'parametriza_dev'; # developer
        // $db_user = 'parametriza_dev_externo'; # developer
        // $db_pswd = 'Ia870!F<kzr*'; # developer

        $dsn = "mysql:host={$db_host};port=3306;dbname={$db_name};charset=utf8";

        $connection = new PDO($dsn, $db_user, $db_pswd, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        return $connection;
    }

    public function createData($query)
    {}

    public function readDataOnly($query)
    {
        // dump($query);
        $smt = $this->db->query($query);
        // dump($smt);
        $results = $smt->fetchObject();
        // dump($results);
        return $results;

    }

    public function readData($query)
    {
        // dump($query);
        $smt = $this->db->query($query);
        // dump($smt);
        $results = $smt->fetchAll(PDO::FETCH_OBJ);
        // dump($results);
        return $results;

    }

    public function updateData()
    {}

    public function deleteData()
    {}

}
