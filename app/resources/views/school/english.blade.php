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
                                            <h5>English</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">English</a></li>
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
                                                    <h3 class="font">English</h3>
                                                    <h5 class="font">Conceptual Thinking and Application</h5>
                                                    <li class="font"><strong>Which sentence uses correct punctuation and capitalization?</strong></li>
                                                    <ol class="font">
                                                        <li>My father, a doctor, works at Apollo Hospital in Hyderabad.</li>
                                                        <li>my Father a Doctor works at apollo hospital.</li>
                                                        <li>My father a doctor, works at apollo Hospital.</li>
                                                        <li>My father, a doctor works at Apollo hospital.</li>
                                                    </ol>
                                                    <li class="font"><strong>Select the sentence that uses a simile.</strong></li>
                                                    <ol class="font">
                                                        <li>Her voice was as sweet as honey.</li>
                                                        <li>The girl sang beautifully.</li>
                                                        <li>He jumped high</li>
                                                        <li>We laughed all day.</li>
                                                    </ol>
                                                    <li class="font"><strong>Choose the sentence where subject-verb agreement is correct.</strong></li>
                                                    <ol>
                                                        <li>The dogs bark loudly at night</li>
                                                        <li>The dogs barks loudly at night.</li>
                                                        <li>The dogs barks loudly at night.</li>
                                                        <li>The dog have barked.</li>
                                                    </ol>
                                                    <h5 class="font">Strategic Thinking</h5>
                                                    <li><strong>Asha carefully packed her bag and checked her list twice. She smiled, knowing everything was ready for the trip. What can you infer about Asha?</strong></li>
                                                    <ol class="font">
                                                        <li>She is responsible and well-prepared.</li>
                                                        <li>She is scared of travelling.</li>
                                                        <li>She is lazy and forgetful.</li>
                                                        <li>She is unsure about the trip.</li>
                                                    </ol>
                                                    <li class="font"><strong>Which of the following sentences would make the best opening line of a story?</strong></li>
                                                    <ol>
                                                        <li>It was a rainy evening when the lights suddenly went out.</li>
                                                        <li>I like to play cricket with my friends.</li>
                                                        <li>My school is very nice and big.</li>
                                                        <li>The sun is yellow and bright.</li>
                                                    </ol>
                                                    <li class="font"><strong>Read the sentence and choose the best revision for clarity: “Running fast the bus was missed by Ravi.”</strong></li>
                                                    <ol class="font">
                                                        <li>Ravi missed the bus because he was running late.</li>
                                                        <li>The bus missed Ravi because he was late</li>
                                                        <li>Missed the bus was Ravi, running fast.</li>
                                                        <li>The bus running fast was missed.</li>
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