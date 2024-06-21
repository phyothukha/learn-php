<?php
$id = $_POST['row_id'];
$name = $_POST["name"];
$price = $_POST["price"];
$stock = $_POST["stock"];


$conn = mysqli_connect("localhost", "ptk", "21934576", "phyrous_shop");

if (!$conn) {
    die(mysqli_connect_errno());
}

$sql = "UPDATE products SET name='$name', price=$price,stock= $stock where id=$id";

echo $sql;


$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:index.php");
}
