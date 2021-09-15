<?php

require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

define('PAGES', [
    'index' => ['layout' => 'public'],
    'login' => ['layout' => 'public']
]);

$uri = explode('/', $_SERVER['REQUEST_URI']);

switch ($uri[1]) {
    case 'controllers':
        requireController($uri);
        break;
    default:
        renderPage($uri);
        break;
}

function renderPage(array $uri)
{
    $page = $uri[1] === '' ? 'index' : $uri[1];

    if (array_key_exists($page, PAGES)) {
        $file = "$page.php";
        $layout = PAGES[$page]['layout'];

        require(__DIR__ . "/views/layouts/$layout.php");
    }
}

function requireController(array $uri)
{
    require(__DIR__ . "/controllers/$uri[2].php");
}
