<?php

namespace App\Controllers;



use App\Models\Client;




class ClientController extends CoreController
{
    public function login()
    {
        $this->show('client/login');
    }
}