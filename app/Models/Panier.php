<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Panier extends CoreModel
{
    private $items = [];


    public function addItem(Item $item, $quantity)
    {
        // Ajoute un produit au panier
        $this->items[] = [
            'item' => $item,
            'quantity' => $quantity,
        ];
    }

    public function getItems()
    {
        // Récupère les produits dans le panier
        return $this->items;
    }

}
