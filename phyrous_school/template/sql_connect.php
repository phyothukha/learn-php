<?php

$conn =  mysqli_connect("localhost", 'ptk', "21934576", "phyrous_students");

if (!$conn) {
    die(mysqli_connect_errno());
}
