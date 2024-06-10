<?php
echo "<pre>";

/* checking has folder in this project */
// $saveFolder = "product_photo";
// $productFolder = "products";

// if (!is_dir($saveFolder)) {
//     mkdir($saveFolder);
// }

// if (!is_dir($productFolder)) {
//     mkdir($productFolder);
// }

// /*  file name put */

// $ext = pathinfo($_FILES["product_image"]["name"])["extension"];

// $saveFileName = $saveFolder . '/' . uniqid() . "." . $ext;

// if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $saveFileName)) {
//     $_POST["product_photo"] = $saveFileName;
// }

// print_r($_POST);


// $json = json_encode($_POST);

// $saveProductFileName = $productFolder . "/" . uniqid() . "_" . $_POST["product_name"] . "." . "json";
// touch($saveProductFileName);

// $fileStream = fopen($saveProductFileName, "w");

// fwrite($fileStream, $json);

// fclose($fileStream);
// header("Location:products.php");

print_r($_POST);
print_r($_FILES);


$folderName = "product_image";

if (!is_dir($folderName)) {
    mkdir($folderName);
}

$ext = pathinfo($_FILES["product_image"]["name"])["extension"];

// echo $ext;
$saveFileName = $folderName . "/" . uniqid() . "." . $ext;

if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $saveFileName)) {
    // array_push($_POST, $saveFileName);
    $_POST["product_image"] = $saveFileName;
}

print_r($_POST);

$saveProductFolder = "products";

if (!is_dir($saveProductFolder)) {
    mkdir($saveProductFolder);
}

$json = json_encode($_POST);
$saveProductFileName = $saveProductFolder . "/" . uniqid() . "_" . $_POST["product_name"] . ".json";


touch($saveProductFileName);

$fileStream = fopen($saveProductFileName, "w");

fwrite($fileStream, $json);

fclose($fileStream);

header("Location:products.php");

// $saveFileName= $folderName."/".uniqid().