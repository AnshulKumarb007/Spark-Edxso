<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>India�s First Fully Online Olympiad</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body class="index-page">
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-P391P4SVNX"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-P391P4SVNX'); </script>




  <header id="header" class="header fixed-top">

    <!--<div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div> End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="order-2 order-md-1 logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
           <img src="{{asset('assets/img/logo.svg')}}" alt=""> 
        </a>

        <nav id="navmenu" class="navmenu order-1 order-md-2">

          <ul>
            <!--<li><a href="#hero" class="active">Home<br></a></li>-->
             <li class="dropdown"><a><span>About Us</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <!--<li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                    <li><a href="#">Deep Dropdown 3</a></li>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                  </ul>
                </li>-->
                <li><a href="{{url('about-us/mission')}}">Mission and Vision</a></li>
                <li><a href="{{url('global-mentors')}}">International Steering Committee</a></li>
                 <li><a href="{{url('executive-team/nitin-kapoor')}}">Executive Team</a></li>
                <li><a href="{{url('about-us/edxso')}}">EDXSO</a></li>
                <li><a href="{{url('about-us/prometric')}}">Prometric</a></li>
              </ul>
            </li>
            <li><a href="{{url('mentors')}}">Global Mentors</a></li>
             <li class="dropdown"><a><span>School Support</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
            <li><a href="{{url('school-support/computer-lab-certification')}}">Computer Lab Certification</a></li>
                <li><a href="{{url('register-your-schoo')}}app/register-your-school">Registration</a></li>
                <li><a href="{{url('school-dashboard')}}">School Dashboard</a></li>
                 <!-- <li><a href="#">Reports</a></li> -->
                 <li><a href="{{url('school-support/awards-and-acolades')}}">Award and Accolades</a></li>
              </ul>
            </li>
              <li class="dropdown"><a><span>Test Prep Resources</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
               <li><a href="{{url('competency-architecture')}}/">Competency Architecture</a></li>
               <li><a href="{{url('spark-blueprint')}}">Spark Blueprint</a></li>
                <li><a href="{{url('sample-question')}}">Sample Questions</a></li>

              </ul>
            </li>
            <li><a href="{{url('school-login')}}">Login</a></li>
          
          </ul>
          
          <i class="mobile-nav-toggle d-xl-none bi bi-list ordre-last">Menu</i>


        </nav>
          <div class="order-3 order-md-3 header-button-registration d-block d-md-none">
                <a href="{{url('register-your-school')}}" class="btn-get-started">Register</a>
            </div>
        
          <div class="order-3 d-flex header-button-container">
              <a href="tel:8447477275" class="mobile-number-header  d-flex align-items-center"><img src="assets/img/call-user.svg" class="mobile-numbericon-header" alt=""> <span>+91 84474 77275</span></a>
              <a href="{{url('register-your-school')}}" class="button-header-registration-top-header-button btn-get-started">Register Your School</a>
            </div>


      </div>

    </div>

  </header>
    <main class="main">




@yield('content')






</main>
<style>
  .registration-box {
  background: #fff;
  border-radius: 15px;
  padding: 30px;

  width: 100%;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
}

.registration-box h2 {
  font-weight: 700;
  font-size: 24px;
}

.registration-box p {
  color: #666;
  font-size: 14px;
  margin-bottom: 20px;
}

.registration-box input {
  height: 45px;
}

.privacy-box {
  background: #f0f2f5;
  padding: 10px 15px;
  font-size: 13px;
  border-radius: 5px;
  margin-top: 10px;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
}
  </style>
   <footer id="footer" class="footer accent-background">
    <div class="container footer-top">
      <div class="row">
        <div class="">
          <img src="{{asset('assets/img/Spark-Logo-footer_1.svg')}}" class="img-fluid" alt="footer logo" style="width: 100px;"/>
        </div>
      </div>
      <hr>
      <div class="row gy-4">
        <div class="col-lg-3 col-md-12 footer-links">
            <h4>About Us</h4>
            <ul> 
            <li><a href="{{url('about-us/mission')}}">Mission and Vision</a></li>
            <li><a href="{{url('international-steering-committee/g-balasubramanian')}}">International Steering Commitee</a></li>
            <li><a href="{{url('executive-team/nitin-kapoor')}}">Executive Team</a></li>
            <li><a href="{{url('about/edxso')}}">EDXSO</a></li>
            <li><a href="{{url('about/prometric')}}">Prometric</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-links">
            <h4>School Support</h4>
            <ul> 
            <li><a href="{{url('school-support')}}">Computer Lab Certification</a></li>
            <li><a href="{{url('app/register-your-school')}}">Registration</a></li>
            <li><a href="{{url('app/school-login')}}">School Dashboard</a></li>
            <!-- <li><a href="#">Reports</a></li> -->
            <li><a href="{{url('school-support/awards-and-acolades')}}">Award and Accolades</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-links">
          <h4>Test Prep Resources</h4>
          <ul> 
            <li><a href="{{url('competency-architecture')}}">Competency Architecture</a></li>
            <li><a href="{{url('spark-blueprint')}}">Spark Blueprint</a></li>
            <li><a href="{{url('sample-question')}}">Sample Questions</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-links">
          <h4>Contact Info</h4>
          <ul>
           <li><a href="mailto:info@sparkolympiads.com">info@sparkolympiads.com</a></li>
            <li><a href="tel:+918447477275">+91 8447477275</a></li>
            </ul>
            <!-- <p>Email:info@sparkolympiads.com</p>
            <p>Call:+91 8447477275</p> -->

        </div>

        

      </div>
      <hr>
    </div>
 
<div class="container py-3">
    <div class="row">
      <div class="d-flex justify-content-between align-items-center flex-wrap px-4">
      <div class="text-left">
        <p class="mb-0">
        � <span>2025</span> 
        <strong class="px-1 sitename">SPARK Olympiads</strong> 
        <span>All Rights Reserved</span>
      </p>
      </div>
      <div class="text-right">
        <a href="{{url('privacy-policy')}}" target="_blank" class="footer-link ">Privacy Policy &nbsp;</a>||
        <a href="{{url('terms-and-conditions')}}" target="_blank" class="footer-link">Terms & Conditions</a>
      </div>
    </div>
    </div>
  </div>
</footer>

<style>

  /* Add this to your custom stylesheet or inside <style> tag */
 
.modal-body{
  padding:0px;
}
</style>

<div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="nameModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background:none">
      <!-- <form id="nameForm" method="get"> -->
      <div class="modal-header" style="background: linear-gradient(101deg, #004AAD 42.83%, #001E47 100%);border:none">
           
           
         </div>
        <div class="modal-body">
       
        <section id="hero" class="hero section accent-background" style="padding:10px">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5 justify-content-between">
                 

                <div class="col-lg-12 form-css">
                    <div class="registration-box text-left">
                        <h2 class="text-black">One Step School Registration</h2>
                        <p>Enter your full name and mobile number or email id for one step registration. We will connect you with our support executive.</p>
                       
                        <form id="contactForm" method="POST" action="submit.php">
                                @csrf
                                <div class="mb-3">
                                    <label class="text-black">Your Full Name</label>             
                                    <input type="text" name="model_name" class="form-control" placeholder="Enter your full name" 
                                        pattern="[A-Za-z\s]+" title="Only letters are allowed" required autocomplete="off" />
                                </div>

                                <div class="mb-3">
                                    <label class="text-black">Mobile Or Email</label>
                                    <input type="text" id="mobile" name="mobileno" class="form-control" placeholder="Enter mobile number or email id" required autocomplete="off" />
                                    <div id="mobile-error" class="text-danger small mt-1"></div> 
                                </div>

                                <div id="otp-box" style="display:none; margin-top: 10px;">
                                    <label class="text-black">Enter OTP</label>
                                    <input type="text" id="otp" name="otp" class="form-control" maxlength="6" placeholder="Enter 6-digit OTP" autocomplete="off">
                                    <div id="otp-error" class="text-danger small mt-1"></div>
                                </div>

                                <div class="text-center mt-2" style="display:none" id="show_counter"> 
                                    <button type="button" id="resend-btn" class="btn btn-link" disabled>Resend OTP in <span id="countdown">30</span>s</button>
                                    <div id="resend-status" class="text-success small mt-1"></div>
                                </div>

                                <div class="privacy-box">
                                    <i class="bi bi-lock-fill" style="color:#747474"></i>
                                    <span class="text-black">We take privacy issues seriously. Your personal data is securely protected.</span>
                                </div>

                                <button type="submit" id="submit-btn" class="btn btn-primary" disabled style="width:100%">Submit</button>
</form>
<div class="footer-text text-black text-center mt-3">
                            Already have an account? <a href="/app/school-login?video_confrensh=1" style="color:#0056b3">LOGIN</a>
                          </div>
                              <div class="d-flex justify-content-evenly mt-3">
                                  <a target="_blank" class="text-muted text-small text-decoration-underline" href="{{url('privacy-policy')}}"><small>Privacy Policy</small></a>
                                  <a target="_blank" class="text-muted text-small text-decoration-underline" href="{{url('terms-and-conditions')}}"><small>Terms & Conditions</small></a>
                              </div>

                              <div class="copyright text-black mt-3">
                                  SPARK OLYMPIADS � 2025. All rights reserved.
                              </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

                </div>
                   <div class="modal-footer" style="background: linear-gradient(101deg, #004AAD 42.83%, #001E47 100%);border:none">
                    <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close" style="width:100%;">Close</button>
                  </div>
      <!-- </form> -->
    </div>
  </div>
</div>
<style>

.chat-button {
  position: fixed;
  right: 20px;
  bottom: 80px; /* slightly above the scroll-top button */
  background-color: #007bff;
  color: #fff;
  padding: 10px 16px;
  border-radius: 30px;
  text-decoration: none;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  font-weight: 500;
  z-index: 9999;
  transition: background-color 0.3s ease;
}
.chat-button:hover {
  background-color: #0056b3;
  color: #fff;
}
</style> 
<a href="#" class="chat-button d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#nameModal">
  <i class="bi bi-chat-dots" style="font-size: 20px; margin-right: 5px;"></i> One Step Registration
</a>

 

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  $('#nameForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: "https://sparkolympiads.com/app/api/meeting",
      type: 'GET',
      data: $(this).serialize(),
      success: function(response) {
        if(response.status==200){
          Swal.fire({
            title: 'Success!',
            text: response.message,
            icon: 'success',
          });
          window.location.href = response.data;
        }else{
          Swal.fire({
            title: 'Error!',
            text: response.message,
            icon: 'error',
          });
        }
        $('#nameModal').modal('hide');
      },
      error: function() {
        Swal.fire({
          title: 'Error!',
          text: 'Oops! Something went wrong.',
          icon: 'error',
        });
      }
    });
  });
  </script>




 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 
const otpInput = document.getElementById('otp');
const verifyBtn = document.getElementById('submit-btn');
const mobileInput = document.getElementById('mobile');
const mobileError = document.getElementById('mobile-error');
const otpError = document.getElementById('otp-error');
const otpBox = document.getElementById('otp-box');
const resendBtn = document.getElementById('resend-btn');
const resendStatus = document.getElementById('resend-status');
const countdownEl = document.getElementById('countdown');
const showCounter = document.getElementById('show_counter');
const contactForm = document.getElementById('contactForm');

const resendDuration = 30;
let resendInterval = null;

// Enable submit if OTP is 6 digits
otpInput.addEventListener('input', () => {
    verifyBtn.disabled = !/^\d{6}$/.test(otpInput.value.trim());
});

// Validate mobile/email input
mobileInput.addEventListener('input', function () {
    const input = this.value.trim();
    mobileError.textContent = '';
    verifyBtn.disabled = true;

    otpBox.style.display = 'none';
    showCounter.style.display = 'none';
    contactForm.setAttribute('action', "submit.php");
    verifyBtn.textContent = 'Submit';

    const mobileRegex = /^[1-9][0-9]{9}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    if (!input) {
        mobileError.textContent = 'Mobile or Email is required.';
    } else if (input.startsWith('+91')) {
        mobileError.textContent = 'Remove +91. Enter 10-digit mobile only.';
    } else if (emailRegex.test(input)) {
        verifyBtn.disabled = false;
    } else if (mobileRegex.test(input)) {
        verifyBtn.disabled = false;
    } else {
        mobileError.textContent = 'Enter a valid email or a 10-digit mobile number (not starting with 0)';
    }
});

// Handle form submission via AJAX
$('#contactForm').on('submit', function(e) {
    e.preventDefault();
    mobileError.textContent = '';
    otpError.textContent = '';
    verifyBtn.disabled = true;
    verifyBtn.textContent = 'Submitting...';

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        beforeSend: function () {
            showloader();
        },
        success: function(response) {
            if (response?.otp) {
                if (response.route) {
                    sessionStorage.setItem('meeting_url', response.meeting_url); 
                    window.location.href = response.route;
                } else {
                    verifyBtn.textContent = 'Verify';
                    resendStatus.textContent = response.message;
                }
            } else if (response.status === 200) {
                 if(response.meeting_url){
               //   sessionStorage.setItem('meeting_url', response.meeting_url); 
                  // Redirect to the school.create page
                  window.location.href = response.route;
                 }
                  
                otpBox.style.display = 'block';
                showCounter.style.display = 'block';
                verifyBtn.textContent = 'Verify';
                contactForm.setAttribute('action', "actionverify_otp.php");
                startResendCountdown();
            } else {
                Swal.fire({  
                    title: 'Already registered',
                    html: `
                        <p>${response.message}</p>
                        <a href="/app/school-login?video_confrensh=1" class="btn btn-primary mt-3">Proceed to Login</a>
                    `,
                    icon: 'error',
                    showConfirmButton: false
                });
                verifyBtn.textContent = 'Submit';
                verifyBtn.disabled = false;
            }
        },
        error: function(xhr) {
            verifyBtn.textContent = 'Submit';
            verifyBtn.disabled = false;
            if (xhr.responseJSON?.errors?.mobileno) {
                mobileError.textContent = xhr.responseJSON.errors.mobileno[0];
            } else {
                Swal.fire({
                    title: 'Validation Error!',
                    text: xhr.responseJSON?.message || 'An error occurred.',
                    icon: 'error'
                });
            }
        },
        complete: function () {
            hideloader();
        }
    });
});

function startResendCountdown() {
    clearInterval(resendInterval);
    let timeLeft = resendDuration;
    const countdownEl = document.getElementById('countdown'); // ? Re-fetch dynamically

    resendBtn.disabled = true;
    if (countdownEl) countdownEl.textContent = timeLeft;

    resendInterval = setInterval(() => {
        timeLeft--;
        if (countdownEl) countdownEl.textContent = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(resendInterval);
            resendBtn.disabled = false;
            resendBtn.textContent = 'Resend OTP';
        }
    }, 1000);
}

resendBtn.addEventListener('click', () => {
    resendBtn.disabled = true;
    resendBtn.textContent = 'Sending...';

    fetch("actionresent_otp.php", {
        method: "POST",
        headers: {
           'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
          mobileno: mobileInput.value.trim()
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 200) {
            resendStatus.innerHTML = data.message;
            resendBtn.innerHTML = 'Resend OTP in <span id="countdown">' + resendDuration + '</span>s';
            countdownEll = document.getElementById('countdown');
            startResendCountdown();
        } else {
            throw new Error(data.message || "Unexpected response.");
        }
    })
    .catch(err => {
        console.error('Resend OTP error:', err);
        resendStatus.innerHTML = '<span class="text-danger">Failed to resend OTP.</span>';
        resendBtn.disabled = false;
        resendBtn.textContent = 'Resend OTP';
    });
});

// Loader handlers
function showloader() {
    const preloader = document.querySelector('#preloader');
    if (preloader) preloader.style.display = 'flex';
}
function hideloader() {
    const preloader = document.querySelector('#preloader');
    if (preloader) preloader.style.display = 'none';
}
</script>
 

</body>
</html>

    


<!-- <script>
function createMeeting() {
  fetch("https://sparkolympiads.com/create_meeting.php", {
    method: "POST"
  })
  .then(res => res.json())
  .then(data => {
    console.log("Meeting created:", data);
    alert("Meeting ID: " + data.meeting_id);
  })
  .catch(err => {
    console.error("Error:", err);
    alert("Failed to create meeting");
  });
}
</script> -->