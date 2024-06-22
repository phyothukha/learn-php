<?php


require_once "./template/sql_connect.php";


print_r($_GET["row_id"]);

$id = $_GET["row_id"];


$sql = "DELETE FROM products where id=$id";
$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location:product-list.php");
}
