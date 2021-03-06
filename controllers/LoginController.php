<?php

function login()
{
    if (isset($_POST['email']) && isset($_POST['password'])) {
        require __DIR__ . '/../models/user.php';

        $user = getUserByEmail();

        if (!empty($user) && isset($user['password']) && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;

            header('Location: /admin');
        } else {
            header('Location: /connexion');
        }
    } else {
        header('Location: /connexion');
    }
}

function logout()
{
    session_destroy();
    header('Location: /login');
}
