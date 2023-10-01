<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Reservation extends CoreModel
{
    private $date_debut;
    private $date_retour;
    private $client_id;
    private $status;
   


    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `reservations`';
        $pdoStatement = $pdo->query($sql);
        $reservations = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Reservation');

        return $reservations;
    }

    public static function find(int $id)
    {

        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `reservations` WHERE `id` = :id' ;
        $query = $pdo->prepare($sql);
        $reservation = $query->execute([
            ":id" => $id
        ]);

        $reservation = $query->fetchObject('App\Models\Reservation');


        return $reservation;
    }


    public function getDate_retour()
    {
        return $this->date_retour;
    }


    public function setDate_retour($date_retour)
    {
        $this->date_retour = $date_retour;

    }

    public function getClient_id()
    {
        return $this->client_id;
    }


    public function setClient_id($client_id)
    {
        $this->client_id = $client_id;

    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

    }

    public function getDate_debut()
    {
        return $this->date_debut;
    }


    public function setDate_debut($date_debut)
    {
        $this->date_debut = $date_debut;

    }
}