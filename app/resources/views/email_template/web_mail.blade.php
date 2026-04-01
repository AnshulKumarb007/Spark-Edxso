<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Form Submission</title>

    <style>
        .download-btn {
    display: inline-block;
    background-color: #3c78ff;
    color: #fff !important;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.download-btn:hover {
    background-color: #0056b3;
    text-decoration: none;
}

.center-btn {
    text-align: center;
    margin-top: 20px; /* optional */
}

    </style>
</head>
<body>


 
    

    <!-- <h2 style="color:#333;">New Inquiry From Contact US Page</h2> -->

     

    <table width="100%" cellpadding="10" cellspacing="0" 
           style="background:#ffffff; border-collapse:collapse; border:1px solid #ddd;">
        
        <tr>
            <th align="left" style="border:1px solid #ddd; background:#f0f0f0;">Full Name</th>
            <td style="border:1px solid #ddd;">{{ $data['full_name'] }}</td>
        </tr>

        <tr>
            <th align="left" style="border:1px solid #ddd; background:#f0f0f0;">Mobile Number</th>
            <td style="border:1px solid #ddd;">{{ $data['mobile'] }}</td>
        </tr>

        <tr>
            <th align="left" style="border:1px solid #ddd; background:#f0f0f0;">Email</th>
            <td style="border:1px solid #ddd;">{{ $data['email'] }}</td>
        </tr>

        <tr>
            <th align="left" style="border:1px solid #ddd; background:#f0f0f0;">City / State</th>
            <td style="border:1px solid #ddd;">{{ $data['city_state'] }}</td>
        </tr>

        <tr>
            <th align="left" style="border:1px solid #ddd; background:#f0f0f0;">Agreement</th>
            <td style="border:1px solid #ddd;">Yes</td>
        </tr>

    </table>

    <p style="margin-top:15px; font-size:13px; color:#666;">
        This email was generated automatically from the website form.
    </p>







</body>
</html>
