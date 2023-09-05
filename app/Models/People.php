<?php

namespace App\Models;

use App\Bootstrap\Database;
use PDO;

class People
{
    const table = 'people';

    public static function all()
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM ' . self::table . ' ORDER BY name asc');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM ' . self::table . ' WHERE id = :ID LIMIT 1', [
            ':ID' => $id
        ]);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function findByNIS(int $nis)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM '. self::table . ' WHERE nis = :NIS LIMIT 1', [
            ':NIS' => $nis
        ]);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function existsByNIS(int $nis)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT 1 FROM '. self::table . ' WHERE nis = :NIS LIMIT 1', [
            ':NIS' => $nis
        ]);

        return $result->rowCount();
    }

    public static function findByName(string $name)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM '. self::table . ' WHERE name LIKE :NAME LIMIT 1', [
            ':NAME' => "%$name%"
        ]);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function create(array $data =[])
    {
            $conn = new Database();
            $conn->executeQuery('INSERT INTO ' . self::table . ' (name, nis) values (:NAME, :NIS)', [
                ':NAME' => $data['name'],
                ':NIS' => $data['nis']
            ]);

            return self::find($conn->getLastId());
    }
}
