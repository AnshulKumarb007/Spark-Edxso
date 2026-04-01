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
												<h5>Download Center </h5>
											</div>
											{{-- <ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{route('school.dashboard')}}"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#">Download Center</a></li>
											</ul> --}}
										</div>
									</div>
								</div>
							</div> 
							<div class="row"> 
								  <div class="col-sm-12">
									 <div class="card">
									   <p id="accordionExample"> 
										<div class="card-header" id="headingOne">
											<h5 class="mb-0 d-flex justify-content-between align-items-center">
											  <a href="#!"
												 class="d-flex justify-content-between w-100 align-items-center text-decoration-none"
												 data-toggle="collapse"
												 data-target="#collapseOne"
												 aria-expanded="true"
												 aria-controls="collapseOne">
										
												<span>Letter to Parent</span>
												<i class="fas fa-chevron-up toggle-arrow" data-target="#collapseOne"></i> <!-- Starts expanded -->
											  </a>
											</h5>
										  </div>
											<div id="collapseOne" class="card-body collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
										 
										<p class="my-font-weight">Download the official parent letter template to share all key details of the Olympiad — purpose, format, fees, and schedule. You can customize and send it digitally or as a printed handout.</p>        
                                               
                                            <a href="{{asset('LettertoParents.docx')}}" download class="btn btn-outline-danger float-right" role="button" target="_blank">
												<i class="fa fa-file"></i> Download 
                                            </a>

                                            </div>                                    
                                        </div>
                                    </p>
						    	</div>  
						    </div>  
							
							<div class="row">

								<div class="col-sm-12">
									<div class="card">
										<div class="card-header" id="headingThree">
											<h5 class="mb-0 d-flex justify-content-between align-items-center">
											  <a href="#!"
												 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
												 data-toggle="collapse"
												 data-target="#collapseThree"
												 aria-expanded="false"
												 aria-controls="collapseThree">
										
												<span>Poster for Bulletin Board</span>
												<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseThree"></i>
											  </a>
											</h5>
										  </div>
											<div id="collapseThree" class="card-body collapse" aria-labelledby="headingThree" data-parent="#accordionExample">	
										  
										  <p class="my-font-weight">Download and display this poster on your school bulletin board to inform students and staff about SPARK Olympiads and its national recognition. It’s a simple way to encourage participation.</p>        
												 
											  <a href="{{asset('spark_poster final_compressed.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
												  <i class="fas fa-file-pdf"></i> Download 
											  </a>
  
											  </div>                                    
										  </div>
									</div>
								</div>  
							  

							 <div class="row">

								<div class="col-sm-12">
									<div class="card">
										<div class="card-header" id="headingThreea">
											<h5 class="mb-0 d-flex justify-content-between align-items-center">
											  <a href="#!"
												 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
												 data-toggle="collapse"
												 data-target="#collapseThreea"
												 aria-expanded="false"
												 aria-controls="collapseThreea">
										
												<span>Competency Architecture</span>
												<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseThreea"></i>
											  </a>
											</h5>
										  </div>
											<div id="collapseThreea" class="card-body collapse" aria-labelledby="headingThreea" data-parent="#accordionExample">	
										  
										  <p class="my-font-weight">Download the SPARK Competency Architecture to understand how each question is mapped to specific NEP/NCF-aligned learning outcomes and skill domains. This ensures every assessment reflects real learning goals.</p>        
												 
											  <a href="{{asset('CompetencyArchitecture.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
												  <i class="fas fa-file-pdf"></i> Download 
											  </a>
  
											  </div>                                    
										  </div>
									</div>
							  </div>  

							  <div class="row">

								<div class="col-sm-12">
									<div class="card">
										<div class="card-header" id="headingThreeai">
											<h5 class="mb-0 d-flex justify-content-between align-items-center">
											  <a href="#!"
												 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
												 data-toggle="collapse"
												 data-target="#collapseThreeai"
												 aria-expanded="false"
												 aria-controls="collapseThreeai">
										
												<span>Cognitive Levels</span>
												<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseThreeai"></i>
											  </a>
											</h5>
										  </div>
											<div id="collapseThreeai" class="card-body collapse" aria-labelledby="headingThreeai" data-parent="#accordionExample">
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
										 
										<div class="card">
											<div class="card-header" id="headingTwoc">
												<h5 class="mb-0 d-flex justify-content-between align-items-center">
												  <a href="#!"
													 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
													 data-toggle="collapse"
													 data-target="#collapseTwoc"
													 aria-expanded="false"
													 aria-controls="collapseTwoc">
											
													<span>Test Duration</span>
													<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseTwoc"></i>
												  </a>
												</h5>
											  </div>
											<div id="collapseTwoc" class="card-body collapse" aria-labelledby="headingTwoc" data-parent="#accordionExample" style="">
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
										<div class="card">
											<div class="card-header" id="headingThreed">
												<h5 class="mb-0 d-flex justify-content-between align-items-center">
												  <a href="#!"
													 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
													 data-toggle="collapse"
													 data-target="#collapseThreed"
													 aria-expanded="false"
													 aria-controls="collapseThreed">
											
													<span>Total Questions</span>
													<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseThreed"></i>
												  </a>
												</h5>
											  </div>
											<div id="collapseThreed" class="card-body collapse" aria-labelledby="headingThreed" data-parent="#accordionExample">
												<div class="row scan1">
													<div class="col-lg-12">
														<h3 class="font">Class 1-4</h3>
														<p class="font">30 Questions</p>
													</div>
														<div class="col-lg-12">
															<h3 class="font">Class 5-8</h3>
															<p class="font">60 Questions</p>
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


							
							<div class="row">

								<div class="col-sm-12">
									<div class="card">
										<div class="card-header" id="headingThreeaiee">
											<h5 class="mb-0 d-flex justify-content-between align-items-center">
											  <a href="#!"
												 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
												 data-toggle="collapse"
												 data-target="#collapseThreeaiee"
												 aria-expanded="false"
												 aria-controls="collapseThreeaiee">
										
												<span>Mathematics</span>
												<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseThreeaiee"></i>
											  </a>
											</h5>
										  </div>
											<div id="collapseThreeaiee" class="card-body collapse" aria-labelledby="headingThreeaiee" data-parent="#accordionExample">
												<div class="row scan1">
										 
													<div class="col-lg-12">
														<h3 class="font">High Quality Matching International Standards</h3>
														<p class="font">
															Questions in SPARK Olympiads are prepared and reviewed by an international team of experts. Each question is tightly mapped to specific learning outcomes and Depth of Knowledge (DoK) levels.<br><br>Sample questions for grade 5 are shared as an illustration of the high quality of SPARK Olympiads. This page will be updated with sample questions of all subjects and all classes very soon.
					
														</p>
														<h3 class="font">Mathematics</h3>
														<h5 class="font">Conceptual Thinking and Application</h5>
														<li class="font"><strong>A water tank holds 2,500 litres of water. If 325 litres is used each day, how much water is left after 4 days?</strong></li>
														<ol class="font" style="list-style-type: lower-alpha;">
															<li>1,200 litres</li>
															<li>1,250 litres</li>
															<li>1,100 litres</li>
															<li>1,600 litres</li>
														</ol>
														<li class="font"><strong>Meera wants to tile a rectangular floor that is 8 metres long and 6 metres wide using 0.5 m × 0.5 m tiles. How many tiles does she need?</strong></li>
														<ol class="font" style="list-style-type: lower-alpha;">
															<li>192</li>
															<li>96</li>
															<li>64</li>
															<li>48</li>
														</ol>
														<li class="font"><strong>A bus leaves Chennai at 6:45 AM and reaches Coimbatore at 1:20 PM. What is the total duration of the journey?</strong></li>
														<ol class="font" style="list-style-type: lower-alpha;">
															<li>6 hours 35 minutes</li>
															<li>7 hours</li>
															<li>7 hours 15 minutes</li>
															<li>6 hours 45 minutes</li>
														</ol>
														<h5 class="font">Strategic Thinking</h5>
														<li class="font"><strong>A bakery makes 540 pastries in 6 hours. If the production rate stays the same, how many pastries will it make in 8.5 hours?</strong></li>
														<ol class="font" style="list-style-type: lower-alpha;">
															<li>765</li>
															<li>680</li>
															<li>720</li>
															<li>810</li>
														</ol>
														<li class="font"><strong>Ravi earns ₹325 per day. He saves one-fifth of his daily income. How much will he save in 12 days?</strong></li>
														<ol class="font" style="list-style-type: lower-alpha;">
															<li>₹780</li>
															<li>₹720</li>
															<li>₹650</li>
															<li>₹875</li>
														</ol>
														<li class="font"><strong>A rectangular plot of land has a length 4 metres more than its width. If the perimeter of the plot is 56 metres, what is its area?</strong></li>
														<ol class="font" style="list-style-type: lower-alpha;">
															<li>180 sq. m</li>
															<li>192 sq. m</li>
															<li>176 sq. m</li>
															<li>160 sq. m</li>
														</ol>
														<a href="{{asset('SampleQuestions.pdf')}}" class="btn btn-outline-danger float-right" role="button" target="_blank">
															<i class="fas fa-file-pdf"></i> Download 
														</a>
													</div>
												</div>
											</div>
										</div>
									 
									
										<div class="card">
											<div class="card-header" id="headingTwog">
												<h5 class="mb-0 d-flex justify-content-between align-items-center">
												  <a href="#!"
													 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
													 data-toggle="collapse"
													 data-target="#collapseTwog"
													 aria-expanded="false"
													 aria-controls="collapseTwog">
											
													<span>English</span>
													<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseTwog"></i>
												  </a>
												</h5>
											  </div>
											<div id="collapseTwog" class="card-body collapse" aria-labelledby="headingTwog" data-parent="#accordionExample" style="">
												<div class="row scan1">
													<div class="col-lg-12">
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
										</div></div>
										<div class="card">
											<div class="card-header" id="headingThreeh">
												<h5 class="mb-0 d-flex justify-content-between align-items-center">
												  <a href="#!"
													 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
													 data-toggle="collapse"
													 data-target="#collapseThreeh"
													 aria-expanded="false"
													 aria-controls="collapseThreeh">
											
													<span>EVS</span>
													<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseThreeh"></i>
												  </a>
												</h5>
											  </div>
											<div id="collapseThreeh" class="card-body collapse" aria-labelledby="headingThreeh" data-parent="#accordionExample">
												<div class="row scan1">
													<div class="col-lg-12">
													<h3 class="font">High Quality Matching International Standards</h3>
													<p class="font">
														Questions in SPARK Olympiads are prepared and reviewed by an international team of experts. Each question is tightly mapped to specific learning outcomes and Depth of Knowledge (DoK) levels.<br><br>Sample questions for grade 5 are shared as an illustration of the high quality of SPARK Olympiads. This page will be updated with sample questions of all subjects and all classes very soon.
													</p>
												   
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
										
										
										
										<div class="card">
											<div class="card-header" id="headingThreej">
												<h5 class="mb-0 d-flex justify-content-between align-items-center">
												  <a href="#!"
													 class="d-flex justify-content-between w-100 align-items-center text-decoration-none collapsed"
													 data-toggle="collapse"
													 data-target="#collapseThreerj"
													 aria-expanded="false"
													 aria-controls="collapseThreerj">
											
													<span>India Awareness</span>
													<i class="fas fa-chevron-down toggle-arrow" data-target="#collapseThreerj"></i>
												  </a>
												</h5>
											  </div>
											<div id="collapseThreerj" class="card-body collapse" aria-labelledby="headingThreej" data-parent="#accordionExample">
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
		    </div>
	    </div>
	 

 
	<!-- [ Main Content ] end -->
	@endsection
	@push('scripts')
	<script>
		$(document).ready(function () {
		  $('.collapse').on('show.bs.collapse', function () {
			const targetId = '#' + this.id;
			$(`.toggle-arrow[data-target="${targetId}"]`)
			  .removeClass('fa-chevron-down')
			  .addClass('fa-chevron-up');
		  });
	  
		  $('.collapse').on('hide.bs.collapse', function () {
			const targetId = '#' + this.id;
			$(`.toggle-arrow[data-target="${targetId}"]`)
			  .removeClass('fa-chevron-up')
			  .addClass('fa-chevron-down');
		  });
		});
	  </script>
	  
	 @endpush