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
                                            <h5>Test Duration</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                                        <li class="breadcrumb-item"><a href="#">Download Center</a></li> <li class="breadcrumb-item"><a href="#">Spark Blueprint</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="breadcrumb">
 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <div class="row scan1">
                                                <div class="col-lg-12">
                                                    <h3 class="font">Class 1-4</h3>
                                                    <p class="font">45 Minutes</p>
                                                </div>
                                                    <div class="col-lg-12">
                                                        <h3 class="font">Class 5-8</h3>
                                                        <p class="font">60 Minutes</p>
                                                        <a href="{{asset('SparkBlueprint.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
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
                    </div>
                </div>
                @endsection
                @push('script')
                @endpush