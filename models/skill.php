<?php

function countAllSkills()
{
    return countAllFromTable('skills');
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
