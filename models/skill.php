<?php

function countAllSkills()
{
    return countAllFromTable('skills');
}

function showSkill($id)
{
    $sql = "SELECT * from skills where id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute([':id' => $id]);

    return $request->fetch(PDO::FETCH_ASSOC);
}

function getSkills($domain = null)
{
    $sql = "SELECT * FROM skills WHERE domain_id = :domain_id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $request->execute([
        ':domain_id' => $domain,
    ]);

    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function createSkill()
{
    $sql = "INSERT INTO skills (name, level, domain_id) VALUES (:name, :level, :domain_id)";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    return $request->execute([
        ':name' => $_POST['name'],
        ':level' => $_POST['level'],
        ':domain_id' => $_GET['domain'],
    ]);
}

function editSkill($id)
{
    $sql = "UPDATE skills set name = :name, level = :level where id = :id";

    $request = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $test = $request->execute([':name' => $_POST['name'], ':level' => $_POST['level'], ':id' => $id]);
}
