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
   

    // Fonction pour ajouter au produit :
    

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `reservations`';
        $pdoStatement = $pdo->query($sql);
        $reservations = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Reservation');

        return $reservations;
    }

    public static function find(int $item_id, $client_id)
    {

        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `reservations` WHERE `client_id` = :clientId AND `item_id` = :itemId';
        $query = $pdo->prepare($sql);
        $query->execute([
            ':clientId' => $client_id,
            ':itemId' => $item_id
        ]);

        return $query->fetchObject('App\Models\Reservation');
    }

    public static function create(int $client_id, int $item_id, int $quantity)
    {
        $pdo = Database::getPDO();
        $sql = 'INSERT INTO `reservations` (`client_id`, `item_id`, `quantity`) VALUES (:clientId, :itemId, :quantity)';
        $query = $pdo->prepare($sql);
        $query->execute([
            ':clientId' => $client_id,
            ':itemId' => $item_id,
            ':quantity' => $quantity
        ]);
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