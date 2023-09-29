<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Client extends CoreModel
{
    private $adresse;
    private $email;
    private $password;

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `clients`';
        $pdoStatement = $pdo->query($sql);
        $clients = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Client');

        return $clients;
    }

    public static function find(int $id)
    {

        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `clients` WHERE `id` = :id' ;
        $query = $pdo->prepare($sql);
        $client = $query->execute([
            ":id" => $id
        ]);

        $client = $query->fetchObject('App\Models\Client');


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