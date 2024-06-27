<?php

require_once './template/sql_connect.php';


$id = $_POST['row_id'];
$name = $_POST["name"];
$date_of_birth = $_POST['date_of_birth'];
$national_id = $_POST['national_id'];
$gender_id = $_POST['gender_id'];
$pocket_money = $_POST['pocket_money'];

$sql = "UPDATE students SET 
name='$name', 
date_of_birth='$date_of_birth',
gender_id= '$gender_id',
national_id='$national_id',

pocket_money= $pocket_money 
where
id=$id";

$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:student-list.php");
}
