<?php

require __DIR__ . '/../utils/count.php';

function getAllThemes()
{
    $sql = "SELECT * FROM themes";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute();

    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function countAllThemes()
{
    return countAllFromTable('themes');
}

function createTheme()
{
    $sql = "INSERT INTO themes (name) VALUES (:name)";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    return $request->execute([
        ':name' => $_POST['name'],
    ]);
}

function getThemesForTable()
{
    $sql = "
        SELECT
            themes.id,
            themes.name,
            COUNT(domains.id) AS domains_count,
            COUNT(skills.id) AS skills_count
        FROM
            themes
            LEFT JOIN domains ON themes.id = domains.theme_id
            LEFT JOIN skills ON domains.id = skills.domain_id
        GROUP BY
            themes.name;
    ";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute();

    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function destroyTheme($id)
{
    $sql = "DELETE FROM themes WHERE id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    return $request->execute([
        ':id' => $id
    ]);
}
