<?php

require_once('./template/sql_connect.php');


$id = $_GET['row_id'];

$sql = "DELETE FROM students WHERE id=$id";

$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:student-list.php");
}
