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
                                                <h5 class="m-b-10">Edit Exam Date</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edit  Exam Date</a></li> 
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
                                            <h5>Edit  Exam Date</h5>
                                            <a href="{{url('exam-date')}}" class="btn btn-success float-right btn-sm" title="" data-toggle="tooltip" data-original-title="btn btn-success">List</a>
                                        </div>
                                        <div class="card-body"> 
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ route('update.exam.date', ['id' => $edit->id]) }}" method="post">
                                                        @csrf
                                                        {{-- <div class="form-group">
                                                          <label for="Class">Class</label>
                                                            <select name="class_id[]" id="class_id" class="form-control class-select" multiple required>                                                                  @php 
                                            $selectedClassIds = array_map('trim', explode(',', $edit->class_id ?? ''));
                                        @endphp
                                                                @foreach($clases as $class)
                                                                    <option value="{{ $class->id }}" {{ in_array($class->id, $selectedClassIds) ? 'selected' : '' }}>{{ $class->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}
 
                                                         @php
                                                             $today = date('Y-m-d');
                                                        @endphp
                                                        
                                                        <div class="form-group">
                                                            <label for="from_date">Exam From Date <span style="color: red">*</span></label>
                                                            <input type="date" class="form-control" name="shedule_date" id="from_date" required min="{{ $today }}" value="{{$edit->shedule_date}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="to_date">Exam To Date <span style="color: red">*</span></label>
                                                            <input type="date" class="form-control" name="to_date" id="to_date" required min="{{ $today }}" value="{{$edit->to_date}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exam_end_date">Last Date of Enrollment <span style="color: red">*</span></label>
                                                            <input type="date" class="form-control" name="exam_end_date" id="exam_end_date" required min="{{ $today }}" value="{{$edit->exam_end_date}}">
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