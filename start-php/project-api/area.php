<?php

header("Content-Type:application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $message = json_encode(["message" => "Post method only"]);
    die($message);
}

$width = $_POST["width"];
$breadth = $_POST["breadth"];


if (empty($width) || empty($width)) {
    $message = json_encode(["message" => "All field is required!"]);
    die($message);
}



$area = $width * $breadth;
$_POST["area"] = $area . "sqft";

echo json_encode($_POST);
