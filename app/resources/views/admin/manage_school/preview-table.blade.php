<style>
    table tr td{
        width:15%;
        font-size:13px;
    }
    table tr th{
        width:15%;
        font-size:13px;
    }
    
   
.toggle-container {
  display: flex;
  align-items: center;
  gap: 10px;
  font-family: Arial, sans-serif;
}

.switch {
  position: relative;
  display: inline-block;
  width: 45px;
  height: 24px;
}

.switch input {
  display: none;
}

.slider {
  position: absolute;
  cursor: pointer;
  background-color: #ccc;
  border-radius: 34px;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  transition: 0.4s;
}

.slider::before {
  content: "";
  position: absolute;
  height: 16px;
  width: 16px;
  left: 2px;
  bottom: 4px;
  background-color: white;
  transition: 0.4s;
  border-radius: 50%;
}

/* When checked */
input:checked + .slider {
  background-color: #4CAF50;
}

input:checked + .slider::before {
  transform: translateX(26px);
}

.status-on {
    margin-top: -5px;
    color: green;
    font-weight: bold;
}

.status-off {
    margin-top: -5px;
    color: #858181;
    font-weight: bold;
}


</style>

@if($school)

<div class="d-flex">
<h5>School Profile ({{$scr->school_id}})&nbsp;&nbsp;&nbsp;&nbsp;</h5>

<div class="toggle-container">
    <span id="statusLabel" class="{{ $scr->online_payment == 2 ? 'status-on' : 'status-off' }}">
        {{ $scr->online_payment == 2 ? 'Online Payment ' : 'Online Payment' }}
    </span>
        <label class="switch">
        <input type="checkbox"
                class="active_razorpay"
                data-school-id="{{ $school->registration_id }}"
                {{ $scr->online_payment == 2 ? 'checked' : '' }}>
        <span class="slider"></span>
        </label>
      
    
</div>
    &nbsp;&nbsp;<a href="#" 
    class="btn btn-sm btn-success reset-password" 
    data-school-id="{{ $scr->school_id }}"  
    data-bs-toggle="modal" 
    data-bs-target="#changePasswordModal">
    Reset Password
 </a>
 

@if(!empty($scr->password))
    @if($scr->password=='$2y$12$DzUHt4jzTqKtGWmnEqcaaOVQBAHDEhhZo5UWzBll4JioxOCUAphom')
       &nbsp;&nbsp; <a href="javascript:void(0);" class="btn btn-sm btn-success send-mail-sms">
            <div class="spinner-border d-none" style="width: 1rem;height: 1rem;" role="status"></div> Resend Login Details
        </a>
        @else
       &nbsp;&nbsp; <a href="#" class="btn btn-sm btn-success" @disabled(true)>
             Resend Login Details
        </a> 
    @endif
@endif



</div>
<table class="table table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>Board</th>
            <th>School Name</th>
            <th>Village/Town/City</th>
            <th>State</th>
            <th>District</th>
            <th>Pin Code</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $school->board }}</td>
            <td>{{ $school->school_name }}</td>
            <td>{{ $school->city_id }}</td>
            <td>{{ $school->state_title }}</td>
            <td>{{ $school->district_title }}</td>
            <td>{{ $school->pin }}</td>
        </tr>
    </tbody>
</table>
@else
    <p>School details not found.</p>
@endif

@if($head_of_school)
<h5>Head of School Details</h5>
<table class="table table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>Title</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Email Address</th>
            <th>Designation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $head_of_school->title }}</td>
            <td>{{ $head_of_school->first_name }}</td>
            <td>{{ $head_of_school->second_name }}</td>
            <td>{{ $head_of_school->last_name }}</td>
            <td>{{ $head_of_school->mobile }} @if($head_of_school->is_mobile_validate) ✅ @else ❌ @endif</td>
            <td>{{ $head_of_school->email }} @if($head_of_school->is_validate) ✅ @else ❌ @endif</td>
            <td>{{ $head_of_school->designation }}</td>
        </tr>
    </tbody>
</table>
@else
<p>Head of school details not found.</p>
@endif

@if($spark_cordinator)
<h5>Spark Coordinator Details</h5>
<table class="table table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>Title</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Email Address</th>
            <th>Designation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $spark_cordinator->title }}</td>
            <td>{{ $spark_cordinator->first_name }}</td>
            <td>{{ $spark_cordinator->second_name }}</td>
            <td>{{ $spark_cordinator->last_name }}</td>
            <td>{{ $spark_cordinator->mobile }} @if($spark_cordinator->is_mobile_validate) ✅ @else ❌ @endif</td>
            <td>{{ $spark_cordinator->email }} @if($spark_cordinator->is_validate) ✅ @else ❌ @endif</td>
            <td>{{ $spark_cordinator->designation }}</td>
        </tr>
    </tbody>
</table>
@else
<p>Spark coordinator details not found.</p>
@endif
@if($school_enrolment)
    <h5>Computers Available</h5>
    <table class="table   table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>School's Total Strength</th>
                <th>Student Strength - Class 1 to 8</th>
                <th>Number of Computer Labs</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $school_enrolment->total_enrollment }}</td>
                <td>{{ $school_enrolment->class_1_to_8_enroll }}</td>
                <td>{{ $school_enrolment->total_com_labs }}</td>
            </tr>
        </tbody>
    </table>
@else
    <p class="text-muted">Computers and labs details not found.</p>
@endif

@if(!empty($lab_details))
    <h5>Lab Details</h5>
    <table class="table   table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Lab Info</th>
                <th>Number of Computers</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lab_details as $lab)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lab->labs_name }}</td>
                    <td>{{ $lab->computer_qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else 
    <td colspan="2" class="text-center">Details Noddt Found </td>
    
@endif


@if(!empty($genete_link))
    <h5>Link Details</h5>
    <table class="table  table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Link</th>                
            </tr>
        </thead>
        <tbody>
            <td>1</td>
            <td><a href="{{$genete_link->link}}">{{$genete_link->link}}</a></td>
        </tbody>
    </table>
@else
<h5>Link Details</h5>
<table class="table table-sm table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Link</th>                
        </tr>
    </thead>
    <tbody>
        
        <td colspan="2" class="text-center">Details Not Found </td>
    </tbody>
</table>
    
@endif


@if(!empty($student_count))
    <h5>Student Details</h5>
    <table class="table table-sm table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Total Registerd Students</th>                
            </tr>
        </thead>
        <tbody>
            <td>1</td>
            
         
        <td>
          <a href="{{ url('manage-student-lists') }}?vschool_id={{ $student_data->school_id }}">
            {{ $student_count }}
          </a>
        </td>
        
              
        </tbody>
    </table>
@else
<h5>Student Details</h5>
<table class="table table-sm table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Total Registerd Students</th>                
        </tr>
    </thead>
    <tbody> 
        <td colspan="2" class="text-center">Details Not Found </td>
    </tbody>
</table>
@endif



@if(!empty($invoice))
    <h5>Invoice Details</h5>
    <table class="table table-sm table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Invoice</th>                
            </tr>
        </thead>
        <tbody>
            <td>1</td>
            <td><a href="{{route('view-manage.school-paymets',['id'=>$invoice->id])}}" target="_blank" title="View Invoice" class="btn btn-success btn-sm">View Invoice</a></td>
        </tbody>
    </table>
@else
<h5>Invoice Details</h5>
<table class="table table-sm table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Invoice</th>                
        </tr>
    </thead>
    <tbody>        
        <td colspan="2" class="text-center">Details Not Found </td>
    </tbody>
</table>
    
@endif




@push('scripts')
 
 
  @endpush