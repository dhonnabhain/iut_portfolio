<?php

function checkAndUpdateOrCreate(
    $method,
    $redirectPath = 'admin',
    $defaultPath = 'create',
    $id = null,
    $fields = ['name'],
) {
    foreach ($fields as $field) {
        if (!isset($_POST[$field]) || $_POST[$field] === '') {
            header("Location: /admin/$defaultPath");
        }

        try {
            $method($id);
            header("Location: /$redirectPath");
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header("Location: /admin/$defaultPath");
        }
    }
}
