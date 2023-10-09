<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Panier extends CoreModel
{
    private $produits = [];


    public function addProduit(Produit $produit, $quantite)
    {
        // Ajoute un produit au panier
        $this->produits[] = [
            'produit' => $produit,
            'quantite' => $quantite,
        ];
    }

    public function getProduits()
    {
        // Récupère les produits dans le panier
        return $this->produits;
    }

}
