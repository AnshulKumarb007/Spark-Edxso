<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Invalid request method.']);
    exit;
}

$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);
 
// Sanitize & collect input
  $mobileNo  = $data['mobileno'];
//$otp  = isset($_POST['otp']) ? trim($_POST['otp']) : null;
 


if (!$mobileNo) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Name and mobile/email are required.']);
    exit;
}

// Prepare POST data
$postData = [
     
    'mobileno'   => $mobileNo
   // 'otp'        => $otp,
];

// Laravel API endpoint (adjust as needed)
$url = 'https://sparkolympiads.com/app/resend-otp';

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
