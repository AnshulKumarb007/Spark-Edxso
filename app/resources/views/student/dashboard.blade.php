@extends('layouts.student')
@section('content')
<style>
    * {
      box-sizing: border-box;
    }

    .dashboard-row {
      display: flex;
      flex-wrap: wrap;
      width: 100%;
    }

    .card-container {
      flex: 1 1 20%;
      max-width:23%;
      padding: 8px; /* Optional padding between cards */
	    margin:9px;
    }

    .card {
      border-radius: 16px;
      overflow: hidden;
      border:1px solid #d8dae0;
      margin-bottom: 20px;
      box-shadow: none;
      min-width: 276px;
    }

    .card-body {
      padding: 16px 6px;
    }

    .text-white {
      color: white;
    }

    .m-b-0 {
      margin-bottom: 0;
    }

    .m-b-5 {
      margin-bottom: 5px;
    }

    .m-b-25 {
      margin-bottom: 25px;
    }

    /* Background colors */
    .bg-c-red {
      background-color: #f44336;
    }

    .bg-c-blue {
      background-color: #2196f3;
    }

    .bg-c-green {
      background-color: #4caf50;
    }

    .bg-c-yellow {
      background-color: #ffc107;
    }

    a {
      text-decoration: none;
      display: block;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
      .card-container {
        flex: 1 1 50%;
        max-width: 50%;
      }
    }

    @media (max-width: 576px) {
      .card-container {
        flex: 1 1 100%;
        max-width: 100%;
      }
    }
 

    .pcoded-header.headerpos-fixed ~ .pcoded-main-container {
        padding-top: 0px !important;
}
.my-font-weight{
  font-weight:500;
}

.my-font-weight2{
  font-weight:600;
}


  .exam-box-option {
        border: 2px solid #ccc;
        border-radius: 8px;
        padding: 15px;
        margin: 10px 10px 10px 0;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
        min-width: 200px;
        font-size:14px;
    }

    

    .exam-box-option:hover {
        border-color: #004aad;
        background-color: #f0f8ff;
        color:#004aad;
    }

    .exam-box-option input[type="radio"] {
        display: none;
    }

    .exam-box-option.active {
        border-color: #004aad;
        background-color: #e6f0ff;
        color:#004aad;
    }

    .exam-box-option label {
        margin: 0;
        font-weight: 600;
        cursor: pointer;
        display: block;
    }

    .btn > i {
     margin-right:0px;
}

                          .input-container {
    position: relative;
}

.input-container .form-control {
    padding-right: 120px; /* Space for the button inside the input field */
}

.input-container .copy-btn {
    position: absolute;
    right: 3px; /* Distance from the right edge of the input box */
    top: 50%;
    transform: translateY(-50%); /* Vertically center the button */
    padding: 5px 10px; /* Button padding */
    font-size: 12px; /* Optional: Adjust button font size */
    z-index: 1; /* Ensure the button is above the input box */
}
.input-container .copy-btn:hover {
    background-color: #ff5817;
    border-color: #ff5817;
    color: white; /* Change text color to white for better contrast */
}
.input-container .copy-btn {
  background-color: #000;
  border-color: #000;
  border-radius: 4px;
}


.custom-select, .form-control{
    background: #eff3f6;
    padding: 16px 12px !important;
    font-size: 14px;
    height: auto;
    font-weight: 500;
}
 .my-width{
    width:100%;
 }
  </style>
	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">
							<!-- [ breadcrumb ] start -->
							<div class="page-header">
								<div class="page-block">
									<div class="row align-items-center">
										<div class="col-md-9">
											{{-- <div class="page-header-title">
												<h5 class="text-capitalize">{{$hs1->school_name}}</h5>
											</div> --}}
											<ul class="breadcrumb d-none">
												<li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item text-capitalize">Dashboard</li>
											</ul>
                                           
										</div>
                                 
									</div>
								</div>
							</div>
								    <div class="dashboard-row">
									 

									<div class="row" style="margin-top:23px">	 

                                <!-- Card 1 -->
												<div class="card-container">   
													<div class="card prod-p-card bg-c-red">
														<div class="card-body" style="padding: 20px 20px;">
															  <a href="{{url('student-verification')}}">
															  <div class="row align-items-center ">
																<div class="col">
																<h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Block-1 </h3>
																<h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600"> </h6>
															   
																</div>
															  </div>
															  <!-- <p class="m-b-0 text-white  my-font-weight" style="font-size:12px">(Click here to check registered students details)</p> -->
															  </a>
															  <div style="border:4px solid;border-image:linear-gradient(to left,rgba(153, 53, 14, 0.00) 0%, #FF5817 100%)1;margin-top:8px"></div>
														</div>
													</div>
												</div>
    
                                <!-- Card 2 -->
                                <div class="card-container">
                                    <div class="card prod-p-card bg-c-blue">
                                    <div class="card-body" style="padding: 20px 20px;">
                                        <a href="{{url('school-dashboard?id=2')}}">
                                        <div class="row align-items-center ">
                                            <div class="col">
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Block-2 </h3>
                                                <h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600">   </h6>
                                            
                                            </div>
                                        </div>
                                        <!-- <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check registered students class wise)</p> -->
                                         
                                        </a>
                                        <div style="border:4px solid;border-image:linear-gradient(to left,rgba(153, 53, 14, 0.00) 0%, #004aad 100%)1;margin-top:8px"></div>

                                        
                                    </div>
                                    </div>
                                </div>
    
                                <div class="card-container d-none">
                                     <div class="card prod-p-card bg-c-red">
                                    <div class="card-body" style="padding: 20px 20px;">
                                        <a href="{{url('school-dashboard?id=4')}}">
                                        <div class="row align-items-center ">
                                            <div class="col">
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Block-3 </h3>
                                             
                                            </div>
                                        </div>
                                        <!-- <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check exam participation)</p> -->
                                        </a>
                                        <div style="border:4px solid;border-image:linear-gradient(to left,rgba(153, 53, 14, 0.00) 0%, #FF5817 100%)1;margin-top:8px"></div>
                                    </div>
                                    </div>
                                </div>
    
                                <!-- Card 3 -->
                             
                                <!-- Card 5 -->
                                <div class="card-container">
                                    <div class="card prod-p-card bg-c-red">
                                    <div class="card-body" style="padding: 20px 20px;">
                                        <a href="{{url('school-dashboard?id=3')}}">
                                        <div class="row align-items-center ">
                                            <div class="col">
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Block-4 </h3>
                                            <h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600"> </h6>
                                            
                                            </div>
                                        </div>
                                        <!-- <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check registered students olympiad wise)</p> -->
                                        </a>
                                        <div style="border:4px solid;border-image:linear-gradient(to left,rgba(153, 53, 14, 0.00) 0%, #FF5817 100%)1;margin-top:8px"></div>
                                    </div>
                                    </div>
                                </div>
    
                                <!-- Card 4 -->
                                <div class="card-container">
                                  <div class="card prod-p-card bg-c-blue">
                                    <div class="card-body" style="padding: 20px 20px;">
                                        <a href="{{url('school-dashboard?id=5')}}">
                                        <div class="row align-items-center ">
                                            <div class="col">
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Block-5 </h3>
                                            <h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600"> </h6>
                                        
                                            </div>
                                        </div>
                                        <!-- <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check the collected fees from students) </p> -->
                                        </a>
                                        <div style="border:4px solid;border-image:linear-gradient(to left,rgba(153, 53, 14, 0.00) 0%, #004aad 100%)1;margin-top:8px"></div>
                                    </div>
                                    </div>
                                </div>
								</div>
									<div class="row my-width">
                                    @if(request()->query('id') == 2)
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Class Wise Count</h3>
                                            </div>
                                            <div class="card-body table-border-style">
                                                <div class="table-responsive">
                                                  <table class="datatable table table-striped text-center" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th class="text-center">Class</th>
                                                                <th class="text-center">Total Enrolled Students</th>                                                          
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($classstudentCounts as $c)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-center">{{$c->class_name}}</td>
                                                                <td class="text-center">{{$c->student_count}}</td>                                                            
                                                            </tr> 
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    @elseif(request()->query('id') == 3)
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Olympiad Tests Wise Count</h3>
                                            </div>
                                            <div class="card-body table-border-style">
                                                <div class="table-responsive">
                                                    <table class="datatable table table-striped text-center" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th class="text-center">Olympiad Name</th>
                                                                <th class="text-center">Total Registered Students</th>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($subjectwise_count as $c)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-center">{{$c->subjectname}}</td>
                                                                <td class="text-center">{{$c->student_count}}</td>                                                            
                                                            </tr> 
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    @elseif(request()->query('id') == 4)
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Olympiad Test Wise Count</h3>
                                            </div>
                                            <div class="card-body table-border-style">
                                                <div class="table-responsive">
                                                    <table class="datatable table table-striped text-center" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th class="text-center">Class</th>
                                                                <th class="text-center">Olympiad Test Count</th>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($subjectCounts as $c)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-center">{{$c->name}}</td>
                                                                <td class="text-center">{{$c->total_subjects}}</td>                                                            
                                                            </tr> 
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
    
                                    @elseif(request()->query('id') == 5)
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Collected Fees Count</h3>
                                            </div>
                                            <div class="card-body table-border-style">
                                                <div class="table-responsive">
                                                    <table class="datatable table table-striped text-center" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th class="text-center">Admission #</th>
                                                                <th class="text-center">Student Name</th>
                                                                <th class="text-center">Fee</th>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($student_listing as $c)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-center">{{$c->admission_no}}</td>
                                                                <td class="text-center">{{$c->full_name}}</td>
                                                                <td class="text-center">{{$c->fee}}</td>                                                            
                                                            </tr> 
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
    
                                    @endif
									</div>
                                
									<div class="row"> 
										<div class="col-md-12 col-xl-12">
										  <div class="card card-social">										 
											  <div class="card-block">		
													<h5 class="my-font-weight2">Instruction </h5>
													  <p class="my-font-weight">Use the self-registration link below to invite students and parents to register directly for SPARK Olympiads. Share this link via email, WhatsApp, or your school portal. All responses will be automatically tracked under your school’s dashboard.
                                                    </p>       

                                                      <ul>
                                                        <li class="my-font-weight2">Share the link widely to maximize participation</li>
                                                        <li class="my-font-weight2">Track all registrations in real time from your dashboard</li>
                                                        <li class="my-font-weight2">You can edit the selected exam date anytime if needed</li>
                                                      </ul>
                                                      
														 
												  </div>
											  </div>
											</div>
								</div>
								</div>
                                 
							 
          
						</div>
        
			</div>
      
		</div>
    
	</div>
 
  
   
	<!-- [ Main Content ] end -->
	<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="linkModalLabel">Copy Link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <input type="text" id="popupLink" class="form-control" readonly>
        <button class="btn btn-primary mt-3" onclick="copyPopupLink()">Copy</button>
        <div id="copyStatus" class="mt-2 text-success d-none">Copied!</div>
      </div>
    </div>
  </div>
</div>






<!-- Password Change Modal -->
 




	<!-- [ Main Content ] end -->
	@endsection
	@push('scripts')


   
     @endpush