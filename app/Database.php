<?php

declare(strict_types=1);

namespace app;

use PDO;
use PDOException;

class Database
{
    protected $db;

    public function __construct($db_host, $db_name, $db_user, $db_pswd)
    {

        $this->db = self::getConnection($db_host, $db_name, $db_user, $db_pswd);

    }

    private function getConnection($db_host, $db_name, $db_user, $db_pswd): PDO
    {
        try {

            $dsn = "mysql:host={$db_host};port=3306;dbname={$db_name};charset=utf8";

            $connection = new PDO($dsn, $db_user, $db_pswd, [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);

        } catch (PDOException $e) {

            $connection = "Failed to get DB handle: " . $e->getMessage() . "\n";
            dump($connection);
            die;

        }

        return $connection;
    }

    /**
     * createData
     * @param $query string contains Statement coluns for table
     * @param $data string conteins records associates for coluns
     * @param return int last insert ID OR Exception error
     */
    public function createData($query, $data)
    {
        try {
            $smt = $this->db->prepare($query);
            $results = $smt->execute($data);
            $results = intval($this->db->lastInsertId());
        } catch(PDOException $e) {
            $results = $e->getMessage();
        }

        return $results;

    }

    public function readDataOnly($query)
    {

        try {
            $smt = $this->db->query($query);
            $results = $smt->fetchObject();
            $count = (int) $smt->rowCount();
        } catch(PDOException $e) {
            $results = $e->getMessage();
        }

        return $results;

    }

    public function readData($query)
    {

        try {
            $smt = $this->db->query($query);
            $results = $smt->fetchAll(PDO::FETCH_OBJ);
            $count = (int) $smt->rowCount();
        } catch(PDOException $e) {
            $results = $e->getMessage();
        }

        return $results;

    }

    public function updateData($query, $data)
    {

        try {
            $smt = $this->db->prepare($query);
            $results = $smt->execute($data);
        } catch(PDOException $e) {
            $results = $e->getMessage();
        }

        return $results;

    }

    public function deleteData($query, $data)
    {

        try {
            $smt = $this->db->query($query);
            $results = $smt->execute($data);
        } catch(PDOException $e) {
            $results = $e->getMessage();
        }

        return $results;

    }

}
