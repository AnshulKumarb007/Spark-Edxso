<!DOCTYPE html>
<html>
<head>
    <title>Registration Failed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
        }
        .container {
            background-color: #f5c6cb;
            border: 1px solid #f1b0b7;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #721c24;
        }
        p {
            font-size: 16px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #491217;
        }
    </style>
</head>
<body>
  <div class="container">
    <h1>Verification Failed</h1>

    <p>Dear {{ $student->full_name ?? 'User' }},</p>
    @php $str= Str::random(150); @endphp
    <p>Your enrollment details could not verified. Please resubmit your details using the below link. <br/>
        <a href="{{ url('student-form') }}?R&M={{ $str }}&school_id={{ $student->school_id }}&admno={{ $student->admission_no}}">Click here</a>
       </p>

    <p>Thank you,<br/>
    {{$school_name}}</p>

    <div class="footer">
      <small>This is an automated message, please do not reply directly.</small>
    </div>
  </div>
</body>
</html>
