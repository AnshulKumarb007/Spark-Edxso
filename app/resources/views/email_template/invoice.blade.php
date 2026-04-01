<!DOCTYPE html>
<html>
<head>
    <title>Invoice Generated - Spark Olympiads</title>
</head>
<body>
    <h2>Hello {{ $data['name'] ?? 'User' }},</h2>

    <p>We are pleased to inform you that your invoice for the Spark Olympiads has been generated successfully.
        <br/>You may view or download the invoice using the link below:</p>

    <p>👉 <a href="{{ $data['invoice_link'] ?? '#' }}" target="_blank">
        View Your Invoice ({{$data['invoiceno']}})
    </a></p>


    <p>If you have any questions or require assistance, please feel free to reach out to our support team at any time.</p>

    <br>
    <p>Thank you for your continued support.<br>Warm regards,<br/>Team Spark Olympiads (EDXSO)</p>
</body>
</html>


 
