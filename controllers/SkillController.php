<?php

require __DIR__ . '/../models/domain.php';
require __DIR__ . '/../models/skill.php';
require __DIR__ . '/../utils/updateOrCreate.php';

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
    $redirect = "domains/edit?domain={$_GET['domain']}";

    return checkAndUpdateOrCreate('createSkill', "admin/$redirect", $redirect);
}

function updateSkill()
{
    $domainId = $_GET['domain'];
    $skillId = $_GET['skill'];
    $redirect = "skills/edit?domain=$domainId&skill=$skillId";

    return checkAndUpdateOrCreate('editSkill', "admin/$redirect", $redirect, $skillId, ['name', 'level']);
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
