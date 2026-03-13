<?php

header("Content-Type: application/json");

if(!isset($_GET['address'])){
    echo json_encode([
        "status" => "error",
        "message" => "address parameter required"
    ]);
    exit;
}

$address = $_GET['address'];
$chain = isset($_GET['chain']) ? $_GET['chain'] : "bnb";

$url = "https://api.tricksxtech.in/crypto/balance/?chain=".$chain."&address=".$address;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo json_encode([
        "status" => "error",
        "message" => curl_error($ch)
    ]);
    exit;
}

curl_close($ch);

$data = json_decode($response, true);

if(!$data || $data["error"]){
    echo json_encode([
        "status" => "error",
        "message" => "Unable to fetch balance"
    ]);
    exit;
}

echo json_encode([
    "status" => "success",
    "chain" => $chain,
    "address" => $data["address"],
    "balance" => $data["balance"]
]);

?>
