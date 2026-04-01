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
                                            <h5>India Awareness</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">India Awareness</a></li>
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
                                                    <h3 class="font">High Quality Matching International Standards</h3>
                                                    <p class="font">
                                                        Questions in SPARK Olympiads are prepared and reviewed by an international team of experts. Each question is tightly mapped to specific learning outcomes and Depth of Knowledge (DoK) levels.<br><br>Sample questions for grade 5 are shared as an illustration of the high quality of SPARK Olympiads. This page will be updated with sample questions of all subjects and all classes very soon.
                                                    </p>
                                                    <h3 class="font">India Awareness</h3>
                                                    <h5 class="font">Conceptual Thinking and Application</h5>
                                                    <li class="font"><strong>Which Indian festival is celebrated by flying kites and marks the harvest season in January?</strong></li>
                                                    <ol class="font">
                                                        <li>Makar Sankranti</li>
                                                        <li>Diwali</li>
                                                        <li>Holi</li>
                                                        <li>Raksha Bandhan</li>
                                                    </ol>
                                                    <li class="font"><strong>What is the role of a Gram Panchayat in a village?</strong></li>
                                                    <ol class="font">
                                                        <li>Solves local problems and manages village development</li>
                                                        <li>Conducts school exams</li>
                                                        <li>Sells crops in the market</li>
                                                        <li>Builds roads across states</li>
                                                    </ol>
                                                    <li class="font"><strong>Which Indian freedom fighter gave the slogan "Give me blood, and I shall give you freedom"?</strong></li>
                                                    <ol class="font">
                                                        <li>Subhas Chandra Bose </li>
                                                        <li>Lala Lajpat Rai</li>
                                                        <li>Bhagat Singh</li>
                                                        <li>Bal Gangadhar Tilak</li>
                                                    </ol>
                                                    <li class="font"><strong>Which of these rivers is considered sacred and flows through northern India?</strong></li>
                                                    <ol class="font">
                                                        <li>Ganga</li>
                                                        <li>Yamuna</li>
                                                        <li>Narmada</li>
                                                        <li>Kaveri</li>
                                                    </ol>
                                                    <h5 class="font">Strategic Thinking</h5>
                                                    <li class="font"><strong>Reema sees someone throwing garbage outside the school gate regularly. What should she do as a responsible citizen?</strong></li>
                                                    <ol class="font">
                                                        <li>Inform a teacher and help put up a "Do Not Litter" sign.</li>
                                                        <li>Throw more garbage to teach them a lesson.</li>
                                                        <li>Record it and post it on social media.</li>
                                                        <li>Do nothing as it’s not her responsibility.</li>
                                                    </ol>
                                                    <li class="font"><strong>During a class trip to Rajasthan, your group visits Mehrangarh Fort. What does this visit teach you about India’s heritage?</strong></li>
                                                    <ol class="font">
                                                        <li> India has a rich cultural and architectural history.</li>
                                                        <li>Forts are all built after independence.</li>
                                                        <li>These are just old buildings for tourism.</li>
                                                        <li>They were only used during festivals.</li>
                                                    </ol>
                                                    <li class="font"><strong>A school in Kerala celebrates Onam with flowers, games, and a feast. What does this tell us about Indian culture?</strong></li>
                                                    <ol class="font">
                                                        <li>India celebrates different festivals that reflect regional traditions.</li>
                                                        <li>All Indian states follow the same customs.</li>
                                                        <li>Onam is only a food festival.</li>
                                                        <li>Festivals are only for entertainment.</li>
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