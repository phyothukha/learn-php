<?php

echo "<pre>";
$serverName = "localhost";
$userName = "ptk";
$password = "21934576";
$database_Name = "phyrous_students";

$conn = new mysqli($serverName, $userName, $password, $database_Name);

print_r($conn);

$conn->close();
print_r($conn);


// $sql = "SELECT * FROM courses";

// $query = $conn->query($sql);

// print_r($query);


// print_r($query->fetch_object());


// $first = $query->fetch_object();
// print_r($first->title);
