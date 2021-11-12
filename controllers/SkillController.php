<?php

require __DIR__ . '/../models/domain.php';
require __DIR__ . '/../models/skill.php';

function renderFormSkills($page)
{
    authCheck();

    $file = "$page.php";
    $layout = GET_ROUTES[$page]['layout'];
    $domain = showDomain($_GET['domain']);

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

function storeSkill()
{
    if (isset($_POST['name']) && isset($_POST['name']) !== '' && isset($_POST['level']) && isset($_POST['level']) !== '') {
        try {
            createSkill();
            header('Location: /admin/domains/edit?domain=' . $_GET['domain']);
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('Location: /admin/skills/create?domain=' . $_GET['domain']);
        }
    } else {
        header('Location: /admin/domains/create?domain=' . $_GET['domain']);
    }
}

function deleteSkill()
{
    if (isset($_GET['domain'])) {
        $domain = showDomain($_GET['domain']);

        try {
            destroyDomain($_GET['domain']);
            header("Location: /admin/themes/edit?theme={$domain['theme_id']}");
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header("Location: /admin/themes/edit?theme={$domain['theme_id']}");
        }
    } else {
        header("Location: /admin");
    }
}

function authCheck()
{
    if (!isset($_SESSION['user'])) {
        header('Location: login');
        die();
    }
}
