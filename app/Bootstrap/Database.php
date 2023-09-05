<?php

namespace App\Bootstrap;

use PDO;

class Database extends PDO
{
    private $DB_NAME = 'gesuas';
    private $DB_USER = 'root';
    private $DB_PASSWORD = 'root';
    private $DB_HOST = 'mysql';
    private $DB_PORT = 3306;

    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER ,$this->DB_PASSWORD);
    }

    private function setParameters($stmt, $key, $value)
    {
        $stmt->bindParam($key, $value);
    }

    private function mountQuery($stmt, $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->setParameters($stmt, $key, $value);
        }
    }

    public function executeQuery(string $query, array $parameters = [])
    {
        $stmt = $this->conn->prepare($query);
        $this->mountQuery($stmt, $parameters);
        $stmt->execute();
        return $stmt;
    }

    public function getLastId()
    {
        return $this->conn->lastInsertId();
    }
}
