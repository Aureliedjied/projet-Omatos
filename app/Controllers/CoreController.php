<?php

namespace App\Controllers;

class CoreController
{

    protected function show(string $viewName, $viewData = [])
    {
        
        global $router;

        $viewData['currentPage'] = $viewName;

        // définir l'url absolue pour nos assets
        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
        // définir l'url absolue pour la racine du site
        // /!\ != racine projet, ici on parle du répertoire public/
        $viewData['baseUri'] = $_SERVER['BASE_URI'];

        // On veut désormais accéder aux données de $viewData, mais sans accéder au tableau
        // La fonction extract permet de créer une variable pour chaque élément du tableau passé en argument
        extract($viewData);

        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/layout/footer.tpl.php';
    }

    // Méthode de redirection évitant les répétition de "header"
    protected function redirect(string $routeName, array $params=[])
    {
        global $router;

        // ici je fais une redirection, il est de bonne pratique de couper le script après un header Location
        header('Location: '.$router->generate($routeName, $params));
        exit;
    }

    protected function generateCsrfToken() {
        // Génération du token CSRF
        $csrfToken = bin2hex(random_bytes(32));

        // Stockage du token dans la session
        $_SESSION['csrf_token'] = $csrfToken;

        return $csrfToken;
    }

    protected function checkAuthorization(array $roles = [])
    {
    // Vérifiez si l'utilisateur est connecté
    if (isset($_SESSION["user"])) {
        // Vérifiez si l'utilisateur a le rôle requis
        if (empty($roles) || in_array($_SESSION["user"]->getRole(), $roles)) {
            return;
        } else {
            // Redirigez vers une page d'erreur 403 (Accès interdit)
            $this->show('error/403');
            exit;
        }
            } else {
            // Redirigez vers la page de connexion
            $this->redirect("user-login");
            }
    }


}

     
    