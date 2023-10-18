<?php

namespace App\Controllers;

// Classe gérant les erreurs (404, 403)
class ErrorController extends CoreController
{
    // on redéfinis le constructeur pour éviter d'avoir une boucle infinis sur le csrf
    public function __construct()
    {
        
    }
    
    public function error404()
    {
        // On envoie le header 404
        http_response_code(404);

        // Puis on gère l'affichage
        $this->show('error/error404');
    }

    public function error403()
    {
        // On envoie le header 404
        http_response_code(403);

        // Puis on gère l'affichage
        $this->show('error/error403');
    }
}