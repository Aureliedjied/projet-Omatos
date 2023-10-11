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

        $filteredEmail = filter_var($this->email, FILTER_VALIDATE_EMAIL);

        if (!$filteredEmail || empty($this->name) || empty($this->address)) {
            return false;
        }

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password, name, address) VALUES (:email, :password, :name, :address)";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":email" => $filteredEmail, 
            ":password" => $hashedPassword,
            ":name" => $this->name,
            ":address" => $this->address,
        ]);

        if ($result) {
            $this->id = $pdo->lastInsertId();
        }

        else ( "Probleme lors de l'inscription");

        return $result;
    }

    public static function findByEmail($email, $password)
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `users` WHERE `email` = :email';
        $query = $pdo->prepare($sql);
        $query->execute([":email" => $email]);

        $user = $query->fetchObject('App\Models\Users');


        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }

        return $user;
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