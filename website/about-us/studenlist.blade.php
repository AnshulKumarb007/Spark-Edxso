@extends('layouts.admin')
@section('content')
<style>

<style>
.text-success {
    font-weight: bold;
    color: green;
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
												<h5>Manage Students</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{route('school.dashboard')}}"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item">Manage Students</li>
											</ul>
										</div>
									</div>
								</div>
							</div> 

              <div class="row">
                <div class="col-md-12 col-xl-12">
                <div class="card card-social">										 
                  								               
                
                  <div class="card-header">

                              <form method="GET" action="{{ url()->current() }}" class="mb-4">
                                      <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label>School</label>
                                            <select name="school_id" id="school"  class="form-control class-select" multiple>                                                                 
                                                  @foreach($schools as $school)
                                                      <option value="{{ $school->school_id }}">{{ $school->school_name }} - {{ $school->school_id }}</option>
                                                  @endforeach
                                              </select>
                                            
                                        </div>
                                     

                                          <div class="col-md-4">
                                              <label>Class</label>
                                              <select name="class_id[]" id="class" class="form-control class-select" multiple>                                                                 
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                          </div>


                                          <div class="col-md-4">
                                            <label for="subject" class="form-label">Exams</label>
                                              <select name="subject_id[]" id="subject" class="form-select class-exam" multiple>
                                               
                                              </select>
                                          </div>

                                          <div class="col-md-4">
                                            <label>Date</label>
                                            <input type="date" name="date" class="form-control " style="height: 34px;"/>
                                        </div>
 

                                          <div class="col-md-4 align-self-end mt-2">
                                              <button type="submit" class="btn  btn-success">Filter</button>
                                              <a href="{{ url()->current() }}" class="btn btn-danger">Reset</a>
                                          </div>
                                      </div>
                            </form> 
                          
                          </div>
                          </div>
                          </div>
                          </div>

                            <div class="row">
 
                                <div class="col-md-12 col-xl-12">
                                        <div class="card card-social">										 
                                            <div class="card-block">										 

                                             
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="text-success">Total Enrolled Students - {{$total_student}}</h5>                                            
                                             
                                             
                                           

                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                            @php
                                                $sr = 1;
                                                $grandTotal = 0;
                                                $duetotal = 0;
                                            @endphp

                                        <table class="table datatable" id="schoolTable">
                                            <thead>
                                                <tr>
                                                  {{-- <th><input type="checkbox" id="select_all_fee_status" title="select all for update fee status verified or unverified" /></th> --}}
                                                    <th>#</th>
                                                    <th>School id</th>
                                                    <th>School <br/>Name</th>
                                                    <th>Admission No.</th>
                                                    <th>Student <br/>Full Name</th>
                                                    <th>Class(Sec.)</th>
                                                    <th>Exams</th>
                                                    <th>Fee</th> 
                                                    <th>Fee <br/>Status</th>
                                                    <th>Verification <br/>Status</th>
                                                   
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
                                                $grandTotal += $finalAmount;
                                            @endphp
                                                        
                                                    <tr>
                                                      {{-- <td>
                                                        <span class="fee-status-wrapper" data-student-id="{{ $st->id }}">
                                                            <input type="checkbox"
                                                                class="fee_status_checkbox"
                                                                data-student-id="{{ $st->id }}"
                                                                data-admission-no="{{ $st->admission_no }}"
                                                                data-fee="{{ $total_fee }}"
                                                                name="fee_status"
                                                                {{ $st->fees_statuss ? 'checked' : '' }}
                                                            />
                                                        </span>
                                                    </td> --}}
                                                        <td>{{ $sr++ }}</td>
                                                        <td>{{$st->school_id}}</td>
                                                        <td>{{ $st->school_name }}</td>
                                                        <td>{{ $st->admission_no }}</td>
                                                        <td class="text-capitalize">{{ $st->full_name }} {{ $st->middle_name }} {{ $st->last_name }}</td>
                                                        <td>@if(!empty($st->class_name)){{ $st->class_name }} ({{ $st->section }})@endif</td>
                                                        <td>{!! str_replace(',', ", ", $st->subject_names) !!}</td>
                                                        <td>
                                                          {{ number_format($finalAmount, 2) }}
                                                          <br/>
                                                          <small class="text-muted">
                                                              Discount: {{ number_format($appliedDiscount, 2) }} <br/>
                                                              <strong>Actual:  {{ number_format($total_fee, 2) }}</strong>
                                                          </small>
                                                      </td> 
                                                     
                                                        <td class="verification-status" data-student-id="{{ $st->id }}">
                                                            @if($st->fees_statuss == null)
                                                                <span class="text-danger">Due</span>
                                                            @else
                                                                <span class="text-success">Paid</span>
                                                                @php $duetotal+=$st->paid_amount;@endphp
                                                            @endif
                                                        </td>
                                                        <td class="student-verification-status" data-student-id="{{ $st->id }}">
                                                           
                                                            @if($st->verify_status != 2)
                                                            <p href="#"  
                                                            style="background:{{ $st->verify_status === 1 ? 'orange' : ($st->verify_status === 2 ? 'green' : 'red') }};
                                                            border:1px solid {{ $st->verify_status === 1 ? 'orange' : ($st->verify_status === 2 ? 'green' : 'red') }};padding:2px;border-radius:4px;color:#fff;text-align: center;font-size: 11px;
                                                                ">
                                                             {{ $st->verify_status === 1 ? 'Pending' : ($st->verify_status === 2 ? 'Verified' : 'Rejected') }}
                                                              </p>
                                                         @else
                                    <p href="#" class="verify-btn" style="background: green;padding:2px;border-radius:4px;color:#fff;text-align: center;font-size: 11px;">Verified </p>
                                                         @endif
                                                        
                                                    
                                                        </td>
                                                         
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                            
                                        </table>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div>
                                                
                                            </div>
                                            
                                            <div>
                                                {{-- Pagination links --}}
                                                {{ $students->appends(request()->query())->links() }}
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
	    </div>
	</div>

  

 @endsection

 @push("scripts")
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
                  $('#subject').html('<option value="">--Select Exam--</option>');
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

  $(document).ready(function() {
	$('#subject').select2({      
		placeholder: "Select class first",
		allowClear: true
	});
});

$(document).ready(function() {
	$('#school').select2({      
		placeholder: "--Select --",
		allowClear: true
	});
});
</script>  
 @endpush