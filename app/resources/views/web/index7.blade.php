
@extends('web.layouts.app')
@section('content')
<style>
    table td{
        font-size:12px;
        font-weight: 500;
        width:8%;
    }
    table{
        width:100%;
    }

    table tr th{
        font-size:14px;
    }
  

</style>

  @if(empty($links_list->date_id))
        <style>
            #table1, #table2 {
                display: none;
            }
        </style>
    @endif

    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-10">
                        <h1>Exam Schedule</h1>
                        <div class="rectangle">
                            <img src="{{ asset('web/assets/img/Rectangle 13.png') }}" class="img-fluid" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="service-details" class="service-details section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    @include('web.layouts.tabination')
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="form-container">
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul class="mb-0">
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif

									@if (session('success'))
										<div class="alert alert-success">
											{{ session('success') }}
										</div>
									@endif
                     				
                                    <form id="exam-form" action="{{ route('save.school.create.date') }}" method="POST">
                                        @csrf
                                            
                                            <input type="hidden" class="form-control" id="link" name="link" readonly value="https://sparkolympiads.com/app/school-login/st">
                                            <input type="hidden" class="form-control"  name="id" readonly value="{{ $links_list->id ?? '' }}">
                                            <input type="hidden" name="registration_id" value="{{ Session::get('schoolid') }}">
                                            <div class="row"> 	 
                                                      
											 
												<div class="row">
                                                    <div class="col-md-5 mb-3">
                                                    <p><b>Choose Exam Slot</b></p>
                                                    </div>
                                                    <div class="col-md-5 ">
                                                            <a href="{{asset('SPARK-Exam-Schedule.pdf')}}" target="_blank" class="btn btn-sm btn-outline-dark float-right" style="font-size:14px !important"> <i class="fa fa-download"></i> Download Exam Schedule</a>
                                                    </div>
                                                    @foreach($exam_shedule as $es)
                                                        <div class="col-md-5 mb-3">
                                                           
                                                            <div 
                                                                class="card exam-box-option {{ ($links_list->date_id ?? null) == $es->id ? 'border-primary shadow active' : '' }}" 
                                                                onclick="selectExamDate({{ $es->id }})" 
                                                                id="exam-box-{{ $es->id }}" 
                                                                style="cursor: pointer;"
                                                            >
                                                                <div class="card-body text-center">
                                                                    <input 
                                                                        class="form-check-input d-none" 
                                                                        type="radio" 
                                                                        name="date_id" 
                                                                        id="date_{{$es->id}}" 
                                                                        value="{{$es->id}}"
                                                                        {{ ($links_list->date_id ?? null) == $es->id ? 'checked' : '' }}
                                                                    >
                                                
                                                                    <label 
                                                                        class="form-check-label" 
                                                                        for="date_{{$es->id}}" 
                                                                        style="cursor: pointer; font-weight: 500;"
                                                                    >
                                                                        {{ date('jS F', strtotime($es->shedule_date)) }} - {{ date('jS F', strtotime($es->to_date)) }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    @endforeach  
                                                   <p> (Exam window is 9 days only)</p>
                                                </div>

                                                <div class="row">
                                                    
                                                        <div class="col-md-10 mb-3">

                                                <table class="table border" id="table1">
                                                  
                                                    <thead class="table-primary" >
                                                        <tr><th colspan="5"> Slot 1 - Schedule</th></tr>
                                                        <tr>
                                                          <th>Date</th>
                                                          <th>8:15 AM</th>
                                                          <th>9:45 AM</th>
                                                          <th>11:15 AM</th>
                                                          <th>12:45 AM</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                       
                                                        <tr><td>18-11-2025</td><td>English Class 1</td><td>English Class 2</td><td>English Class 3</td><td>English Class 4</td></tr>
                                                        <tr><td>19-11-2025</td><td>English Class 5</td><td>English Class 6</td><td>English Class 7</td><td>English Class 8</td></tr>
                                                        <tr><td>20-11-2025</td><td>Math Class 1</td><td>Math Class 2</td><td>Math Class 3</td><td>Math Class 4</td></tr>
                                                        <tr><td>21-11-2025</td><td>Math Class 5</td><td>Math Class 6</td><td>Math Class 7</td><td>Math Class 8</td></tr>
                                                        <tr><td>24-11-2025</td><td>EVS Class 1</td><td>EVS Class 2</td><td>EVS Class 3</td><td>EVS Class 4</td></tr>
                                                        <tr><td>25-11-2025</td><td>EVS Class 5</td><td>Science Class 6</td><td>Science Class 7</td><td>Science Class 8</td></tr>
                                                        <tr><td>26-11-2025</td><td>IA Class 1</td><td>IA Class 2</td><td>IA Class 3</td><td>IA Class 4</td></tr>
                                                        <tr><td>27-11-2025</td><td>IA Class 5</td><td>IA Class 6</td><td>IA Class 7</td><td>IA Class 8</td></tr>
                                                        
                                                    </tbody>
                                                </table>
                                                        <table class="table border" id="table2" style="display: none;">
                                                           
                                                            <thead class="table-primary" >
                                                                <tr><th colspan="5">  Slot 2 - Schedule</th></tr>
                                                                <tr>
                                                                  <th>Date</th>
                                                                  <th>8:15 AM</th>
                                                                  <th>9:45 AM</th>
                                                                  <th>11:15 AM</th>
                                                                  <th>12:45 AM</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                <tr><td>02-12-2025</td><td>English Class 1</td><td>English Class 2</td><td>English Class 3</td><td>English Class 4</td></tr>
                                                                <tr><td>03-12-2025</td><td>English Class 5</td><td>English Class 6</td><td>English Class 7</td><td>English Class 8</td></tr>
                                                                <tr><td>04-12-2025</td><td>Math Class 1</td><td>Math Class 2</td><td>Math Class 3</td><td>Math Class 4</td></tr>
                                                                <tr><td>05-12-2025</td><td>Math Class 5</td><td>Math Class 6</td><td>Math Class 7</td><td>Math Class 8</td></tr>
                                                                <tr><td>08-12-2025</td><td>EVS Class 1</td><td>EVS Class 2</td><td>EVS Class 3</td><td>EVS Class 4</td></tr>
                                                                <tr><td>09-12-2025</td><td>EVS Class 5</td><td>Science Class 6</td><td>Science Class 7</td><td>Science Class 8</td></tr>
                                                                <tr><td>10-12-2025</td><td>IA Class 1</td><td>IA Class 2</td><td>IA Class 3</td><td>IA Class 4</td></tr>
                                                                <tr><td>11-12-2025</td><td>IA Class 5</td><td>IA Class 6</td><td>IA Class 7</td><td>IA Class 8</td></tr>
                                                   
                                                      </tbody>
                                                  </table>
                                                    </div>
                                                </div>
                                                
                                                

										<div id="labs_table_container"></div>
										<div class="row mb-3 mt-4">
                                            <div class="col-sm-2">
                                                <a href="{{ route('spark.cordinator') }}" class="btn btn-outline-primary w-100"><i class="fa fa-arrow-left"></i> Back</a>
                                            </div>
											<div class="col-sm-8">
												<button type="submit" id="submit-button" class="btn btn-primary w-100">Save & Proceed <i class="fa fa-arrow-right"></i></button>
											</div>
										</div>
                                     </div>
                            
                                               
												  
									</form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @push('scripts')
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



        function selectExamDate(id) {
            // Uncheck all radios
            document.querySelectorAll('input[name="date_id"]').forEach(el => el.checked = false);
        
            // Check selected radio
            const radio = document.getElementById('date_' + id);
            if (radio) radio.checked = true;

            // Remove active class from all cards
            document.querySelectorAll('.exam-box-option').forEach(el => el.classList.remove('border-primary', 'shadow', 'active'));

            // Add active class to selected card
            const card = document.getElementById('exam-box-' + id);
            if (card) card.classList.add('border-primary', 'shadow', 'active');

            if (id == 2) {
                document.getElementById('table1').style.display = 'none';
                document.getElementById('table2').style.display = 'block';
            } else {
                document.getElementById('table1').style.display = 'block';
                document.getElementById('table2').style.display = 'none';
            }
           

        }

         const date_id = {{ ($links_list->date_id ?? 0)}}
            if(date_id > 0){
                if(date_id==1){
                     document.getElementById('table1').style.display = 'block';
                     document.getElementById('table2').style.display = 'none';
                }else{
                     document.getElementById('table1').style.display = 'none';
                     document.getElementById('table2').style.display = 'block';
                }
            }
 </script>




<script>
    $(document).ready(function() {
        $('#exam-form').on('submit', function(e) {
            e.preventDefault();
    
            let form = $(this);
    
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    'Accept': 'application/json'
                },
                beforeSend: function() {
                    $('#submit-button').attr('disabled', true).text('Saving...');
                },
                success: function(response) {
                  //  alert(response.message); // Optional: show message before redirect
                    if (response.redirect) {
                        window.location.href = response.redirect; // 👈 do the redirect
                    }
                },
                error: function(xhr) {
                    $('#submit-button').attr('disabled', false).text('Save & Proceed');
                    if(xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        $.each(errors, function(key, val) {
                            errorMessages += val + '\n';
                        });
                        alert(errorMessages);
                    } else {
                        alert('An unexpected error occurred.');
                    }
                }
            });
        });
    });
    </script>
    
    

    @endpush
 

