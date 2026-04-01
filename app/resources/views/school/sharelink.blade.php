@extends('layouts.school')
@section('content')
<style>

.exam-box-option {
        border: 2px solid #ccc;
        border-radius: 8px;
        padding: 15px;
        margin: 10px 10px 10px 0;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
        min-width: 200px;
        font-size:14px;
    }

    

    .exam-box-option:hover {
        border-color: #004aad;
        background-color: #f0f8ff;
        color:#004aad;
    }

    .exam-box-option input[type="radio"] {
        display: none;
    }

    .exam-box-option.active {
        border-color: #004aad;
        background-color: #e6f0ff;
        color:#004aad;
    }

    .exam-box-option label {
        margin: 0;
        font-weight: 600;
        cursor: pointer;
        display: block;
    }
	
	
	.input-container {
    position: relative;
}

.input-container .form-control {
    padding-right: 120px; /* Space for the button inside the input field */
}

.input-container .copy-btn {
    position: absolute;
    right: 3px; /* Distance from the right edge of the input box */
    top: 50%;
    transform: translateY(-50%); /* Vertically center the button */
    padding: 5px 10px; /* Button padding */
    font-size: 12px; /* Optional: Adjust button font size */
    z-index: 1; /* Ensure the button is above the input box */
}
.input-container .copy-btn:hover {
    background-color: #ff5817;
    border-color: #ff5817;
    color: white; /* Change text color to white for better contrast */
}
.input-container .copy-btn {
  background-color: #000;
  border-color: #000;
  border-radius: 4px;
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
												<h5>Share Link</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{route('school.dashboard')}}"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="{{route('school.dashboard')}}">Home</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div> 

							<div class="row">
								<div class="col-md-12 col-xl-12">
								 <div class="card card-social">										 
									 <div class="card-block">		
									 								
										<form id="shareForm" action="{{ route('store.school.share.link') }}" method="POST">
										@csrf
										<input type="hidden" class="form-control" id="link" name="link" readonly value="{{$url->school_url.'/st'}}">
										<input type="hidden" class="form-control"  name="id" readonly value="{{ $links_list->id ?? '' }}">
										 
														 
                              <h5 class="my-font-weight2">Please generate the self-registration link for students and parents.</h5>	
                              <hr/>
                             <h6 class="my-font-weight2">Select Exam Date </h6>                                                  
                                <div class="d-flex flex-wrap">
                                  @foreach($exam_shedule as $es)
                                      <div class="exam-box-option {{ ($links_list->date_id ?? null) == $es->id ? 'active' : '' }}" onclick="selectExamDate({{ $es->id }})" id="exam-box-{{ $es->id }}">
                                          <input class="form-check-input" type="radio" name="date_id" id="date_{{$es->id}}" value="{{$es->id}}"
                                              {{ ($links_list->date_id ?? null) == $es->id ? 'checked' : '' }}>
                                          <label class="form-check-label" for="date_{{$es->id}}">
                                              {{ date('jS F', strtotime($es->shedule_date)) }} To {{ date('jS F', strtotime($es->to_date)) }}
                                          </label>
                                      </div>
                                  @endforeach
                                  <button type="button" id="generateBtn" class="btn btn-warning btn-sm" style="padding: 15px;margin: 10px 10px 10px 0;"><i class="fa fa-link"></i> Generate Link</button>
                              </div>
                            
										<script>
											function selectExamDate(id) {
												document.querySelectorAll('.exam-box-option').forEach(el => el.classList.remove('active'));
												const selectedBox = document.getElementById('exam-box-' + id);
												if (selectedBox) {
													selectedBox.classList.add('active');
													const input = selectedBox.querySelector('input[type="radio"]');
													if (input) input.checked = true;
												}
											}
										</script>
												  
											</form>
									 
										  
								   </div>	   
								</div>  
							 </div>
							 </div>

							 @if($links_list) 
							 <div class="row">
								<div class="col-md-12 col-xl-12">
								  <div class="card card-social">										 
									 <div class="card-block">	
							
										 
										<h5>Please share the below self-registration link for students and parents.</h5>											 
										<div class="input-container">
											<input type="text" class="form-control" id="link" name="link" placeholder="Enter text here" readonly value="{{$url->school_url.'/st'}}">	
											<button id="btn" class="btn btn-success copy-btn"><i class='fas fa-copy'></i> Copy link to share</button>
										</div>
										<p style="color:black" class="mt-2 my-font-weight">Selected exam date - {{ date('jS F', strtotime($links_list->shedule_date)) }} To {{ date('jS F', strtotime($links_list->to_date)) }}</p>
										<a href="{{asset('SPARK-Exam-Schedule.pdf')}}" target="_blank" class="btn btn-warning btn-sm">Download Complete Schedule</a>
							 

									 </div>
									 </div>
									 </div>
									</div>
																
					   @endif	




                            {{-- <div class="row">
 
								<div class="col-md-12 col-xl-12">
									<div class="card card-social">										 
										<div class="card-block">										 
											<form id="shareForm" action="{{ route('store.school.share.link') }}" method="POST">
												@csrf
												<input type="hidden" class="form-control" id="link" name="link" readonly value="{{$url->school_url.'/st'}}">
												<input type="hidden" class="form-control"  name="id" readonly value="{{ $links_list->id ?? '' }}">
												 
																 
									  <h5 class="my-font-weight2">Please generate the self-registration link for students and parents.</h5>	
									  <hr/>
									 <h6 class="my-font-weight2">Select Exam Date </h6>                                                  
										<div class="d-flex flex-wrap">
										  @foreach($exam_shedule as $es)
											  <div class="exam-box-option {{ ($links_list->date_id ?? null) == $es->id ? 'active' : '' }}" onclick="selectExamDate({{ $es->id }})" id="exam-box-{{ $es->id }}">
												  <input class="form-check-input" type="radio" name="date_id" id="date_{{$es->id}}" value="{{$es->id}}"
													  {{ ($links_list->date_id ?? null) == $es->id ? 'checked' : '' }}>
												  <label class="form-check-label" for="date_{{$es->id}}">
													  {{ date('jS F', strtotime($es->shedule_date)) }} To {{ date('jS F', strtotime($es->to_date)) }}
												  </label>
											  </div>
										  @endforeach
										  <button type="button" id="generateBtn" class="btn btn-warning btn-sm" style="padding: 15px;margin: 10px 10px 10px 0;"><i class="fa fa-link"></i> Generate Link</button>
									  </div>
									
												<script>
													function selectExamDate(id) {
														document.querySelectorAll('.exam-box-option').forEach(el => el.classList.remove('active'));
														const selectedBox = document.getElementById('exam-box-' + id);
														if (selectedBox) {
															selectedBox.classList.add('active');
															const input = selectedBox.querySelector('input[type="radio"]');
															if (input) input.checked = true;
														}
													}
												</script>
														  
													</form>
 	
										 @if($links_list)
                                                <div class="mb-3 col-xl-12">
                                                    <label for="link" class="form-label">Link</label>
                                                    <input type="text"  class="form-control" id="link" name="link" placeholder="Enter text here" readonly value="{{$url->school_url.'/st'}}">
                                                </div>

												<div class="mb-3 col-xl-12">
												<button id="btn" class="btn btn-success">Copy Link For Email/Whatsapp</button>
												<button id="btn1" class="btn btn-success">Copy Link For SMS</button>
												
                                                </div>
												@endif									 
									</div>


									 
								</div>
								 
							</div> --}}
						</div>

						</div> 
                             
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="linkModalLabel">Copy Link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
        <input type="text" id="popupLink" class="form-control" readonly>
        <button class="btn btn-primary mt-3" onclick="copyPopupLink()">Copy</button>
        <div id="copyStatus" class="mt-2 text-success d-none">Copied!</div>
      </div>
    </div>
  </div>
</div>

	<!-- [ Main Content ] end -->
	@endsection
	@push('scripts')
	<script>
document.addEventListener("DOMContentLoaded", function() {
    const linkInput = document.getElementById("link");
    const popupLink = document.getElementById("popupLink");
    const copyStatus = document.getElementById("copyStatus");

    const modalElement = document.getElementById("linkModal");
    const bsModal = new bootstrap.Modal(modalElement);

    document.getElementById("btn").addEventListener("click", function () {
        const linkValue = linkInput.value;
        popupLink.value = linkValue;
        copyStatus.classList.add("d-none");
        bsModal.show();
    });

    document.getElementById("btn1").addEventListener("click", function () {
        const linkValue = linkInput.value;
        popupLink.value = linkValue;
        copyStatus.classList.add("d-none");
        bsModal.show();
    });
});

function copyPopupLink() {
    const copyText = document.getElementById("popupLink");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    navigator.clipboard.writeText(copyText.value).then(() => {
        document.getElementById("copyStatus").classList.remove("d-none");
    });
}


 
document.getElementById('generateBtn').addEventListener('click', function (e) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to generate and share the link.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, generate it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('shareForm').submit();
        }
    });
}); 

</script>

     @endpush