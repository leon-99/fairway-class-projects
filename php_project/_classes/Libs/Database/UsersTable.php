<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{

    private $db;

    public function getAll()
    {
        $statement = $this->db->query("SELECT users.*, roles.name AS role
        FROM users LEFT JOIN roles
        ON users.role_id = roles.id
        ");

        return $statement->fetchAll();
    }

    public function __construct(MySQL $mysql) // require to pass in mysql object.
    {
        $this->db = $mysql->connect();
    }

    public function findByEmailAndPassword($email, $password)
    {
        try {
            $statement = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $statement->execute(["email" => $email, "password" => $password]);
            $user = $statement->fetch();

            if ($user)
                return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return false;
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

    public function updatePhoto($id, $photo)
    {
        try {
            $statement = $this->db->prepare("UPDATE users SET photo = :photo WHERE id = :id");
            $statement->execute(["photo" => $photo, "id" => $id]);
            return $statement->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function detele($id)
    {
        $statement = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $statement->execute(["id" => $id]);
        
        return $statement->rowCount();
    }

    public function suspend($id)
    {
        $statement = $this->db->prepare("UPDATE users SET suspended=1 WHERE id = :id");
        $statement->execute(["id" => $id]);
    }

    public function unsuspend($id)
    {
        $statement = $this->db->prepare("UPDATE users SET suspended=0 WHERE id = :id");
        $statement->execute(["id" => $id]);
    }

    public function changeRole($id, $role)
    {
        $statement = $this->db->prepare("UPDATE users SET role_id = :role WHERE id = :id");
        $statement->execute(["id" => $id, "role" => $role]);
    }

}