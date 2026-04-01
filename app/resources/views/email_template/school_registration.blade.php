<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SPARK Olympiads Confirmation</title>

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
<body style="background-color: #555; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 0;">
    <div style="width: 100%; max-width: 450px; border-radius: 20px; overflow: hidden; background: white; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); text-align: center; margin: auto;">

        <div style="background-color: #3c78ff; padding: 20px 0; text-align: center;">
            <table align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <img src="{{ asset('web/assets/img/sign.png') }}" alt="logo" style="width: 80px; height: 85px;"/>
                    </td>
                </tr>
            </table>
        </div>

        <div style="text-align: center; padding: 30px 20px;">
            <div style="font-size: 28px; font-weight: bold; color: #004aad; letter-spacing: 1px;">
                <img src="{{ asset('web/assets/img/logo_png.png') }}" alt="logo" style="max-width: 100%; height: auto;"/>
            </div>
            <p style="margin-top: 1rem; margin-bottom: .25rem;"><strong>Thank you</strong> for registering your school.</p>
            <p>Your SPARK Olympiads account has been created successfully.</p>
            <div style="text-align: left; padding-top: 20px;">
                <p id="print-section" style="margin: 0 0 10px 0;">
                    <strong>School Login URL:</strong> <a href="{{ $schoolUrl }}" target="_blank" style="color: #0056d2;">{{ $schoolUrl }}</a><br>
                    <strong>School Login ID:</strong> {{ $schoolId }}<br>
                    <strong>School Login Password:</strong> {{ $tempPassword }}<br>
                    <hr>
                    <p>Please share the below self-registration link for students and parents.</p> 
                    <strong>Student Registration URL :</strong> {{ $link }}   <br/>


                    <div style="text-align:center"> 
                            <a href="{{ asset('SPARK-Exam-Schedule.pdf') }}" target="_blank" class="download-btn center-btn">
                                    Download Exam Schedule
                                </a>
                    </div>
                   <br/>


                  
                </p>
                <span style="font-size: .9em; color: red; display: inline-block; margin-top: 8px;">Please save this information for future reference.</span>
            </div>
        </div>
    </div>
</body>
</html>
