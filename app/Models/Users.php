<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Users extends CoreModel
{
    private $email;
    private $password;
    private $address;
    private $role;

    public function insert()
    {
        $pdo = Database::getPDO();

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (email, password, name, address) VALUES (:email, :password, :name, :address)";

        try {
        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":email" => $this->email,
            ":password" => $hashedPassword,
            ":name" => $this->name,
            ":address" => $this->address,
            ]);

            if ($result) {
            $this->id = $pdo->lastInsertId();
            return true;
            } else {
            return false; 
            }
        } catch (\Exception $e) {

        return false; 
        }
    }


    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `user` WHERE `email` = :email';
        $query = $pdo->prepare($sql);
        $query->execute([":email" => $email]);

        $users = $query->fetchObject('App\Models\Users');

        // var_dump($user);
        return $users;
    }



    
    public function getAdress()
    {
        return $this->address;
    }


    public function setAdress($address)
    {
        $this->address = $address;

    }

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

    }

 
    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

    }

    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role)
    {
        $this->role = $role;

    }
}