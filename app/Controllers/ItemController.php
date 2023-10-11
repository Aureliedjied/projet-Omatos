<?php

namespace App\Controllers;



use App\Models\Item;




class ItemController extends CoreController
{
    public function list()
    {
        $items = Item::findAll();
    var_dump($items);
    // Ici j'appelle ma méthode show pour intégrer la liste de mes produits
        $this->show("items/list",[
            "items" => Item::findAll()
        ]);
    }

    public function listOne($id)
    {
        $this->show("items/detail", [
            "item" => Item::find($id)
        ]);
    }

}