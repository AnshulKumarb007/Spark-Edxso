<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Trim inputs
    $full_name  = trim($_POST['full_name'] ?? '');
    $mobile     = trim($_POST['mobile'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $city_state = trim($_POST['city_state'] ?? '');

    // Validate not empty
    if ($full_name === '' || $mobile === '' || $email === '' || $city_state === '') {
        $_SESSION['error'] = "All fields are required.";
        header("Location: spark.php");
        exit;
    }

    $url = "https://sparkolympiads.com/app/websitesendcontactmail";

    $data = [
        'full_name'  => $full_name,
        'mobile'     => $mobile,
        'email'      => $email,
        'city_state' => $city_state,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Success message
    $_SESSION['success'] = "Your details have been submitted successfully!";
    header("Location:sparkcontactus.php?s=spark");
    exit;
}

