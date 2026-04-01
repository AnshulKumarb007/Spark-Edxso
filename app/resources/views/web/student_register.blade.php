
@extends('web.layouts.app')
@section('content')
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-10">
                        <h1>Student Information Form</h1>
                        <div class="rectangle">
                            <img src="{{ asset('web/assets/img/Rectangle 13.png') }}" class="img-fluid" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="service-details" class="service-details section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100"></div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('students.store') }}" method="POST" id="register_head" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Your School Admission/Enrollment No.<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" readonly value="{{$admission_no}}" name="admission_no" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="Subject">Class<span class="text-danger">*</span></label>
                                <select name="class" id="class-dropdown" class="form-control class-select" required>
                                    <option>--Select --</option>
                                    @foreach($cc as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3"> 
                                <label for="section">Section</label>                             
                                <input type="text" class="form-control" placeholder="Enter section" maxlength="20" minlength="1" name="section" required>
                            </div>
                        </div>
 
                        {{-- <div class="mb-3">
                            <label for="subject" class="form-label">Subject<span class="text-danger">*</span></label>
                            <select name="subject_id[]" id="subject" class="form-select" required multiple>
                                <option value="">Select Subject</option>
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label for="subject" class="form-label">Select Exam to Participate <span class="text-danger">*</span> <i class="fa fa-info text-black ms-1 information"
                                data-bs-toggle="tooltip"
                                data-bs-placement="right"
                                title="Please select one or more exams you wish to participate in. You can choose multiple subjects based on your interests or eligibility.">
                            </i></label>
                            <div style="display:none" id="exam-text-show">
                                <p>(Click on the Olympiads you want to enroll in.)</p>
                            </div>
                            <div id="subject-checkboxes" class="row"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label for="full_name" class="form-label">Student First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter student first name" name="full_name" id="first_name" required maxlength="50">
                                <div id="first_name_error" class="font-size-12 mt-1 small text-danger"></div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="full_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter middle name" name="middle_name" maxlength="50">
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="full_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name" name="last_name" id="last_name" maxlength="50">
                                <div id="third_error" class="font-size-12 mt-1 small text-danger"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="father_name" class="form-label">Relationship With Student <span class="text-danger">*</span></label>
                                <select id="relation" class="form-control" name="relation" required>
                                    <option value="">-- Select Relation --</option>
                                    <option value="father">Father</option>
                                    <option value="mother">Mother</option>
                                    <option value="guardian">Guardian</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="relative-name-group row" style="display: none;">
                            <div class="col-sm-4 mb-3">
                                <label for="father_name" class="form-label" id="relation-label">Full Name of Relative <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="" required maxlength="50">
                                <div id="father_name_error" class="font-size-12 mt-1 small text-danger"></div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="full_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter middle name" name="relative_middle_name" maxlength="50">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="full_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name" name="relative_last_name" id="relative_last_name" maxlength="50">
                                <div id="relative_last_name_error" class="font-size-12 mt-1 small text-danger"></div>
                            </div>
                        </div>
                        <input type="hidden" name="total_amount" id="amount-in-words2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile Number<span class="text-danger">*</span>
                                        <i class="fa fa-info text-black ms-1 information"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="right"
                                            title="Enter your mobile number & validate.">
                                        </i>
                                    </label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" @if(!empty($st)) value="{{ $st->mobile }}" @endif placeholder="Enter mobile number" pattern="^[1-9][0-9]{9}$" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" {{ isset($st) && $st->is_mobile_validate == 1 ? 'readonly' : '' }} required>
                                    @if(empty($st->is_mobile_validate))
                                        <span id="verifyMobile" class="text-info cursor-pointer mt-1 float-end"><small>Verify</small></span>
                                        <div id="mobileStatus" class="font-size-12 mt-1 small text-danger"></div>
                                        <div id="mobileOtpWrapper" class="mt-2 d-none">
                                            <input type="text" id="mobileOtp" class="form-control mt-1" placeholder="Enter OTP">
                                            <button type="button" class="btn btn-success btn-sm mt-1" id="verifyMobileOtp" style="display:none">Verify OTP</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address<span class="text-danger">*</span>
                                        <i class="fa fa-info text-black ms-1 information"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="right"
                                            title="Enter your email address & validate.">
                                        </i>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" @if(!empty($st)) value="{{ $st->email }}" @endif placeholder="Enter email address" {{ isset($st) && $st->is_validate == 1 ? 'readonly' : '' }} required>
                                    @if(empty($st->is_validate))
                                        <span id="verifyEmail" class="text-info cursor-pointer mt-1 float-end"><small>Verify</small></span>
                                        <div id="emailStatus" class="font-size-12 mt-1 small text-danger"></div>
                                        <div id="emailOtpWrapper" class="mt-2 d-none">
                                            <input type="text" id="emailOtp" class="form-control mt-1" placeholder="Enter OTP">
                                            <button type="button" class="btn btn-success btn-sm mt-1" id="verifyEmailOtp" style="display:none">Verify OTP</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
 

                        <div class="row mb-2 mt-2 text-center" id="amounts" style="display: none">
                            <p><strong>Please note:</strong> The total amount is to be paid at the school.</p>
                            <div id="count" style="font-family: Consolas, 'Courier New', monospace;font-size: 46px;font-weight: bold;background-color: #ffffff;color: #000000;display: inline-block;"></div>
                            <span id="amount-in-words"></span>

                            
                        </div>
                        @if($sd->online_payment==1 || $sd->online_payment==2 || $sd->online_payment==3)
                                <button type="submit" id="submit-btn" class="btn btn-primary mt-5">Proceed to payment</button>
                        @else
                                <button type="submit" id="submit-btn" class="btn btn-primary mt-5">Submit</button>
                        @endif

                        
                         
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#relation').on('change', function () {
            const selectedRelation = $(this).val();
            if (selectedRelation) {
                const relationName = selectedRelation.charAt(0).toUpperCase() + selectedRelation.slice(1);
                let lowercasedString = relationName.toLowerCase();
                $('#relation-label').html(`${relationName} First Name <span class="text-danger">*</span>`);
                $('#father_name').attr('placeholder', `Enter ${lowercasedString} first name`);
                $('.relative-name-group').show();
            } else {
                $('.relative-name-group').hide();
                $('#father_name').val('');
            }
        });
    });
    document.getElementById('register_head').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);
        $.ajax({
            url: "{{ url('check-verified-any-one') }}?page=student&id={{ $st->id }}",
            type: 'GET',
            beforeSend: function () {  
                showloader();
            },
            success: function (response) {
                if (response.status === 200) {
                    $('#submit-btn').prop('disabled', true).html('Processing...');
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            showloader();
                        },
                        success: function (result) {
                            if(result.status==200){
                                if(result.online_payment==0){
                                    // Swal.fire({
                                    //     title: 'Success!',
                                    //     text: result.message,
                                    //     icon: 'success',
                                    // });
                                     setTimeout(() => {
                                        window.location.href = result.route;
                                }, 100);
                                }else{
                                     setTimeout(() => {
                                         window.location.href = result.route;
                                },   100);
                                }
                               
                            }else{
                                Swal.fire({
                                    title: 'Error!',
                                    text: result.message,
                                    icon: 'error',
                                });
                            }
                        },error: function (xhr) {
                            if (xhr.status === 422) {
                                const response = xhr.responseJSON;
                                let errorMessages = '';
                                for (let field in response.errors) {
                                    response.errors[field].forEach(msg => {
                                        errorMessages += `• ${msg}\n`;
                                    });
                                }
                                Swal.fire({
                                    title: 'Validation Error!',
                                    text: errorMessages,
                                    icon: 'error',
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Try again.',
                                    icon: 'error',
                                });
                            }
                        },
                        complete: function () {
                            hideloader()
                        }
                    });
                } else {
                    Swal.fire({
                        title: response.title,
                        text: response.decription,
                        icon: 'question',
                        confirmButtonText: 'Go Back',
                        confirmButtonColor: '#3085d6'
                    });
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const response = xhr.responseJSON;
                    let errorMessages = '';
                    for (let field in response.errors) {
                        response.errors[field].forEach(msg => {
                            errorMessages += `• ${msg}\n`;
                        });
                    }
                    Swal.fire({
                        title: 'Validation Error!',
                        text: errorMessages,
                        icon: 'error',
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Try again.',
                        icon: 'error',
                    });
                }
            },
            complete: function () {
                hideloader()
            }
        });
    });
</script>
<script>
// $(document).ready(function () {
//     $('#class-dropdown').on('change', function () {
//     var stateID = this.value;
//     console.log("Selected State ID:", stateID); // Debug line
//     $("#subject").html('');
//         $.ajax({
//             url: "{{ url('get-subject') }}/" + stateID,
//             type: "GET",
//             success: function (res) {
//                 $('#subject').html('<option value="">Select Subject</option>');
//                 $.each(res, function (key, value) {
//                     $('#subject').append('<option value="' + value.id + '">' + value.name + '</option>');
//                 });
//             }
//         });
//     });
// });
$(document).ready(function () {
    $('#class-dropdown').on('change', function () {
        var stateID = this.value;
        console.log("Selected State ID:", stateID);
        $("#subject-checkboxes").html('');
        $.ajax({
            url: "{{ url('get-subject') }}/" + stateID,
            type: "GET",
            success: function (res) {
                if(res.length > 0) {
                   $('#exam-text-show').show();
                    $.each(res, function (key, value) {
                        $('#subject-checkboxes').append(`
                            <div class="col-md-6">
                                <div class="form-check">
                               
                                    <input class="form-check-input subject-checkbox" type="checkbox" name="subject_id[]" value="${value.id}" id="subject_${value.id}"><label class="form-check-label" for="subject_${value.id}">
                                        ${value.name}
                                    </label>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    $('#subject-checkboxes').html('<p>No subjects found.</p>');
                }
            }
        });
    });
});

</script>
<script>
  $(document).ready(function() {
    $('#subject').select2({      
      placeholder: "Select class first",
      allowClear: true
    });
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const otpInput = document.getElementById('emailOtp');
    const verifyButton = document.getElementById('verifyEmailOtp');
    verifyButton.style.display = 'none';
    otpInput.addEventListener('input', function () {
        if (otpInput.value.trim().length > 0) {
            verifyButton.style.display = 'inline-block';
        } else {
            verifyButton.style.display = 'none';
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const otpInput = document.getElementById('mobileOtp');
    const verifyButton = document.getElementById('verifyMobileOtp');
    verifyButton.style.display = 'none';
    otpInput.addEventListener('input', function () {
        if (otpInput.value.trim().length > 0) {
            verifyButton.style.display = 'inline-block';
        } else {
            verifyButton.style.display = 'none';
        }
    });
});
document.getElementById("first_name").addEventListener("input", function () {
    const first_name = this.value;
    const first_name_error = document.getElementById("first_name_error");
    const errorMsg = "Name must be at least 2 characters long and cannot start with a number";
    if (/^\d/.test(first_name) || first_name.length < 2) {
        first_name_error.textContent = errorMsg;
        this.classList.add("is-invalid");
    } else {
        first_name_error.textContent = "";
        this.classList.remove("is-invalid");
    }
})
document.getElementById("father_name").addEventListener("input", function () {
    const father_name = this.value;
    const father_name_error = document.getElementById("father_name_error");
    const errorMsg = "Name must be at least 2 characters long and cannot start with a number";
    if (/^\d/.test(father_name) || father_name.length < 2) {
        father_name_error.textContent = errorMsg;
        this.classList.add("is-invalid");
    } else {
        father_name_error.textContent = "";
        this.classList.remove("is-invalid");
    }
})
document.getElementById("relative_last_name").addEventListener("input", function () {
    const relative_last_name = this.value;
    const relative_last_name_error = document.getElementById("relative_last_name_error");
    const errorMsg = "Name must be at least 2 characters long and cannot start with a number";
    if (/^\d/.test(relative_last_name) || relative_last_name.length < 2) {
        relative_last_name_error.textContent = errorMsg;
        this.classList.add("is-invalid");
    } else {
        relative_last_name_error.textContent = "";
        this.classList.remove("is-invalid");
    }
})
document.getElementById("last_name").addEventListener("input", function () {
    const third = this.value;
    const third_error = document.getElementById("third_error");
    const errorMsg = "Last Name must be at least 2 characters long and cannot start with a number";
    if (/^\d/.test(third) || third.length < 2) {
        third_error.textContent = errorMsg;
        this.classList.add("is-invalid");
    } else {
        third_error.textContent = "";
        this.classList.remove("is-invalid");
    }
})
$(document).ready(function () {
    $('#verifyMobile').on('click', function () {
        const mobile = $('#mobile').val().trim();
        const mobileStatus = $('#mobileStatus');
        if (!/^[1-9][0-9]{9}$/.test(mobile)) {
            mobileStatus.text('Enter a valid 10-digit mobile number (not starting with 0).').removeClass('text-success').addClass('text-danger');
            return;
        }
        $.ajax({
            url: '{{ url('send-otp-mobile') }}',
            type: 'POST',
            data: {
                mobile: mobile,
                page: 'student-form',
                school_id : '{{ $st->id }}',
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function () {
                showloader();
            },
            success: function (res) {
                if (res.status === 'ok') {
                    mobileStatus.text('OTP sent to your mobile number.').removeClass('text-danger').addClass('text-success');
                    $('#mobileOtpWrapper').removeClass('d-none');
                } else {
                    mobileStatus.text(res.message || 'Failed to send OTP.').removeClass('text-success').addClass('text-danger');
                }
            },
            error: function () {
                mobileStatus.text('Something went wrong while sending OTP.').removeClass('text-success').addClass('text-danger');
            },
            complete: function () {
                hideloader()
            }
        });
    });
    $('#verifyMobileOtp').on('click', function () {
        const mobile = $('#mobile').val().trim();
        const otp = $('#mobileOtp').val().trim();
        const mobileStatus = $('#mobileStatus');

        if (!otp) {
            mobileStatus.text('Please enter the OTP.').removeClass('text-success').addClass('text-danger');
            return;
        }
        $.ajax({
            url: '{{ url('verify-otp-mobile') }}',
            type: 'POST',
            data: {
                mobile: mobile,
                page: 'student-form',
                otp: otp,
                school_id : '{{ $st->id }}',
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function () {
                showloader();
            },
            success: function (res) {
                if (res.status === 'ok') {
                    mobileStatus.text('Mobile number verified successfully').removeClass('text-danger').addClass('text-success');
                    $('#verifyMobileOtp').prop('disabled', true);
                    $('#mobileOtpWrapper').addClass('d-none');
                    $('#mobile').prop('readonly', true);
                    $('#verifyMobile').addClass('d-none');
                } else {
                    mobileStatus.text('Invalid OTP').removeClass('text-success').addClass('text-danger');
                }
            },
            error: function () {
                mobileStatus.text('OTP verification failed.').removeClass('text-success').addClass('text-danger');
            },
            complete: function () {
                hideloader()
            }
        });
    });
});
</script>

<script>
$(document).ready(function () {
    $('#verifyEmail').on('click', function () {
        const email = $('#email').val().trim();
        const emailStatus = $('#emailStatus');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            emailStatus.text('Enter a valid email address.').removeClass('text-success').addClass('text-danger');
            return;
        }

        $.ajax({
            url: '{{ url('send-otp-email') }}',
            type: 'POST',
            data: {
                email: email,
                page: 'student-form',
                school_id : '{{ $st->id }}',
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function () {
                showloader();
            },
            success: function (res) {
                if (res.status === 'ok') {
                    emailStatus.text('OTP sent to your email address.').removeClass('text-danger').addClass('text-success');
                    $('#emailOtpWrapper').removeClass('d-none');
                } else {
                    emailStatus.text(res.message || 'Failed to send OTP.').removeClass('text-success').addClass('text-danger');
                }
            },
            error: function () {
                emailStatus.text('Something went wrong while sending OTP.').removeClass('text-success').addClass('text-danger');
            },
            complete: function () {
                hideloader()
            }
        });
    });

    $('#verifyEmailOtp').on('click', function () {
        const email = $('#email').val().trim();
        const otp = $('#emailOtp').val().trim();
        const emailStatus = $('#emailStatus');
        if (!otp) {
            emailStatus.text('Please enter the OTP.').removeClass('text-success').addClass('text-danger');
            return;
        }
        $.ajax({
            url: '{{ url('verify-otp-email') }}',
            type: 'POST',
            data: {
                email: email,
                page: 'student-form',
                otp: otp,
                school_id : '{{ $st->id }}',
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function () {
                showloader();
            },
            success: function (res) {
                if (res.status === 'ok') {
                    emailStatus.text('Email verified successfully').removeClass('text-danger').addClass('text-success');
                    $('#verifyEmailOtp').prop('disabled', true);
                    $('#emailOtpWrapper').addClass('d-none');
                    $('#email').prop('readonly', true);
                    $('#verifyEmail').addClass('d-none');
                } else {
                    emailStatus.text('Invalid OTP').removeClass('text-success').addClass('text-danger');
                }
            },
            error: function () {
                emailStatus.text('OTP verification failed.').removeClass('text-success').addClass('text-danger');
            },
            complete: function () {
                hideloader()
            }
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const otpInput = document.getElementById('emailOtp');
    const verifyButton = document.getElementById('verifyEmailOtp');
    verifyButton.style.display = 'none';
    otpInput.addEventListener('input', function () {
        if (otpInput.value.trim().length > 0) {
            verifyButton.style.display = 'inline-block';
        } else {
            verifyButton.style.display = 'none';
        }
    });
});
document.getElementById('mobile').addEventListener('input', function () {
    const input = this.value.trim();
    const errorDiv = document.getElementById('mobileStatus');
    const submitBtn = document.getElementById('submit-btn');

    const mobileRegex = /^[1-9][0-9]{9}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    errorDiv.innerText = '';
    submitBtn.disabled = true;
    if (input === '') {
        errorDiv.innerText = 'Mobile number is required.';
    } else if (input.startsWith('+91')) {
        errorDiv.innerText = 'Remove +91. Enter 10-digit mobile only.';
    } else if (mobileRegex.test(input)) {
        submitBtn.disabled = false;
    } else {
        errorDiv.innerText = 'Enter a valid 10-digit mobile (not starting with 0) or valid email.';
    }
});
document.getElementById('email').addEventListener('input', function () {
    const input = this.value.trim();
    const errorDiv = document.getElementById('emailStatus');
    const submitBtn = document.getElementById('submit-btn');

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/; // Simple email pattern

    errorDiv.innerText = '';
    submitBtn.disabled = true;

    if (input === '') {
        errorDiv.innerText = 'Email ID is required.';
    } else if (emailRegex.test(input)) {
        submitBtn.disabled = false;
    } else {
        errorDiv.innerText = 'Please enter a valid email address.';
    }
});
function showloader(){
    const preloader = document.querySelector('#preloader');
    preloader.style.display = 'flex';
}
function hideloader(){
    const preloader = document.querySelector('#preloader');
    preloader.style.display = 'none';
}
</script>
<script>
    function numberToWords(num) {
        const a = [
            '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine',
            'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen',
            'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
        ];
        const b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
        function inWords(num) {
            if (num === 0) return 'Zero';
            if (num < 20) return a[num];
            if (num < 100) return b[Math.floor(num / 10)] + (num % 10 ? ' ' + a[num % 10] : '');
            if (num < 1000) return a[Math.floor(num / 100)] + ' Hundred' + (num % 100 ? ' and ' + inWords(num % 100) : '');
            if (num < 100000) return inWords(Math.floor(num / 1000)) + ' Thousand' + (num % 1000 ? ' ' + inWords(num % 1000) : '');
            if (num < 10000000) return inWords(Math.floor(num / 100000)) + ' Lakh' + (num % 100000 ? ' ' + inWords(num % 100000) : '');
            return inWords(Math.floor(num / 10000000)) + ' Crore' + (num % 10000000 ? ' ' + inWords(num % 10000000) : '');
        }
        return inWords(num);
    }

    $(document).on('change', '.subject-checkbox', function () {
        let amount = 0;
        let total_amount = 0;
        const count = $('input[name="subject_id[]"]:checked').length;
        if(count>0){
            $('#amounts').show();
        }else{
            $('#amounts').hide();
        }
        amount = count * 200;
        if(count > 3){
            amount = amount - 100;
        }
        total_amount = amount.toFixed(2);
        $('#count').text('₹'+total_amount);

        let amountInWords = numberToWords(Math.floor(amount));
        $('#amount-in-words').text(amountInWords + ' Rupees Only');
        $('#amount-in-words2').val(total_amount);
    });
    // $(document).on('change', '.subject-checkbox', function () {
    //     const count = $('input[name="subject_id[]"]:checked').length;
    //     if(count > 0){
    //         $('#amounts').show();
    //     } else {
    //         $('#amounts').hide();
    //         $('#count').text('₹0.00');
    //         $('#amount-in-words').text('');
    //         return;
    //     }
    //     $.ajax({
    //         url: '{{ url("get-price") }}',
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function(response) {
    //             const pricePerSubject = parseFloat(response.price);
    //             let amount = count * pricePerSubject;
    //             if(count > 3){
    //                 amount = amount - 100;
    //             }
    //             const total_amount = amount.toFixed(2);
    //             $('#count').text('₹' + total_amount);
    //             const amountInWords = numberToWords(Math.floor(amount));
    //             $('#amount-in-words').text(amountInWords + ' Rupees Only');
    //         },
    //         error: function() {
    //             alert('Failed to fetch price.');
    //         }
    //     });
    // });


    $(document).on('change', '.subject-checkbox', function () {
        let selectedIds = $('input[name="subject_id[]"]:checked').map(function() {
            return $(this).val();
        }).get();
        if(selectedIds.length === 0) {
            $('#amounts').hide();
            $('#count').text('₹0.00');
            $('#amount-in-words').text('');
            $('#amount-in-words2').val('');
            return;
        }
        $('#amounts').show();
        $.ajax({
            url: '{{ url("get-price") }}',
            method: 'GET',
            data: { ids: selectedIds },
            dataType: 'json',
            success: function(response) {
                const amount = response.price;
                let finalAmount = amount;
                const total_amount = finalAmount.toFixed(2);
                $('#count').text('₹' + total_amount);
                const amountInWords = numberToWords(Math.floor(finalAmount));
                $('#amount-in-words').text(amountInWords + ' Rupees Only');
                $('#amount-in-words2').val(total_amount);
            },
            error: function() {
                alert('Failed to fetch price.');
            }
        });
    });
</script>
@endpush