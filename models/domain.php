<?php

function countAllDomains()
{
    return countAllFromTable('domains');
}

function createDomain()
{
    $sql = "INSERT INTO domains (name, theme_id) VALUES (:name, :theme_id)";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    return $request->execute([
        ':name' => $_POST['name'],
        ':theme_id' => $_GET['theme'],
    ]);
}
