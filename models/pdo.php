<?php

function dbConnect()
{
    $name = "portfolio_medium";
    $host = "127.0.0.1";
    $user = "root";
    $password = "root";
    $port = "6631";

    return new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $password);
}
