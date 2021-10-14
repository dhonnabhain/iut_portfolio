<?php

require __DIR__ . '/../utils/count.php';

function getAllThemes()
{
    $sql = "SELECT * FROM themes";

    $requete = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $requete->execute();

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function countAllThemes()
{
    return countAllFromTable('themes');
}

function createTheme()
{
    $sql = "INSERT INTO themes (name) VALUES (:name)";

    $requete = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    return $requete->execute([
        ':name' => $_POST['name'],
    ]);
}
