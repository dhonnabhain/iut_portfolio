<?php

require __DIR__ . '/../models/theme.php';
require __DIR__ . '/../models/domain.php';

function renderFormDomains($page)
{
    authCheck();

    $file = "$page.php";
    $layout = GET_ROUTES[$page]['layout'];
    $theme = showTheme($_GET['theme']);

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

function storeDomain()
{
    if (isset($_POST['name']) && isset($_POST['name']) !== '') {
        try {
            createDomain();
            header('Location: /admin');
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('Location: /admin/domains/create?theme=' . $_GET['theme']);
        }
    } else {
        header('Location: /admin/domains/create?theme=' . $_GET['theme']);
    }
}

function authCheck()
{
    if (!isset($_SESSION['user'])) {
        header('Location: login');
        die();
    }
}
