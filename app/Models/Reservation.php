<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Reservation extends CoreModel
{
    private $dateDebut;
    private $dateRetour;
    private $userID;
    private $status;
    private $total;
   

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

    public function getDateDebut()
    {
        return $this->dateDebut;
    }


    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }


    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;
    }


    public function getDateRetour()
    {
        return $this->dateRetour;
    }


    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }


    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

}
