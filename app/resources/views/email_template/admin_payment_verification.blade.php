<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments Verification Status</title>
</head>
<body>
    @if($status=="REJECTED")
    <div style="font-family: Arial, sans-serif; color: #333;">
        <h4>Dear {{$name}},</h4>
        
        <p>Your payment details has been {{$status}}.for Spark Olympiads Exam</p>
        <p>Kindly contact with your school.</p>

        <p>Best regards,<br>
        Team Spark Olympiads (EDXSO)</p>
    </div>
@else
    <div style="font-family: Arial, sans-serif; color: #333;">
        <h4>Dear {{$name}},</h4>
        
        <p>Fee verified and received for Spark Olympiad. 
            Thank you for the payment.</p>
       
        <p>Best regards,<br>
        Team Spark Olympiads (EDXSO)</p>
    </div>

@endif
</body>
</html>
