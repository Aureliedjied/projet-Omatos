<?php

namespace App\Controllers;

use App\Models\Users;

class UserController extends CoreController
{
    

    public function add()
    {
        // Ici j'appelle la méthode de mon CoreController pour générer un jeton :
        $csrfToken = $this->generateCsrfToken();
        // Je l'intégre à ma vue pour le formulaire :
        $this->show('user/add', ['csrfToken' => $csrfToken]);
    }

    
    public function addValid()
    {

        // Vérification du token CSRF
        $submittedToken = filter_input(INPUT_POST, 'csrf_token');
            if (empty($submittedToken) || !hash_equals($_SESSION['csrf_token'], $submittedToken)) {
        // Le token CSRF est invalide, traitement de l'erreur
            echo "Erreur CSRF : Le formulaire a échoué à la validation de sécurité.";
            $this->redirect("main-home");
        }

        // Je récupère tous mes champs
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");
        $name = filter_input(INPUT_POST, "name");
        $address = filter_input(INPUT_POST, "address");

        $errors = [];


        // j'utilise la méthode regex pour complexifier les mdp :
        $pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&.])[A-Za-z\d@$!%*#?&.]{8,}$/";


        if(empty($email)){
            $errors[] = "E-mail invalide";
        }
        if(!preg_match($pattern, $password)){
            $errors[] = "Mot de passe invalide";
        }


        $user = new Users();
        $user->setEmail($email);
        // ! pensez à hasher le mot de passe
        $user->setPassword($password); // Le mdp est hashé dans le Model
        $user->setName($name);
        $user->setAddress($address);


        if ($errors) {
            // Affichage des erreurs ou traitement approprié
            echo "Une erreur est survenue :";
            // dd($errors);
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
                error_log("Erreur lors de l'ajout du client à la base de données.");
                echo "Une erreur est survenue. Veuillez réessayer plus tard.";
                $this->redirect("main-home");
            }
        }
    }

    public function login()
    {
        $csrfToken = $this->generateCsrfToken();
        $this->show('user/login', ['csrfToken' => $csrfToken]);
    }

    public function loginValid(){

        //  récupérer les élements en post et verifier qu'il ne sont pas null :
        $email = $_POST["email"];
        $password = $_POST["password"];

        // dump($password);
        // dd($email, $password);

        //  récupérer l'utilisateur correspondant à l'email en bdd
        $user = Users::findByEmail($email);
        
        // dump("Mot de passe soumis: $password");
        // dd("Mot de passe en base de données: " . $user->getPassword());

        //  si l'utilisateur existe je compare les mot de passe
        if ($user && password_verify($password, $user->getPassword())) {

            $_SESSION["role"] = $user->getRole();
            $_SESSION["user"] = $user;
            $this->redirect("main-home");
        } else {
            $this->redirect("user-login");
        }
    }

    public function logout(){


        unset($_SESSION["user"]);
        $this->redirect("main-home");
    }

}