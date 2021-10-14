<?php

require __DIR__ . '/../models/theme.php';
require __DIR__ . '/../models/domain.php';
require __DIR__ . '/../models/skill.php';

function renderHome($page)
{
    authCheck();

    $file = "$page.php";
    $layout = GET_ROUTES[$page]['layout'];
    $cards = ['themes' => countAllThemes(), 'domains' => countAllDomains(), 'skills' => countAllSkills()];

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

function renderThemeCreate($page)
{
    authCheck();
    $file = "$page.php";
    $layout = GET_ROUTES[$page]['layout'];

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

function authCheck()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /login');
    }
}
