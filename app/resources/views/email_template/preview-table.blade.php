<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Profile Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <h3>Congratulations!</h3>
    <p>A new school has been registered with Spark Olympiads</p> 
    <p>Following are the details: </p>
@if($school)
<h5>School Profile</h5>
<table style="border:1px solid; border-collapse:collapse;">
    <thead>
        <tr>
            <th style="border:1px solid; padding:5px;">Board</th>
            <th style="border:1px solid; padding:5px;">School Name</th>
            <th style="border:1px solid; padding:5px;">Village/Town/City</th>
            <th style="border:1px solid; padding:5px;">State</th>
            <th style="border:1px solid; padding:5px;">District</th>
            <th style="border:1px solid; padding:5px;">Pin Code</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border:1px solid; padding:5px;">{{ $school->board }}</td>
            <td style="border:1px solid; padding:5px; text-transform: capitalize;">{{ $school->school_name }}</td>
            <td style="border:1px solid; padding:5px; text-transform: capitalize;">{{ $school->city_id }}</td>
            <td style="border:1px solid; padding:5px;">{{ $school->state_title }}</td>
            <td style="border:1px solid; padding:5px;">{{ $school->district_title }}</td>
            <td style="border:1px solid; padding:5px;">{{ $school->pin }}</td>
        </tr>
    </tbody>
</table>
@else
    <p>School details not found.</p>
@endif

@if($head_of_school)
<h5>Head of School Details</h5>
<table style="border:1px solid; border-collapse:collapse;">
    <thead>
        <tr>
            <th style="border:1px solid; padding:5px;">Title</th>
            <th style="border:1px solid; padding:5px; text-transform: capitalize;">First Name</th>
            <th style="border:1px solid; padding:5px; text-transform: capitalize;">Middle Name</th>
            <th style="border:1px solid; padding:5px; text-transform: capitalize;">Last Name</th>
            <th style="border:1px solid; padding:5px;">Mobile Number</th>
            <th style="border:1px solid; padding:5px;">Email Address</th>
            <th style="border:1px solid; padding:5px;">Designation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border:1px solid; padding:5px;">{{ $head_of_school->title }}</td>
            <td style="border:1px solid; padding:5px; text-transform: capitalize;">{{ $head_of_school->first_name }}</td>
            <td style="border:1px solid; padding:5px; text-transform: capitalize;">{{ $head_of_school->second_name }}</td>
            <td style="border:1px solid; padding:5px; text-transform: capitalize;">{{ $head_of_school->last_name }}</td>
            <td style="border:1px solid; padding:5px;">{{ $head_of_school->mobile }} @if($head_of_school->is_mobile_validate) ✅ @else ❌ @endif</td>
            <td style="border:1px solid; padding:5px;">{{ $head_of_school->email }} @if($head_of_school->is_validate) ✅ @else ❌ @endif</td>
            <td style="border:1px solid; padding:5px;">{{ $head_of_school->designation }}</td>
        </tr>
    </tbody>
</table>
@else
<p>Head of school details not found.</p>
@endif

@if($spark_cordinator)
<h5>Spark Coordinator Details</h5>
<table style="border:1px solid; border-collapse:collapse;">
    <thead>
        <tr>
            <th style="border:1px solid; padding:5px;">Title</th>
            <th style="border:1px solid; padding:5px; ">First Name</th>
            <th style="border:1px solid; padding:5px; ">Middle Name</th>
            <th style="border:1px solid; padding:5px; ">Last Name</th>
            <th style="border:1px solid; padding:5px;">Mobile Number</th>
            <th style="border:1px solid; padding:5px;">Email Address</th>
            <th style="border:1px solid; padding:5px;">Designation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border:1px solid; padding:5px;">{{ $spark_cordinator->title }}</td>
            <td style="border:1px solid; padding:5px;text-transform: capitalize;">{{ $spark_cordinator->first_name }}</td>
            <td style="border:1px solid; padding:5px;text-transform: capitalize;">{{ $spark_cordinator->second_name }}</td>
            <td style="border:1px solid; padding:5px;text-transform: capitalize;">{{ $spark_cordinator->last_name }}</td>
            <td style="border:1px solid; padding:5px;">{{ $spark_cordinator->mobile }} @if($spark_cordinator->is_mobile_validate) ✅ @else ❌ @endif</td>
            <td style="border:1px solid; padding:5px;">{{ $spark_cordinator->email }} @if($spark_cordinator->is_validate) ✅ @else ❌ @endif</td>
            <td style="border:1px solid; padding:5px;">{{ $spark_cordinator->designation }}</td>
        </tr>
    </tbody>
</table>
@else
<p>Spark coordinator details not found.</p>
@endif
@if($school_enrolment)
    <h5>Computers Available</h5>
    <table style="border:1px solid; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="border:1px solid; padding:5px;">School's Total Strength</th>
                <th style="border:1px solid; padding:5px;">Student Strength - Class 1 to 8</th>
                <th style="border:1px solid; padding:5px;">Number of Computer Labs</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border:1px solid; padding:5px;">{{ $school_enrolment->total_enrollment }}</td>
                <td style="border:1px solid; padding:5px;">{{ $school_enrolment->class_1_to_8_enroll }}</td>
                <td style="border:1px solid; padding:5px;">{{ $school_enrolment->total_com_labs }}</td>
            </tr>
        </tbody>
    </table>
@else
    <p class="text-muted">Computers and labs details not found.</p>
@endif

@if(!empty($lab_details))
    <h5>Lab Details</h5>
    <table style="border:1px solid; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="border:1px solid; padding:5px;">#</th>
                <th style="border:1px solid; padding:5px;">Lab Info</th>
                <th style="border:1px solid; padding:5px;">Number of Computers</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lab_details as $lab)
                <tr>
                    <td style="border:1px solid; padding:5px;">{{ $loop->iteration }}</td>
                    <td style="border:1px solid; padding:5px;">{{ $lab->labs_name }}</td>
                    <td style="border:1px solid; padding:5px;">{{ $lab->computer_qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-muted">Lab details not available.</p>
@endif

<p>Best regards,<br>
    Team Spark Olympiads (EDXSO)</p>
</body></html>