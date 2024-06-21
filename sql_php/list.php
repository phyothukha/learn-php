<?php
echo "<pre>";

$conn = mysqli_connect("localhost", "ptk", "21934576", "phyrous_shop");


if (!$conn) {
    die(mysqli_connect_errno());
}

$sql = "SELECT * FROM products";


$query = mysqli_query($conn, $sql);



while ($row = mysqli_fetch_assoc($query)) {
    print_r($row);
}
