<?php

namespace App\Controllers;



use App\Models\Panier;
use App\Models\Item;


class PanierController extends CoreController

{
public function listPanier()
    {
        $this->show("user/panier");
    }   

    public function addToPanier()
    {
        $itemId = $_POST['itemId'];
        $quantity = $_POST['quantity'];

        $itemId = Item::find($itemId);

        $panier = new Panier();

        // Ajoutez le produit au panier
        $panier->addItem($itemId, $quantity);

    }
}