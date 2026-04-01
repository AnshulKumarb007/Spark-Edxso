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
                                            <h5>Desired Specifications</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">SPARK Lab Certification</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        {{-- <ul class="breadcrumb">
                                            <a href="#" class="btn btn-outline-danger" role="button" target="_blank">
                                                <i class="fas fa-file-pdf"></i> Download PDF
                                            </a>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-xl-12"> 
                                <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"> 
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <div class="row">
                                                <h1></h1>
                                                 
                                                <div class="col-lg-6">
                                                    <h4 class="font">Windows 10 or higher</h4>
                                                  
                                                  <ul class="font">
                                                    <li>Microsoft Edge</li>
                                                    <li>Chrome</li>
                                                    <li>JavaScript must be enabled</li>
                                                    <li>Minimum Screen Resolution: 1024 × 768</li>
                                                  </ul>
                                                  
                                                 <h4 class="font">Mac OS 11 or higher</h4>
                                                  
                                                  <ul class="font">
                                                    <li>Safari </li>
                                                    <li>Chrome </li>
                                                    <li>JavaScript must be enabled</li>
                                                    <li>Minimum Screen Resolution: 1024 x 768</li>
                                                  </ul>
                                                  
                                                   <h4 class="font">Chrome OS (Chromebooks)</h4>
                                                  
                                                  <ul class="font">
                                                    
                                                    <li>Chrome </li>
                                                    <li>Managed Chromebook required for secure testing</li>
                                                    <li>Recommended Screen Resolution: 1366 x 768</li>
                                                  </ul>
                                                                            
                                                </div>
                                                

                                                

                                                    <div class="col-lg-6">
                                                        <h4 class="font">RAM</h4>
                                                      
                                                      <ul class="font">
                                                        <li>8 GB RAM or more</li>
                                                        
                                                      </ul>
                                                      
                                                     <h4 class="font">Internet/Network</h4>
                                                      
                                                      <ul class="font">
                                                        <li>High Speed Internet connection required </li>
                                                        <li>10 Mbps per user </li>
                                                        <li>100 users × 10 Mbps/user=1000 Mbps or 1 Gbps Total Network. </li>
                                                        
                                                      </ul>
                                                      
                                                       <h4 class="font">Wireless Guidelines</h4>
                                                      
                                                      <ul class="font">
                                                        
                                                        <li>Recommended Minimum Download Speed: 10-15 Mbps per user.  </li>
                                                        <li>Recommended Minimum Upload Speed: 3-5 Mbps per user.</li>
                                                        <li>The school’s Wi-Fi infrastructure should be capable of supporting a high number of simultaneous connections.</li>
                                                      </ul>
                                                        <p class="font"><b>Note:</b> Browsers not in compliance with TLS 1.2 or higher will be unable to access EdAssess. Phones are not supported. </p>
                                                  </div>
                                        
                                            </div>
                                            

                                                

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