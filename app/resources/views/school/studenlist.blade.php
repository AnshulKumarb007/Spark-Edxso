@extends('layouts.school')
@section('content')
<style>
.text-success {
	font-weight: bold;
	color: green;
}
.sticky-col {
    position: sticky;
    background-color: inherit;
    z-index: 1;
    white-space: nowrap;
}
#schoolTable thead th.sticky-col {
    background-color:#f2f2f2;
    z-index: 3;
}
.left-0 {
    left: 0;
}
.left-50 {
    left: 37px;
}
.left-100 {
    left: 74px;
}
.left-200 {
    left: 180px;
}
#schoolTable tr,
#schoolTable td,
#schoolTable tr {
    height: 0px !important;
    max-height: 10px !important;
   
    padding: 14px !important;
    overflow: hidden;
    white-space: nowrap;
    vertical-align: middle;
    font-size: 15px !important; /* Optional: Shrink font to fit */
	padding-bottom: 0px !important;
	padding-top: 0px !important;

}


 

#table3 tr,
#table3 td,
#table3  {
    height: 0px !important;
    max-height: 0px !important;
    line-height: 0px !important;
    padding: 20px !important;
    overflow: hidden;
    white-space: nowrap;
    vertical-align: middle;
    font-size: 15px !important; /* Optional: Shrink font to fit */
}
 
.table-body {
  overflow-x: auto;
  width: 100%;
}

.table-controls {
  overflow: visible; /* No scrolling here */
  width: 100%;
}
/* .table-controls {
  box-sizing: border-box;
  background: white;
  padding: 10px 15px;
  width: 100%;
  overflow: visible; /* impor
  border-bottom: 1px solid #ddd;
  position: sticky;
  top: 0;
  z-index: 100;
} */

.table-controls .dt-buttons button {
  white-space: nowrap; /* prevent wrapping */
}

/* Style the dynamically generated search input like Bootstrap */
#schoolTable_filter label {
  font-weight: 500;  /* Bootstrap label weight */
  margin-right: 0.5rem;
  display: flex;
  align-items: center;
}

#schoolTable_filter input[type="search"] {
  /* Bootstrap form-control styles */
  display: inline-block;
  width: auto;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.375rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

 
/* Style all dynamically generated search inputs like Bootstrap */
.dataTables_filter label {
  font-weight: 500;  /* Bootstrap label weight */
  margin-right: 0.5rem;
  display: flex;
  align-items: center;
}

.dataTables_filter input[type="search"] {
  /* Bootstrap form-control styles */
  display: inline-block;
  width: auto;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.375rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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
				<div class="col-md-12">
					<div class="page-header-title">
						<h5>Student Registrations</h5>
					</div>
					{{-- <ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('school.dashboard')}}"><i class="feather icon-home"></i></a></li>
						<li class="breadcrumb-item">Student Registrations</li>
					</ul> --}}
				</div>
			</div>
		</div>
	</div> 

<div class="row">
<div class="col-md-12 col-xl-12">
<div class="card card-social">										 
<div class="card-block">		
<h5 class="my-font-weight2">Instruction </h5>
<ul>
  <li>Use this panel to manage student registrations for SPARK Olympiads.</li>
  <li>Select a class and subject to filter student records.</li>
  <li>View enrolled students, check fee status, and download records in CSV format.</li>
  <li>Use Bulk Upload to register multiple students at once.</li>
  <li>Fee details show the actual amount, any applicable discount, and payment status.</li>
  <li>You can also download individual or complete student reports from this section.</li>
  <li>For assistance, please reach out to our support team at the contact provided.</li>
</ul>
  
		 
</div>
</div>
</div>

	<div class="col-md-12 col-xl-12">
	  <div class="card card-social">	 
		<div class="card-header"> 
				  <form method="GET" action="{{ url()->current() }}" class="mb-4">
						  <div class="row">
							  <div class="col-md-4">
								  <label>Class</label>
								  <select name="class_id[]" id="class" class="form-control class-select" multiple required>                                                                 
										@foreach($classes as $class)
											<option value="{{ $class->id }}">{{ $class->name }}</option>
										@endforeach
									</select>
							  </div>


							  <div class="col-md-6">
								<label for="subject" class="form-label">Exams</label>
								  <select name="subject_id[]" id="subject" class="form-select class-select" multiple>
									  <option value="">Select Exam</option>
								  </select>
							  </div> 
							 </div>
							 <div class="row">
								<div class="col-md-7 align-self-end">
									<button type="submit" class="btn btn-outline-secondary mt-4">Filter</button>
									<a href="{{ url()->current() }}" class="btn btn-outline-secondary mt-4">Reset</a>
									<a href="#" class="btn btn-outline-secondary mt-4" data-bs-toggle="modal" data-bs-target="#uploadCsvModal" title="Upload bulk students">Bulk Upload </a> <button class="btn btn-outline-secondary mt-4" data-bs-toggle="modal" data-bs-target="#downloadModal"> Download Report</button>
								</div> 
							</div>
				  </form>    
				  
				  
				
		</div>
	   </div>
	</div>
  </div>

	<div class="row">  
		<div class="col-md-12 col-xl-12">  
					  <ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="color:#004aad;font-weight:500">Step 1 - Student Data Verification</button>
						</li>
						<li class="nav-item" role="presentation">
						  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="color:#004aad;font-weight:500">Step 2 - Student Fee Collection</button>
						</li>
						<li class="nav-item" role="presentation">
						  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" style="color:#004aad;font-weight:500">Step 3 - Ready For Submission</button>
						</li> 
					  </ul>
					  <div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

							<form action="" class="form-contol">
								<div class="row">
									<div class="col-md-3">
											<select class="form-control" name="" id="action_">
													<option value=""> Bulk Action </option>
													<option value="Verify All">Verify </option>
													<option value="Reject All">Reject </option>
											</select> 
									</div>
									<div class="col-md-4">
										<button type="button" name="apply" class="btn btn-outline-secondary">Apply</button>
									</div>
								</div>
							</form> <br/>
							
							<div class="table-responsive">
								@php
									$sr = 1;
									$grandTotal = 0;
									$duetotal = 0;
								@endphp

						<div class="table-wrapper"> 

							<table class="table datatable dataTable table-striped  table-hover" id="schoolTable">
								<thead>
									<tr>
										<th class="sticky-col left-0"><input type="checkbox" id="select_all_verification_status" title="select all for update fee status verified or unverified" /></th>
										<th class="sticky-col left-50">#</th>
										<th class="sticky-col left-100">Admission No.</th>
										<th class="sticky-col left-200">First Name</th>
										<th>Middle Name </th>
										<th>Last Name </th>
										<th>Class</th>
										<th>Sec.</th>
										<th>
											@foreach($subjects as $subject)
													<th>{{ $subject->name }}</th>
											@endforeach
										</th>
										<th>Mobile No.</th>
										<th>Email ID</th>
										<th>Relation</th>
										<th>Relative  Name</th>											 
										<th>Verification Status</th>
										<th>Transaction/UTR</th>
										<th>Fee Status</th>
										<th>Action</th>
									</tr>
								</thead>
									<tbody>
										@foreach($students as $st)                                                                                                   
										@php
										$subjectCount = count(array_filter(array_map('trim', explode(',', $st->subject_names))));
										$total_fee = $subjectCount * $st->fee;
										$appliedDiscount = 0;
										$finalAmount = $total_fee;
									@endphp
								 
											<tr>
											  <td class="sticky-col left-0 bg-white">
												<span class="">
													<input type="checkbox" class="student-checkbox-for-verify" data-id="{{ $st->id }}" 
														name="fee_status"
														{{ $st->verify_status==2 ? 'checked' : '' }}
													/>
												</span>
											</td>
												<td class="sticky-col left-50 bg-white">{{ $sr++ }}</td>
												<td class="sticky-col left-100 bg-white">{{ $st->admission_no }}</td>
												<td class="sticky-col left-200 bg-white text-capitalize">{{ $st->full_name }}</td>
												<td class="text-capitalize">{{ $st->middle_name }} </td>
												<td class="text-capitalize"> {{ $st->last_name }}</td>
												<td>{{ $st->class_name }}  </td>
												<td>{{ $st->section }}  </td>
												 
												<td>
													
													@php
														// Convert the comma-separated subject_id string to an array
														$studentSubjectIds = array_map('trim', explode(',', $st->subject_id));
													@endphp

													@foreach($subjects as $subject)
													<td>{{ in_array($subject->id, $studentSubjectIds) ? 'Yes' : 'No' }}</td>
												@endforeach
													
													 
												
												
												</td>
											    <td>{{ $st->mobile }}</td>	
											    <td>{{ $st->email }}</td>	 
											    <td class="text-capitalize">{{ $st->relation }}</td>	
											    <td class="text-capitalize">{{ $st->father_name }} {{$st->relative_middle_name}} {{$st->relative_last_name}}</td>	
												 

												<td class="student-verification-status" data-student-id="{{ $st->id }}">
													<div class="mt-3">
													@if($st->verify_status != 2)
													  <p href="#"  
													  style="background:{{ $st->verify_status === 1 ? 'orange' : ($st->verify_status === 2 ? 'green' : 'red') }};
													  border:1px solid {{ $st->verify_status === 1 ? 'orange' : ($st->verify_status === 2 ? 'green' : 'red') }};padding:2px;border-radius:4px;color:#fff;text-align: center;font-size: 11px;width:65px;height:20px;
														  ">
													   {{ $st->verify_status === 1 ? 'Pending' : ($st->verify_status === 2 ? 'Verified' : 'Rejected') }}
														</p>
												   @else
														<p href="#" class="verify-btn" style="color: green;">Verified   </p>
												   @endif
													</div>
													 
													</td>
													<td>
														@if($st->razorpay_payment_id)
															{{$st->razorpay_payment_id}}
														@elseif($st->utr)
															{{$st->utr}}
														@else
															<b>Cash will collect by school</b>
														@endif
 
													</td>
													<td>

													@if($st->razorpay_payment_id)
															 @if($st->status=="success")
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b> 
															 @endif
														@elseif($st->utr)
															 @if($st->fee_status==1)
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b>
															 @endif
														@else
														 	@if($st->fee_status==1)
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b>
															 @endif
														@endif
													</td>
											 
												 
												<td class="student-verification-status" data-student-id="{{ $st->id }}">
												@if($st->verify_status != 2)
												  <a href="#" 
												  class="verify-btn" 
												  data-student='@json($st)'
												  data-total-fee="{{ number_format($total_fee, 2) }}"
												  >
												   <i class="fa fa-check text-success"></i>
											   </a>
											   @else
													<a href="#" class="verify-btn" style="color: green;font-weight: bold;">Verified   </a>
											   @endif
											   
												&nbsp;
												<a href="#" class="delete-btn" data-url="{{ route('student.delete', ['id' => $st->id]) }}">
													<i class="feather icon-trash text-danger"></i>
												  </a>
												</td>
												 
											</tr>
										@endforeach 
									</tbody>                                         
								</table>
						</div>


								<div class="d-flex justify-content-between align-items-center mt-3">
								<div>
									Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} results
								</div>
								<div>
									{{ $students->onEachSide(1)->links('pagination::bootstrap-4') }}
								</div>
							</div> 
									
							</div>
							 
						</div>
						 
						
						<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
							<div class="table-responsive">

							
								@php
									$sr = 1;
									$grandTotal = 0;
									$duetotal = 0;
									$duetotalamount = 0;
								@endphp

								  <table class="datatable table table-striped table-hover" id="table2">
									<thead>
										<tr>
										  @if($user->online_payment==0)
										  <th><input type="checkbox" id="select_all_fee_status" title="select all for update fee status verified or unverified" /></th>
										  @endif
											<th>#</th>
											<th>Admission No.</th>
											<th>First Name </th>
											<th>Middle Name </th>
											<th>Last Name </th>
											<th>Class</th>
											<th>Sec.</th>
											<th>
												@foreach($subjects as $subject)
														<th>{{ $subject->name }}</th>
												@endforeach
											</th>
											<th>Mobile No.</th>
											<th>Email </th>
											<th>Relation</th>
											<th>Relative  Name</th>
											<th>Transaction/UTR</th>
											<th>Fee Status</th>	
											<th>Fee</th> 
											 
										</tr>
									</thead>
									<tbody>
										@foreach($students2 as  $st)                                                                                                   
										@php
										$subjectCount = count(array_filter(array_map('trim', explode(',', $st->subject_names))));
										$total_fee = $subjectCount * $st->fee;
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
								
									@php
										if($st->verify_status==1){
											$grandTotal += $finalAmount;
										}else{
											$duetotalamount += $finalAmount;
										}
									@endphp
												
											<tr>
											  @if($user->online_payment==0)
													<td>
														<span class="fee-status-wrapper" data-student-id="{{ $st->id }}">
															<input type="checkbox"
																class="fee_status_checkbox"
																data-student-id="{{ $st->id }}"
																data-admission-no="{{ $st->admission_no }}"
																data-fee="{{ $finalAmount }}"
																name="fee_status"
																{{ $st->fees_statuss ? 'checked' : '' }}
															/>
														</span>
													</td>
												@endif
												<td>{{ $sr++ }}</td>
												<td>{{ $st->admission_no }}</td>
												<td class="text-capitalize">{{ $st->full_name }}</td>
												<td class="text-capitalize">{{ $st->middle_name }} </td>
												<td class="text-capitalize"> {{ $st->last_name }}</td>
												<td>{{ $st->class_name }}  </td>
												<td>{{ $st->section }}  </td>
												 
												<td>
													
													@php
														// Convert the comma-separated subject_id string to an array
														$studentSubjectIds = array_map('trim', explode(',', $st->subject_id));
													@endphp

													@foreach($subjects as $subject)
													<td>{{ in_array($subject->id, $studentSubjectIds) ? 'Yes' : 'No' }}</td>
												@endforeach
											    <td>{{ $st->mobile }}</td>	
											    <td>{{ $st->email }}</td>	
											    <td class="text-capitalize">{{ $st->relation }}</td>	
											    <td class="text-capitalize">{{ $st->father_name }} {{$st->relative_middle_name}} {{$st->relative_last_name}}</td>	
												<td>
														@if($st->razorpay_payment_id)
															{{$st->razorpay_payment_id}}
														@elseif($st->utr)
															{{$st->utr}}
														@else
															<b>Cash will collect by school</b>
														@endif
 
													</td>
													<td>

													@if($st->razorpay_payment_id)
															 @if($st->status=="success")
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b> 
															 @endif
														@elseif($st->utr)
															 @if($st->fee_status==1)
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b>
															 @endif
														@else
														 	@if($st->fee_status==1)
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b>
															 @endif
														@endif
													</td>
												
												
												<td>
												  {{ number_format($finalAmount, 2) }}
												 
											  </td> 
											 
											 												 												 
											</tr>
										@endforeach 
									</tbody>                                         
								</table>


						  <!-- <div class="d-flex justify-content-center mt-3">
									  {{ $students->links() }}
						   </div>-->
							  <div class="d-flex justify-content-center mt-3">
								  <h3 style="color: #ff7d00;">Total Due Amount:  ₹{{ number_format($duetotalamount, 2) }}</h3>
								  
							   </div> 
							{{-- <div class="d-flex justify-content-center mt-3">
								<h3>
								  @if(!empty($invoice))
									<a href="{{route('view-manage.school-paymets',['id'=>$invoice->school_id])}}"
									  class="btn btn-sm btn-success">
										 Click here to view the invoice 
									</a>                    
								  @else
								  <a href="@if($grandTotal > 0){{url('Spark-bank-generete-invoice')}}@else#@endif"
								  class="btn btn-sm btn-success"
								  id="generateInvoiceBtn">
								  Click here to generate the invoice for the due amount
							   </a>
								  @endif
								  
							   </h3>
							  </div> --}}
							</div>
						
						
						</div>
						
						
						
						<div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
						<div class="table-responsive">
								@php
									$sr = 1;
									$grandTotal = 0;
									$duetotal = 0;
									$totalgrandTotal=0;
								@endphp  

								  <table class="datatable table table-striped table-hover" id="table3">
									<thead>
										<tr>
										   
											<th>#</th>
											<th>Admission No.</th>
											<th>First Name </th>
											<th>Middle Name </th>
											<th>Last Name </th>
											<th>Class</th>
											<th>Sec.</th>
											<th>
												@foreach($subjects as $subject)
														<th>{{ $subject->name }}</th>
												@endforeach
											</th>
											
											<th>Mobile No.</th>
											<th>Email ID</th>
											<th>Relation</th>
											<th>Relative  Name</th>
											<th>Transaction/UTR</th>
										    <th>Fee Status</th>
											<th>Fee</th>											 
											<th>Status</th>
											<th>Action</th>
											@foreach($subjects as $subject1)
												<th>{{ $subject1->name }}</th>
											@endforeach
											
										</tr>
									</thead>
									<tbody>
										@foreach($students3 as $st)                                                                                                   
										@php
										$subjectCount = count(array_filter(array_map('trim', explode(',', $st->subject_names))));
										$total_fee = $subjectCount * $st->fee;
										$appliedDiscount = 0;
										$finalAmount = $total_fee;
									@endphp
								
										@foreach($discounts as $dis)
										@if ($subjectCount >= $dis->from_qty && $subjectCount <= $dis->to_qty)
											@php
												if ($dis->discount_value === 'percentage') {
												   $appliedDiscount = ($total_fee * $dis->discount_value) / 100;
												} else {
													$appliedDiscount = $dis->discount_value;
												}
									
												$finalAmount = $total_fee - $appliedDiscount;
											@endphp
											@break
										@endif
									@endforeach
								
									@php
										$totalgrandTotal += $finalAmount;
									@endphp
												
											<tr>											   
												<td>{{ $sr++ }}</td>
												<td>{{ $st->admission_no }}</td>
												<td class="text-capitalize">{{ $st->full_name }}</td>
												<td class="text-capitalize">{{ $st->middle_name }} </td>
												<td class="text-capitalize"> {{ $st->last_name }}</td>
												<td>{{ $st->class_name }}  </td>
												<td>{{ $st->section }}  </td> 
												<td>
													
													@php
														// Convert the comma-separated subject_id string to an array
														$studentSubjectIds = array_map('trim', explode(',', $st->subject_id));
													@endphp

													@foreach($subjects as $subject)
														<td>{{ in_array($subject->id, $studentSubjectIds) ? 'Yes' : 'No' }}</td>
													@endforeach
											    
											    <td>{{ $st->mobile }}</td>	
											    <td>{{ $st->email }}</td>	
											    <td class="text-capitalize">{{ $st->relation }}</td>	
												<td class="text-capitalize">{{ $st->father_name }} {{$st->relative_middle_name}} {{$st->relative_last_name}}</td>	
												<td>
														@if($st->razorpay_payment_id)
															{{$st->razorpay_payment_id}}
														@elseif($st->utr)
															{{$st->utr}}
														@else
															<b>Cash collected by school</b>
														@endif
 
													</td>
													<td>

													@if($st->razorpay_payment_id)
															 @if($st->status=="success")
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b> 
															 @endif
														@elseif($st->utr)
															 @if($st->fee_status==1)
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b>
															 @endif
														@else
														 	@if($st->fee_status==1)
																<b class="text-success">Success</b>
															 @else
															    <b class="text-danger">Pending</b>
															 @endif
														@endif
													</td> 
												<td>  {{ number_format($finalAmount, 2) }}</td>	
											 
												<td class="verification-status" data-student-id="{{ $st->id }}">
													 
														<span class="text-success">Ready For Exam</span>									 
												</td>
												<td>
													<a href="{{ route('exam-report', ['admno' => str_replace(['/','-','\\'], '', $st->admission_no)]) }}" class="btn btn-success" target="_blank">Report</a>		
												</td>
												@foreach($subjects as $s)
													@php
													$filename = $st->school_id . '_' . str_replace(['/'], '', $st->admission_no) . '_' . $s->certificate_code . '.png';

														$filePath = public_path('certificate/' . $filename); 
													@endphp

													<td>
														@if(File::exists($filePath))
															<a href="{{ asset('certificate/' . $filename) }}" class="btn btn-primary" download>
																Certificate
															</a>
														@else
															<span class="text-danger">-</span>
														@endif
													</td>
												@endforeach


												
												  
											</tr>
										@endforeach 
									</tbody>                                         
								</table>  


						  	<!-- <div class="d-flex justify-content-center mt-3">
								{{ $students->links() }}
						   	</div> -->
							<div class="d-flex justify-content-center mt-3">
								<h3 style="color: #21a611;">Total Collected Amount:  ₹{{ number_format($totalgrandTotal, 2) }}</h3>  
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

<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewLabel" aria-hidden="true" style="width:100%">
<div class="modal-dialog modal-lg ">
<div class="modal-content " id="previewContainer">
<!-- Invoice HTML from AJAX will be loaded here -->
</div>
</div>
</div>


<!-- Student Detail Modal -->
<div class="modal fade" id="studentDetailModal" tabindex="-1" aria-labelledby="studentDetailModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Student Details</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
</div>
<div class="modal-body" id="studentDetailContent">
<!-- Filled dynamically -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-success" id="verifyBtn">Verify</button>
<button type="button" class="btn btn-danger" id="notVerifyBtn">Not Verify</button>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>







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
	 <p class="text-danger">Note:<br/> 1. Please enter all the data as per the sample CSV</p>

</div>

<div class="modal-footer">
<a href="{{url('upload_students_sample.csv')}}" download class="btn btn-success">Download Student Sample CSV File</a>
<button type="submit" class="btn btn-success">Upload</button>
</div>
</form>
</div>
</div>







<!-- Download Report Modal -->
<div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
<div class="modal-dialog">
<form id="downloadForm" class="modal-content">
@csrf
<div class="modal-header">
<h5 class="modal-title" id="downloadModalLabel">Download Report</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
</div>
<div class="modal-body">
<div class="mb-3">
<label for="from_date">From Date</label>
<input type="date" class="form-control" id="from_date" name="from_date" required>
</div>
<div class="mb-3">
<label for="to_date">To Date</label>
<input type="date" class="form-control" id="to_date" name="to_date" required>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">Download CSV</button>
</div>
</form>
</div>
</div>

<!-- [ Main Content ] end -->
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>







<script>
$(document).ready(function () {
$('#class').on('change', function () {
		var stateID = this.value;
			console.log("Selected State ID:", stateID); // Debug line
				$("#subject").html('');
					$.ajax({
					url: "{{ url('get-subject') }}/" + stateID,
					type: "GET",
					success: function (res) {
					$('#subject').html('<option value="">Select Exam</option>');
					$('#subject').select2({
                        placeholder: "Select Exam",
                        allowClear: true
                    });
					$.each(res, function (key, value) {
					$('#subject').append('<option value="' + value.id + '">' + value.name + '</option>');
				});
			}
		});
});
});



//Start  Select All Handler for student verification
//Start  Select All Handler for student verification
//Start  Select All Handler for student verification
//Start  Select All Handler for student verification
//Start  Select All Handler for student verification
//Start  Select All Handler for student verification

$(document).ready(function () {
	$('#select_all_verification_status').on('change', function () {
    $('.student-checkbox-for-verify').prop('checked', this.checked);
});


$('button[name="apply"]').on('click', function () {
    const selectedAction = $('#action_').val();

    if (!selectedAction) {
        Swal.fire({
            icon: 'warning',
            title: 'No Action Selected',
            text: 'Please select a bulk action from the dropdown.',
        });
        return;
    }

    Swal.fire({
        title: 'Bulk Verification Update',
        text: `Are you sure you want to all selected students?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if (result.isConfirmed) {
            const status = selectedAction === 'Verify All' ? 2 : 3;
            updateSelectedVerificationStatus(status);
        }
    });
});


function updateSelectedVerificationStatus(status) {
    let payload = [];

    $('.student-checkbox-for-verify:checked').each(function () {
        const studentId = $(this).data('id');
        if (studentId) {
            payload.push({
                id: studentId,
                status: status
            });
        }
    });

    if (payload.length === 0) {
        Swal.fire({
            icon: 'info',
            title: 'No students selected',
            text: 'Please select at least one student to update.',
        });
        return;
    }

    $.ajax({
        url: '{{ route("students.updatevefifyStatus") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            entries: payload
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message,
                timer: 1200,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        },
        error: function (xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Update Failed',
                text: xhr.responseJSON?.message || 'Something went wrong while updating the status.',
            });
        }
    });
}




//End  Select All Handler for student verification
//End  Select All Handler for student verification
//End  Select All Handler for student verification
//End  Select All Handler for student verification
//End  Select All Handler for student verification
//End  Select All Handler for student verification




 







// Select All Handler for fee
// Select All Handler for fee
// Select All Handler for fee
// Select All Handler for fee
// Select All Handler for fee
// Select All Handler for fee
$('#select_all_fee_status').change(function () {
let masterCheckbox = $(this);
let checked = masterCheckbox.is(':checked');

// Immediately revert the checkbox until confirmation
masterCheckbox.prop('checked', !checked);

	Swal.fire({
	title: 'Are you sure?',
	text: "Do you want to change the fee status for all students?",
	icon: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, change all'
	}).then((result) => {
	if (result.isConfirmed) {
	// Apply the new state
	masterCheckbox.prop('checked', checked);

	let payload = [];

	$('.fee_status_checkbox').each(function () {
	let feeCheckbox = $(this);
	let fee = parseFloat(feeCheckbox.data('fee'));

	if (!fee || fee === 0) {
	feeCheckbox.prop('checked', false);

	if (checked) {
		Swal.fire({
			icon: 'warning',
			title: 'Invalid Fee',
			text: 'One or more students have a fee that is 0 or missing.',
			timer: 2000,
			showConfirmButton: false
		});
	}

return; // Skip this checkbox
}

feeCheckbox.prop('checked', checked);

	payload.push({
		student_id: feeCheckbox.data('student-id'),
		admission_no: feeCheckbox.data('admission-no'),
		fee: fee,
		status: checked ? 1 : 0
		});
	});

	if (payload.length > 0) {
			sendFeeStatusToServer(payload);
			}
		}
	});
});


	// Individual Checkbox Handler
	$('.fee_status_checkbox').change(function () {
	let checkbox = $(this);
	let fee = parseFloat(checkbox.data('fee'));

	if (!fee || fee === 0) {
	checkbox.prop('checked', false);

		Swal.fire({
			icon: 'warning',
			title: 'Invalid Fee',
			text: 'This student has a fee that is 0 or missing.',
			timer: 2000,
			showConfirmButton: false
		});

	return;
}

// Store the current checked state
let isChecked = checkbox.is(':checked');

// Revert the checkbox until user confirms
checkbox.prop('checked', !isChecked);

Swal.fire({
	title: 'Are you sure?',
	 text: "Do you want to change the fee status?",
	 icon: 'warning',
	 showCancelButton: true,
	 confirmButtonColor: '#3085d6',
	 cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, change it!'
}).then((result) => {
if (result.isConfirmed) {
 
	checkbox.prop('checked', isChecked); 
	 let payload = [{
	 student_id: checkbox.data('student-id'),
	 admission_no: checkbox.data('admission-no'),
	 fee: fee,
	 status: isChecked ? 1 : 0
	}]; 
	sendFeeStatusToServer(payload);
}
});
});


// AJAX Request
function sendFeeStatusToServer(payload) {
	$.ajax({
		url: '{{ route("students.updateFeeStatus") }}',
		method: 'POST',
		data: {
		_token: '{{ csrf_token() }}',
		entries: payload
	},
	success: function (response) {
			Swal.fire({
			icon: 'success',
			title: 'Success',
			text: response.message,
			timer: 1000,
			showConfirmButton: false
			}).then(() => {
				location.reload();
			});
	},
	error: function (xhr) {
	Swal.fire({
	icon: 'error',
	title: 'Error',
	text: xhr.responseJSON?.message || 'An error occurred while updating fee status.',
	});
	}
});
}
});


</script>



<script>
// document.getElementById('csvUploadForm').addEventListener('submit', function(e) {
// e.preventDefault();

// const formData = new FormData(this);
// document.getElementById('uploadStatus').innerText = 'Uploading...';

// fetch("{{ route('students.upload') }}", {
// 	method: "POST",
// 		headers: {
// 		'X-CSRF-TOKEN': '{{ csrf_token() }}'
// 		},
// 		body: formData
// 	})  
// 	.then(response => response.json())
// 	.then(data => {
// 		document.getElementById('uploadStatus').innerText = data.message || 'Upload complete.';
// 		this.reset();
// 		location.reload();
// 	})
// 	.catch(error => {
// 		console.error('Upload failed', error);
// 		document.getElementById('uploadStatus').innerText = 'Upload failed.';
// 	});
// });



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
document.getElementById('downloadForm').addEventListener('submit', function(e) {
e.preventDefault();

const from = document.getElementById('from_date').value;
const to = document.getElementById('to_date').value;

if (!from || !to) {
alert('Please select both dates.');
return;
}

// Trigger download by navigating to download URL
const downloadUrl = `{{ route('students.download-report') }}?from=${from}&to=${to}`;
window.open(downloadUrl, '_blank');
});
</script>
<script>
$(document).ready(function() {
$('#class').select2({      
placeholder: "--Select class--",
allowClear: true
});
});
</script>

<script>
$(document).ready(function() {
	$('#subject').select2({      
		placeholder: "Select class first",
		allowClear: true
	});
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
const deleteButtons = document.querySelectorAll('.delete-btn');

deleteButtons.forEach(button => {
button.addEventListener('click', function (e) {
e.preventDefault();
const url = this.getAttribute('data-url');

Swal.fire({
title: 'Are you sure?',
// text: "This action cannot be undone.",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#d33',
cancelButtonColor: '#3085d6',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {
window.location.href = url;
}
});
});
});
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
const verifyButtons = document.querySelectorAll('.verify-btn');
let selectedStudentId = null;

verifyButtons.forEach(button => {
button.addEventListener('click', function (e) {
e.preventDefault();

const student = JSON.parse(this.dataset.student);
const subjectsArray = student.subject_names.split(',').map(s => s.trim()).filter(s => s);
const subjectCount = subjectsArray.length;
selectedStudentId = student.id;

const content = `
<div class="card">
<div class="card-body">

<div class="row" style="color:black">
<div class="col-md-5 mb-2">
<strong style="font-weight: 900" class="text-capitalize">Admission No:</strong> ${student.admission_no}
</div>
<div class="col-md-7 mb-2">
<strong style="font-weight: 900" class="text-capitalize">Full Name:</strong> ${student.full_name} ${student.middle_name ?? ''} ${student.last_name ?? ''}
</div>
<div class="col-md-5 mb-2">
<strong style="font-weight: 900" class="text-capitalize">Class (Section):</strong> ${student.class_name} (${student.section})
</div>
<div class="col-md-7 mb-2 ">
<strong style="font-weight: 900" class="text-capitalize">Exams:</strong> ${student.subject_names.split(',').join(',')}
</div>
<div class="col-md-5 mb-2">
<strong style="font-weight: 900">Mobile No.:</strong> ${student.mobile}
</div>
<div class="col-md-7 mb-2">
<strong style="font-weight: 900">Email ID:</strong> ${student.email}
</div>
<div class="col-md-5 mb-2">
<strong style="font-weight: 900" class="text-capitalize">Relative Name:</strong> ${student.father_name}
</div>
<div class="col-md-7 mb-2">
<strong style="font-weight: 900" class="text-capitalize">Relation:</strong> ${student.relation}
</div>
<div class="col-md-5 mb-2">
<strong style="font-weight: 900">Fee</strong> ${student.student_fee}
</div>
</div>
</div>
</div>
`;


document.getElementById('studentDetailContent').innerHTML = content;
new bootstrap.Modal(document.getElementById('studentDetailModal')).show();
});
});

// Handle Verify Button
document.getElementById('verifyBtn').addEventListener('click', function () {
updateStudentStatus(selectedStudentId, true);
});

// Handle Not Verify Button
document.getElementById('notVerifyBtn').addEventListener('click', function () {
updateStudentStatus(selectedStudentId, false);
});

function updateStudentStatus(studentId, isVerified) {
// Update UI immediately


const statusCell = document.querySelector(`.student-verification-status[data-student-id="${studentId}"]`);
// Show SweetAlert loading dialog
Swal.fire({
title: 'Updating...',
text: 'Please wait .',
allowOutsideClick: false,
allowEscapeKey: false,
didOpen: () => {
Swal.showLoading();
}
});

if (statusCell) {
statusCell.innerHTML = isVerified
? '<span class="text-success">Verified</span>'
: '<span class="text-danger">Not Verified</span>';
}

fetch("{{ route('student.check-verification') }}", {
method: 'POST',
headers: {
'Content-Type': 'application/json',
'X-CSRF-TOKEN': '{{ csrf_token() }}'
},
body: JSON.stringify({
student_id: studentId,
status: isVerified ? 1 : 0
})
})
.then(response => response.json())
.then(data => {
if (data.message) {
	Swal.fire({
	icon: 'success',
	title: 'Success',
	text: data.message || 'Status updated successfully!',
	timer: 2000,
	showConfirmButton: false,
	willClose: () => {
            location.reload(); // Refresh the page
        }
});
} else {
	Swal.fire({
	icon: 'warning',
	title: 'Warning',
	text: data.message || 'Something might be wrong!',
	});
}
})
.catch(error => {
console.error('Error:', error);
	Swal.fire({
	icon: 'error',
	title: 'Oops...',
	text: 'Something went wrong while updating status.',
	confirmButtonColor: '#d33'
});
});


// Close modal
bootstrap.Modal.getInstance(document.getElementById('studentDetailModal')).hide();
}


});




</script>

<script>
// $('#generateInvoiceBtn').on('click', function (e) {
//     e.preventDefault();

//     Swal.fire({
//         title: 'Are you sure?',
//         text: "Do you want to generate the invoice?",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#2ca961',
//         cancelButtonColor: '#c21d17',
//         confirmButtonText: 'Yes, generate it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: "{{ url('Spark-bank-generete-invoice') }}", // Laravel route for preview
//                 type: 'GET',

//                 success: function (response) {
//                     $('#previewContainer').html(response);
//                     $('#previewModal').modal('show');
//                 },
//                 error: function () {
//                     alert("Something went wrong while checking verification.");
//                 },
//                 complete: function () {
//                     hideloader(); // your custom hide loader function
//                 }
//             });
//         }
//     });
// });
</script>


<script>
document.getElementById('generateInvoiceBtn').addEventListener('click', function (e) {
e.preventDefault(); // Prevent the default link behavior

const url = this.getAttribute('href'); // Get the link URL

Swal.fire({
title: 'Are you sure?',
text: "Do you want to generate the invoice for the due amount?",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#2ca961',
cancelButtonColor: '#c21d17',
confirmButtonText: 'Yes, generate it!',
cancelButtonText: 'Cancel'
}).then((result) => {
if (result.isConfirmed) {
// Show loading spinner
Swal.fire({
title: 'Generating invoice...',
allowOutsideClick: false,
didOpen: () => {
Swal.showLoading();
}
});

// Simulate delay or redirect after showing loader
// Replace setTimeout with actual logic if needed
setTimeout(() => {
window.location.href = url; // Proceed to the link
}, 1000); // 1 second delay to show loader (optional)
}
});
});

</script>


@endpush