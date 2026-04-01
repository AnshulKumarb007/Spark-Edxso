@extends('layouts.school')
@section('content')
<style>
  .services-list a.active {
    font-weight: bold;
    color: #0d6efd;
  }

  .card-style {
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    background-color: #fff;
    margin-bottom: 15px;
  }

  .lab-checkbox-grid {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .checkbox-row {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
  }

  .checkbox-container {
    position: relative;
    width: 100%;
    height: 35px;
  }

  .checkbox-container input[type="checkbox"] {
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    position: absolute;
    left: 0;
    top: 0;
    z-index: 2;
  }

  .check-icon {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 11px;
    background-color: #f0f0f0;
    border: 2px solid #ccc;
    border-radius: 5px;
    color: red;
    z-index: 1;
  }

  .check-icon.checked {
    color: green;
  }

   


  .checkbox-container {
        display: inline-block;
        margin: 4px;
        margin-bottom: 20px;
    }

    .checkbox-container input[type="checkbox"] {
        display: none;
    }

    .check-icon {
        display: inline-block;
        width: 62px;
        height: 34px;
        line-height: 30px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f0f0f0;
        font-weight: bold;
        color: black;
        transition: background-color 0.2s;
    }

    .check-icon.checked {
        background-color: #4CAF50;
        color: white;
    }

.checked {
    color: green; /* Or any color for the check mark */
}

.unchecked {
    color: red; /* Change this to your desired color for 🖥️ */
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
										<div class="col-md-12">
											<div class="page-header-title">
                        <h5>SPARK Lab Certification</h5>
											</div>
											{{-- <ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{route('school.dashboard')}}"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#">SPARK Lab Certification</a></li>
												<li class="breadcrumb-item"><a href="#">Process</a></li>
											</ul> --}}
										</div>
									</div>
								</div>
							</div> 
                            <div class="row">
                              <div class="col-auto">
                                <div class="card card-social">										 
                                    <div class="card-block">		
                                      
                                      <h5 class="my-font-weight2">Process </h5>
                                      <p class="my-font-weight">Follow this step-by-step process to get SPARK Lab certified. Ensure all listed conditions are met before launching the exam:</p>           
                                               
                             
											 
                                            <ul>
                                                <li>Verify system configuration</li>
                                                <li>Ensure internet stability</li>
                                                <li>Confirm secure access
                                                </li>
                                                <li>Certify computers through the tool</li>
                                              
                                              </ul>
											
                                            </div>                                    
                                        </div>
                                  </div>
						                  </div>  

                              <div class="row">
                                <div class="col-auto">
                                  <div class="card card-social">										 
                                      <div class="card-block">		
                                        
                                        <h5 class="my-font-weight2">Desired Specifications </h5>
                                        <p class="my-font-weight">Follow this step-by-step process to get SPARK Lab certified. Ensure all listed conditions are met before launching the exam:</p>  
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



                                <div class="row">
                                  <div class="col-auto">
                                    <div class="card card-social">										 
                                        <div class="card-block">		
                                          
                                          <h5 class="my-font-weight2">Process </h5>
                                          <p class="my-font-weight">Follow this step-by-step process to get SPARK Lab certified. Ensure all listed conditions are met before launching the exam:</p>           
                                                   
                                 
                           
                                                <ul>
                                                    <li>Verify system configuration</li>
                                                    <li>Ensure internet stability</li>
                                                    <li>Confirm secure access
                                                    </li>
                                                    <li>Certify computers through the tool</li>
                                                  
                                                  </ul>
                          
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

 
	<!-- [ Main Content ] end -->
	@endsection
	@push('scripts')
 
	 @endpush