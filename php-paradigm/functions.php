<?php

function view(string $file, array $data = null): bool
{
    if (!is_null($data)) {
        extract($data); //array= variable batches;
    }
    require_once __DIR__ . "/views/" . $file . ".php";
    return true;
}


function controller(string $fileFunction): void
{
    $arr =  explode("@", $fileFunction);
    $controllerFile = $arr[0];
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


function assest(string $filePath): string
{
    $fullUrl = isset($_SERVER["HTTPS"]) ? "https" : "http" . "://" . $_SERVER["HTTP_HOST"] . "/" . ltrim($filePath, "/");
    return $fullUrl;
}

function url(string $filePath, array $data = null): string
{
    $fullUrl = isset($_SERVER["HTTPS"]) ? "https" : "http" . "://" . $_SERVER["HTTP_HOST"] . "/" . ltrim($filePath, "/") .  (is_null($data) ? "" : "?" . http_build_query($data));

    return $fullUrl;
}


function template(string $name): void
{
    require_once __DIR__ . "/views/template/" . $name . ".php";
}

// dd function


function dd($data)
{
    echo "<div style='
background-color: rgb(27, 26, 26);
      color: rgb(245, 238, 225);
      padding: 20px;
      line-height: 2;
      border-radius: 10px;
    '>";
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    echo "</div>";
    die();
}

// db function 

function connect(): object
{
    global $config;
    return mysqli_connect($config["db_host"], $config["db_user"], $config["db_password"], $config["db_name"]);
}


function runQuery(string $sql): mixed
{

    $con = connect();
    $query = mysqli_query($con, $sql);
    return $query;
}


function first(string $sql): mixed
{
    $query = runQuery($sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}


function fetchAll(string $sql): mixed
{
    $query = runQuery($sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }
    return $rows;
}



function redirect(string $url): void
{

    header("Location:$url");
}

function json(array $data): void
{
    header("Conetent-Type:application/json");
    echo json_encode($data);
}
