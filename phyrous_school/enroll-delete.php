<?php
require_once('./template/sql_connect.php');


$id = $_GET['row_id'];
$sql = "DELETE FROM enrollments WHERE id=$id";

$query = mysqli_query($conn, $sql);

if($query){
    header("Location:enroll-list.php");
}
