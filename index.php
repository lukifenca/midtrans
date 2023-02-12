<?php

$serverKey = "SB-Mid-server-gluxBxY-uVxizDzkxad_5JCX";
$apiUrl = "https://app.sandbox.midtrans.com/snap/v2/transactions";

$orderId = "ORDER-ID";
$grossAmount = "100000";

$request = [
    'transaction_details' => [
        'order_id' => $orderId,
        'gross_amount' => $grossAmount
    ],
    'item_details' => [
        [
            'id' => "Item 1",
            'price' => 100000,
            'quantity' => 1,
            'name' => "Item 1"
        ]
    ]
];

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "content-type: application/json",
        "Authorization: Basic " . base64_encode($serverKey . ":")
    ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}

?>
