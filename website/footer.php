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
          <img src="https://sparkolympiads.com/assets/img/Spark-Logo-footer_1.svg" class="img-fluid" alt="footer logo" style="width: 100px;"/>
        </div>
      </div>
      <hr>
      <div class="row gy-4">
        <div class="col-lg-3 col-md-12 footer-links">
            <h4>About Us</h4>
            <ul> 
            <li><a href="https://sparkolympiads.com/about-us/mission.php">Mission and Vision</a></li>
            <li><a href="https://sparkolympiads.com/international-steering-committee/g-balasubramanian.php">International Steering Commitee</a></li>
            <li><a href="https://sparkolympiads.com/executive-team/nitin-kapoor.php">Executive Team</a></li>
            <li><a href="https://sparkolympiads.com/about/edxso.php">EDXSO</a></li>
            <li><a href="https://sparkolympiads.com/about/prometric.php">Prometric</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-links">
            <h4>School Support</h4>
            <ul> 
            <li><a href="https://sparkolympiads.com/school-support/">Computer Lab Certification</a></li>
            <li><a href="https://sparkolympiads.com/app/register-your-school">Registration</a></li>
            <li><a href="/app/school-login">School Dashboard</a></li>
            <!-- <li><a href="#">Reports</a></li> -->
            <li><a href="https://sparkolympiads.com/school-support/awards-and-acolades.php">Award and Accolades</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-links">
          <h4>Test Prep Resources</h4>
          <ul> 
            <li><a href="https://sparkolympiads.com/competency-architecture/">Competency Architecture</a></li>
            <li><a href="https://sparkolympiads.com/spark-blueprint/">Spark Blueprint</a></li>
            <li><a href="https://sparkolympiads.com/sample-question/">Sample Questions</a></li>
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
        © <span>2025</span> 
        <strong class="px-1 sitename">SPARK Olympiads</strong> 
        <span>All Rights Reserved</span>
      </p>
      </div>
      <div class="text-right">
        <a href="/privacy-policy.php" target="_blank" class="footer-link ">Privacy Policy &nbsp;</a>||
        <a href="/terms-and-conditions.php" target="_blank" class="footer-link">Terms & Conditions</a>
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
                                  <a target="_blank" class="text-muted text-small text-decoration-underline" href="https://www.sparkolympiads.com/privacy-policy.php"><small>Privacy Policy</small></a>
                                  <a target="_blank" class="text-muted text-small text-decoration-underline" href="https://www.sparkolympiads.com/terms-and-conditions.php"><small>Terms & Conditions</small></a>
                              </div>

                              <div class="copyright text-black mt-3">
                                  SPARK OLYMPIADS © 2025. All rights reserved.
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
  <script src="https://sparkolympiads.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://sparkolympiads.com/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://sparkolympiads.com/assets/vendor/aos/aos.js"></script>
  <script src="https://sparkolympiads.com/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="https://sparkolympiads.com/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://sparkolympiads.com/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="https://sparkolympiads.com/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="https://sparkolympiads.com/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="https://sparkolympiads.com/assets/js/main.js"></script>
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
    const countdownEl = document.getElementById('countdown'); // ✅ Re-fetch dynamically

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