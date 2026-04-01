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
                                            <h5>EVS</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">EVS</a></li>
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
                                                <h3 class="font">High Quality Matching International Standards</h3>
                                                <p class="font">
                                                    Questions in SPARK Olympiads are prepared and reviewed by an international team of experts. Each question is tightly mapped to specific learning outcomes and Depth of Knowledge (DoK) levels.<br><br>Sample questions for grade 5 are shared as an illustration of the high quality of SPARK Olympiads. This page will be updated with sample questions of all subjects and all classes very soon.
                                                </p>
                                                <div class="col-lg-12">
                                                    <h3 class="font">Environmental Studies (EVS)</h3>
                                                    <h5 class="font">Conceptual Thinking and Application</h5>
                                                    <li class="font"><strong>Which of these actions helps in conserving electricity at home?</strong></li>
                                                    <ol class="font">
                                                        <li>Switching off fans and lights when not in use</li>
                                                        <li>Using more electric heaters during summer</li>
                                                        <li>Keeping the lights on during the day</li>
                                                        <li>Using old appliances that consume more power</li>
                                                    </ol>
                                                    <li class="font"><strong>Which of these is a non-biodegradable waste?</strong></li>
                                                    <ol class="font">
                                                        <li>Plastic bottle</li>
                                                        <li>Banana peel</li>
                                                        <li>Paper</li>
                                                        <li>Cotton cloth</li>
                                                    </ol>
                                                    <li class="font"><strong>Why should we not drink water directly from a pond or river?</strong></li>
                                                    <ol class="font">
                                                        <li>It may contain harmful germs and pollutants.</li>
                                                        <li>It tastes salty and sweet.</li>
                                                        <li>River water is always clean.</li>
                                                        <li>Water from nature is already boiled.</li>
                                                    </ol>
                                                    <li class="font"><strong>Which of the following animals are correctly matched with their type of movement?</strong></li>
                                                    <ol class="font">
                                                        <li>Snake - slithers</li>
                                                        <li>Cow - crawls</li>
                                                        <li>Bird - hops</li>
                                                        <li>Frog - flies</li>
                                                    </ol>
                                                    <h5 class="font">Strategic Thinking</h5>
                                                    <li class="font"><strong>Ritu lives in a village where water is stored in open tanks. Many children in her area are falling sick. What is the most likely reason for this?</strong></li>
                                                    <ol class="font">
                                                        <li>Mosquitoes are breeding in stagnant water.</li>
                                                        <li>Children are playing too much.</li>
                                                        <li>The water is too cold.</li>
                                                        <li>People are drinking more milk.</li>
                                                    </ol>
                                                    <li class="font"><strong>Aman sees his neighbour burning plastic bags in an open field. What should he do?</strong></li>
                                                    <ol class="font">
                                                        <li>Inform an adult or community leader to stop it and explain its harmful effects.</li>
                                                        <li>Ignore it as it is none of his business.</li>
                                                        <li>Join in to help burn faster.</li>
                                                        <li>Take photos and share online without telling anyone.</li>
                                                    </ol>
                                                    <li class="font"><strong>During a nature walk, your class observes that the lake near your school is filled with garbage. What can your class suggest to the local panchayat?</strong></li>
                                                    <ol class="font">
                                                        <li>Organise a cleanliness drive and install dustbins nearby.</li>
                                                        <li>Build more roads through the lake.</li>
                                                        <li>Stop students from visiting the lake.</li>
                                                        <li>Cover the lake with plastic sheets.</li>
                                                    </ol>
                                                    <a href="{{asset('SampleQuestions.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
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
                @endsection
                @push('script')
                @endpush