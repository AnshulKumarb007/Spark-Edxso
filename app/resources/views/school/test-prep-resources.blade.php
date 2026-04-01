@extends('layouts.school')
@section('content')
<style>
    .own i {
        font-size: 25px;
    }

    .own a {
        margin-left: 5px;
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
                                    <div class="col-md-10">
                                        <div class="page-header-title">
                                            <h5>Spark Blueprint</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            {{-- <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                                        <li class="breadcrumb-item"><a href="#">Download Center</a></li> <li class="breadcrumb-item"><a href="#">Spark Blueprint</a></li> --}}
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                         
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- <div class="col-md-12 col-xl-12">
                                <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <div class="row scan1">
                                                <div class="col-lg-12">
                                                    <h3 class="font">Class 1-4</h3>
                                                    <ul class="font">
                                                        <li>Recall -35%</li>
                                                        <li>Conceptual Thinking -40%</li>
                                                        <li>Strategic Thinking -25%</li>
                                                    </ul>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h3 class="font">Class 5-8</h3>
                                                        <ul class="font">
                                                            <li>Recall -30%</li>
                                                            <li>Conceptual Thinking -40%</li>
                                                            <li>Strategic Thinking -30%</li>
                                                        </ul>
                                                        <a href="{{asset('SparkBlueprint.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
                                                            <i class="fas fa-file-pdf"></i> Download 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                         



                        <div class="col-sm-12">
                            <div class="card">
                            <div class="accordion" id="accordionExample">
                               
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">Cognitive Levels</a></h5>
                                    </div>
                                    <div id="collapseOne" class="card-body collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                        <div class="row scan1">
                                            <div class="col-lg-12">
                                                <h3 class="font">Class 1-4</h3>
                                                <ul class="font">
                                                    <li>Recall -35%</li>
                                                    <li>Conceptual Thinking -40%</li>
                                                    <li>Strategic Thinking -25%</li>
                                                </ul>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h3 class="font">Class 5-8</h3>
                                                    <ul class="font">
                                                        <li>Recall -30%</li>
                                                        <li>Conceptual Thinking -40%</li>
                                                        <li>Strategic Thinking -30%</li>
                                                    </ul>
                                                    <a href="{{asset('SparkBlueprint.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
                                                        <i class="fas fa-file-pdf"></i> Download 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Test Duration</a></h5>
                                    </div>
                                    <div id="collapseTwo" class="card-body collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                        <div class="row scan1">
                                            <div class="col-lg-12">
                                                <h3 class="font">Class 1-4</h3>
                                                <p class="font">45 Minutes</p>
                                            </div>
                                                <div class="col-lg-12">
                                                    <h3 class="font">Class 5-8</h3>
                                                    <p class="font">60 Minutes</p>
                                                    <a href="http://localhost/sparkss/SparkBlueprint.pdf" class="btn btn-outline-danger float-right" role="button" target="_blank">
                                                        <i class="fas fa-file-pdf"></i> Download 
                                                    </a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Total Questions</a></h5>
                                    </div>
                                    <div id="collapseThree" class="card-body collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="row scan1">
                                            <div class="col-lg-12">
                                                <h3 class="font">Class 1-4</h3>
                                                <p class="font">30 Questions</p>
                                            </div>
                                                <div class="col-lg-12">
                                                    <h3 class="font">Class 5-8</h3>
                                                    <p class="font">60 Questions</p>
                                                    <a href="http://localhost/sparkss/SparkBlueprint.pdf" class="btn btn-outline-danger float-right" role="button" target="_blank">
                                                        <i class="fas fa-file-pdf"></i> Download 
                                                    </a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                @endsection
                @push('script')
                @endpush