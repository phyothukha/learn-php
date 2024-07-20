<?php

function view(string $file): bool
{
    require_once __DIR__ . "/views/" . $file . ".php";
    return true;
}


function controller($fileFunction): void
{
    $arr =  explode("@", $fileFunction);
    $controllerFile = $arr[0];

    // require_once "".$controllerFile;
    $controllerFunction = $arr[1];
    require_once __DIR__ . "/controller/" . $controllerFile  . ".php";

    call_user_func($controllerFunction);
}

function routing($routes): void
{
    $path = $_SERVER["PATH_INFO"] ?? "/";

    $current = $routes[$path] ?? false;


    if ($current) {
        controller($current);
    } else {
        view("notfound");
    }
}
