<?php

namespace App\Controllers;

use App\Models\Users;


class UserController extends CoreController
{
    public function login()
    {
        $this->show('user/login');
    }

    public function loginValid(){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = Users::findByEmail($email, $password);
        // erreur appropriée ici (vu en cours)
        if($user && password_verify($password,$user->getPassword())){

            $_SESSION["user"] = $user;
            $this->redirect("main-home");
        }else{
            $this->redirect("user-login");
        }
    }

    public function logout(){


        unset($_SESSION["user"]);
        $this->redirect("main-home");
    }

    public function add(){


        $this->show('user/form');
    }

    public function addValid(){

        // Je récupère tous mes champs
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");
        $name = filter_input(INPUT_POST, "name");
        $adress = filter_input(INPUT_POST,"adress");

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


        $user = new Users();
        $user->setEmail($email);
        // ! pensez à hasher le mot de passe
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $user->setName($name);
        $user->setAdress($adress);


          // Gestion des erreurs
    if ($errors) {
        // Affichage des erreurs ou traitement approprié
        echo "Une erreur est survenue :";
        print_r($errors);
        // Redirection vers la page de connexion
        $this->redirect("user-loginValid");
    } else {
        // Enregistrement du client dans la base de données
        $result = $user->insert();

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