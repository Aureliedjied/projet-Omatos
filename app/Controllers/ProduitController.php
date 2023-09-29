<?php

namespace App\Controllers;



use App\Models\Produit;




class ProduitController extends CoreController
{
    public function list()
    {
    // Ici j'appelle ma méthode show pour intégrer la liste de mes produits
        $this->show("produits/list",[
            "produits" => Produit::findAll()
        ]);
    }

    public function listOne($id)
    {
        $this->show("produits/detail", [
            "produit" => Produit::find($id)
        ]);
    }

}