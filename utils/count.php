<?php

function countAllFromTable($table)
{
    $sql = "SELECT COUNT(*) as count FROM $table";

    $requete = dbConnect()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $requete->execute();

    return $requete->fetch(PDO::FETCH_ASSOC)['count'];
}
