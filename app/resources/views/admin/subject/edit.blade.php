

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
                                                <h5 class="m-b-10">Edit Subject</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Subject</a></li> 
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
                                            <h5>Edit Subject</h5>
                                            <a href="{{route('subject.index')}}" class="btn btn-success btn-sm float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">List</a>
                                        </div>
                                        <div class="card-body"> 
                                       
                                            <div class="row">
                                                <div class="col-md-6">
                                                <form action="{{ route('subject.update', ['subject' => $edit->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="Subject">Subject <span style="color: red">*</span></label>
                                                            <input type="text" class="form-control" value="{{$edit->name}}" name="subject" id="Subject" placeholder="Enter subject name" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="Subject">Exam Fee <span style="color: red">*</span></label>
                                                            <input type="text" min="1"  class="form-control" value="{{$edit->fee}}" name="fee"  max="9000"  placeholder="Enter exam fee of this subject" required>
                                                            <span>Enter fee which select student </span>
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