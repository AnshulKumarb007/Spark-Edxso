<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    @if(!empty($school_details->school_name))
        <title>{{ $school_details->school_name }}</title>
    @else
        <title>India’s First Fully Online Olympiad</title>
    @endif

    <meta name="description" content="SPARK Olympiads aim to transform how student achievement is measured by providing secure, competency-based, and insightful assessments—delivered fully online, powered by global best practices, and designed to empower students, teachers, and schools through meaningful recognition and actionable feedback.">
    @if(!empty($school_details->school_name))
        <meta name="keywords" content="{{ $school_details->school_name }}">
    @else
        <meta name="keywords" content="SPARK Olympiads,Olympiad,students,teachers">
    @endif
    <!-- Favicons -->
    <link href="{{ asset('web/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('web/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/css/main.css') }}?deep_roys" rel="stylesheet">

	<style>
		.flipped-image {
        transform: scaleX(-1);
    }
	.my-5 {
    margin-top: 6rem !important;
    margin-bottom: 3rem !important;
}
.auth-wrapper .auth-content img {
    border-radius: 0;
}
.ff{
	font-size: 14px;
	font-family: 'Montserrat';
}
	</style>
</head>

<body>
    <header id="header" class="header fixed-top">
        <div class="branding d-flex align-items-cente">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="https://sparkolympiads.com/" class="logo d-flex text-center" style="text-decoration: none;color:#004aad;">
                    @if(!empty($sd->image))
                        <img src="{{ asset($sd->image) }}" alt="" class="img-fluid logo_img  text-center">
                        <h2>{{ $school_details->school_name }}</h2>
                    @else
                        <img src="{{ asset('web/assets/img/logo.svg') }}" alt="" class="logo_img text-center">
                    @endif
                </a>
               
                <nav id="navmenu" class="navmenu">
                    <ul></ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="auth-wrapper" style="background: linear-gradient(101deg, #004AAD 42.83%, #001E47 100%) !important;">
	<div class="auth-content container">
		<div class="">
			<div class="row align-items-center">
				<div class="col-md-6 d-none d-md-block my-5">
					<img src="{{asset('https://sparkolympiads.com/assets/img/hero-img.png')}}" alt="" class="img-fluid flipped-image">
					
				</div>
				
				<div class="col-md-6 form-css">
                   <div class="registration-box">
					 @yield('content')
				   </div>
				</div>
			
			</div>
		</div>
	</div>
</div>
    </main>
    <footer id="footer" class="footer accent-background">
        <div class="container footer-top">
            <div class="row">
                <div class="">
                    <img src="https://sparkolympiads.com/assets/img/Spark-Logo-footer_1.svg" class="img-fluid" alt="footer logo" style="width: 100px;" />
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
                        <a href="/privacy-policy.php" target="_blank" class="footer-link">Privacy Policy &nbsp;</a>||
                        <a href="/terms-and-conditions.php" target="_blank" class="footer-link">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('web/assets/js/main.js') }}?xxx"></script>
	
	<script>
    $(document).ready(function() {
        $('#school_name').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: '{{ route('schools.autocomplete') }}',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#schoolList').html(data).show();
                    }
                });
            } else {
                $('#schoolList').hide();
            }
        });
        $(document).on('click', '.school-suggestion', function() {
            $('#school_name').val($(this).text());
            $('#schoolList').fadeOut();
        });
        $(document).click(function(e) {
            if (!$(e.target).closest('#school_name, #schoolList').length) {
                $('#schoolList').fadeOut();
            }
        });
    });
</script>
    <script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
    });
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
    });
    </script>
    <script>
    document.getElementById('otp_check').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0 && value.charAt(0) === '0') {
            value = value.slice(1);
        }
        e.target.value = value.slice(0, 6);
    });
    </script>
    @stack('scripts')

</body>
</html>