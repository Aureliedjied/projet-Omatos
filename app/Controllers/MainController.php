<?php

namespace App\Controllers;
use App\Models\Users;



class MainController extends CoreController
{
    public function home()
    {
        $this->show('main/home');
    }


    public function dashboard()
    {
        // echo "La méthode dashboard est appelée.";
        $this->checkAuthorization(['admin']);

        $clients = Users::findAll();

        // Affichez la vue du tableau de bord
        $this->show('admin/dashboard', ['clients' => $clients]);
    }


    public function checkAdmin()
    {
        
        return isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
    }
}

