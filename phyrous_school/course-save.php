<?php


require_once("./template/sql_connect.php");

print_r($_POST);

$title = $_POST['title'];
$short = $_POST['short'];
$fee = $_POST['fee'];

// die($fee);

// die($title$short,$fee);
$sql = "INSERT INTO courses(title,short,fee) VALUES ('$title','$short',$fee)";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location:course-list.php");
}
