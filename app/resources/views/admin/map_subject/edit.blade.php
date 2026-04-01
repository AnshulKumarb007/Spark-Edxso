

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
                                                <h5 class="m-b-10">Edit Map Subject</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Map Subject</a></li> 
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
                                            <h5>Edit Map Subject</h5>
                                            <a href="{{route('manage-map.index')}}" class="btn btn-success float-right btn-sm" title="" data-toggle="tooltip" data-original-title="btn btn-success">List</a>
                                        </div>
                                        <div class="card-body"> 
                                        @php 
                                            $selectedClassIds = array_map('trim', explode(',', $edit->class_id ?? ''));
                                        @endphp
                                            <div class="row">
                                                <div class="col-md-6">
                                                <form action="{{ route('manage-map.update',['id' => $edit->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                        <div class="form-group">
                                                            <label for="Subject">Select Class For Exam (You can add multiple classes)  <span style="color: red">*</span></label>
                                                            <select name="class_id[]" id="class_id" class="form-control class-select" multiple required>
                                                            @foreach($clases as $class)
                                                                    <option value="{{ $class->id }}" 
                                                                    {{ in_array($class->id, $selectedClassIds) ? 'selected' : '' }}>
                                                                    {{ $class->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <label for="Subject">Subject  <span style="color: red">*</span></label>
                                                            <select name="subject" class="form-control" required>
                                                                <option>--Select subject--</option>
                                                                @foreach($subjects as $sub)
                                                                <option value="{{ $sub->id }}" {{ $sub->id == $edit->subject_id ? 'selected' : '' }}>
                                                                    {{ $sub->name }}
                                                                </option>
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