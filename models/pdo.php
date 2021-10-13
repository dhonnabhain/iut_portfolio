<?php

function dbConnect()
{
    $name = "portfolio_light";
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $port = "3331";

    return new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $password);
}

function closeConnect()
{
    
}
