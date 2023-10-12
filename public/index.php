<?php

require_once '../vendor/autoload.php';
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

<<<<<<< HEAD
=======
$router->map(
    'GET',
    '/produit[i:id]',
    [
        'method' => 'listOne',
        'controller' => '\App\Controllers\ItemController' 
    ],
    'item-detail'
);
>>>>>>> 03f9ecf3f19c3755dcdf163f150dde3d8083a327

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
    'GET',
    '/deconnexion',
    [
        'method' => 'logout',
        'controller' => '\App\Controllers\UserController'
    ],
    'user-logout'
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
    '/panier',
    [
        'method' => 'listPanier',
        'controller' => '\App\Controllers\PanierController'
    ],
    'user-panier'
);

$router->map(
    'GET',
    '/client',
    [
        'method' => 'add',
        'controller' => '\App\Controllers\UserController' 
    ],
    'user-add'
);
$router->map(
    'POST',
    '/client',
    [
        'method' => 'addValid',
        'controller' => '\App\Controllers\UserController' 
    ],
    'user-addValid'
);







$match = $router->match();

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();