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
        $sql = 'SELECT * FROM `reservations` WHERE `id` = :id';
        $query = $pdo->prepare($sql);
        $query->execute([":id" => $id]);

        $reservation = $query->fetchObject('App\Models\Reservation');

        return $reservation;
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
