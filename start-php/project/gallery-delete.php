<?php


$folderName = "photos";
$file_name = $_GET["file"];


// var_dump(unlink($folderName . "/" . $file_name));
if (unlink($folderName . "/" . $file_name)) {
    header("Location:gallery.php");
}

// echo $file_name;
