<?php

namespace App\Controllers;



use App\Models\Reservation;


class ReservationController extends CoreController
{
public function listPanier()
    {
        $this->show("client/panier");
    }
}