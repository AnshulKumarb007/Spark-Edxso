@extends('../layouts.admin')
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
												<h5>Spark Admin Dashboard</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Analytics Dashboard</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- [ breadcrumb ] end -->
							<!-- [ Main Content ] start -->
							<div class="row">

								<!-- product profit start -->
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-red">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Total Registered Schools</h6>
													<h3 class="m-b-0 text-white">@if($school_count){{$school_count}}@else {{'0'}} @endif</h3>
												</div>
												 
											</div>
											<p class="m-b-0 text-white d-none"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-blue">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Total Registered Students</h6>
													<h3 class="m-b-0 text-white">@if($student_count){{$student_count}}@else {{'0'}} @endif</h3>
												</div>
												 
											</div>
											<p class="m-b-0 text-white d-none"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-green">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Total Registered Cordinators</h6>
													<h3 class="m-b-0 text-white">@if($spark_count){{$spark_count}}@else {{'0'}} @endif</h3>
												</div>
												 
											</div>
											<p class="m-b-0 text-white d-none"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-yellow" style="width: 100%;">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Total Labs/Computers</h6>
													<h3 class="m-b-0 text-white">@if($lab_count){{$lab_count1->lab}}/{{$lab_count->qty}}@else {{'0'}} @endif</h3>
												</div>
												 
											</div>
											<p class="m-b-0 text-white d-none"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
										</div>
									</div>
								</div>







								<!-- product profit end -->
								{{-- <div class="col-md-12 col-xl-4">
									<div class="card card-social">
										<div class="card-block border-bottom">
											<div class="row align-items-center justify-content-center">
												<div class="col-auto">
													<i class="fab fa-facebook-f text-primary f-36"></i>
												</div>
												<div class="col text-right">
													<h4>Number of Schools Dropped</h4>
													<h5 class="text-c-blue mb-0">+7.2% <span class="text-muted">Total Likes</span></h5>
												</div>
											</div>
										</div>
										<div class="card-block">
											<div class="row align-items-center justify-content-center card-active">
												<div class="col-6">
													<h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>35,098</h6>
													<div class="progress">
														<div class="progress-bar progress-c-blue" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-6">
													<h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>350</h6>
													<div class="progress">
														<div class="progress-bar progress-c-green" role="progressbar" style="width:45%;height:6px;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-4">
									<div class="card card-social">
										<div class="card-block border-bottom">
											<div class="row align-items-center justify-content-center">
												<div class="col-auto">
													<i class="fab fa-twitter text-c-info f-36"></i>
												</div>
												<div class="col text-right">
													<h4>EDD Assess Certified Labs</h4>
													<h5 class="text-c-info mb-0">+6.2% <span class="text-muted">Total Likes</span></h5>
												</div>
											</div>
										</div>
										<div class="card-block">
											<div class="row align-items-center justify-content-center card-active">
												<div class="col-6">
													<h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>34,185</h6>
													<div class="progress">
														<div class="progress-bar progress-c-blue" role="progressbar" style="width:40%;height:6px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-6">
													<h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>800</h6>
													<div class="progress">
														<div class="progress-bar progress-c-green" role="progressbar" style="width:70%;height:6px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xl-4">
									<div class="card card-social">
										<div class="card-block border-bottom">
											<div class="row align-items-center justify-content-center">
												<div class="col-auto">
													<i class="fab fa-google-plus-g text-c-red f-36"></i>
												</div>
												<div class="col text-right">
													<h4>Total Students Ready for Exam</h4>
													<h5 class="text-c-red mb-0">+5.9% <span class="text-muted">Total Likes</span></h5>
												</div>
											</div>
										</div>
										<div class="card-block">
											<div class="row align-items-center justify-content-center card-active">
												<div class="col-6">
													<h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>25,998</h6>
													<div class="progress">
														<div class="progress-bar progress-c-blue" role="progressbar" style="width:80%;height:6px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-6">
													<h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>900</h6>
													<div class="progress">
														<div class="progress-bar progress-c-green" role="progressbar" style="width:50%;height:6px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- sessions-section start -->
								<div class="col-xl-12 col-md-12">
									<div class="card table-card">
										<div class="card-header">
											<h5>School Detail Analytics</h5>
										</div>
										<div class="card-body px-0 py-0">
											<div class="table-responsive">
												<div class="session-scroll" style="height:478px;position:relative;">
													<table class="table table-hover m-b-0">
														<thead>
															<tr>
																<th><span>School Name</span></th>
																<th><span>Labs <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																<th><span>Computers <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																<th><span>Cordinators <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																<th><span>Enrolled Students<a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																<th><span>Registerd Students <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																 
																<th><span>Due Amount <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																<th><span>Conversions <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
															</tr>
														</thead>
														<tbody>
															 
															<tr>
																<td>Trinity public school</td>
																<td>786
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-danger rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>485
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-primary rounded" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>769
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>45,3%
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-success rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>6,7%
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-info rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>8,56
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-danger rounded" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>10:55
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																 
															</tr>
															<tr>
																<td>Lotus public school</td>
																<td>786
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-danger rounded" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>523
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-primary rounded" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>736
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-warning rounded" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>78,3%
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-success rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>6,6%
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-info rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>7,56
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-danger rounded" role="progressbar" style="width: 44%;" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
																<td>4:30
																	<div class="progress mt-1" style="height:4px;">
																		<div class="progress-bar bg-warning rounded" role="progressbar" style="width: 68%;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div> --}}
										</div>
									</div>
								</div>
								<!-- sessions-section end --> 
							</div>

							<div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Student counts based on exams</h5> 
                                            <!-- <a href="#" class="btn btn-success float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">Add</a> -->
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                            	<table class="table datatable" id="schoolTable">
														<thead> 
															<tr>
																<th>#</th>
																<th>Exam</th>    
																<th>Student Count</th>     
															</tr>
														</thead>
															<tbody>
																@php $sr=1; @endphp
																@foreach ($exam_listing as $item)
																	<tr>
																		<td>{{ $sr++ ?? '' }}</td> 
																		<td>{{ $item->subjectname ?? '' }}</td>
																		<td>{{ $item->total_students ?? '' }}</td> 
																	</tr>
																@endforeach                                     
															</tbody>
                                                	</table>  
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                  </div>                                
                                </div> 
							<!-- [ Main Content ] end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- [ Main Content ] end -->
	@endsection