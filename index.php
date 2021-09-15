<?php

require __DIR__ . '/vendor/autoload.php';
require_once(__DIR__ . '/routes.php');

bootHelpers();
dispatchRequest();

function dispatchRequest()
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);

    switch ($uri[1]) {
        case 'controllers':
            requireController($uri);
            break;
        default:
            renderPage($uri);
            break;
    }
}

function renderPage(array $uri)
{
    $page = $uri[1] === '' ? 'index' : $uri[1];

    if (array_key_exists($page, ROUTES)) {
        $controller = ROUTES[$page]['controller'];
        $method = isset(ROUTES[$page]['function']) ? ROUTES[$page]['function'] : 'render';

        require(__DIR__ . "/controllers/$controller.php");

        $method($page);
    } else {
        $method = 'render';
        require(__DIR__ . "/controllers/ErrorController.php");

        $method();
    }
}

function requireController(array $uri)
{
    require(__DIR__ . "/controllers/$uri[2].php");
}

function bootHelpers()
{
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}
