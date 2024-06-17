<?php

header("Content-Type:application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $message = json_encode(["message" => "post method only!"]);
    die($message);
}

if (empty($_POST["name"]) || empty($_POST["price"]) || empty($_POST["rating"]) || empty($_FILES["image"])) {
    $message = json_encode(["message" => "All fields are required!"]);
    die($message);
}

$savePhotoFolder = "photo-folder";
if (!is_dir($savePhotoFolder)) {
    mkdir($savePhotoFolder);
}
$ext = pathinfo($_FILES["image"]["name"])["extension"];

$savephotoFileName = $savePhotoFolder . "/" . uniqid() . "." . $ext;

if (move_uploaded_file($_FILES["image"]["tmp_name"], $savephotoFileName)) {
    $_POST["image"] = $savephotoFileName;
}


$saveProductFolder = "product-Folder";

if (!is_dir($saveProductFolder)) {
    mkdir($saveProductFolder);
}

$saveFileName = $saveProductFolder . "/" . uniqid() . "_" . $_POST["name"] . ".json";

touch($saveFileName);
$fileStream = fopen($saveFileName, "w");
fwrite($fileStream, json_encode($_POST));
fclose($fileStream);

echo json_encode($_POST);
