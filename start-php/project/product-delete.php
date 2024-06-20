<?php

$fileName = $_GET["file_name"];

$content = file_get_contents("products" . "/" . $fileName);
$json = json_decode($content);


if (unlink($json->product_image)) {
    if (unlink("products" . "/" . $fileName)) {
        header("Location:products.php");
    }
};
