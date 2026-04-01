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
    .notificationx {
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

    .notificationx.show {
      opacity: 1;
      transform: translateX(0);
    }
	.school-logo{
			width:50px;
			height:50px;
	}

	
	.notificationx-error {
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

    .notificationx-error.show {
      opacity: 1;
      transform: translateX(0);
    }
	


  </style>
</head>
				 @php   
			     	  $student = Auth::guard('student')->user();
					
			 		  $userWithRelationss = \App\Models\SchoolRegistration::where('school_id',$student->school_id)->first();		   
					  $userWithRelations = \App\Models\SchoolDetails::where('registration_id',$userWithRelationss->id)->first();
					 
			   @endphp	
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
				 
					 <li class="nav-item {{ request()->routeIs('school.profile') ? 'active' : '' }}">
						<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user"></i></span><span class="pcoded-mtext">My Profile</span></a>
					</li> 

					<li class="nav-item"> 
					 
						<form method="POST" action="{{ route('student.logout') }}">
							@csrf
							<input type="hidden" value="{{$student->school_id}}" name="school_id_logout" />
								<a href="route('student.logout')" class="nav-link" onclick="event.preventDefault();
											this.closest('form').submit();" class="dud-logout" title="Logout"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext ml-3">Logout </span></a>
							</form>
					</li>

					
					 
				
					
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
		      
		   <div class="collapse navbar-collapse">
			<a href="#!" class="mob-toggler"></a>  
				
			<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<div class="main-search open">							 
							 <img src="{{asset($user->image??'default-logo.png')}}" class="img-radius school-logo">
							  <li style="font-weight: 600; text-transform: capitalize;">
								{{ ucfirst(strtolower($student->full_name.' '.$student->middle_name.' '.$student->last_name)) }}
								({{ ucfirst(strtolower($userWithRelations->school_name)) }})
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
								 
								   
									<form method="POST" action="{{ route('student.logout') }}">
									@csrf                
									<input type="hidden" value="{{$student->school_id}}" name="school_id_logout" />        
									<li><a href="route('student.logout')"
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
        <div id="successPopup" class="notificationx">
            ✅ {{ session('success') }}
        </div>
	@endif

	@if(session('error'))
    <div id="successPopup" class="notificationx-error">
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
        "<'table-controls row'<'col-md-9'B><'col-md-3 text-right'f>>" +
        "<'table-body row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>",
      buttons: [
        {
          extend: 'csv',
          text: 'CSV',
          className: 'btn btn-sm btn-secondary'
        },
        {
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-sm btn-secondary'
        },
        {
          extend: 'print',
          text: 'Print',
          className: 'btn btn-sm btn-secondary'
        }
      ],
      paging: false,
      info: false,
      lengthChange: false,
      language: {
        paginate: {
          previous: '<button class="btn btn-sm btn-outline-primary me-1">Previous</button>',
          next: '<button class="btn btn-sm btn-outline-primary">Next</button>'
        }
      },
  
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
