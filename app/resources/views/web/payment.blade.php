<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>India’s First Fully Online Olympiad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://www.webdevglobal.info/app/web/assets/img/favicon.png" rel="icon">
    <link href="https://www.webdevglobal.info/app/web/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        body {
            background: linear-gradient(to right, #0052cc, #007bff);
            font-family: 'Montserrat', sans-serif;
        }
        .container-box {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .header-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .school-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        .spark-logo {
            width: 160px;
            margin: 0 auto 20px auto;
            display: block;
        }
        .subject-btn {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 5px;
        }
        .subject-btn.active {
            background-color: #007bff;
            color: #fff;
        }
        .qr-img {
            max-width: 100%;
            height: auto;
        }
        .verified {
            color: green;
            font-weight: bold;
            margin-left: 22px;
        }
        .not_verified {
            margin-left: 22px;
            color: red;
            /* font-weight: bold; */
        }
        .info-box {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 40px;
            font-size: 14px;
            color: #333;
            margin-top: 20px;
        }
        .info-box i {
            color: #6c757d;
            margin-right: 8px;
        }
        .bottom-links {
            font-size: 14px;
            margin-top: 20px;
        }
        .custom-back-btn {
            background-color: #fff;
            color: #0052cc;
            border: 1px solid #0052cc;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }
        .custom-back-btn:hover {
            background-color: #e6f0ff;
            color: #007bff;
            border-color: #007bff;
        }
        p.amount-label {
            font-size: 14px;
            color: #666;
            margin-top: 15px;
            margin-bottom: 2px;
        }
        p.amount {
            font-size: 22px;
            font-weight: 600;
            color: #000;
            margin: 10px;
        }
        .own img {
            width: 35%;
        }
        .razorpay-btn {
            background-color: #2b84e0; /* Razorpay blue */
            color: #ffffff;
            padding: 10px 24px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .razorpay-btn:hover {
            background-color: #1f6dc1;
        }

        .razorpay-btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(43, 132, 224, 0.4);
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row g-4">
            <!-- Left Panel -->
            <div class="col-md-6">
                <div class="container-box">
                    <img src="https://sparkolympiads.com/assets/img/logo.svg" alt="Spark Olympiad" class="spark-logo">
                    <div class="header-box">
                        <!-- <img src="{{ asset($scid->image) }}" class="school-logo" alt="Logo"> -->
                        <img src="{{ asset($scid->image ?? 'default-logo.png') }}" class="img-radius school-logo">

                        <h5 class="mb-0"><strong>{{ $sd->school_name }}</strong></h5>
                    </div>
                    <p>Date: <br><strong>{{ date('d-m-Y', strtotime($students->created_at)) }}</strong></p>
                    <p>School Admission / Enrollment Number: <br><strong>{{ $students->admission_no }}</strong></p>
                    <p>Student Name: <br><strong>{{ $students->full_name }} {{ $students->middle_name }}
                            {{ $students->last_name }}</strong></p>
                    <p>Class: <br><strong>{{ $students->class }}</strong></p>
                    <p>Section: <br><strong>{{ $students->section }}</strong></p>
                    <p>Student Relation: <br><strong>{{ $students->relation }}</strong></p>
                    <p>Mobile Number: <br><strong>{{ $students->mobile }}</strong>
                        @if ($students->is_mobile_validate == 1)
                            <span class="verified">Verified </span>
                        @else
                            <span class="not_verified">Not - Verified
                        @endif
                        </span>
                    </p>
                    <p>Email ID: <br><strong>{{ $students->email }}</strong>
                        @if ($students->is_validate == 1)
                            <span class="verified">Verified </span>
                        @else
                            <span class="not_verified">Not - Verified
                        @endif
                    </p>
                    <p>Selected  Subject's to Participate in Exam</p>
                    <div class="d-flex flex-wrap">

                        @php
                            $subjectNames = explode(', ', $students->subject_names);
                        @endphp

                        @foreach ($subjectNames as $subject)
                            <div class="subject-btn">{{ $subject }}</div>
                        @endforeach
                    </div>
                    <small class="text-muted">Rs 200/per Subject*</small><br />
                    <!-- <button class="btn custom-back-btn mt-3">Back to Edit Details</button> -->
                </div>
            </div>
            <!-- Right Panel -->
            <div class="col-md-6">
                <div class="container-box text-center own">
                    <p class="fw-bold">Spark Olympiad is a product of EDXSO LLP,<br>developed to foster academic excellence.</p>
                     @if($scid->online_payment==3)
                    <div class="row">
                        <label for="utr" class="form-label fw-bold" style="text-align: left;">Select a payment method</label>
                    </div>
                    <div class="list-group mb-3">
                        <label class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="form-check">
                            <input class="form-check-input me-2" type="radio" name="paymentOption" id="showQR" checked>
                            <label class="form-check-label" for="showQR">Pay with QR</label>
                            </div>
                            <i class="bi bi-qr-code-scan"></i>
                        </label>
                        <label class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="form-check">
                            <input class="form-check-input me-2" type="radio" name="paymentOption" id="showRazorpay">
                            <label class="form-check-label" for="showRazorpay">Pay with Razorpay</label>
                            </div>
                            <i class="bi bi-bank"></i>
                        </label>
                    </div>
                    @endif
                     @if($scid->online_payment==1)
                    <div id="qrSection">
                        <img src="{{ asset('sparks_qr.jpg') }}" alt="QR Code" class="qr-img mb-3">
                        <p class="scan-text">Scan QR Code to Pay</p>
                        <p class="amount-label">Amount to Pay</p>
                        <p class="amount">₹ {{ $students->fee }}</p>
                        <form action="{{ route('save.payment', ['id' => $students->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="utr" class="form-label fw-bold">Transaction Id / UTR Number</label>
                            <input type="text" class="form-control" id="utr" name="utr" placeholder="Enter Transaction Id / UTR Number" required maxlength="22" minlength="12">
 
                        </div>

                        <div class="mb-3 text-start">
                            <label for="utr" class="form-label fw-bold">Attachment</label>  
                            <input type="file" class="form-control" accept=".pdf,image/*" name="attachment" required >
                            <small class="text-muted">
                                Once you have completed your UPI payment, enter the Transaction ID (UTR Number) in the
                                field provided to confirm and verify your payment.
                            </small>
                        </div>
                        <button id="submitBtn" type="submit" class="btn btn-primary w-100 fw-semibold">Submit</button>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </form>
                    </div>
                  
                    @elseif($scid->online_payment==2)
                    <div id="razorpaySection" style="display: none;">
                      <form id="razorBookingForm">
                          @csrf
                          <input type="hidden" name="total_price" value="{{ $students->fee }}">
                          <input type="hidden" name="student_id" value="{{ $students->id ?? '' }}">
                          <input type="hidden" name="email" value="{{ $students->email ?? '' }}">
                          <input type="hidden" name="mobile" value="{{ $students->mobile ?? '' }}">
                          <p class="amount-label">Amount to Pay</p>
                          <p class="amount">₹ {{ $students->fee }}</p>
                          <button type="button" class="razorpay-btn select-btn mt-2" id="payButton">Click Here To Pay</button>
                      </form>
                    </div>
                    @else
                     
                    <div id="qrSection">
                        <img src="{{ asset('sparks_qr.jpg') }}" alt="QR Code" class="qr-img mb-3">
                        <p class="scan-text">Scan QR Code to Pay</p>
                        <p class="amount-label">Amount to Pay</p>
                        <p class="amount">₹ {{ $students->fee }}</p>
                        <form action="{{ route('save.payment', ['id' => $students->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="utr" class="form-label fw-bold">Transaction Id / UTR Number</label>
                            <input type="text" class="form-control" id="utr" name="utr" placeholder="Enter Transaction Id / UTR Number" required maxlength="22" minlength="12">
 
                        </div>

                        <div class="mb-3 text-start">
                            <label for="utr" class="form-label fw-bold">Attachment</label>  
                            <input type="file" class="form-control" accept=".pdf,image/*" name="attachment" required >
                            <small class="text-muted">
                                Once you have completed your UPI payment, enter the Transaction ID (UTR Number) in the
                                field provided to confirm and verify your payment.
                            </small>
                        </div>
                        <button id="submitBtn" type="submit" class="btn btn-primary w-100 fw-semibold">Submit</button>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </form>
                    </div>
                   
                    <div id="razorpaySection" style="display: none;">
                      <form id="razorBookingForm">
                          @csrf
                          <input type="hidden" name="total_price" value="{{ $students->fee }}">
                          <input type="hidden" name="student_id" value="{{ $students->id ?? '' }}">
                          <input type="hidden" name="email" value="{{ $students->email ?? '' }}">
                          <input type="hidden" name="mobile" value="{{ $students->mobile ?? '' }}">
                          <p class="amount-label">Amount to Pay</p>
                          <p class="amount">₹ {{ $students->fee }}</p>
                          <button type="button" class="razorpay-btn select-btn mt-2" id="payButton">Click Here To Pay</button>
                      </form>
                    </div>
                    @endif
                    <div class="info-box text-start">
                        <i class="bi bi-lock-fill"></i>
                        <span>Payments for Spark Olympiad are securely processed via UPI under EDXSO LLP.</span>
                        <br><br>
                        This initiative is conducted in joint venture with participating schools, ensuring a trusted and
                        collaborative platform for students.
                    </div>
                    <div class="bottom-links text-center">
                        <a href="/privacy-policy.php" target="_blank"class="me-3">Privacy Policy</a>
                        <a href="/terms-and-conditions.php" target="_blank">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</body>

<script>
    const online_status = {{$scid->online_payment}}
    const qrBtn = document.getElementById("showQR");
    const razorBtn = document.getElementById("showRazorpay");
    if(online_status==3){
        qrBtn.addEventListener("click", function() {
            document.getElementById("qrSection").style.display = "block";
            document.getElementById("razorpaySection").style.display = "none";
        });
        razorBtn.addEventListener("click", function() {
            document.getElementById("razorpaySection").style.display = "block";
            document.getElementById("qrSection").style.display = "none";
        });
    }else if(online_status==2){  
         document.getElementById("razorpaySection").style.display = "block";
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const utrInput = document.getElementById('utr');
        const submitBtn = document.getElementById('submitBtn');

        if (!utrInput || !submitBtn) return;

        // Create and insert error message element
        const errorEl = document.createElement('div');
        errorEl.style.color = 'red';
        errorEl.style.fontSize = '0.9em';
        errorEl.style.marginTop = '4px';
        errorEl.style.display = 'none';
        utrInput.insertAdjacentElement('afterend', errorEl);

        // Disable submit initially
        submitBtn.disabled = true;

        function validateUTR() {
            // Remove non-alphanumeric characters
            utrInput.value = utrInput.value.replace(/[^a-zA-Z0-9]/g, '');

            const isValid = utrInput.value.length >= 12 && utrInput.value.length <= 22;

            if (!isValid) {
                errorEl.textContent =
                    'Transaction ID / UTR Number must be 12 to 22 characters long and contain only letters and numbers.';
                errorEl.style.display = 'block';
            } else {
                errorEl.textContent = '';
                errorEl.style.display = 'none';
            }

            // Enable/disable the button based on validity
            submitBtn.disabled = !isValid;
        }

        // Listen for input and blur events
        utrInput.addEventListener('input', validateUTR);
        utrInput.addEventListener('blur', validateUTR);
    });
</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById('payButton').addEventListener('click', function (e) {
    e.preventDefault();
    var $btn = $(this);
    $btn.prop('disabled', true);
    $btn.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Processing Please Wait...');

    let formData = new FormData(document.getElementById('razorBookingForm'));
    for (let [key, value] of formData.entries()) {
        console.log(`${key}: ${value}`);
    }
    fetch("{{ url('payment/create-order') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        let options = {
            key: "{{ env('RAZORPAY_KEY') }}",
            amount: data.amount,
            currency: "INR",
            name: "EDXSO LLP",
            image: "{{ asset('assets/img/logo.svg') }}",
            order_id: data.order_id,
            theme: {
                color: "#fff"
            },
            customer: {
                name: "{{ $students->full_name ?? '' }} {{ $students->middle_name ?? '' }} {{ $students->last_name ?? '' }}",
                email: "{{ $students->email ?? '' }}",
                contact: "{{ $students->mobile ?? '' }}"
            },
            description: "SID- {{ $students->school_id }} & AdmNo- {{ $students->admission_no }}",
            handler: function (response) {
                fetch("{{ url('payment/success') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        razorpay_payment_id: response.razorpay_payment_id,
                        order_id: data.order_id,
                        form: Object.fromEntries(formData.entries())
                    })
                })
                .then(res => res.json())
                .then(result => {
                    if (result.success) {
                        window.location.href = "{{ url('booking-confirmation') }}/"+result.student_id;
                    }else{
                      $btn.prop('disabled', false);
                      $btn.html('Click Here To Pay');
                    }
                });
            }
        };

        let rzp = new Razorpay(options);

        rzp.on('payment.failed', function (response) {
            fetch("{{ url('payment/failure') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    razorpay_payment_id: response.error.metadata.payment_id,
                    order_id: response.error.metadata.order_id,
                    reason: response.error.description,
                    form: Object.fromEntries(formData.entries())
                })
            });
            alert('Payment failed: ' + response.error.description);
            $btn.prop('disabled', false);
            $btn.html('Click Here To Pay');
        });
        rzp.open();
    });
});
</script>
</html>
