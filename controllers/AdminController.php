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
    $themes = getThemesForTable();

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

function renderThemeCreate($page)
{
    authCheck();

    $file = "$page.php";
    $layout = GET_ROUTES[$page]['layout'];

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

function renderThemeUpdate($page)
{
    authCheck();

    $themeId = $_GET['theme'];
    $file = "$page.php";
    $layout = GET_ROUTES[$page]['layout'];
    $theme = array_merge(
        showTheme($themeId),
        [
            'domains' => array_map(function ($domain) {
                return array_merge($domain, ['skills' => getSkills($domain['id'])]);
            }, getDomains($themeId))
        ]
    );

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

function authCheck()
{
    if (!isset($_SESSION['user'])) {
        header('Location: login');
        die();
    }
}
