<?php

require_once './template/sql_connect.php';

$id = $_POST['row_id'];
$name = $_POST["name"];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$start_date = $_POST['start_date'];
$student_limit = $_POST['student_limit'];
$is_register_open = isset($_POST['is_register_open']) ? 1 : 0;
$course_id = $_POST['course_id'];

$sql = "UPDATE batches SET 
name='$name', 
start_time='$start_time',
start_date= '$start_date',
end_time='$end_time',
student_limit= $student_limit,
is_register_open= $is_register_open,
course_id= $course_id where id=$id";




$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:batch-list.php");
}
