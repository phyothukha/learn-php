<?php


print_r($_GET["row_id"]);

$id = $_GET["row_id"];

$conn = mysqli_connect("localhost", "ptk", "21934576", "phyrous_shop");


if (!$conn) {
    die(mysqli_connect_errno());
}

$sql = "DELETE FROM products where id=$id";
$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location:index.php");
}
