<?php

use App\Mms\Dev;
// use Symfony\Component\Dotenv\Dotenv;


require_once "./bootstrap.php";

// $dotenv = new Dotenv();

// $dotenv->load(__DIR__ . "/.env");

// print_r($dotenv);
$dev = new Dev;
print_r($dev);
