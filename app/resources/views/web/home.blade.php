@extends('web.layouts.app')
@section('content')

<style>
    /* MODAL OVERLAY */
  .register-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 9999;
  }
  
  /* MODAL CONTENT */
  .register-modal-content {
    background: white;
    padding: 30px;
    
    width:100%; 
    border-radius: 10px;
    position: relative;
    text-align: center;
  }
  .bt{
    background-color: #FF5817;
      padding: 12px;
      border-radius: 8px;
      color: #fff !important; 
      font-family: Montserrat, sans-serif;
      font-size: 14px;
      font-style: normal;
      font-weight: 600;
      letter-spacing: 0.5px;
  }
  
  
  /* CLOSE BUTTON */
  .close-btn {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 30px;
    cursor: pointer;
  }
  
  /* Sample link style */
  .register-modal-content ul {
    list-style: none;
    padding: 0;
  }
  
  .register-modal-content li {
    margin: 15px 0;
  }
  
  .register-modal-content a {
    color:#ffffff;
    font-size: 18px;
    text-decoration: none;
  }
  
   
   
      .top-header {
        padding: 20px 0 10px;
        text-align: center;
      }
   
      .top-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: bold;
      }
   
      .top-header h1 span.blue {
        color: #004AAD;
      }
   
      .top-header h1 span.orange {
        color: #FF6C1A;
      }
   
      .top-header h1 span.gray {
        color: #555;
        font-size: 20px;
        display: block;
        margin-top: -6px;
        letter-spacing: 1px;
      }
   
      .split-container {
        display: flex;
        flex-wrap: wrap;
        min-height: calc(100vh - 140px);
      }
   
      .left-pane {
        flex: 1 1 50%;
        padding: 30px 30px 0px 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
      }
       .right-pane {
        flex: 1 1 50%;
        padding: 30px 30px 0px 30px;
        display: flex;
        flex-direction: column;
       align-items: center;
        justify-content: flex-start;
      }
   
      .left-pane {
        background:linear-gradient(to bottom, #FBFFF2, #F0FFEA);
      }
   
      .right-pane {
        background:linear-gradient(to bottom, #FFFBE9, #FFF1AF);
      }
   
      .left-pane h4,
      .right-pane h4 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        text-align: center;
      }
   
      .left-pane p,
      .right-pane p {
        text-align: center;
        font-size: 18px;
        color: #333;
        max-width: 400px;
      }
   
      .btn-student {
        background: #FF5B3D;
        color: #fff;
        font-weight: 600;
        padding: 10px 25px;
        margin-top: 5px;
        border: none;
        border-radius: 5px;
      }
   
      .btn-school {
        background: #0063F7;
        color: #fff;
        font-weight: 600;
        padding: 10px 25px;
        margin-top: 5px;
        border: none;
        border-radius: 5px;
      }
      .img-section{
          max-width: 400px;
      }
   
       .img-section img {
          max-width: 485px;  
          max-height: 368px;
          position: relative;
          top: 60px;
   
        }
   
        .right-pane img{
        max-width:720px;
        max-height:351px;
      }
       
      .footer1 {
        text-align: center;
        font-size: 13px;
        padding: 20px 0;
        color: #333;
        background:#ffffff;
      }
   
      .footer1 a {
        margin: 0 10px;
        color: #333 !important;
        text-decoration: none;
      }
   
      .footer1 a:hover {
        text-decoration: underline;
      }
   
      @media (max-width: 768px) {
   
        .top-header {
        padding: 10px 0 5px;
        text-align: center;
      }
      .img-section {
      max-width: 270px;
      max-height: 100px;
  
  }
     
      .left-pane h4,
      .right-pane h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        text-align: center;
      }
   
      .left-pane p,
      .right-pane p {
        text-align: center;
        font-size: 12px;
        color: #333;
        max-width: 400px;
      }
   
       .btn-student {
       
        padding: 5px 5px;
        font-size:12px !important;
       
      }
  
      .btn-school {  
        padding: 5px 5px;
        font-size:12px !important;
        margin-top: -20px;
      }
     
        .left-pane, .right-pane {
          flex: 1 1 100%;
          text-align: center;
          padding: 15px 20px 0px 20px;
        }
   
        .img-section img {
          margin-top: 50px;
          top: 0px;
          max-width: 350px !important;
          max-height: 218px !important;
        }
     
      .right-pane img{
        max-width: 394px !important;
        max-height: 110px !important;
      }
      }
       /* Buttons */
  .btn-student {
    background: #FF5B3D;
    color: #fff;
    font-weight: 600;
    border: none;
    border-radius: 5px;
  }
  .btn-school {
    background: #0063F7;
    color: #fff;
    font-weight: 600;
    border: none;
    border-radius: 5px;
  }
   
  /* Prevent hover & click color change */
  .btn-student:hover,
  .btn-student:focus,
  .btn-student:active {
    background: #FF5B3D !important;
    color: #fff !important;
  }
  .btn-school:hover,
  .btn-school:focus,
  .btn-school:active {
    background: #0063F7 !important;
    color: #fff !important;
  }
  .register-modal-content a {
    font-size:14px !important;
  }
   
  /* Large screens padding */
  @media (min-width: 1550px) {
    .left-pane,
    .right-pane {
      padding: 120px 30px 0px 30px !important;
    }
  }
  .register-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 9999;
  }
  
  /* MODAL CONTENT */
  .register-modal-content {
    background: white;
    padding: 30px; 
    width: 100%; 
    border-radius: 10px;
    position: relative;
    text-align: center;
    opacity: 0;
    transform: translateY(-30px);
    animation: fadeInSlideDown 0.4s ease forwards;
  }
  
  /* ANIMATION KEYFRAMES */
  @keyframes fadeInSlideDown {
    0% {
      opacity: 0;
      transform: translateY(-30px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  /* CLOSE BUTTON */
  .close-btn {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 30px;
    cursor: pointer;
  }
  
  /* List and Links Styling */
  .register-modal-content ul {
    list-style: none;
    padding: 0;
  }
  
  .register-modal-content li {
    margin: 15px 0;
  }
  
  .register-modal-content a {
    color: #fff;
    font-size: 18px;
    text-decoration: none;
  }
      /* Optional: Remove default modal max-width and make it full-width */
      .modal.full-width .modal-dialog {
      max-width: 100%;
      margin: 0;
    }

    .modal.full-width .modal-content {
      height: 100vh; /* Optional: full viewport height */
      border: none;
      border-radius: 0;
    }
</style>

    <section id="hero" class="hero section accent-background">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5 justify-content-between">
                <div class="col-lg-6 d-none d-md-block">
                    <img src="https://sparkolympiads.com/assets/img/grid/ladywoman.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 form-css">
                    <div class="registration-box text-left">
                        <h2 class="text-black">School Registration</h2>
                        <p>Fill in the school registration data. It will take a couple of minutes. All you need is a mobile number or a e-mail</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="contactForm" method="POST" action="{{ route('register.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label id="label" class="text-black">Mobile Number or Email ID</label>
                                <input type="text" id="mobile" name="mobileno" class="form-control" placeholder="Enter mobile number or email id" required autocomplete="off" />
                                <div id="mobile-error" class="text-danger small mt-1"></div>
                            </div>
                            <div id="otp-box" style="display:none; margin-top: 10px;">
                                <label for="otp" class="text-black">Enter OTP</label>
                                <input type="text" id="otp" name="otp" class="form-control" maxlength="6" placeholder="Enter 6-digit OTP" autocomplete="off">
                                <div id="otp-error" class="text-danger small mt-1"></div>
                            </div>
                            <div class="text-center mt-2 " style="display:none" id="show_counter"> 
                                <button type="button" id="resend-btn" class="btn btn-link" disabled>Resend OTP in <span id="countdown">30</span>s</button>
                                <div id="resend-status" class="text-success small mt-1"></div>
                            </div>
                            <div class="privacy-box">
                                 <i class="bi bi-exclamation-triangle-fill"></i>
                                <span class="text-black"><b>Note</b>:  This registration page is intended exclusively for school administrators only.
                                    Students are not permitted to register through this page. If you are a student, please contact your school and request registration link.</span>
                            </div>
                            <button type="submit" id="submit-btn" class="btn btn-primary" disabled>Submit</button>
                        </form>
                        <div class="footer-text text-black text-center">
                            Already have an account? <a href="{{ route('school-login') }}">LOGIN</a>
                        </div>
                       <div class="d-flex justify-content-center  mt-3" style="color:#000;">
                        
							<a href="/privacy-policy.php" class="text-muted mx-2 " style="text-decoration: underline; font-size:14px; font-weight:600">Privacy Policy</a> | 
							<a href="/terms-and-conditions.php" class="text-muted mx-2" style="text-decoration: underline; font-size:14px; font-weight:600">Terms &amp; Conditions</a>
						</div> 

                        <div class="copyright">
                            SPARK OLYMPIADS © 2025. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade full-width" id="pageLoadModal" tabindex="-1" aria-labelledby="pageLoadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- <div class="modal-header">
              {{-- <h5 class="modal-title" id="pageLoadModalLabel">Welcome!</h5> --}}
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">
                <div class="top-header">
                    <img src="https://sparkolympiads.com/assets/img/logo.svg" class="" alt="Logo">
                  </div>
                 
                  <!-- Split Layout -->
                  <div class="container-fluid">
                  <div class="row">
                 
                    <!-- Student Section -->
                    <div class="col-12 col-md-6 left-pane order-2 order-md-1 text-center">
                      <h4>Are you a student?</h4>
                      <p>
                        You can register as a student if your school is already in our records,
                        or you can ask your school to share the registration link with you. 
                      </p>
                      <a href="{{url('student-registration')}}" target="_blank" class="btn btn-student">
                        Register as a Student
                        <img src="/assets/img/webregister2/vector.png" alt="Student Icon" width="10" height="10" class="ms-2">
                      </a>
                      <div class="mt-4">
                        <img src="/assets/img/webregister2/grp.png" alt="School Logo" class="img-fluid img-section">
                      </div>
                    </div>
                  
                    <!-- School Section -->
                    <div class="col-12 col-md-6 right-pane order-1 order-md-2 text-center">
                      <h4>Are you a School Administrator?</h4>
                      <p>You can register your school with just a mobile number or an email address.</p>
                      <br><br/>
                      <a href="{{url('register-your-school')}}"  target="_blank"class="btn btn-school">
                        Register as a School
                        <img src="/assets/img/webregister2/vector.png" alt="Student Icon" width="10" height="10" class="ms-2">
                      </a>
                      <div class="mt-4">
                        <img src="/assets/img/webregister2/scho.png" alt="School Logo" class="img-fluid">
                      </div>
                    </div>
                   
                  </div>
                </div>
                 
                  <!-- Footer -->
                  <div class="footer1">
                    <a href="#">Privacy Policy</a> |
                    <a href="#">Terms & Conditions</a><br>
                    SPARK OLYMPIADS © 2015. All rights reserved.
                  </div>
                 
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> --}}
          </div>
        </div>
      </div>





@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
const otpInput = document.getElementById('otp');
const verifyBtn = document.getElementById('submit-btn');
otpInput.addEventListener('input', () => {
    const otp = otpInput.value.trim();
    if (/^\d{6}$/.test(otp)) {
        verifyBtn.disabled = false;
    } else {
        verifyBtn.disabled = true;
    }
});
document.getElementById('mobile').addEventListener('input', function () {
    const input = this.value.trim();
    const errorDiv = document.getElementById('mobile-error');
    const submitBtn = document.getElementById('submit-btn');

    const mobileRegex = /^[1-9][0-9]{9}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    errorDiv.innerText = '';
    submitBtn.disabled = true;

    $('#show_counter').hide();
    $('#otp-box').slideUp();
    $('#contactForm').attr('action', "{{ route('register.store') }}");
    $('#submit-btn').text('Submit');

    if (input === '') {
        errorDiv.innerText = 'Mobile or Email is required.';
    } else if (input.startsWith('+91')) {
        errorDiv.innerText = 'Remove +91. Enter 10-digit mobile only.';
    } else if (input.includes('@') && input.includes('.')) {
        if (emailRegex.test(input)) {
            submitBtn.disabled = false;
        } else {
            errorDiv.innerText = 'Please enter a valid email address.';
        }
    } else if (mobileRegex.test(input)) {
        submitBtn.disabled = false;
    } else {
        errorDiv.innerText = 'Enter a valid email or a 10-digit mobile number (not starting with 0)';
    }
});

$('#contactForm').on('submit', function(e) {
    e.preventDefault();
    $('#mobile-error').text('');
    $('#otp-error').text('');
    $('#submit-btn').prop('disabled', true).text('Submitting...');
    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        beforeSend: function () {
            showloader();
            startResendCountdown();
        },
        success: function(response) {
            if (response?.otp) {
                if (response?.route) {
                    $('#resend-status').text(response.message);
                    window.location.href = response.route;
                }else{
                    $('#submit-btn').text('Verify');
                    $('#resend-status').text(response.message);
                }
            }else{
                if(response.status==200){
                    $('#otp-box').slideDown();
                    $('#show_counter').show();
                    $('#submit-btn').text('Verify');
                    $('#contactForm').attr('action', "{{ route('otp.verify') }}");
                }else{
                    Swal.fire({
                    title: 'Already registered',
                    html: `
                        <p>${response.message}</p>
                        <a href="{{ route('school-login') }}" class="btn btn-primary mt-3">Proceed to Login</a>
                    `,
                    icon: 'error',
                    showConfirmButton: false, // Hide default "OK" button
                    });

                    $('#submit-btn').text('Submit').prop('disabled', false);
                }
            }
        },
        error: function(xhr) {
            $('#submit-btn').text('Submit').prop('disabled', false);
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                if (xhr.responseJSON.errors.mobileno) {
                    $('#mobile-error').text(xhr.responseJSON.errors.mobileno[0]);
                }
            } else {
                let response = xhr.responseJSON.errors;
                Swal.fire({
                    title: 'Validation Error!',
                    text: response,
                    icon: 'error',
                });
            }
        },
        complete: function () {
            hideloader()
        }
    });
});

let resendDuration = 20;
let resendInterval = null;
let otpTimer = null;

const countdownEl = document.getElementById('countdown');
const resendBtn = document.getElementById('resend-btn');
const resendStatus = document.getElementById('resend-status');

function startResendCountdown() {
    clearInterval(resendInterval);
    let timeLeft = resendDuration;
    resendBtn.disabled = true;
    countdownEl.textContent = timeLeft;

    resendInterval = setInterval(() => {
        timeLeft--;
        countdownEl.textContent = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(resendInterval);
            resendBtn.disabled = false;
            resendBtn.textContent = 'Resend OTP';
        }
    }, 1000);
}
startResendCountdown();

resendBtn.addEventListener('click', () => {
    resendBtn.disabled = true;
    resendBtn.textContent = 'Sending...';

    fetch("{{ route('otp.resend') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            validate_details: $('#mobile').val()
        })
    })
    .then(async res => {
        const contentType = res.headers.get('content-type') || '';
        if (!res.ok) throw new Error(await res.text());
        if (!contentType.includes('application/json')) throw new Error('Expected JSON');
        return res.json();
    })
    .then(data => {
        if (data.status === 200) {
            resendStatus.innerHTML = data.message;
            resendBtn.innerHTML = 'Resend OTP in <span id="countdown">' + resendDuration + '</span>s';
            const newCountdownEl = document.getElementById('countdown');
            clearInterval(resendInterval);
            let timeLeft = resendDuration;
            resendBtn.disabled = true;
            resendInterval = setInterval(() => {
                timeLeft--;
                newCountdownEl.textContent = timeLeft;
                if (timeLeft <= 0) {
                    clearInterval(resendInterval);
                    resendBtn.disabled = false;
                    resendBtn.textContent = 'Resend OTP';
                }
            }, 1000);
        } else {
            throw new Error(data.message || "Unexpected response.");
        }
    })
    .catch(err => {
        $('#submit-btn').text('Verify');
        console.error('Resend OTP error:', err);
        resendStatus.innerHTML = '<span class="text-danger">Failed to resend OTP.</span>';
        resendBtn.disabled = false;
        resendBtn.textContent = 'Resend OTP';
    });
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
    window.addEventListener('load', function () {
      const hasSeenModal = localStorage.getItem('modalShown');

      if (!hasSeenModal) {
        const modal = new bootstrap.Modal(document.getElementById('pageLoadModal'));
        modal.show();
        localStorage.setItem('modalShown', 'true'); // Set flag to prevent it from showing again
      }
    });
  </script>
@endpush
