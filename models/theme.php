<?php

require __DIR__ . '/../utils/count.php';
require __DIR__ . '/domain.php';

function showTheme($id)
{
    $sql = "SELECT * from themes where id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute([':id' => $id]);

    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllThemes($loadDomains = false)
{
    $sql = "SELECT * FROM themes";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute();

    $themes = $request->fetchAll(PDO::FETCH_ASSOC);

    if ($loadDomains) {
        $themes = array_map(function ($theme) {
            $theme['domains'] = getDomains($theme['id'], true);

            return $theme;
        }, $themes);
    }

    return $themes;
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

function editTheme($id)
{
    $sql = "UPDATE themes set name = :name where id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $test = $request->execute([':name' => $_POST['name'], ':id' => $id]);
}

function destroyTheme($id)
{
    $sql = "DELETE FROM themes WHERE id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    return $request->execute([
        ':id' => $id
    ]);
}
