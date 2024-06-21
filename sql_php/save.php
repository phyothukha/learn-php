<?php

echo '<pre>';

$conn = mysqli_connect("localhost", "ptk", "21934576", "phyrous_shop");


if (!$conn) {
    die(mysqli_connect_error());
}

// die();

$name = $_POST["name"];
$price = $_POST["price"];
$stock = $_POST["stock"];


$sql = "INSERT INTO products(name,price,stock) VALUES ('$name',$price,$stock)";
 

$query = mysqli_query($conn, $sql);

// var_dump($query);
if ($query) {
    header("Location:index.php");
}
