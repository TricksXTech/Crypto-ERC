<?php

header("Content-Type: application/json");

$url = "https://api.tricksxtech.in/crypto/wallet/";

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

if(!$data){
    echo json_encode([
        "status" => "error",
        "message" => "Invalid API response"
    ]);
    exit;
}

echo json_encode([
    "status" => "success",
    "mnemonic" => $data["mnemonic"],
    "private_key" => $data["privateKey"],
    "address" => $data["address"]
]);

?>
