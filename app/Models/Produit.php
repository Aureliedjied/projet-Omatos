<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Produit extends CoreModel
{
    private $description;
    private $picture;
    private $price;
    private $stock;


    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `items`';
        $pdoStatement = $pdo->query($sql);
        $produits = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Produit');

        return $produits;
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

        $produit = $query->fetchObject('App\Models\Produit');

        if (!$produit) {
            
           echo "Une erreur s'est produite lors de la récupération du produit  ";
        }

        // Ici je prévoie la rupture : si le stock de mon produit est = ou inferieur à 0 :
        if ($produit->stock <= 0){
            echo "Ce produit est en rupture de stock :(";
        } else
        {
            return $produit;
        }
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;

    }


    public function getPicture()
    {
        return $this->picture;
    }


    public function setPicture($picture)
    {
        $this->picture = $picture;
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