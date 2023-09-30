<?php

namespace App\Controllers;

use App\Models\Client;


class ClientController extends CoreController
{
    public function login()
    {
        $this->show('client/login');
    }

    public function loginValid(){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $client = Client::findByEmail($email);
        // erreur appropriée ici (vu en cours)
        if($client && password_verify($password,$client->getPassword())){

            $_SESSION["client"] = $client;
            $this->redirect("main-home");
        }else{
            $this->redirect("client-login");
        }
    }

    public function logout(){


        unset($_SESSION["client"]);
        $this->redirect("main-home");
    }

    public function add(){


        $this->show('client/form');
    }

    public function addValid(){

        // Je récupère tous mes champs
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");
        $name = filter_input(INPUT_POST, "name");
        $adresse = filter_input(INPUT_POST,"adresse");

        // j'initialise mon $errors
        $errors = [];

        // pattern pour le preg match du mot de passe REGEX
        $pattern = "^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&.])[A-Za-z\d@$!%*#?&.]{8,}^";

        if(empty($email)){
            $errors[] = "E-mail invalide";
        }
        if(!preg_match($pattern, $password)){
            $errors[] = "Mot de passe invalide";
        }


        $client = new Client();
        $client->setEmail($email);
        // ! pensez à hasher le mot de passe
        $client->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $client->setName($name);
        $client->setAdresse($adresse);


          // Gestion des erreurs
    if ($errors) {
        // Affichage des erreurs ou traitement approprié
        echo "Une erreur est survenue :";
        print_r($errors);
        // Redirection vers la page de connexion
        $this->redirect("client-loginValid");
    } else {
        // Enregistrement du client dans la base de données
        $result = $client->insert();

        if ($result) {
            // Redirection vers la page principale
            $this->redirect("main-home");
        } else {
            // Gestion des erreurs liées à l'insertion dans la base de données
            echo "Erreur lors de l'ajout du client à la base de données.";
        }
    }

    }

}