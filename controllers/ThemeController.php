<?php

require __DIR__ . '/../models/theme.php';

function storeTheme()
{
    if (isset($_POST['name'])) {
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
