<?php

require_once "./template/sql_connect.php";


$name = $_POST["name"];
$price = $_POST["price"];
$stock = $_POST["stock"];


$sql = "INSERT INTO products(name,price,stock) VALUES ('$name',$price,$stock)";


$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location:product-list.php");
}
