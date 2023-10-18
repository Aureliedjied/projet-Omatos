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
    

    // Méthode pour voir tous les clients : 
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM user WHERE role = "user"';
        $pdoStatement = $pdo->query($sql);
        $users = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, 'App\Models\Users');

        return $users;
    }


    // Méthode pour inscrire un visiteur :
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
                throw new \Exception("Échec de l'insertion dans la base de données");
            }
        } catch (\Exception $e) {
            
            error_log($e->getMessage());
            return false;
        }
    }


    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `user` WHERE `email` = :email';
        $query = $pdo->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        $users = $query->fetchObject('App\Models\Users');

        // dd($users);
        return $users;
    }



    
    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress( string $address)
    {
        $this->address = $address;

    }

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail( string $email)
    {
        $this->email = $email;

    }

 
    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword( string $password)
    {
        $this->password = $password;

    }

    public function getRole()
    {
        return $this->role;
    }


    public function setRole( string $role)
    {
        $this->role = $role;

    }
}