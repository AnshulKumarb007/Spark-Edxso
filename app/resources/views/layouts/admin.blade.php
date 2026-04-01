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
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Favicon icon -->
	<link href="{{ asset('web/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
	<!-- fontawesome icon -->
 
	<!-- animation css -->
	<link rel="stylesheet" href="{{asset('admin/plugins/animation/css/animate.min.css')}}">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z2V76S6WMH"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-Z2V76S6WMH'); </script>
 
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

	.dataTables_info {
  float: left;
  margin-top: 0.5rem;
}

.dataTables_paginate {
  float: right;
  margin-top: 0.5rem;
}


/* Sticky container for buttons and search input */
.table-controls {
  position: sticky;
  top: 0;
  background: white; /* or whatever background your page has */
  z-index: 10;
  padding: 10px 0;
  border-bottom: 1px solid #ddd;
}

 

/* Optional: ensure thead sticks with the scroll */
.table-body table thead th {
  position: sticky;
  top: 0;
  background: white;
  z-index: 5;
  border-bottom: 1px solid #ddd;
}
.table-body {
  overflow-x: auto;
  width: 100%;
}

.table-controls {
  overflow: visible; /* No scrolling here */
  width: 100%;
}
 
.table-controls .dt-buttons button {
  white-space: nowrap; /* prevent wrapping */
}

.select2-container .select2-search--inline .select2-search__field {
   
   height: 27px;
   
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
				<a href="{{route('dashboard')}}" class="b-brand">
					<img src="{{asset('web/logo.svg')}}" alt="" class="logo images"> 
				</a>
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			</div>
			<div class="navbar-content scroll-div">
				<ul class="nav pcoded-inner-navbar">
					<!-- <li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li> -->
					<li class="nav-item">
						<a href="{{route('dashboard')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<!-- <li class="nav-item pcoded-menu-caption">
						<label>UI Element</label>
					</li> -->
					
					<!-- <li class="nav-item pcoded-menu-caption">
						<label>Forms &amp; table</label>
					</li> -->
					{{-- <li class="nav-item">
						<a href="{{route('manage.school')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Manage Schools</span></a>
					</li> --}}

					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Manage Schools</span></a>
						<ul class="pcoded-submenu">
						<li class=""><a href="{{route('manage.school')}}" class="">Registration Status</a></li>
						<li class=""><a href="{{route('registered.data')}}" class="">Registered Data </a></li>
						{{-- <li class=""><a href="{{route('manage.student.lists')}}" class="">Registered Students </a></li> --}}
						<li class=""><a href="{{route('manage.school-paymets')}}" class="">School Payments </a></li>
						</ul>
					</li>

					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Manage Students</span></a>
						<ul class="pcoded-submenu"> 
						<li class=""><a href="{{route('manage.student.lists')}}" class="">Registered Students </a></li>
						<li class=""><a href="{{route('student.login.lists')}}" class="">Student Login Details</a></li>
						<li class=""><a href="{{route('student.transaction.lists')}}" class="">Student Payments </a></li>			
						<li class=""><a href="{{route('student.registration.counts')}}" class="">Student Registration Count </a></li>			
						</ul>
					</li>

					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Technical Assesment</span></a>
						<ul class="pcoded-submenu"> 
						<li class=""><a href="{{route('manage.technical.lists')}}" class="">Technical Assesment </a></li>
						{{-- <li class=""><a href="{{route('student.login.lists')}}" class="">Student Login Details</a></li>
						<li class=""><a href="{{route('student.transaction.lists')}}" class="">Student Payment Transactions </a></li>			 --}}
						</ul>
					</li>


					{{-- <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Reports</span></a>
						<ul class="pcoded-submenu">
						<li class=""><a href="#" class="">School Registration </a></li>
						<li class=""><a href="#" class="">Technical Assesment </a></li>
							<li class=""><a href="#" class="">Payment Transactions </a></li>							
							<li class=""><a href="#" class="">Student Login Details</a></li>
							<!-- <li class=""><a href="bc_collapse.html" class="">Collapse</a></li>
							<li class=""><a href="bc_progress.html" class="">Progress</a></li>
							<li class=""><a href="bc_tabs.html" class="">Tabs & pills</a></li>
							<li class=""><a href="bc_typography.html" class="">Typography</a></li> -->
						</ul>
					</li> --}}

					<li class="nav-item">
						<a href="{{route('manage.users.lists')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Manage Users</span></a>
					</li>

					{{-- <li class="nav-item">
						<a href="{{route('lead.list')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Leads</span></a>
					</li> --}}


					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Masters</span></a>
						<ul class="pcoded-submenu">
							{{-- <li class=""><a href="{{route('designation.index')}}" class="">Manage Designation</a></li>
							<li class=""><a href="{{route('board.index')}}" class="">Manage Board</a></li>
							<li class=""><a href="{{route('title.index')}}" class="">Manage Title</a></li>
							<li class=""><a href="{{route('title.index')}}" class="">Settings</a></li> --}}
							<li class="" {{ request()->routeIs('class.index') ? 'active' : '' }}><a href="{{route('class.index')}}" class="">Manage Class</a></li>

							<li class="" {{ request()->routeIs('subject.index') ? 'active' : '' }}><a href="{{route('subject.index')}}" class="">Manage Subject</a></li>

							<li class="" {{ request()->routeIs('manage-map.index') ? 'active' : '' }}><a href="{{route('manage-map.index')}}" class="">Map Subject</a></li>
							<li class="" {{ request()->routeIs('exam.date') ? 'active' : '' }}><a href="{{route('exam.date')}}" class="">Exam Date</a></li>
							<li class="" {{ request()->routeIs('fee-discount.index') ? 'active' : '' }}><a href="{{route('fee-discount.index')}}" class="">Manage Discount Fee</a></li>
							<li class="" {{ request()->routeIs('email-settings.index') ? 'active' : '' }}><a href="{{route('email-settings.index')}}" class="">Email Settings</a></li>
							<!-- <li class=""><a href="bc_collapse.html" class="">Collapse</a></li>
							<li class=""><a href="bc_progress.html" class="">Progress</a></li>
							<li class=""><a href="bc_tabs.html" class="">Tabs & pills</a></li>
							<li class=""><a href="bc_typography.html" class="">Typography</a></li> -->
						</ul>
					</li>
					{{-- <li class="nav-item">
						<a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Change Password</span></a>
					</li> --}}
					<li class="nav-item"> 
					 
						<form method="POST" action="{{ route('logout') }}">
							@csrf
								<a href="route('logout')" class="nav-link" onclick="event.preventDefault();
											this.closest('form').submit();" class="dud-logout" title="Logout"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext ml-3">Logout </span></a>
							</form>
					</li>
					
					<!-- <li class="nav-item">
						<a href="form_elements.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form elements</span></a>
					</li>
					<li class="nav-item">
						<a href="tbl_bootstrap.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap table</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Chart & Maps</label>
					</li>
					<li class="nav-item">
						<a href="chart-morris.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
					</li>
					<li class="nav-item">
						<a href="map-google.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Pages</label>
					</li> -->
					<!-- <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="auth-signup.html" class="" target="_blank">Sign up</a></li>
							<li class=""><a href="auth-signin.html" class="" target="_blank">Sign in</a></li>
						</ul>
					</li> -->
					<!-- <li class="nav-item"><a href="sample-page.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>
					<li class="nav-item disabled"><a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled menu</span></a></li> -->
				</ul>
				<!-- <div class="card text-center">
					<div class="card-block">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<i class="feather icon-sunset f-40"></i>
						<h6 class="mt-3">Upgrade to pro</h6>
						<p>upgrade for get full themes and 30min support</p>
						<a href="https://codedthemes.com/item/flash-able-bootstrap-admin-template/" target="_blank" class="btn btn-gradient-primary btn-sm text-white m-0">Upgrade</a>
					</div>
				</div> -->
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
		
			<ul class="navbar-nav ml-auto">
				 
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon feather icon-settings"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head" style="background:none"> 
								<a href="{{url('delete-form')}}"  target="_blank" class="dropdown-item"><i class="feather icon-trash"></i> Delete School</a>
							</div>							 
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
			<p class="text-white"><i class="fa fa-close"></i>  {{ session('error') }}</p>
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
	<script src="{{asset('admin/js/vendor-all.min.js')}}"></script>
	<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/js/pcoded.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@php
    $hasMessage = session('success') || session('error') || session('warning') || session('info');
@endphp

@if($hasMessage)
    <div id="sessionPopup" class="popup">
        {{ session('success') ?? session('error') ?? session('warning') ?? session('info') }}
    </div>

    <script>
        window.onload = function() {
            const popup = document.getElementById("sessionPopup");
            if (popup) {
                popup.classList.add("show");

                // Auto-hide after 3 seconds
                setTimeout(() => {
                    popup.classList.remove("show");
                }, 3000);
            }
        };
    </script>
@endif


<script>
  $(document).ready(function() {
    $('.class-select').select2({
      placeholder: "--Select class--",
      allowClear: true
    });
  });
</script>


<script>
	document.addEventListener('DOMContentLoaded', function () {
		const fromDate = document.getElementById('from_date');
		const toDate = document.getElementById('to_date');
		const endDate = document.getElementById('exam_end_date');
 
 
		function validateDates() {
			const from = new Date(fromDate.value);
			const to = new Date(toDate.value);
			const end = new Date(endDate.value);

		
	
			if (toDate.value && to < from) {
				Swal.fire({
					icon: 'error',
					title: 'Invalid Date',
					text: 'Exam end date should not be earlier than exam start date.',
				}).then(() => {
					toDate.value = '';
					toDate.focus();
				});
			}
	
			if (endDate.value && (end >= from || end >= to)) {
				Swal.fire({
					icon: 'error',
					title: 'Invalid Date',
					text: 'Last date of enrollment should be earlier than exam start date and end date.',
				}).then(() => {
					endDate.value = '';
					endDate.focus();
				});
			}
		}
	
		fromDate.addEventListener('change', validateDates);
		toDate.addEventListener('change', validateDates);
		endDate.addEventListener('change', validateDates);
	});
	</script>


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

	
@stack('scripts')


</body>

</html>
