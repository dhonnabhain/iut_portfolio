<?php

require __DIR__ . '/../models/theme.php';

function storeTheme()
{
    if (isset($_POST['name']) && isset($_POST['name']) !== '') {
        try {
            createTheme();
            header('Location: /admin');
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('Location: /admin/themes/create');
        }
    } else {
        header('Location: /admin/themes/create');
    }
}

function deleteTheme()
{
    if (isset($_GET['theme'])) {
        try {
            destroyTheme($_GET['theme']);
            header('Location: /admin');
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('Location: /admin/themes/create');
        }
    } else {
        header('Location: /admin/themes/create');
    }
}
