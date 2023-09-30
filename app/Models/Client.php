<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Client extends CoreModel
{
    private $adresse;
    private $email;
    private $password;


    public static function findbyEmail($email)
    {

        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `clients` WHERE `email` = :email' ;
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            ":email" => $email
        ]);

        $client = $query->fetchObject('App\Models\Client');


        return $client;
    }


    public function insert()
    {
        // j'appelle PDO
        $pdo = Database::getPDO();
        $sql = "INSERT INTO clients (email, password, name, adresse) VALUES (:email, :password, :name, :adresse)";
        $query = $pdo->prepare($sql);
        $client = $query->execute([
            ":email" => $this->email,
            ":password" => $this->password,
            ":name" => $this->name,
            ":adresse" => $this->adresse

        ]);

        if($client){
            // ici on récupère l'id généré par l'insert en bdd
            $this->id = $pdo->lastInsertId();
        }

        return $client;
    }


    
    public function getAdresse()
    {
        return $this->adresse;
    }


    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

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
}