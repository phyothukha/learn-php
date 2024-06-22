<?php

require_once './template/sql_connect.php';

$id = $_POST['row_id'];
$name = $_POST["name"];
$price = $_POST["price"];
$stock = $_POST["stock"];


$sql = "UPDATE products SET name='$name', price=$price,stock= $stock where id=$id";

echo $sql;


$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:product-list.php");
}
