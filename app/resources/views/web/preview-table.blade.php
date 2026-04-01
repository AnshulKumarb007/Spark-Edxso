@if($school)
<h5>School Profile</h5>
<table class="table table-bordered">
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
<table class="table table-sm table-bordered">
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
<table class="table table-sm table-bordered">
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
    <table class="table table-sm table-bordered">
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
    <table class="table table-sm table-bordered">
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
    <p class="text-muted">Lab details not available.</p>
@endif
