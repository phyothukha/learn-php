
<?php

header("Content-Type:Application/json");


if ($_SERVER["REQUEST_METHOD"] != "GET") {
    $message = json_encode(["message" => "GET method only"]);
    die($message);
}

$photos = array_filter(scandir("photos"), fn ($el) => $el !== "." && $el !== "..");

// print_r(array_values($photos));
echo json_encode(array_values($photos));
// echo json_encode($photos);
// print_r($photos);
