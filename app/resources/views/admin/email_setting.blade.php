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

<form method="POST" action="{{route('email-settings.store')}}" class="mb-4">
    @csrf
        <div class="row"> 
            <div class="col-md-4">
                     <label>Email <span class="text-danger">*</span></label>
                     <input type="email" placeholder="Enter email id here" name="email" class="form-control " style="height: 34px;"/>
            </div>

            <div class="col-md-4 align-self-end mt-2">
                <button type="submit" class="btn btn-sm btn-success">Save</button> 
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
            <h5 class="text-success">Total Enrolled Students -  </h5>       
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
                    
                    <th>#</th>
                    <th>Email Id</th>                                       
                </tr>
            </thead>
            <tbody>
        @foreach($emails as   $st)   
                    <tr>           
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $st->email}}</td>                                                                             
                    </tr>
                @endforeach 
            </tbody>
            
        </table>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                
            </div>
            
            <div>
                {{-- Pagination links --}}
                {{ $emails->appends(request()->query())->links() }}
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
$('#subject').html('<option value="">Select Subject</option>');
$.each(res, function (key, value) {
$('#subject').append('<option value="' + value.id + '">' + value.name + '</option>');
});
}
});
});
});
</script>  
@endpush