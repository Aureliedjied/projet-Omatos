<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Reservation extends CoreModel
{
    private $date_commande;
    private $date_retour;
    private $client_id;
    private $item_id;


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

    public function getDate_commande()
    {
        return $this->date_commande;
    }


    public function setDate_commande($date_commande)
    {
        $this->date_commande = $date_commande;

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


    public function getItem_id()
    {
        return $this->item_id;
    }


    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;

    }
}