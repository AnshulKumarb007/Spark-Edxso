@extends('web.layouts.app')
@section('content')
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="{{asset('admin/fonts/fontawesome/css/fontawesome-all.min.css')}}">
	<!-- animation css -->
	<link rel="stylesheet" href="{{asset('admin/plugins/animation/css/animate.min.css')}}">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

	<style>
		.notification {
			position: fixed;
			top: 20px;
			right: 20px;
			background-color: #d4edda;
			color: #155724;
			padding: 15px 20px;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			font-family: sans-serif;
			font-size: 16px;
			opacity: 0;
			transform: translateX(100%);
			transition: all 0.5s ease;
			z-index: 9999;
		}

		.notification.show {
			opacity: 1;
			transform: translateX(0);
		}

		.school-logo {
			width: 50px;
			height: 50px;
		}


		.notification-error {
			position: fixed;
			top: 20px;
			right: 20px;
			background-color: red;
			color: #fff;
			padding: 15px 20px;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			font-family: sans-serif;
			font-size: 16px;
			opacity: 0;
			transform: translateX(100%);
			transition: all 0.5s ease;
			z-index: 9999;
		}

		.notification-error.show {
			opacity: 1;
			transform: translateX(0);
		}
		.school-login-bg {
				background: linear-gradient(101deg, #004AAD 42.83%, #001E47 100%) !important;
			}
			.auth-wrapper .auth-content img {
    border-radius: 0;
}
	</style>


</head>

@php $code = request('code'); @endphp
<body class="school-login-bg">
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="" style=" border-radius: 15px;">
			<div class="row my-5" style="padding: 33px 38px 32px 39px;">
				<div class="col-md-6 d-none d-md-block">
					
					<img src="{{ asset('assets/img/grid/ladywoman.png')}}" alt="" class="img-fluid">
					
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">

							<!-- <a href="/"><img src="{{ asset('web/logo.svg') }}" alt="" class="img-fluid mb-4"></a> -->
							<h2 class="mb-3 f-w-400">School Login</h2>
							<p class="p-font">Fill in the school login details. Login details send you on your registered email or mobile number</p>
							<form method="POST" action="{{ url('school-login') }}">
								@csrf

								<div class="form-group mb-3">
									<label for="school_id" class="font-weight-bold">Your School Registration ID</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text"><i class="feather icon-user"></i></span>
										</div>
										<input type="text" id="school_id" name="school_id" value="{{ $code ?? '' }}" class="form-control" placeholder="Enter School registration id">
										</div>
									</div>

									<x-input-error :messages="$errors->get('school_id')" class="mt-2 text-danger" />	

								  <div class="form-group mb-3 position-relative">
									<label for="loginPassword" class="font-weight-bold">Password</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text"><i class="feather icon-lock"></i></span>
										</div>
										<input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter password">
										<button type="button" class="btn btn-outline-secondary" id="togglePassword" style="position: absolute; right: 10px; top: 22px; transform: translateY(-50%); z-index: 5; height: 38px; border: 0px;">
										👁️
										</button>
										</div>
									</div>

								<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />

								<div class="text-right mt-1">
										<a href="#" class="text-primary" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</a>
									</div>
									<div class="alert alert-light border d-flex align-items-center mt-3 mb-4" role="alert" style="font-size: 13px; background-color: #F0F2F4;">
										<i class="feather icon-lock mr-2"></i>
										We take privacy issues seriously. You can be sure that your personal data is securely protected.
									</div>
								<button type="submit" class="btn btn-primary mb-4 btn-block">Login</button>

								
							</form>
								<p class="mt-4 text-center">
										Don’t have an account? <a href="{{ url('register-your-school')}}" class="text-primary font-weight-bold">Register Now</a>
									</p>

									 <div class="d-flex justify-content-center  mt-3">
										<a href="/privacy-policy.php" class="text-muted mx-2 " style="text-decoration: underline;">Privacy Policy</a> | 
										<a href="/terms-and-conditions.php" class="text-muted mx-2" style="text-decoration: underline;">Terms & Conditions</a>
										</div>
										<p class="text-muted mt-3 mb-0 text-center">SPARK OLYMPIADS © 2025. All rights reserved.</p>
							<!-- <p class="mb-2 text-muted">
								Forgot password? <a href="#" class="f-w-400" data-toggle="modal" data-target="#forgotPasswordModal">Click here</a>
							</p> -->

						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
</div>
<!-- [ auth-signin ] end -->
<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form id="forgotPasswordForm">
			<div class="modal-content">
				
				<div class="modal-header">
					
					<h5 class="modal-title" id="forgotPasswordLabel">Forgot Password</h5>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span>&times;</span>
					</button>
					
				</div>
				
				<div class="modal-body">
					<div id="step1">
						<label for="recoveryInput">Enter your registered Email or Mobile</label>
						<input type="text" name="recovery_input" value="{{session('user_details');}}" placeholder="Enter your registered Email or Mobile" id="recoveryInput" class="form-control" required>
					</div>

					<div id="step2" style="display: none;">
						<label for="otpInput">Enter OTP</label>
						<input type="text" id="otpInput" placeholder="Please enter OTP" class="form-control" maxlength="6">
						<div class="mt-2">
							<span id="resendText">Resend OTP in <span id="timer">60</span> sec</span>
							<button type="button" id="resendOtpBtn" style="display: none;" class="btn btn-link p-0">Resend OTP</button>
						</div>
					</div>

					<div id="recoveryError" class="text-danger mt-2" style="display: none;"></div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="sendOtpBtn">Send OTP</button>
					<button type="button" class="btn btn-success" id="verifyOtpBtn" style="display: none;">Verify OTP</button>
				</div>
			</div>
		</form>
	</div>
</div>


<div class="modal fade" id="resetPasswordModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Reset Password</h5>
			</div>
			<div class="modal-body">
				<form id="resetPasswordForm" action="{{route('school.forget.reset.password')}}" method="POST">
					@csrf
					<div class="form-group position-relative">
						<label for="password">New Password</label>
						<div class="input-group">
							<input type="password" name="password" id="password" class="form-control" required>
							<span class="input-group-text toggle-password" data-target="#password" style="cursor:pointer;">
								👁️
							</span>
						</div>
					</div>

					<div class="form-group position-relative mt-3">
						<label for="password_confirmation">Confirm Password</label>
						<div class="input-group">
							<input type="password" name="password_confirmation" id="confirm_password" class="form-control" required>
							<span class="input-group-text toggle-password" data-target="#confirm_password" style="cursor:pointer;">
								👁️
							</span>
						</div>
						<small id="passwordMatchMsg" class="form-text"></small>
					</div>

					<button type="submit" class="btn btn-primary mt-3" id="submitBtn" disabled>Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

<!-- Required Js -->
<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Bootstrap JS (requires Popper.js too) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>




<script>
	let timerInterval;

	function startResendTimer() {
		let timeLeft = 60;
		$('#resendOtpBtn').hide();
		$('#resendText').show();
		$('#timer').text(timeLeft);

		timerInterval = setInterval(() => {
			timeLeft--;
			$('#timer').text(timeLeft);
			if (timeLeft <= 0) {
				clearInterval(timerInterval);
				$('#resendText').hide();
				$('#resendOtpBtn').show();
				//$('#verifyOtpBtn').prop('disabled', true); // Disable button when timer ends
			}
		}, 1000);
	}

	$(document).ready(function() {
		// Submit recovery input (email/phone)
		$('#forgotPasswordForm').on('submit', function(e) {
			e.preventDefault();

			let recoveryInput = $('#recoveryInput').val();
			$('#recoveryError').hide().text('');

			$.ajax({
				url: "{{ route('school.forget.send.otp') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					mobileno: recoveryInput
				},
				success: function(response) {
					$('#step1').hide();
					$('#sendOtpBtn').hide();

					$('#step2').show();
					$('#verifyOtpBtn').show();
					startResendTimer();
				},
				error: function(xhr) {
					let errorMessage = "Something went wrong.";

					if (xhr.status === 404) {
						errorMessage = xhr.responseJSON.message || "Account not found.";
					} else if (xhr.responseJSON && xhr.responseJSON.message) {
						errorMessage = xhr.responseJSON.message;
					}

					$('#recoveryError').text(errorMessage).show();
				}
			});
		});


		// Resend OTP
		$('#resendOtpBtn').on('click', function() {
			const recoveryInput = $('#recoveryInput').val();
			$('#recoveryError').hide();

			$.ajax({
				url: "{{ route('school.forget.send.otp') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					mobileno: recoveryInput
				},
				success: function() {
					startResendTimer();
				},
				error: function(xhr) {
					let errorMessage = "Could not resend OTP.";
					if (xhr.responseJSON && xhr.responseJSON.message) {
						errorMessage = xhr.responseJSON.message;
					}
					$('#recoveryError').text(errorMessage).show();
				}
			});
		});

		// Verify OTP
		$('#verifyOtpBtn').on('click', function() {
			const recoveryInput = $('#recoveryInput').val();
			const otp = $('#otpInput').val();

			$.ajax({
				url: "{{ route('school.forget.verify.otp') }}",
				method: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					recovery_input: recoveryInput,
					otp: otp
				},
				success: function(response) {
					// Store a flag in sessionStorage before refresh
					sessionStorage.setItem('showResetModal', 'true');
					// Refresh the page
					location.reload();
				},
				error: function(xhr) {
					let errorMessage = "Invalid OTP.";
					if (xhr.responseJSON && xhr.responseJSON.message) {
						errorMessage = xhr.responseJSON.message;
					}
					$('#recoveryError').text(errorMessage).show();
				}
			});

		});

	});


	$(document).ready(function() {
		if (sessionStorage.getItem('showResetModal') === 'true') {
			sessionStorage.removeItem('showResetModal');
			$('#resetPasswordModal').modal('show');
		}
	});
</script>





<script>
	document.addEventListener('DOMContentLoaded', function() {
		const togglePassword = document.getElementById('togglePassword');
		const passwordInput = document.getElementById('loginPassword');

		togglePassword.addEventListener('click', function() {
			const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
			passwordInput.setAttribute('type', type);

			// Optional: Change icon/text
			this.textContent = type === 'password' ? '👁️' : '🙈';
		});
	});
</script>




<script>
	$(document).ready(function() {

		// Show reset modal if flagged
		if (sessionStorage.getItem('showResetModal') === 'true') {
			sessionStorage.removeItem('showResetModal');
			$('#resetPasswordModal').modal('show');
		}

		// Toggle password visibility
		$('.toggle-password').on('click', function() {
			const targetInput = $($(this).data('target'));
			const type = targetInput.attr('type') === 'password' ? 'text' : 'password';
			targetInput.attr('type', type);
		});

		// Password match check
		$('#password, #confirm_password').on('keyup', function() {
			const password = $('#password').val();
			const confirmPassword = $('#confirm_password').val();
			const message = $('#passwordMatchMsg');
			const submitBtn = $('#submitBtn');

			if (password === '' || confirmPassword === '') {
				message.text('').removeClass('text-success text-danger');
				submitBtn.prop('disabled', true);
				return;
			}

			if (password === confirmPassword) {
				message.text('Passwords match.').removeClass('text-danger').addClass('text-success');
				submitBtn.prop('disabled', false);
			} else {
				message.text('Passwords do not match.').removeClass('text-success').addClass('text-danger');
				submitBtn.prop('disabled', true);
			}
		});
	});
</script>


</body>

</html>




@if(session('success'))
<div id="successPopup" class="notification">
	✅ {{ session('success') }}
</div>
@endif

@if(session('error'))
<div id="successPopup" class="notification-error">
	❌ {{ session('error') }}
</div>
@endif
<script>
	window.onload = function() {
		const popup = document.getElementById("successPopup");
		popup.classList.add("show");

		// Auto-hide after 3 seconds (optional)
		setTimeout(() => {
			popup.classList.remove("show");
		}, 3000);
	};
</script>