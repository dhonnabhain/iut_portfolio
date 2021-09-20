<?php

/**
 * Importation des dépendences Composer <https://getcomposer.org>
 * N'est pas nécessaire à votre projet
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Importation du tableau de routes (url) du site
 */
require_once(__DIR__ . '/routes.php');

/**
 * Mise en place des dépendences
 * Whoops -> écran de debug permettant d'avoir plus d'informations
 */
bootHelpers();

/**
 * Initialisation du router
 */
dispatchRequest();

/**
 * Router HTTP ayant pour rôle de rediriger la requête sur le bon controlleur
 *
 * @return void
 */
function dispatchRequest()
{
    /**
     * Séparation sous forme de tableau de l'adresse de la requête
     * Ici, la requête correspond à ce qui se trouve après le nom de domaine
     * Ex: http://localhost/themes -> ['', 'themes']
     */
    $uri = explode('/', $_SERVER['REQUEST_URI']);

    /**
     * Certaines requêtes n'ont pas pour finalité l'affichage d'une vue comme par exemple, les formulaires
     * Exemple: http://localhost/controllers/login
     * 
     * https://www.php.net/manual/fr/control-structures.while.php
     */
    switch ($uri[1]) {
        case 'controllers':
            requireController($uri);
            break;
        default:
            renderPage($uri);
            break;
    }
}

/**
 * Fonction permettant l'affichage d'une vue
 * 
 * Ici, la valeur de $uri[1] correspond au nom d'une vue dans le dossier /views/pages
 *
 * @param array $uri
 * @return void
 */
function renderPage(array $uri)
{
    /**
     * Si la requête est http://localhost/, la vue index doit être affichée
     * Autrement, la valeur $uri[1] est utilisé
     */
    $page = $uri[1] === '' ? 'index' : $uri[1];

    /**
     * Vérification de la présence de la route demandée dans la variable ROUTES
     * définie dans le fichier routes.php
     * 
     * Si la route n'existe pas, le fichier ErrorController est appellé pour afficher la page d'erreur 404
     */
    if (array_key_exists($page, ROUTES)) {
        // Récupération du contrôleur associé à la route
        $controller = ROUTES[$page]['controller'];

        /**
         * Si la route dispose d'un index function, la fonction à appeller se la valeur renseignée, 
         * autrement, le site présume d'une fonction nommée render existe sera à utiliser
         */
        $method = isset(ROUTES[$page]['function']) ? ROUTES[$page]['function'] : 'render';

        // Importation du controlleur associé à la route
        require(__DIR__ . "/controllers/$controller.php");

        // Appel de la fonction associée à la route
        $method($page);
    } else {
        // Définition de la méthode à appeller comme étant render
        $method = 'render';

        // Importation du controlleur associé à la route
        require(__DIR__ . "/controllers/ErrorController.php");

        // Appel de la fonction render
        $method();
    }
}

function requireController(array $uri)
{
    // Importation du controlleur associé à la route
    require(__DIR__ . "/controllers/$uri[2].php");
}

/**
 * Mise en place de Whoops
 * https://github.com/filp/whoops
 *
 * @return void
 */
function bootHelpers()
{
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}
