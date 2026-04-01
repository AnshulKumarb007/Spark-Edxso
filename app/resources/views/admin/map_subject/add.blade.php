@extends('layouts.admin')
@section('content')

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
                                               <h5 class="m-b-10">Map Subject With Class</h5>
                                           </div>
                                           <ul class="breadcrumb">
                                               <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                               <li class="breadcrumb-item"><a href="#!">Map Subject With Class</a></li> 
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <!-- [ breadcrumb ] end -->
                           <!-- [ Main Content ] start -->
                           <div class="row">
                               <!-- [ form-element ] start -->
                               <div class="col-sm-12">
                                   <div class="card">
                                       <div class="card-header">
                                           <h5>Map Subject With Class</h5>
                                           <a href="{{route('manage-map.index')}}" class="btn btn-success btn-sm float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">List</a>
                                       </div>
                                       <div class="card-body"> 
                                           
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <form action="{{route('manage-map.store')}}" method="post">
                                                       @csrf

                                                       <div class="form-group">
                                                         <label for="Subject">Select Class For Exam (You can add multiple classes)  <span style="color: red">*</span></label>
                                                           <select name="class_id[]" id="class_id" class="form-control class-select" multiple required>
                                                               @foreach($clases as $class)
                                                                   <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                               @endforeach
                                                           </select>
                                                        </div>

                                                       
                                                        <div class="form-group">
                                                            <label for="Subject">Subject <span style="color: red">*</span></label>
                                                            <select name="subject" class="form-control" required>
                                                                <option>--Select subject--</option>
                                                                @foreach($subjects as $sub)
                                                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                       <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                   </form>
                                               </div>
                                               
                               <!-- [ form-element ] end -->
                               <!-- [ Main Content ] end -->
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>





@endsection