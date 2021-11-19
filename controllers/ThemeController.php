<?php

require __DIR__ . '/../models/theme.php';
require __DIR__ . '/../utils/updateOrCreate.php';

function storeTheme()
{
    return checkAndUpdateOrCreate('createTheme', 'admin', 'themes/create');
}

function updateTheme()
{
    $themeId = $_GET['theme'];

    return checkAndUpdateOrCreate('editTheme', 'admin', "themes/edit?theme=$themeId", $themeId);
}

function deleteTheme()
{
    if (isset($_GET['theme'])) {
        try {
            destroyTheme($_GET['theme']);
            header('Location: /admin');
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('Location: /admin');
        }
    } else {
        header('Location: /admin');
    }
}
