<?php

require_once "./functions.php";
require_once './router/web.php';


$path = $_SERVER["PATH_INFO"] ?? "/";


// if ($path === "/") {
//     $file = "./views/home.php";
// } else if ($path === "/service") {
//     $file = "./views/service.php";
// } else if ($path === "/about") {
//     $file = "./views/about.php";
// } else {
//     $file = "./views/notfound.php";
// }


// require_once $file;

// $routes = [
//     "/" => "home",
//     "/about" => "about",
//     "/service" => "service",
// ];
view($routes[$path] ?? "not-found");
