<?php

/**
 * Une route représente une url de l'application
 * Ici, chaque route est un incluse dans un tableau associatif comprenant les éléments suivant
 * layout => racine de page web à utiliser
 * controller => contrôleur à utiliser pour gérer le traitement des données
 * function <optionnel> => fonction du contrôleur à utiliser
 */
define('GET_ROUTES', [
    'index' => [
        'layout' => 'public',
        'controller' => 'IndexPageController',
    ],
    'login' => [
        'layout' => 'public',
        'controller' => 'LoginPageController',
    ],
    'admin' => [
        'layout' => 'public',
        'controller' => 'AdminController',
        'function' => 'renderHome'
    ]
]);

define('POST_ROUTES', [
    'login' => [
        'method' => 'POST',
        'controller' => 'LoginController',
        'function' => 'login'
    ],
]);
