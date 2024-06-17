<?php

header("Content-Type:application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $message = json_encode(["message" => "Post Method only"]);
    die($message);
}

if (empty($_FILES["photo"])) {
    $message = json_encode(["message" => "Required photo input"]);
    die($message);
}


$saveFolder = "photos";

if (!is_dir($saveFolder)) {
    mkdir($saveFolder);
}

$ext = pathinfo($_FILES["photo"]["name"])["extension"];

$saveFileName = $saveFolder . "/" . uniqid() . "." . $ext;

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $saveFileName)) {
    $message = json_encode(["message" => "photo upload successfully!"]);
    die($message);
}

// echo $saveFileName;
