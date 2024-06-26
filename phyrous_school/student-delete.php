<?php

require_once('./template/sql_connect.php');


$id = $_GET['row_id'];

$sql = "DELETE FROM batches WHERE id=$id";

$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:batch-list.php");
}
