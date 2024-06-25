<?php

require_once('./template/sql_connect.php');

print_r($_GET);
$id = $_GET['row_id'];


$sql = "DELETE FROM courses WHERE id= $id";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location:course-list.php");
}
