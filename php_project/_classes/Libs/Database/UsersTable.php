<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{

    private $db;
    public function __construct(MySQL $mysql) 
    {
        // require to pass in mysql object.
        $this->db = $mysql->connect();
    }
    public function insert($data)
    {
        try {
            $starement = $this->db->prepare("
                INSERT INTO users (name, email, phone, address, password, created_at)
                VALUES (:name, :email, :phone, :address, :password, NOW())
            ");

            $starement->execute($data);

            return $this->db->lastInsertId();


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}