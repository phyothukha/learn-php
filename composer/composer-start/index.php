<?php

use GuzzleHttp\Client;

require_once "./vendor/autoload.php";

// use Monolog\Handler\StreamHandler;
// use Monolog\Level;
// use Monolog\Logger;


// $log = new Logger('name');
// $log->pushHandler(new StreamHandler('my.log', Level::Warning));

// // add records to the log
// $log->warning('Phyo Thu Kha');
// $log->error('San Kyi Tar');

$client = new Client();

$response = $client->request("GET", "https://fakestoreapi.com/products/1");

echo $response->getBody();
