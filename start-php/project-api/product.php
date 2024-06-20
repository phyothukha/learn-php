<?php


header("Content-Type:application/json");

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    $message = json_encode(["message" => "Post method only!"]);
    die($message);
}

$saveFolder = "product-Folder";

$products = array_filter(scandir($saveFolder), fn ($el) => $el !== ".." && $el !== ".");

$result = [];
// echo $productFolder;
foreach ($products as $product) {
    $content = file_get_contents($saveFolder . "/" . $product);
    $obj = json_decode($content);

    array_push($result, $obj);
}

echo json_encode($result);
