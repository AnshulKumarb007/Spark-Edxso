<?php

use Illuminate\Support\Facades\Crypt;
/**
 * Encrypt a value for use in a URL.
 *
 * @param string $value
 * @return string
 */
function encrypt_url($value)
{
    return Crypt::encryptString($value);
}
/**
 * Decrypt a value from a URL.
 *
 * @param string $encrypted
 * @return string|null
 */
function decrypt_url($encrypted)
{
    try {
        return Crypt::decryptString($encrypted);
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
        return null; // Or handle as needed
    }
}
function sendOtp($mobile,$otp,$name=null){
    if(!empty($name)){
        $school = $name;
    }else{
        $school = 'School Admin';
    }
    $otpText = "Dear $school,\nYour one time password (OTP) is $otp Do not disclose it to anyone.\nTeam Spark Olympiads(EDXSO)";
    $encodedText = urlencode($otpText);
    $finalUrl = "https://api2.nexgplatforms.com/sms/1/text/query?username=SparkOlympiads&password=Devanshi@123&from=EDXSOL&to=91$mobile&indiaDltContentTemplateId=1707175085053959674&indiaDltPrincipalEntityId=1701175006776504702&indiaDltTelemarketerId=1702171328200125899&text=$encodedText";
    $ch = curl_init($finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);
    if ($curl_error) {
        return false;
    }
    $data = json_decode($response, true);
    if (!empty($data['messages'][0]['status']['groupName'])) {
        $status = $data['messages'][0]['status']['groupName'];
        if (in_array($status, ['PENDING', 'SENT', 'DELIVERED'])) {
            return true;
        }
    }
    return false;
}
function sendConratulationSms($mobile,$registration=null,$password=null){
    // $otpText = "Congratulations!\nYour Spark Olympiad account has been created. We have sent you an email with your credentials and next steps.\nTeam Spark Olympiads\n(EDXSO)\nwww.sparkolympiads.com";
    $otpText = "Congratulations!\nYour Spark Olympiad account has been created.\nLogin Url: https://sparkolympiads.com/app/school-login/\nRegistration ID: $registration\nPassword: $password\nTeam \nSpark Olympiads \n(EDXSO)\nwww.sparkolympiads.com";
    $encodedText = urlencode($otpText);
    $finalUrl = "https://api2.nexgplatforms.com/sms/1/text/query?username=SparkOlympiads&password=Devanshi@123&from=EDXSOL&to=$mobile&indiaDltContentTemplateId=1707175195442479419&indiaDltPrincipalEntityId=1701175006776504702&indiaDltTelemarketerId=1702171328200125899&text=$encodedText";

    $ch = curl_init($finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);
    if ($curl_error) {
        return false;
    }
    $data = json_decode($response, true);
    if (!empty($data['messages'][0]['status']['groupName'])) {
        $status = $data['messages'][0]['status']['groupName'];
        if (in_array($status, ['PENDING', 'SENT', 'DELIVERED'])) {
            return true;
        }
    }
    return false;
}

function password_change_msg($mobile) {
    $otpText = "Dear School Admin,\nYour Spark Olympiads account password is changed. If this wasn't you, please contact us immediately. \nTeam,\nSpark Olympiads\n(EDXSO)";
    $encodedText = urlencode($otpText);
    
    $finalUrl = "https://api2.nexgplatforms.com/sms/1/text/query?username=SparkOlympiads&password=Devanshi@123&from=EDXSOL&to=$mobile&indiaDltContentTemplateId=1707175136617456870&indiaDltPrincipalEntityId=1701175006776504702&indiaDltTelemarketerId=1702171328200125899&text=$encodedText";

    $ch = curl_init($finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);

    // Print curl error if any
    if ($curl_error) {
        echo "cURL Error: " . $curl_error . "\n";
        return false;
    }

    // Decode and check the API response
    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON Decode Error: " . json_last_error_msg() . "\n";
        echo "Raw Response: " . $response . "\n";
        return false;
    }

    if (!empty($data['messages'][0]['status']['groupName'])) {
        $status = $data['messages'][0]['status']['groupName'];
        if (in_array($status, ['PENDING', 'SENT', 'DELIVERED'])) {
            return true;
        } else {
            echo "SMS Status: " . $status . "\n";
        }
    } else {
        echo "Invalid or unexpected API response structure:\n";
        print_r($data);
    }

    return false;
}


function payment_success($school_name,$status,$mobile) {
    $otpText = "Dear $school_name,\nYour payment details has been $status. \nTeam\nSpark Olympiads\n(EDXSO)";
    $encodedText = urlencode($otpText);
    
    $finalUrl = "https://api2.nexgplatforms.com/sms/1/text/query?username=SparkOlympiads&password=Devanshi@123&from=EDXSOL&to=$mobile&indiaDltContentTemplateId=1707175195507168652&indiaDltPrincipalEntityId=1701175006776504702&indiaDltTelemarketerId=1702171328200125899&text=$encodedText";

    $ch = curl_init($finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);

    // Print curl error if any
    if ($curl_error) {
        echo "cURL Error: " . $curl_error . "\n";
        return false;
    }

    // Decode and check the API response
    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON Decode Error: " . json_last_error_msg() . "\n";
        echo "Raw Response: " . $response . "\n";
        return false;
    }

    if (!empty($data['messages'][0]['status']['groupName'])) {
        $status = $data['messages'][0]['status']['groupName'];
        if (in_array($status, ['PENDING', 'SENT', 'DELIVERED'])) {
            return true;
        } else {
            echo "SMS Status: " . $status . "\n";
        }
    } else {
        echo "Invalid or unexpected API response structure:\n";
        print_r($data);
    }

    return false;
}


function admin_fee_verify($name,$mobile) {
    $otpText = "Dear $name, 
Fee verified and received for Spark Olympiad. 
Thank you for the payment. 
Team 
Spark Olympiad 
(EDXSO)";
    $encodedText = urlencode($otpText);
    
    $finalUrl = "https://api2.nexgplatforms.com/sms/1/text/query?username=SparkOlympiads&password=Devanshi@123&from=EDXSOL&to=$mobile&indiaDltContentTemplateId=1707175368306063763&indiaDltPrincipalEntityId=1701175006776504702&indiaDltTelemarketerId=1702171328200125899&text=$encodedText";
         
 

    $ch = curl_init($finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);
   
    // Print curl error if any
    if ($curl_error) {
        echo "cURL Error: " . $curl_error . "\n";
        return false;
    }

    // Decode and check the API response
    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON Decode Error: " . json_last_error_msg() . "\n";
        echo "Raw Response: " . $response . "\n";
        return false;
    }

    if (!empty($data['messages'][0]['status']['groupName'])) {
        $status = $data['messages'][0]['status']['groupName'];
        if (in_array($status, ['PENDING', 'SENT', 'DELIVERED'])) {
            return true;
        } else {
            echo "SMS Status: " . $status . "\n";
        }
    } else {
        echo "Invalid or unexpected API response structure:\n";
        print_r($data);
    }

    return false;
}

function admin_fee_rejected($name,$mobile) {
    $otpText = "Dear $name, 
Your payment details has been REJECTED. 
Team 
Spark Olympiads 
(EDXSO)";
    $encodedText = urlencode($otpText);
    
    $finalUrl = "https://api2.nexgplatforms.com/sms/1/text/query?username=SparkOlympiads&password=Devanshi@123&from=EDXSOL&to=$mobile&indiaDltContentTemplateId=1707175195507168652&indiaDltPrincipalEntityId=1701175006776504702&indiaDltTelemarketerId=1702171328200125899&text=$encodedText";
   
    

    $ch = curl_init($finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);

    // Print curl error if any
    if ($curl_error) {
        echo "cURL Error: " . $curl_error . "\n";
        return false;
    }

    // Decode and check the API response
    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON Decode Error: " . json_last_error_msg() . "\n";
        echo "Raw Response: " . $response . "\n";
        return false;
    }

    if (!empty($data['messages'][0]['status']['groupName'])) {
        $status = $data['messages'][0]['status']['groupName'];
        if (in_array($status, ['PENDING', 'SENT', 'DELIVERED'])) {
            return true;
        } else {
            echo "SMS Status: " . $status . "\n";
        }
    } else {
        echo "Invalid or unexpected API response structure:\n";
        print_r($data);
    }

    return false;
}
