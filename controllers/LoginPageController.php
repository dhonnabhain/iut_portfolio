<?php

function render($page)
{
    $file = "$page.php";
    $layout = GET_ROUTES[$page]['layout'];

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}
