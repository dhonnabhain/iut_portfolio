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
    'logout' => [
        'controller' => 'LoginController',
        'function' => 'logout'
    ],
    'admin' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderHome'
    ],
    'admin/themes' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderThemesUpdate'
    ],
    'admin/themes/create' => [
        'layout' => 'private',
        'controller' => 'AdminController',
        'function' => 'renderThemeCreate'
    ],
    'admin/themes/delete' => [
        'controller' => 'ThemeController',
        'function' => 'deleteTheme'
    ],
]);

define('POST_ROUTES', [
    'login' => [
        'controller' => 'LoginController',
        'function' => 'login'
    ],
    'admin/themes/create' => [
        'controller' => 'ThemeController',
        'function' => 'storeTheme'
    ]
]);
