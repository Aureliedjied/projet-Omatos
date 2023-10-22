<?php

require_once '../vendor/autoload.php';

ini_set("session.cookie_httponly", 1);

session_start();


$router = new AltoRouter();


if (array_key_exists('BASE_URI', $_SERVER)) {

    $router->setBasePath($_SERVER['BASE_URI']);
  
} else { 
    
    $_SERVER['BASE_URI'] = '/';
}



// Page d'accueil :

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-home'
);

$router->map(
    'GET',
    '/produits',
    [
        'method' => 'list',
        'controller' => '\App\Controllers\ItemController' 
    ],
    'items-list'
);

$router->map(
    'GET',
    '/produit[i:id]',
    [
        'method' => 'listOne',
        'controller' => '\App\Controllers\ItemController' 
    ],
    'item-detail'
);

$router->map(
    'GET',
    '/connexion',
    [
        'method' => 'login',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-login'
);

$router->map(
    'POST',
    '/connexion',
    [
        'method' => 'loginValid',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-loginValid'
);

$router->map(
    'GET',
    '/Deconnexion',
    [
        'method' => 'logout',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-logout'
);

$router->map(
    'GET',
    '/inscription',
    [
        'method' => 'add',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-add'
);

$router->map(
    'POST',
    '/inscription',
    [
        'method' => 'addValid',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-addValid'
);


$router->map(
    'GET',
    '/panier',
    [
        'method' => 'listPanier',
        'controller' => '\App\Controllers\PanierController'
    ],
    'user-panier'
);

$router->map(
    'GET',
    '/admin',
    [
        'method' => 'dashboard',
        'controller' => '\App\Controllers\MainController'
    ],
    'admin-dashboard'
);


$router->map(
    'GET',
    '/monespace',
    [
        'method' => 'dashboard',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-dashboard'
);




$match = $router->match();

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();