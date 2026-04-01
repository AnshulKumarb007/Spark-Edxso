@extends('layouts.school')
@section('content')
 
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
												<h5>Poster for Bulletin Board</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{route('school.dashboard')}}"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#">Download Center</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div> 
                            <div class="row">
                              <div class="col-md-12 col-xl-12">
                                <div class="card card-social">										 
                                    <div class="card-block">		
										<h5 class="my-font-weight2">Instruction </h5>
										<p class="my-font-weight">Download and display this poster on your school bulletin board to inform students and staff about SPARK Olympiads and its national recognition. It’s a simple way to encourage participation.</p>          
                                               
                                            <a href="{{asset('spark_poster final_compressed.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
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

 
	<!-- [ Main Content ] end -->
	@endsection
	@push('scripts')
 
	 @endpush