<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Invalid request method.']);
    exit;
}

// Sanitize & collect input
$modelName = isset($_POST['model_name']) ? trim($_POST['model_name']) : null;
$mobileNo  = isset($_POST['mobileno']) ? trim($_POST['mobileno']) : null;
$otp  = isset($_POST['otp']) ? trim($_POST['otp']) : null;

if (!$modelName || !$mobileNo) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Name and mobile/email are required.']);
    exit;
}

// Prepare POST data
$postData = [
    'model_name' => $modelName,
    'mobileno'   => $mobileNo,
    'otp'        => $otp,
];

// Laravel API endpoint (adjust as needed)
$url = 'https://sparkolympiads.com/app/otp-verify';

// Initialize cURL
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json'
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Request failed: ' . curl_error($ch)
    ]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Decode Laravel API response
$data = json_decode($response, true);

// Return response back to AJAX
if (is_array($data)) {
    echo json_encode($data);
} else {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Invalid response from Laravel API.',
        'raw' => $response
    ]);
}
