<?php

/**
 * Démarrage ou récupération d'une session
 */
session_start();

/**
 * Importation des dépendences Composer <https://getcomposer.org> -> n'est pas nécessaire à votre projet
 * Importation du tableau de routes (url) du site
 * Import PDO init
 */
require __DIR__ . '/vendor/autoload.php';
require_once(__DIR__ . '/routes.php');
require_once(__DIR__ . '/models/pdo.php');

/**
 * Mise en place des dépendences
 * Whoops -> écran de debug permettant d'avoir plus d'informations
 */
bootHelpers();

/**
 * Init PDO object
 */
dbConnect();

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
    $routes = getRoutesByRequestMethod();

    /**
     * Séparation sous forme de tableau de l'adresse de la requête
     * Ici, la requête correspond à ce qui se trouve après le nom de domaine
     * Ex: http://localhost/themes -> ['', 'themes']
     */
    $uri = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);

    /**
     * Si la route / est demandée, la page correspondante est l'index
     * Sinon, reconstitution de l'uri sous forme de chaîne de caractères sans le premier /
     */
    $page = $uri[1] === '' ? 'index' : substr(join('/', $uri), 1);

    if (array_key_exists($page, $routes)) {
        // Récupération du contrôleur associé à la route
        $controller = $routes[$page]['controller'];

        /**
         * Si la route dispose d'un index, la fonction à appeller sera la valeur renseignée, 
         * autrement, le site présume d'une fonction nommée render existe sera à utiliser
         */
        $method = isset($routes[$page]['function']) ? $routes[$page]['function'] : 'render';

        // Importation du controleur associé à la route
        require(__DIR__ . "/controllers/$controller.php");

        // Appel de la fonction associée à la route
        $method($page);
    } else {
        renderErrorPage();
    }
}

function renderErrorPage()
{
    // Définition de la méthode à appeller comme étant render
    $method = 'render';

    // Importation du controlleur associé à la route
    require(__DIR__ . "/controllers/ErrorController.php");

    // Appel de la fonction render
    $method();
}

function getRoutesByRequestMethod()
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            return POST_ROUTES;
        default:
            return GET_ROUTES;
    }
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
