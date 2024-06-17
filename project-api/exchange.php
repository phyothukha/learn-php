<?php
header("Content-Type:application/json");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $message = json_encode(["message" => "Post method only"]);
    die($message);
}

$amount = $_POST["amount"];
$from = $_POST["from_currency"];
$to = $_POST["to_currency"];

if (empty($amount) || empty($from) || empty($to)) {
    $message = json_encode(["message" => "All Field is required!"]);
    die($message);
}

$rateJson = file_get_contents("http://forex.cbm.gov.mm/api/latest");

$rateObj = json_decode($rateJson, true);
$rates = $rateObj["rates"];
$fromRate = str_replace(",", "", $rates[$from]);
$toRate = str_replace(",", "", $rates[$to]);


$result = $amount * $fromRate / $toRate;

echo json_encode($_POST);
