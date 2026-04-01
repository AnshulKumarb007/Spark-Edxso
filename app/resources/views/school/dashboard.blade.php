@extends('layouts.school')
@section('content')\
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

    .omt{
        margin-top:90px !important;
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
	<div class="pcoded-main-container" style="top: -80px;">
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
									    
                                        <div class="omt">  
                                            @if( !empty($hs->is_validate) && $hs->is_validate != 1 || !empty($hs->is_mobile_validate) && $hs->is_mobile_validate != 1 )

                                               
                                                    @if(!empty($hs->is_validate) && $hs->is_validate != 1) 
                                                    <div class="row" id="emai-dom">
                                                        <div class="col-md-12">
                                                        <div  style="width:842px;board-radius:10px;">
                                                        <div class="alert alert-warning d-flex justify-content-between align-items-center mx-2 col-md-12" role="alert" id="email-alert" style="border: 1px solid;border-radius:10px;height: 60px">
                                                            <div style="margin-top:-13px">
                                                                <i class="fa fa-warning fa-2x mt-2"></i>
                                                                 Your email id is not verified.
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <button type="button" class="btn btn-sm btn-success me-2" onclick="askBeforeChangingValidation('google')">
                                                                    <i class="fa fa-check"></i> Verify Now
                                                                </button>
                                                                <i class="fa fa-times fa-lg text-danger" style="cursor: pointer;" onclick="removeAlert('email-alert')" title="Remove Alert"></i>

                                                            </div>
                                                        </div>  
                                                    </div>  
                                                </div>                                                  </div>  
                                                    @endif  
                                                    @if(!empty($hs->is_mobile_validate) && $hs->is_mobile_validate != 1 )    
                                                    <div class="row">
                                                    <div id="mobile-dom">  
                                                        <div class="col-md-12">                                
                                                        <div class="alert alert-warning d-flex justify-content-between align-items-center mx-2 col-md-12" role="alert" id="mobile-alert" style="border: 1px solid;border-radius:10px;height: 60px">
                                                            
                                                            <div  style="width:635px;board-radius:10px;margin-top:-13px">
                                                                <i class="fa fa-warning fa-2x mt-2"></i>
                                                                 Your mobile number is not verified.
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <button type="button" class="btn btn-sm btn-success me-2" onclick="askBeforeChangingValidation('mobile')">
                                                                    <i class="fa fa-check"></i> Verify Now
                                                                </button>
                                                                <i class="fa fa-times fa-lg text-danger" style="cursor: pointer;" onclick="removeAlert('mobile-alert')" title="Remove Alert"></i>

                                                            </div>
                                                        </div>										
                                                    </div>										
                                                </div>	                                                </div>																			
                                                    @endif 
                                                </div> 
                                            @endif	
                                        </div>
                                                                                
                                        <script>
                                          function removeAlert(id) {
                                                    const el = document.getElementById(id);
                                                    if (el) {
                                                        const parent = el.parentElement; // Gets the wrapper div (#email-dom or #mobile-dom)
                                                        if (parent) {
                                                            parent.remove(); // Removes the whole wrapper
                                                        } else {
                                                            el.remove(); // Fallback in case there's no wrapper
                                                        }
                                                    }
                                                }

                                            </script>
                                            
                                            


									<div class="row">	 

                                <!-- Card 1 -->
												<div class="card-container">   
													<div class="card prod-p-card bg-c-red">
														<div class="card-body" style="padding: 20px 20px;">
															  <a href="{{url('student-verification')}}">
															  <div class="row align-items-center ">
																<div class="col">
																<h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Total Registered Students </h3>
																<h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600"> @if(!empty($total_counts)) {{count($total_counts)}}@endif</h6>
															   
																</div>
															  </div>
															  <p class="m-b-0 text-white  my-font-weight" style="font-size:12px">(Click here to check registered students details)</p>
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
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Total Class-wise Registration </h3>
                                                <h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600">  {{$classstudentCounts1}}</h6>
                                            
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check registered students class wise)</p>
                                         
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
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Total Olympiad Tests </h3>
                                            <h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600"> ₹ {{$totalSubjectCount->total_subjects}} </h6>
                                            
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check exam participation)</p>
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
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Total Olympiad Tests </h3>
                                            <h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600"> {{$subjectwise_count1}}</h6>
                                            
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check registered students olympiad wise)</p>
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
                                              <h3 class="m-b-0 text-white my-font-weight" style="font-size:14px;">Total Collected Fees </h3>
                                            <h6 class="m-b-5 text-white" style="font-size:30px;font-weight:600"> ₹  {{$totalFee}}</h6>
                                        
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white my-font-weight" style="font-size:12px"> (Click here to check collected fees) </p><br/>
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
                                                
                                    <style>
                                            /* .table-responsive {
                                                max-height: 400px;
                                                overflow-y: auto;
                                            }

                                            .table-responsive thead th {
                                                position: sticky;
                                                top: 0;
                                                z-index: 10;
                                                background-color: #fff;
                                            } */

                                           
                                 </style>
    
                                    @elseif(request()->query('id') == 5)
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Collected Fees Count</h3>
                                            </div>
                                            <div class="card-body table-border-style">
                                                <div class="table-responsive" style="height:500px;overflow-y: scroll;">
                                                    <table class="datatable table table-striped text-center" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col" class="text-center">Admission #</th>
                                                                <th scope="col" class="text-center">Student Name</th>
                                                                <th scope="col" class="text-center">Fee</th>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($student_listing as $c)
                                                            @php
                                                                $subjectCount = count(array_filter(array_map('trim', explode(',', $c->subject_names))));
                                                                $total_fee = $subjectCount * $c->fee;
                                                                $appliedDiscount = 0;
                                                                $finalAmount = $total_fee;
                                                            @endphp
								
                                                            @foreach($discounts as $dis)
                                                                    @if ($subjectCount >= $dis->from_qty && $subjectCount <= $dis->to_qty)
                                                                        @php
                                                                            if ($dis->discount_value === 'percentage') {
                                                                            $appliedDiscount = ($total_fee * $dis->discount_value) / 100;
                                                                            } else {
                                                                                // Assume 'flat' or any other type is a fixed amount
                                                                                $appliedDiscount = $dis->discount_value;
                                                                            }									
                                                                            $finalAmount = $total_fee - $appliedDiscount;
                                                                        @endphp
                                                                        @break
                                                                       @endif
									                        @endforeach                           
                                                                 <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-center">{{$c->admission_no}}</td>
                                                                <td class="text-center">{{$c->full_name}}</td>
                                                                <td class="text-center">  {{ number_format($finalAmount, 2) }}</td>                                                            
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
                                 
							<div class="row">
								<div class="col-md-12 col-xl-12">
								 <div class="card card-social">										 
									 <div class="card-block">		
									   @if(!$links_list)									
										<form id="shareForm" action="{{ route('store.school.share.link') }}" method="POST">
										@csrf
										<input type="hidden" class="form-control" id="link" name="link" readonly value="{{$url->school_url.'/st'}}">
										<input type="hidden" class="form-control"  name="id" readonly value="{{ $links_list->id ?? '' }}">
										 
														 
                              <h5 class="my-font-weight2">Please generate the self-registration link for students and parents.</h5>	
                              <hr/>
                             <h6 class="my-font-weight2">Select Exam Date </h6>                                                  
                                <div class="d-flex flex-wrap">
                                  @foreach($exam_shedule as $es)
                                      <div class="exam-box-option {{ ($links_list->date_id ?? null) == $es->id ? 'active' : '' }}" onclick="selectExamDate({{ $es->id }})" id="exam-box-{{ $es->id }}">
                                          <input class="form-check-input" type="radio" name="date_id" id="date_{{$es->id}}" value="{{$es->id}}"
                                              {{ ($links_list->date_id ?? null) == $es->id ? 'checked' : '' }}>
                                          <label class="form-check-label" for="date_{{$es->id}}">
                                              {{ date('jS F', strtotime($es->shedule_date)) }} To {{ date('jS F', strtotime($es->to_date)) }}
                                          </label>
                                      </div>
                                  @endforeach
                                  <button type="button" id="generateBtn" class="btn btn-warning btn-sm" style="padding: 15px;margin: 10px 10px 10px 0;"><i class="fa fa-link"></i> Generate Link</button>
                              </div>
                            
										<script>
											function selectExamDate(id) {
												document.querySelectorAll('.exam-box-option').forEach(el => el.classList.remove('active'));
												const selectedBox = document.getElementById('exam-box-' + id);
												if (selectedBox) {
													selectedBox.classList.add('active');
													const input = selectedBox.querySelector('input[type="radio"]');
													if (input) input.checked = true;
												}
											}
										</script>
												  
											</form>
										@endif
										 
 
								    @if($links_list) 
										 
										  <h5>Please share the below self-registration link for students and parents.</h5>											 
										  <div class="input-container">
											  <input type="text" class="form-control" id="link" name="link" placeholder="Enter text here" readonly value="{{$url->school_url.'/st'}}">	
											  <button id="btn" class="btn btn-success copy-btn"><i class='fas fa-copy'></i> Copy link to share</button>
										  </div>
										  <p style="color:black" class="mt-2 my-font-weight">Selected exam date - {{ date('jS F', strtotime($links_list->shedule_date)) }} To {{ date('jS F', strtotime($links_list->to_date)) }}</p>
										  <a href="{{asset('SPARK-Exam-Schedule.pdf')}}" target="_blank" class="btn btn-warning btn-sm">Download Complete Schedule</a>
										 
									@endif				
                 
                 
								   </div>	   
								</div>  
							 </div>
							 </div>
											<div class="row">
														<div class="col-md-12 col-xl-12">
														<div class="card card-social">										 
														  <div class="card-block">
																<div class="row">		
											 <div class="col-md-9">  
													<h5 class="my-font-weight2 mt-3">Use Bulk Upload to register multiple students at once. </h5>
											 </div>
											  <div class="col-md-3">
												<a href="#" class="btn btn-warning float-right" data-bs-toggle="modal" data-bs-target="#uploadCsvModal" title="Upload bulk students" style="margin-top:2px;"><i class="fa fa-file-upload"></i> Bulk Upload </a>   
											</div> 			   
										  </div> 			   
														  </div>
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
@if(empty(request()->query('type')))
@if ($user->fist_chanege_pass==0)
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="passwordModal"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="passwordModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('first.password.update') }}" id="passwordForm">
        @csrf
		@method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Change Your Password {{request()->query('type')}}</h5>
            </div>

            <div class="modal-body">   
                <!-- New Password -->
                <div class="mb-3 position-relative">
                    <label for="password">New Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                            👁️
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3 position-relative">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                            👁️
                        </button>
                    </div>
                    <small id="passwordError" class="text-danger d-none">Passwords do not match.</small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update Password</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endif
@endif


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

  .chat-button2 {
    position: fixed;
    right:20;
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
  .chat-button2:hover {
    background-color: #0056b3;
    color: #fff;
  }
  </style> 
  
  <a href="#" class="chat-button d-flex align-items-center justify-content-center" id="openModalBtn"> <i class="fa fa-video-camera"></i>&nbsp; Watch Tutorial </a>

  <a href="{{url('api/meeting')}}" class="chat-button2 d-flex align-items-center justify-content-center"> <i class="fa fa-video-camera"></i>&nbsp; One Steps Registration </a>
   
 
@if (session('video_url'))
    <script>
        window.addEventListener('load', function() {
            const url = "{{ session('video_url') }}";
            if (url) {
                window.open(url, "_blank", "width=800,height=600");
            }
        });
    </script>
@endif

 


  <div class="modal fade" id="autoModal" tabindex="-1" aria-labelledby="autoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="autoModalLabel">Watch School Dashboard Introduction Video</h5>
            </div>
            <div class="modal-body p-0">
                <!-- Embedded YouTube video -->
                <div class="ratio ratio-16x9">
                    <iframe id="videoFrame" src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0"
                        title="YouTube Video" frameborder="0"
                        allow="encrypted-media" allowfullscreen style="width:100%;height:500px"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="skipButton">Skip</button>
            </div>
        </div>
    </div>
</div>


<!-- OTP Verification Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="otpModalLabel">OTP Verification</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
		</div>
		<div class="modal-body">
			<p id="otpTypeText">Please enter the OTP sent to your account.</p>
		  <input type="text" id="otpInput" class="form-control mb-3" placeholder="Enter OTP">
		  <div id="otpError" class="text-danger mb-2" style="display: none;">Invalid OTP. Please try again.</div>
		  <button class="btn btn-primary" onclick="verifyOtp()">Submit</button>
  
		  <div class="mt-3">
			<button id="resendBtn" class="btn btn-link p-0" onclick="resendOtp()" disabled>Resend OTP (<span id="countdown">30</span>s)</button>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  

<!-- Upload Modal -->
<div class="modal fade" id="uploadCsvModal" tabindex="-1" aria-labelledby="uploadCsvModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="csvUploadForm" class="modal-content" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="uploadCsvModalLabel">Bulk Upload of Student Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
          <input type="file" name="file" id="csvFile" class="form-control" accept=".csv" required>
        
          <div id="uploadStatus" class="text-success mt-2"></div>
          <p class="text-danger">Note:<br/> 1.Please enter subjects separated by commas, like Science, Math, etc. <br/>2.Please enter the classes in the following format: 1, 2, 3.</p>
           
        </div>
       
        <div class="modal-footer">
          <a href="{{url('upload_students_sample.csv')}}" download class="btn btn-success">Download Student Sample CSV File</a>
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
      </form>
    </div>
  </div>
  
    





	<!-- [ Main Content ] end -->
	@endsection
	@push('scripts')


  <script>
    window.addEventListener('DOMContentLoaded', () => {
        const modalElement = document.getElementById('autoModal');
        const myModal = new bootstrap.Modal(modalElement);

        // Check if modal has been shown before
        const hasSeenModal = localStorage.getItem('hasSeenModal');

        // Show modal automatically if not shown before
        if (!hasSeenModal) {
           // myModal.show();
           // localStorage.setItem('hasSeenModal', 'true'); // Mark as shown
        }

        // Show modal on button click
        const openModalBtn = document.getElementById('openModalBtn');
        if (openModalBtn) {
            openModalBtn.addEventListener('click', () => {
                myModal.show();
            });
        }

        // Listen for the modal close event to start Intro.js
        const skipButton = document.getElementById('skipButton');
        if (skipButton) {
            skipButton.addEventListener('click', () => {
                // Start Intro.js tutorial after modal is closed
                startIntroJS();
            });
        }

        // Also listen for modal hide event (if user closes modal manually)
        modalElement.addEventListener('hidden.bs.modal', () => {
            // Start Intro.js tutorial after modal is closed
            startIntroJS();
        });
    });

    // Function to start Intro.js after modal is dismissed
    function startIntroJS() {
        // Make sure Intro.js script is loaded
        if (typeof IntroJS !== 'undefined') {
            const intro = IntroJS();
            intro.start(); // Start the IntroJS tutorial
        } else {
            console.error('Intro.js is not loaded.');
        }
    }
</script>
      

<script>
   document.getElementById('csvUploadForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    const statusEl = document.getElementById('uploadStatus');

    statusEl.innerText = 'Uploading...';

    fetch("{{ route('students.upload') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(async response => {
        const contentType = response.headers.get("content-type");

        const totalRows = parseInt(response.headers.get("X-Total-Rows") || "0");
        const errorRows = parseInt(response.headers.get("X-Error-Rows") || "0");
        const successRows = parseInt(response.headers.get("X-Success-Rows") || "0");
        //const duplicate_row = parseInt(response.headers.get("X-duplicate-Rows") || "0");

        if (!response.ok) {
            if (contentType && contentType.includes("application/json")) {
                const errorData = await response.json();

                let errorMessage = `❌ Error on line ${errorData.line || 'N/A'}`;
                if (errorData.email) {
                    errorMessage += ` (Email: ${errorData.email})`;
                }

                if (errorData.errors) {
                    errorMessage += `\n- ` + errorData.errors.join('\n- ');
                } else if (errorData.error) {
                    errorMessage += `\n${errorData.error}`;
                }

                statusEl.innerText = errorMessage;
            } else {
                statusEl.innerText = 'An unknown error occurred.';
            }

            throw new Error('Upload failed');
        }

        form.reset(); // Clear form

        if (contentType && contentType.includes("text/csv")) {
            // If a CSV with errors is returned
            const disposition = response.headers.get('Content-Disposition');
            let filename = "errors.csv";

            if (disposition && disposition.indexOf('filename=') !== -1) {
                const filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                const matches = filenameRegex.exec(disposition);
                if (matches != null && matches[1]) {
                    filename = matches[1].replace(/['"]/g, '');
                }
            }

            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);

            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();

            a.remove();
            window.URL.revokeObjectURL(url);

            const alertTitle = successRows === 0 ? '❌ Upload Failed' : '⚠️ Upload Completed with Errors';
			Swal.fire({
				//icon: successRows === 0 ? 'error' : 'warning',
				title: alertTitle,
				html: `
					<b>Total Rows:</b> ${totalRows}<br>
					<b>Success:</b> ${successRows}<br> 
					<b>Errors:</b> ${errorRows}<br><br>
					${successRows === 0 ? '<i>Failed rows has been downloaded Check downloaded CSV for error details</i>' : '<i>Failed rows has been downloaded Check downloaded CSV for error details.</i>'}
				`,
					confirmButtonColor: '#2ca961', 
				}).then(() => {
					location.reload(); // Reload after OK
				});

        } else { 
            // JSON success response
            const data = await response.json();
            const successInserts = parseInt(data.successful_inserts || "0");
            const alertTitle = successInserts === 0 ? '❌ Upload Failed' : '✅ Upload Successful';

            Swal.fire({
                //icon: successInserts === 0 ? 'error' : 'success',
                title: alertTitle,
                html: `
                    <b>Total Rows:</b> ${data.total_rows}<br>
                    <b>Success:</b> ${successInserts}<br> 
                    <b>Errors:</b> ${data.error_rows}
                `
            }).then(() => {
                location.reload(); // Reload after OK
            });
        }

        statusEl.innerText = ''; // Clear status message
    })
    .catch(error => {
        console.error('Upload failed', error);
        // Error already shown in statusEl above
    });
});

  </script>






	<script>
	let otpType = '';
	let countdownInterval;

// Add a confirmation before clicking the "Verify Now" button
function askBeforeChangingValidation(type) {
    // Ask the user for confirmation before changing the validation status
    Swal.fire({
        title: 'Are you sure?',
        text: `Do you want to proceed with validating your ${type === 'google' ? 'Google Account' : 'Mobile Number'}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, proceed',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            openOtpModal(type); // Proceed to OTP modal if user confirms
        }
    });
}

function openOtpModal(type) {
    otpType = type;

    // Display the correct destination (email or mobile)
    const typeLabel = type === 'google' ? 'email - {{ $hs->email }}' : 'mobile - {{ $hs->mobile }}';
    document.getElementById('otpTypeText').innerText = `Please enter the OTP sent to your ${typeLabel}.`;

    // Reset UI
    document.getElementById('otpInput').value = '';
    document.getElementById('otpError').style.display = 'none';
    document.getElementById('resendBtn').disabled = true;
    document.getElementById('countdown').innerText = 30;

    // Show modal
    const otpModal = new bootstrap.Modal(document.getElementById('otpModal'), {
        backdrop: 'static',
        keyboard: false
    });
    otpModal.show();

    startCountdown();
    sendOtp(type); // Send initial OTP
}

function startCountdown() {
    let seconds = 30;
    clearInterval(countdownInterval); // prevent multiple intervals
    countdownInterval = setInterval(() => {
        seconds--;
        document.getElementById('countdown').innerText = seconds;
        if (seconds <= 0) {
            clearInterval(countdownInterval);
            document.getElementById('resendBtn').disabled = false;
        }
    }, 1000);
}

function resendOtp() {
    document.getElementById('resendBtn').disabled = true;
    document.getElementById('countdown').innerText = 30;
    startCountdown();
    sendOtp(otpType);
}

function sendOtp(type) {
    
    const url = `{{ url('dashboard-send-otp') }}?type=${type}`;
    
       // Show SweetAlert loading dialog
    //    Swal.fire({
    //     title: 'Sending OTP...',
    //     text: 'Please wait while we send the OTP.',
    //     allowOutsideClick: false,
    //     allowEscapeKey: false,
    //     didOpen: () => {
    //         Swal.showLoading();
    //     }
    // });

    fetch(url, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(res => res.json())
    .then(data => {
        console.log('OTP Sent:', data);
    })
    .catch(err => {
        console.error('Error sending OTP:', err);
    });
}

function verifyOtp() {
    const otp = document.getElementById('otpInput').value;
    const url = `{{ url('dashboard-verify-otp') }}`;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ otp: otp, type: otpType })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
                confirmButtonText: 'OK',
            }).then(() => {
                location.reload(); // Reload the page after successful verification
            });
        } else {
            document.getElementById('otpError').style.display = 'block';
        }
    })
    .catch(err => {
        console.error('OTP verification failed:', err);
    });
}

	</script>
		



 

    @if ($user->fist_chanege_pass == 0 || request()->query('type') !== 'admin')
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Make the modal non-dismissible
			var passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'), {
				backdrop: 'static',
				keyboard: false
			});
			passwordModal.show();
	
			// Toggle password visibility
			document.querySelectorAll('.toggle-password').forEach(btn => {
				btn.addEventListener('click', function () {
					const input = document.getElementById(this.getAttribute('data-target'));
					input.type = input.type === 'password' ? 'text' : 'password';
				});
			});
	
			// Password match check
			const form = document.getElementById('passwordForm');
			const error = document.getElementById('passwordError');
			form.addEventListener('submit', function (e) {
				const pw = document.getElementById('password').value;
				const cpw = document.getElementById('password_confirmation').value;
				if (pw !== cpw) {
					e.preventDefault();
					error.classList.remove('d-none');
				} else {
					error.classList.add('d-none');
				}
			});
		});
	</script>
	
@endif

	<script>
document.addEventListener("DOMContentLoaded", function() {
    const linkInput = document.getElementById("link");
    const popupLink = document.getElementById("popupLink");
    const copyStatus = document.getElementById("copyStatus");

    const modalElement = document.getElementById("linkModal");
    const bsModal = new bootstrap.Modal(modalElement);

    document.getElementById("btn").addEventListener("click", function () {
        const linkValue = linkInput.value;
        popupLink.value = linkValue;
        copyStatus.classList.add("d-none");
        bsModal.show();
    });

    document.getElementById("btn1").addEventListener("click", function () {
        const linkValue = linkInput.value;
        popupLink.value = linkValue;
        copyStatus.classList.add("d-none");
        bsModal.show();
    });
});

function copyPopupLink() {
    const copyText = document.getElementById("popupLink");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    navigator.clipboard.writeText(copyText.value).then(() => {
        document.getElementById("copyStatus").classList.remove("d-none");
    });
}


 
document.getElementById('generateBtn').addEventListener('click', function (e) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to generate the link for selected exam date.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, generate it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('shareForm').submit();
        }
    });
}); 

</script>

<script>
    $(document).ready(function () {
        $('#passwordModal').modal({
            backdrop: 'static', // Prevents clicking outside to close
            keyboard: false     // Disables ESC key
        });

        $('#passwordModal').modal('show'); // Show modal on page load
    });
</script>


     @endpush