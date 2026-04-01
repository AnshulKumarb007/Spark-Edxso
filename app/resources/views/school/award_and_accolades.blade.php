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
                                            <h5>Awards and Accolades</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                           
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                         
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-xl-12">

                                <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                   
                                   
                                    <div class="card card-social">
                                        <div class="card-block">
                                        <div class="col-lg-12 scan1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

                                            <h3 class="font">National Recognition, Rewards & Prestige</h3>

<p class="font">Participation in Spark Olympiads becomes a <b>badge of academic distinction</b>  a mark of excellence that sets students and institutions apart. Excellence deserves to shine. High-performing students and schools will be honored with:</p>

<ul class="font a">
    <li>Nationally endorsed certificates and medals</li>
    <li>Exclusive accolades &nbsp;for top-tier achievers</li>
    <li>Recognition on prominent platforms-elevating school reputation and student profiles alike</li>
</ul>

<h5 class="font">School Level: Sent to each school for distribution</h5>
<ul class="font a">
    <li>
        Certificate of Participation: All participating students.
    </li>
    <li>
        Certificate of Excellence: Top 10 scorers in each class for each subject
    </li>
    <li>
        Gold, Silver And Bronze Medals Top 3 scorers in each class for each subject
    </li>
    <li>
        Certificate of Appreciation SPARK Coordinator
    </li>
    <li>
        Certificate of Appreciation The Principal 
    </li>
</ul>

 <h5 class="font">National Level: Distributed at a National Event in Delhi NCR</h5>
<ul class="font a">
    <li>
        Certificate of Excellence Top 10 scorers in each class
    </li>
    <li>
        Gold, Silver And Bronze Medals Cash Prize: Rs 21000, Rs 11000, Rs 5100, Top 3 scorers in each class
    </li>
    <li>
        Certificate + Trophy + Cash Award of Rs 5100 Ten (10) teachers per subject with best results
    </li>
    <li>
        Certificate + Trophy + Cash Award of Rs 11000 Ten (10) Principals of top performing schools
    </li>
    
</ul>

<p class="font"><b>Tests for National Level will be conducted separately for those who wish to compete after paying the required fees for these levels.</b></p>

</div>

<a href="{{asset('AwardsandAccolades.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
    <i class="fas fa-file-pdf"></i> Download  
</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- [ Main Content ] end -->
            @endsection


            @push('script')



            @endpush