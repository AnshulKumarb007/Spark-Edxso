<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

$data = [
    "duration" => "30",
    "logout_url" => "https://sansoftwares.com",
    "banner_text" => "Live Meeting 20",
    "welcome_text" => "Video Meeting Demo",
    "logo_url" => "https://sanmeet.sansoftwares.com/img/san_ZIXh3OvN3c_20250331162901.png",
    "auto_start" => "yes",
    "enable_share_screen" => 1,
    "enable_webcam" => 1,
    "enable_mic" => 1,
    "record" => 1
];

// Optional: log the payload being sent
file_put_contents("debug.json", json_encode($data, JSON_PRETTY_PRINT));

$api_token = 'tWud2lxgDzcx7w5';
$api_url = 'https://sanmeet.sansoftwares.com/api/create_meeting';

$headers = [
    'Content-Type: application/json',
    'api_token: ' . $api_token
];

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

if ($response === false) {
    echo json_encode([
        'success' => false,
        'error' => 'cURL error: ' . $curl_error
    ]);
    exit;
}

// Return original API response
echo $response;
