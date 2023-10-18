<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Item extends CoreModel
{

    private $description;
    private $price;
    private $image;
    private $stock;


    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `items`';
        $pdoStatement = $pdo->query($sql);
        $items = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Item');

        return $items;
    }

    public static function find(int $id)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM `items` WHERE `id` = :id' ;

        // pour éviter les injection je prépare notre requête
        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":id" => $id
        ]);

        $item = $query->fetchObject('App\Models\Item');

        if (!$item) {
            
           echo "Une erreur s'est produite lors de la récupération du produit  ";
        }

        // Ici je prévoie la rupture : si le stock de mon produit est = ou inferieur à 0 :
        if ($item->stock <= 0){
            echo "Ce produit est en rupture de stock :(";
        } else
        {
            return $item;
        }
    }

    public static function findInStock()
    {
    $pdo = Database::getPDO();
    $sql = 'SELECT * FROM `items` WHERE `stock` > 0';
    $pdoStatement = $pdo->query($sql);
    $itemStock = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Item');

    return $itemStock;
    }



    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;

    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

    }
}