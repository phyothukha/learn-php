<?php

require_once('./template/sql_connect.php');

print_r($_POST);

$id = $_POST["id"];
$title = $_POST['title'];
$short = $_POST['short'];
$fee =  $_POST['fee'];

$sql = "UPDATE courses SET title='$title',short='$short',fee=$fee WHERE id=$id";

$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:course-list.php");
}
