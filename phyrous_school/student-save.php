<?php

require_once('./template/sql_connect.php');



$name = $_POST['name'];
$national_id = $_POST['national_id'];
$date_of_birth = $_POST['date_of_birth'];
$pocket_money = $_POST['pocket_money'];
$gender_id = $_POST['gender_id'];


$sql = "INSERT INTO students (name,national_id,date_of_birth,gender_id,pocket_money) 
VALUES ('$name',$national_id,'$date_of_birth','$gender_id',$pocket_money)";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location:student-list.php");
}
