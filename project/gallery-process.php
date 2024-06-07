<?php

echo "<pre>";


print_r($_FILES);

$folderName = "photos";


$error = false;

foreach ($_FILES["upload"]['name'] as $key => $name) {
    // echo pathinfo($name)["extension"];
    $ext = pathinfo($name)['extension'];
    $saveFileName = $folderName . "/" . uniqid() . "." . $ext;
    // echo $saveFileName;


    if (!move_uploaded_file($_FILES["upload"]["tmp_name"][$key], $saveFileName)) {
        $error = true;
    };
}



if ($error === false) {
    header("Location:gallery.php");
}

// if (!is_dir($folderName)) {
//     mkdir($folderName);
// }
// // $saveFileName = $folderName . "/" . uniqid() . $_FILES['upload']['name'];
// $ext =  pathinfo($_FILES['upload']['name'])['extension'];
// $saveFileName = $folderName . "/" . uniqid() . "." . $ext;

// echo $saveFileName;


// var_dump(move_uploaded_file($_FILES['upload']['tmp_name'], $saveFileName));

// $ext = explode(".", $_FILES["upload"]['name']);
// print_r(pathinfo($_FILES["upload"]["name"])["extension"]);

// print_r(explode(".", $_FILES["upload"]['name']));

// echo end($ext);
