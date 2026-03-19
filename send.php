<?php

header("Content-Type: application/json");

// Validate required params
if(!isset($_GET['from']) || !isset($_GET['to']) || !isset($_GET['key']) || !isset($_GET['amount'])){
    echo json_encode([
        "status" => "error",
        "message" => "Missing required parameters (from, to, key, amount)"
    ]);
    exit;
}

// Get params safely
$from   = trim($_GET['from']);
$to     = trim($_GET['to']);
$key    = trim($_GET['key']);
$amount = trim($_GET['amount']);
$chain  = isset($_GET['chain']) ? trim($_GET['chain']) : "bnb";

// Optional: basic validation
if($amount <= 0){
    echo json_encode([
        "status" => "error",
        "message" => "Invalid amount"
    ]);
    exit;
}

// Build API URL
$url = "https://api.tricksxtech.in/crypto/balance/?" .
       "chain=" . urlencode($chain) .
       "&from=" . urlencode($from) .
       "&to=" . urlencode($to) .
       "&key=" . urlencode($key) .
       "&amount=" . urlencode($amount);

// cURL request
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
]);

$response = curl_exec($ch);

// Handle cURL error
if(curl_errno($ch)){
    echo json_encode([
        "status" => "error",
        "message" => curl_error($ch)
    ]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Decode response
$data = json_decode($response, true);

// Handle API error
if(!$data || (isset($data["error"]) && $data["error"])){
    echo json_encode([
        "status" => "error",
        "message" => "API failed or invalid response"
    ]);
    exit;
}

// Success response
echo json_encode([
    "status"  => "success",
    "chain"   => $chain,
    "from"    => $from,
    "to"      => $to,
    "amount"  => $amount,
    "result"  => $data
]);

?>
