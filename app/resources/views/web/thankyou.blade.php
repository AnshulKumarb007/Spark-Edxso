<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPARK Olympiads Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #555;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card-box {
            width: 100%;
            max-width: 450px;
            border-radius: 20px;
            overflow: hidden;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-top {
            background-color: #3c78ff;
            padding: 13px 0;
            display: flex;
            justify-content: center;
        }

        .card-top .checkmark {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .checkmark i {
            font-size: 36px;
            color: white;
        }

        .card-body {
            text-align: center;
            padding: 30px 20px;
        }

        .logo-text {
            font-size: 28px;
            font-weight: bold;
            color: #004aad;
            letter-spacing: 1px;
        }

        .logo-text span {
            color: #ff4b00;
        }

        .btn-primary {
            background-color: #0056d2;
        }

        .btn-primary:hover {
            background-color: #0044a3;
        }
        @media print {
            #printPage {
                display: none;
            }
            body {
                font-size: 12pt;
            }
            .no-print {
                display: none;
            }
        }
        .font-size-em{
            font-size: .7em;
            color:red;
        }

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
    <div class="card-box text-center">
        <div class="card-top">
            <div class="checkmark">
                <i class="bi bi-check-lg"></i>
            </div>
        </div>
        <div class="card-body">
            <div class="logo-text">
                <img src="{{ asset('web/assets/img/logo.svg') }}" class="img-fluid" alt="logo" />
            </div>
            <p class="mt-3 mb-1"><strong>Thank you</strong> for registering your school.</p>
            <p>Your SPARK Olympiads account has been created successfully.</p>
            <small>An email has been sent to your registered email ID/s.</small>
            <div class="card-body text-start">
                <p id="print-section">
                    <strong>School Login URL:</strong> <a href="{{ $schoolUrl }}" target="_blank">{{ $schoolUrl }}</a>
                    </br>
                    <strong>School Login ID:</strong> {{ $schoolId }}
                    </br>
                    <strong>School Login Password:</strong> {{ $tempPassword }}</br><br/>
                    <hr>
                    <p>Please share the below self-registration link for students and parents.</p>    
                    <strong>Student Registration URL:</strong> <a href="{{ $student_url }}" target="_blank">{{ $student_url }}</a>

                     <br/>
                      <div style="text-align:center"> 
                            <a href="{{ asset('SPARK-Exam-Schedule.pdf') }}" target="_blank" class="download-btn center-btn">
                                    Download Exam Schedule
                                </a>
                    </div>
                </p>
                <span class="font-size-em mb-2"> Please <a href="javascript:void(0)" id="printDivBtn">Click here</a> to print & save this information for future refrence.</span>
            </div>
            <a href="https://sparkolympiads.com/" class="btn btn-outline-primary px-4">Back To Website</a>
            <a href="{{ $schoolUrl }}" class="btn btn-primary px-4">Proceed To Login</a>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        document.getElementById("printDivBtn").addEventListener("click", function () {
            var printContents = document.getElementById("print-section").innerHTML;
            var originalContents = document.body.innerHTML;
            var printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print</title>
                        <link rel="stylesheet" href="styles.css"> <!-- your CSS file -->
                        <style>
                            body { font-family: Arial, sans-serif; padding: 20px; }
                        </style>
                    </head>
                    <body onload="window.print(); window.close();">
                        ${printContents}
                    </body>
                </html>
            `);
            printWindow.document.close();
        });
    </script>
    </body>
</html>
