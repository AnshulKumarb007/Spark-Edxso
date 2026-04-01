
@extends('web.layouts.student_app2')
@section('content')
 <style>
    .left-section{
        margin-top:-10px;
    }
</style>
    
  <style>
  .registration-box {
    transition: transform 0.3s, box-shadow 0.3s; /* smooth hover animation */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);  /* subtle shadow */
    border-radius: 8px;
  }

  .registration-box:hover {
    transform: translateY(-5px);  /* lifts the card on hover */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* stronger shadow */
  }
 img{
    height:120px;width:250px;
  }
</style>

<div class="mb-3">
  {{$school_id}}
  <input type="text" id="school-search" class="form-control" placeholder="Search by School Name" />
</div>

 


    
@endsection

@push('scripts')
     
 

 


 
@endpush