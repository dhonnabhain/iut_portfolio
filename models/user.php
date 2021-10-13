<?php

require __DIR__ . '/pdo.php';

function getUserByEmail()
{
    $sql = "SELECT email, password FROM users WHERE email = :email";

    $requete = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $requete->execute([':email' => $_POST['email']]);

    return $requete->fetch(PDO::FETCH_ASSOC);
}
