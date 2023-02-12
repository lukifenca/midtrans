<?php

// replace with your actual server key
$serverKey = 'YOUR_SERVER_KEY';

// replace with your transaction data
$data = [
    "transaction_details" => [
        "order_id" => "order-123",
        "gross_amount" => 200000
    ],
    "customer_details" => [
        "first_name" => "Andi",
        "last_name" => "Susanto",
        "email" => "andi.susanto@example.com",
        "phone" => "081234567890"
    ],
    "item_details" => [
        [
            "id" => "item-1",
            "price" => 100000,
            "quantity" => 2,
            "name" => "Product 1"
        ]
    ]
];

 $apiUrl = "https://app.sandbox.midtrans.com/snap/v2/transactions";

// Set request header
$header = [
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode($serverKey . ":")
];

// Send transaction data to Midtrans API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Parse response
$result = json_decode($response, true);

// Display transaction result
echo "Transaction status: " . $result["transaction_status"] . "\n";
echo "Transaction ID: " . $result["transaction_id"] . "\n";
echo "Transaction Time: " . $result["transaction_time"] . "\n";

?>
