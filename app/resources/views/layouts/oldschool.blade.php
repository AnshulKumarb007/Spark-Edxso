<!DOCTYPE html>
<html lang="en">

<head>

	<title>India’s First Fully Online Olympiad</title>
 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Spark Admin" />
	<meta name="keywords"
		content="Spark Admin">
	<meta name="author" content="Codedthemes" />

	<!-- Favicon icon -->
	<link href="{{ asset('web/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
 	<!-- fontawesome icon -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- animation css -->
	<link rel="stylesheet" href="{{asset('admin/plugins/animation/css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/intro.css')}}">	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z2V76S6WMH"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-Z2V76S6WMH'); </script>
 


	<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
	<style>
	.introjs-tooltip{
		left: 31px !important;
		position: absolute;
		top: 0 !important;
	}
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
	.school-logo{
			width:50px;
			height:50px;
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

	.table-controls {
  position: sticky;
  top: 0;
  z-index: 10;
  background: white;
  padding: 10px 0; 
}

.table-wrapper {
  max-height: 400px; /* matches scrollY */
  overflow-y: auto;
}
  </style>
</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<!-- <div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div> -->
	<!-- [ Pre-loader ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
		<div class="navbar-wrapper ">
			<div class="navbar-brand header-logo">
				<a href="{{route('school.dashboard')}}" class="b-brand">
					<img src="{{asset('web/logo.svg')}}" alt="" class="logo images"> 
				</a>
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			</div>
			<div class="navbar-content scroll-div">
				<ul class="nav pcoded-inner-navbar">
					
					<li class="nav-item {{ request()->routeIs('school.dashboard') ? 'active' : '' }}">
						<a href="{{route('school.dashboard')}}" class="nav-link"><span class="pcoded-micon "><i class="fas fa-tachometer-alt"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
				 
					{{-- <li class="nav-item {{ request()->routeIs('school.profile') ? 'active' : '' }}">
						<a href="{{route('school.profile')}}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-school"></i></span><span class="pcoded-mtext">School Profile</span></a>
					</li> --}}

					
					<li class="nav-item">
						<a href="{{route('technical.assesment')}}" class="nav-link" data-title="SPARK Lab Certification" data-intro="Learn how your school can earn official SPARK Lab Certification - a free, convenient, and globally recognized endorsement of innovation." data-step="1"><span class="pcoded-micon"><i class="fas fa-flask"></i></span><span class="pcoded-mtext">SPARK Lab Certification</span></a>
					</li>
					

					{{-- <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"  data-title="SPARK Lab Certification" data-intro="Learn how your school can earn official SPARK Lab Certification - a free, convenient, and globally recognized endorsement of innovation." data-step="1"><span class="pcoded-micon"><i class="fas fa-flask"></i></span><span class="pcoded-mtext">SPARK Lab Certification</span></a>
							<ul class="pcoded-submenu">
								<li class="nav-item {{ request()->routeIs('process') ? 'active' : '' }}"><a href="{{url('process')}}">Process</a></li>	

								<li class="nav-item {{ request()->routeIs('system-info') ? 'active' : '' }}"><a href="{{url('system-info')}}">Desired Specifications</a></li>	

								<li class="nav-item {{ request()->routeIs('technical.assesment') ? 'active' : '' }}"><a href="{{route('technical.assesment')}}">Launch Certification</a></li>		

								{{-- <li class="nav-item pcoded-hasmenu">
									<a href="#!" class="nav-link"><span class="pcoded-mtext">Technical Requirements</span></a>
										<ul class="pcoded-submenu">
											<li class="nav-item"><a href="{{url('system-info')}}/Operating System & Browser Requirements" >Operating System & Browser Requirements</a></li>	
											<li class="nav-item"><a href="{{url('system-info')}}/Memory & Network Requirements" >Memory & Network Requirements</a></li>	
										</ul>
								</li>										 
										
														 							 
							</ul>
					</li> --}}




					{{-- <li class="nav-item {{ request()->routeIs('school.share.link') ? 'active' : '' }}">
						<a href="{{route('school.share.link')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Share Link</span></a>
					</li> --}}

					<li class="nav-item">
						<a href="{{route('student.verification')}}" class="nav-link" data-title="Student Registrations" data-intro="Manage and track student registrations with ease. Submit class-wise entries, batch upload student data, and monitor progress in real time." data-step="2"><span class="pcoded-micon"><i class="fas fa-user"></i></span><span class="pcoded-mtext">Student Registrations</span></a>
					</li>

				
					 
					<li class="nav-item"  data-title="Download Center" data-intro="Access all essential resources in one place - letters, brochures, sample papers, how-to guides, and certificates - ready for instant download." data-step="3">
						<a href="{{ url('Letter-to-Parent') }}" class="nav-link {{ request()->is('Letter-to-Parent') ? 'active' : '' }}">
							<span class="pcoded-micon"><i class="fas fa-download"></i></span>
							<span class="pcoded-mtext">Download Center</span>
						</a>
					</li>

					{{-- <li class="nav-item"  data-title="Spark Blueprint" data-intro="Access all essential resources in one place - letters, brochures, sample papers, how-to guides, and certificates - ready for instant download." data-step="3">
						<a href="{{ url('test-prep-resources') }}" class="nav-link {{ request()->is('test-prep-resources') ? 'active' : '' }}">
							<span class="pcoded-micon"><i class="fas fa-globe"></i></span>
							<span class="pcoded-mtext">Spark Blueprint</span>
						</a>
					</li>

					<li class="nav-item"  data-title="Sample Questions" data-intro="Access all essential resources in one place - letters, brochures, sample papers, how-to guides, and certificates - ready for instant download." data-step="3">
						<a href="{{ url('mathematics') }}" class="nav-link {{ request()->is('mathematics') ? 'active' : '' }}">
							<span class="pcoded-micon"><i class="fa fa-question"></i></span>
							<span class="pcoded-mtext">Sample Questions</span>
						</a>
					</li>

					<li class="nav-item"  data-title="Awards and Accolades" data-intro="Access all essential resources in one place - letters, brochures, sample papers, how-to guides, and certificates - ready for instant download." data-step="3">
						<a href="{{url('Award-and-Accolades')}}" class="nav-link {{ request()->is('Letter-to-Parent') ? 'active' : '' }}">
							<span class="pcoded-micon"><i class="fas fa-award"></i></span>
							<span class="pcoded-mtext">Awards and Accolades</span>
						</a>
					</li> --}}

					{{-- <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link" data-title="Download Center" data-intro="Access all essential resources in one place - letters, brochures, sample papers, how-to guides, and certificates - ready for instant download." data-step="3"><span class="pcoded-micon"><i class="fas fa-globe"></i></span><span class="pcoded-mtext">Download Center</span></a>
							<ul class="pcoded-submenu">
								<li><a href="{{ url('Letter-to-Parent') }}">Letter to Parent </a></li>
								<li><a href="{{ url('Poster-for-Bulletin-Board') }}">Poster for Bulletin Board</a></li>
								<li><a href="{{url('Competency-Architecture')}}">Competency Architecture</a></li>
								<li class="nav-item pcoded-hasmenu">
									<a href="#!" class="nav-link"><span class="pcoded-mtext">Spark Blueprint</span></a>
										<ul class="pcoded-submenu">
											<li class="nav-item"><a href="{{url('test-prep-resources')}}" >Cognitive Levels</a></li>	
											<li class="nav-item"><a href="{{url('test-duration')}}" >Test Duration</a></li>
											<li class="nav-item"><a href="{{url('total-questions')}}" >Total Questions</a></li>	
										</ul>
								</li>
									<li class="nav-item pcoded-hasmenu">
										<a href="#!" class="nav-link"><span class="pcoded-mtext">Sample Questions</span></a>
											<ul class="pcoded-submenu">
												<li class="nav-item"><a href="{{url('mathematics')}}" >Mathematics</a></li>	
												<li class="nav-item"><a href="{{url('english')}}" >English</a></li>
												<li class="nav-item"><a href="{{url('evs')}}" >Environmental Studies(EVS)</a></li>	
												<li class="nav-item"><a href="{{url('india-awareness')}}" >India Awareness</a></li>
											</ul>
									</li>
								<li><a href="{{url('Award-and-Accolades')}}">Awards and Accolades</a></li>								 										 						 							 
							</ul>
					</li> --}}

{{-- 
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fas fa-globe"></i></span><span class="pcoded-mtext">Global Mentors</span></a>
							<ul class="pcoded-submenu">
								<li><a href="{{url('global-mentors')}}/G. Balasubramanian">G. Balasubramanian</a></li>
								<li><a href="{{url('global-mentors')}}/Dr. Sadhana Parashar">Dr. Sadhana Parashar</a></li>
								<li><a href="{{url('global-mentors')}}/Dr. Rajesh Hassija">Dr. Rajesh Hassija</a></li>
								<li><a href="{{url('global-mentors')}}/Kevin Baird">Kevin Baird</a></li>
								<li><a href="{{url('global-mentors')}}/Dr. Swati Popat Vats">Dr. Swati Popat Vats</a></li>
								<li><a href="{{url('global-mentors')}}/Dr. Jesús Jara">Dr. Jesús Jara</a></li>
								<li><a href="{{url('global-mentors')}}/Mrs. Abha Meghe">Mrs. Abha Meghe</a></li>
								<li><a href="{{url('global-mentors')}}/Dr. Andrew Ordover">Dr. Andrew Ordover</a></li>
								<li><a href="{{url('global-mentors')}}/Humphrey Chan">Humphrey Chan</a></li>
								<li><a href="{{url('global-mentors')}}/Pamit Anand">Pamit Anand</a></li>
								<li><a href="{{url('global-mentors')}}/Vishnu Patro">Vishnu Patro</a></li>
								<li><a href="{{url('global-mentors')}}/Pramod Sharma">Pramod Sharma</a></li>
								<li><a href="{{url('global-mentors')}}/Ms. Sneh Verma">Ms. Sneh Verma</a></li>
								<li><a href="{{url('global-mentors')}}/Dr. Punam Kashyap">Dr. Punam Kashyap</a></li>
								<li><a href="{{url('global-mentors')}}/Ms. Sangeeta Krishan">Ms. Sangeeta Krishan</a></li>
								<li><a href="{{url('global-mentors')}}/Giri Balasubramaniam">Giri Balasubramaniam</a></li>					
								 						 							 
							</ul>
					</li> --}}

					{{-- <li class="nav-item">
						<a href="{{url('Award-and-Accolades')}}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-trophy"></i></span><span class="pcoded-mtext"> Award & Accolades</span></a>
					</li> --}}

					{{-- <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"  ><span class="pcoded-micon"><i class="fas fa-book-open"></i></span><span class="pcoded-mtext">Test Prep Resources</span></a>
							<ul class="pcoded-submenu">
								<li><a href="{{url('global-mentors')}}/Competency Architecture">Competency Architecture</a></li>
								<!-- <li><a href="{{url('global-mentors')}}/Spark Blueprint">Spark Blueprint</a></li> -->
								<li class="nav-item pcoded-hasmenu">
									<a href="#!" class="nav-link"><span class="pcoded-mtext">Spark Blueprint</span></a>
										<ul class="pcoded-submenu">
											<li class="nav-item"><a href="{{url('test-prep-resources')}}" >Cognitive Levels</a></li>	
											<li class="nav-item"><a href="{{url('test-duration')}}" >Test Duration</a></li>
											<li class="nav-item"><a href="{{url('total-questions')}}" >Total Questions</a></li>	
										</ul>
								</li>
								<!-- <li><a href="{{url('global-mentors')}}/Sample Questions">Sample Questions</a></li>  -->
								
								<li class="nav-item pcoded-hasmenu">
									<a href="#!" class="nav-link"><span class="pcoded-mtext">Sample Questions</span></a>
										<ul class="pcoded-submenu">
											<li class="nav-item"><a href="{{url('mathematics')}}" >Mathematics</a></li>	
											<li class="nav-item"><a href="{{url('english')}}" >English</a></li>
											<li class="nav-item"><a href="{{url('evs')}}" >Environmental Studies(EVS)</a></li>	
											<li class="nav-item"><a href="{{url('india-awareness')}}" >India Awareness</a></li>
										</ul>
								</li>
								 						 							 
							</ul>
					</li> --}}
{{-- 
					<li class="nav-item">
						<a href="{{url('school-change-password-reset')}}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-lock"></i></span><span class="pcoded-mtext"> Change Password</span></a>
					</li> --}}



					{{-- <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fas fa-comments"></i></span><span class="pcoded-mtext">Support</span></a>
							<ul class="pcoded-submenu">
								<li> 
									<a href="https://tawk.to/chat/685e454b2d3be4190e5caa70/1iuo3tccj" target="_blank" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext"> Chat With Us</span></a>						 
								 </li>

								 <li> 
									<a href="{{url('suppoort')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Submit Ticket</span></a>						 
								 </li>

								 <li> 
									<a href="{{url('faq')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext"> FAQs</span></a>						 
								 </li>
					
								 						 							 
							</ul>
					</li> --}}

					<li class="nav-item">
						<a href="{{url('Spark-bank-details')}}" class="nav-link" data-title="Fee Payment " data-intro="Calculate and manage student payments here. Track dues, generate reports, and download fee reports - class-wise or student-wise - effortlessly." data-step="4"><span class="pcoded-micon"><i class="fas fa-university"></i></span><span class="pcoded-mtext">Fee Payment </span></a>
					</li>
					




					{{-- <li class="nav-item"> 
					 
							<form method="POST" action="{{ route('school.logout') }}">
								@csrf
						<a href="route('school.logout')" class="nav-link" onclick="event.preventDefault();
												this.closest('form').submit();" class="dud-logout" title="Logout"><span class="pcoded-micon"><i class="fas fa-sign-out-alt"></i></span><span class="pcoded-mtext ml-3">Logout </span></a>
								</form>
					</li> --}}

				
					
				</ul>
			
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->

	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
			<a href="index.html" class="b-brand">
				<img src="../assets/images/logo.svg" alt="" class="logo images">
				<img src="../assets/images/logo-icon.svg" alt="" class="logo-thumb images">
			</a>
		</div>
		<a class="mobile-menu" id="mobile-header" href="#!">
			<i class="feather icon-more-horizontal"></i>
		</a>
		      		 @php   $user = Auth::guard('school')->user();	
					 		   
					  $userWithRelations = \App\Models\SchoolDetails::where('registration_id',Auth::guard('school')->id())->first();
					   
			   @endphp	
		   <div class="collapse navbar-collapse">
			<a href="#!" class="mob-toggler"></a>  
				  <ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<div class="main-search open">							 
							 <img src="{{asset($user->image??'default-logo.png')}}" class="img-radius school-logo" style="border-radius:8px">
							 <li style="font-weight: 600; text-transform: capitalize;">
								{{ ucfirst(strtolower($userWithRelations->school_name)) }}
							</li>
							
						</div>
					</li>
				</ul>	 
			<ul class="navbar-nav ml-auto">
				
				<li> <img src="https://sparkolympiads.com/assets/img/call-user.svg" alt="Call Icon" style="width: 24px; filter: invert(24%) sepia(88%) saturate(5530%) hue-rotate(207deg) brightness(90%) contrast(95%);"><b style="color:#004aad;font-weight:600">Call Us For Help : </b>  <b style="font-weight:500">+91 8447477275</b> </li>
				
			
				
				 <li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon feather icon-settings"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							
							  <ul class="pro-body">
								<li><a href="{{route('school.dashboard')}}" class="dropdown-item"><i class="feather icon-settings"></i> Dashboard</a></li>
								<li><a href="{{route('school.profile')}}" class="dropdown-item"><i class="feather icon-user"></i> Update School Profile</a></li>
								<li><a href="{{url('school-change-password-reset')}}" class="dropdown-item"><i class="feather icon-mail"></i> Change Password</a></li>
								<li><a href="https://tawk.to/chat/685e454b2d3be4190e5caa70/1iuo3tccj" target="_blank" class="dropdown-item"><i class="feather icon-lock"></i> Support</a></li>
								   

									<form method="POST" action="{{ route('school.logout') }}">
									@csrf                        
									<li><a href="route('school.logout')"
											onclick="event.preventDefault();
														this.closest('form').submit();" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i> Logout
										</a></li>
									</form>
	
							 
							</ul>  
						</div>
					</div>
				</li> 
			</ul>
		</div>
	</header>
	
	<!-- [ Header ] end -->
	@yield('content')

	
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

	<!-- Warning Section start -->
	<!-- Older IE warning message -->
	<!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="../assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="../assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="../assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="../assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="../assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
	<!-- Warning Section Ends -->

	<!-- Required Js -->
	

	<script src="{{asset('admin/js/intro.js')}}"></script>
	<script src="{{asset('admin/js/vendor-all.min.js')}}"></script>
	<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/js/pcoded.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	






	@stack('scripts')
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
 

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css"> 
 



<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css"> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.min.js"></script>
 


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
$(document).ready(function () {
  $('.datatable').each(function () {
    $(this).DataTable({
      dom:
        "<'table-controls d-flex justify-content-between align-items-center mb-2'<'dt-buttons'B><'dt-search'f>>" +
        "<'table-wrapper'tr>" + // wrapper for scrollable body
        "<'row'<'col-md-5'i><'col-md-7'p>>",
      buttons: [
        {
          extend: 'csv',
          text: 'CSV',
          className: 'btn btn-sm btn-secondary me-2'
        },
        {
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-sm btn-secondary me-2'
        },
        {
          extend: 'print',
          text: 'Print',
          className: 'btn btn-sm btn-secondary'
        }
      ],
      scrollY: '400px', // adjust height as needed
      scrollCollapse: true,
      paging: false,
      info: false,
      lengthChange: false,
      language: {
        paginate: {
          previous: '<button class="btn btn-sm btn-outline-primary me-1">Previous</button>',
          next: '<button class="btn btn-sm btn-outline-primary">Next</button>'
        }
      }
    });
  });
});

</script>

<script>
	$(document).ready(function() {
		if (!localStorage.getItem('firstVisit')) {
			introJs().start();
			localStorage.setItem('firstVisit', 'true');
		}
	});
</script>
		

</body>

</html>
