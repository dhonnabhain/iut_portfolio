<?php

function render($page)
{
    $file = "$page.php";
    $title = "Donovan's portfolio";
    $layout = ROUTES[$page]['layout'];

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}
