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

function getDomains($theme = null)
{
    $sql = "SELECT * FROM domains WHERE theme_id = :theme_id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute([
        ':theme_id' => $theme,
    ]);

    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function showDomain($id)
{
    $sql = "SELECT * FROM domains WHERE id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute([
        ':id' => $id,
    ]);

    return $request->fetch(PDO::FETCH_ASSOC);
}

function destroyDomain($id)
{
    $sql = "DELETE FROM domains WHERE id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    return $request->execute([
        ':id' => $id
    ]);
}
