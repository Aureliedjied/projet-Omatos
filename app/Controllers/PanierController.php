<?php

namespace App\Controllers;



use App\Models\Panier;
use App\Models\Produit;


class PanierController extends CoreController

{
public function listPanier()
    {
        $this->show("client/panier");
    }   

    public function addToPanier()
    {
        $produitId = $_POST['produit_id'];
        $quantite = $_POST['quantite'];

        $produit = Produit::find($produitId);

        $panier = new Panier();

        // Ajoutez le produit au panier
        $panier->addProduit($produit, $quantite);

    }
}