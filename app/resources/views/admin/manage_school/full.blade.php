
@extends('layouts.admin')
 @section('content')

 <!-- DataTables CSS -->

<style>
    /* Make the first two columns sticky */
#schoolTable th:nth-child(2),
#schoolTable td:nth-child(2),
#schoolTable th:nth-child(4),
#schoolTable td:nth-child(4) {
  position: sticky;
  background: white; /* or use the existing background color */
  z-index: 10; /* make sure sticky columns stay on top */
}

/* Adjust left position for each sticky column */
#schoolTable th:nth-child(2),
#schoolTable td:nth-child(2) {
  left: 40px; /* width of the # column */
}

#schoolTable th:nth-child(4),
#schoolTable td:nth-child(4) {
  left: 120px; /* width of # column + School ID column */
}

/* Also make the # column sticky for better UX */
#schoolTable th:nth-child(1),
#schoolTable td:nth-child(1) {
  position: sticky;
  left: 0;
  background: white;
  z-index: 11;
  width: 40px; /* adjust width if needed */
}

    </style>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <section class="pcoded-main-container">
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
                                                <h5 class="m-b-10">School Registered Data</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>                                                
                                                <li class="breadcrumb-item"><a href="#!">School Registered Data</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card card-social">										 
                                                                                 
                                
                                            <div class="card-header">
                            
                                                        <form method="GET" action="{{ url()->current() }}" class="mb-4">
                                                                <div class="row"> 

                                    <div class="col-md-4 mb-3">
                                        <label>Select Exam Slot</label>
                                        <select name="school_id" id="exam-slot" class="form-control" require>                      
                                            <option>--Select Exam Slot --</option>                                           
                                                <option value="all">All</option>
                                            @foreach($exam_shedule as $es) 
                                                <option value="{{ $es->id }}"> {{ date('jS F', strtotime($es->shedule_date)) }} To {{ date('jS F', strtotime($es->to_date)) }}</option>                                   
                                            @endforeach
                                     </select> 
                                    </div>



                                                                    <div class="col-md-4">
                                                                        <label>Date</label>
                                                                        <input type="text" id="multiDatePicker" name="date" class="form-control " Placeholder="Select Multiple Dates" />
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label>School Name/School Id/Mobile No./Email Id</label>
                                                                        <input type="text" name="school_name_or_code" placeholder="School Name/School Id/Mobile No./Email Id" class="form-control "  />
                                                                    </div>

                        <div class="col-md-2">
                            <label   class="form-label">Board</label>
                                <select name="board_id"   class="form-control"  >
                                        <option value="">Select Board</option>
                                        @foreach($boards as $board)
                                            <option value="{{$board->id}}">{{$board->board}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            
                                <div class="col-md-2">
                                    <label for="state-dropdown" class="form-label">State</label>
                                    <select name="state_id" id="state-dropdown" class="form-control" >
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                        <option value="{{ $state->state_id }}">{{ $state->state_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            

                            
                                <div class="col-md-4">
                                    <label for="district-dropdown" class="form-label">District</label>
                                    <select name="district_id" id="district-dropdown" class="form-control" >
                                        <option value="">Select State First</option>
                                       
                                    </select>
                                </div>

                                    <div class="col-md-4">
                                            <label>City/Pin</label>
                                            <input type="text" name="city_pin" placeholder="City/Pin" class="form-control "  />
                                        </div>
                            
                            
                            
                                                                    <div class="col-md-4 align-self-end mt-2">
                                                                        <button type="submit" class="btn btn-success">Filter</button>
                                                                        <a href="{{ url()->current() }}" class="btn btn-danger">Reset</a>
                                                                    </div>
                                                                </div>
                                                        </form> 
                                                    
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>School Registered Data</h5> 
                                            <!-- <a href="#" class="btn btn-success float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">Add</a> -->
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                            <table class="table datatable" id="schoolTable">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th colspan="4" style="background:#d6dce4">School Details</th>
                                                            <th colspan="4" style="background:#fbe5d5">Head Of School Details</th>                                                                
                                                            <th colspan="4" style="background:#e2efd9">Spark Coordinator Details</th>   
                                                            <th colspan="3" style="background:#bdd7ee">Lab/Computer Details</th>                                                                
                                                            <th colspan="2" style="background:rgb(255 235 59);">Student Information</th>                                                                
                                                        </tr>

                                                        <tr>
                                                            <th style="background:#d6dce4">#</th>
                                                            <th style="background:#d6dce4">School ID</th>    
                                                            <th style="background:#d6dce4">Regd. Mobile/Email</th>                                                                                                      
                                                            <th style="background:#d6dce4">School Name</th>
                                                            <th style="background:#d6dce4">Board</th>
                                                            <th style="background:#d6dce4">State</th>
                                                            <th style="background:#d6dce4">District</th>
                                                            <th style="background:#d6dce4">Vill./Town/City</th>
                                                            <th style="background:#d6dce4">Pin Code</th> 
                                                            <th style="background:#fbe5d5">First Name</th>
                                                            <th style="background:#fbe5d5">Middle  Name</th>
                                                            <th style="background:#fbe5d5">Last  Name</th>
                                                            <th style="background:#fbe5d5">Mobile No.</th>
                                                            <th style="background:#fbe5d5">Email ID</th>
                                                            <th style="background:#fbe5d5">Designation</th>
                                                            <th style="background:#e2efd9">First Name</th>
                                                            <th style="background:#e2efd9">Middle Name</th>
                                                            <th style="background:#e2efd9">Last Name</th>
                                                            <th style="background:#e2efd9">Mobile No.</th>
                                                            <th style="background:#e2efd9">Email ID</th>
                                                            <th style="background:#e2efd9">Designation</th> 
                                                            <th style="background:#bdd7ee">Total Strength</th>
                                                            <th style="background:#bdd7ee">Strength Class 1-8</th>
                                                            <th style="background:#bdd7ee">Total Labs (Computer)</th>
                                                            <th style="background: rgb(255 235 59);">Registered Students</th>
                                                            <th style="background: rgb(255 235 59);">Last Updated Date</th>
                                                            {{-- <th>School URL</th>
                                                            
                                                            <th>Created At</th>
                                                            <th>Updated At</th>
                                                            <th>Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $sr=1; @endphp
                                                        @foreach ($data as $item)
                                                        <tr>
                                                            <td>{{ $sr++ ?? '' }}</td> 
                                                            <td>{{ $item->school_id ?? '' }}</td>
                                                            <td>{{ $item->mobileno ?? '' }}</td>
                                                            <td class="text-capitalize">{{ $item->school_name ?? '' }}</td>
                                                            <td>{{ $item->board_id ?? '' }}</td>                                                           
                                                            <td>{{ $item->state_id ?? '' }}</td>
                                                            <td>{{ $item->district_id ?? '' }}</td>
                                                            <td class="text-capitalize">{{ $item->city_id ?? '' }}</td>
                                                            <td>{{ $item->pin ?? '' }}</td> 
                                                            <td class="text-capitalize"> {{ $item->cfirst_name ?? '' }} </td>
                                                            <td class="text-capitalize">  {{ $item->csecond_name ?? '' }} </td>
                                                            <td class="text-capitalize">   {{ $item->clast_name ?? '' }}</td>                                                            
                                                            <td>{{ $item->cmobile  }}</td>
                                                            <td>{{ $item->cemail ?? '' }}</td>
                                                            <td>{{$item->cdesignation}}</td>

                                                            <td class="text-capitalize"> {{ $item->dfirst_name ?? '' }} </td>
                                                            <td class="text-capitalize">{{ $item->dsecond_name ?? '' }} </td>
                                                            <td class="text-capitalize">{{ $item->dlast_name ?? '' }}</td>                                                            
                                                            <td>{{ $item->dmobile  }}</td>  
                                                            <td>{{ $item->demail ?? '' }}</td>
                                                            <td>{{ $item->ddesignation  }}</td>
                                                            <td class="text-center">{{ $item->total_enrollment  }}</td>
                                                            <td class="text-center">{{ $item->class_1_to_8_enroll }}</td>
                                                            <td class="text-center">{{ $item->total_com_labs }} ({{$item->total_computers}})</td>
                                                            <td class="text-center">{{ $item->total_students }}</td>
                                                            <td>{{ date("d-m-Y",strtotime($item->updated_at)) }}</td>


                                                            
                                                            {{-- <td><a href="{{ $item->school_url ?? '#' }}" target="_blank">School Link</a></td>
                                                         
                                                            <td>{{ $item->created_at ?? '' }}</td>
                                                            <td>{{ $item->updated_at ?? '' }}</td>
                                                            <td> 
                                                                <button>Edit</button>
                                                                <button>Delete</button>
                                                            </td> --}}
                                                        </tr>
                                                        @endforeach                                     
                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        
                                                    </div>
                                                    
                                                    <div>
                                                        {{-- Pagination links --}}
                                                        {{ $data->appends(request()->query())->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ basic-table ] end -->
                                <!-- [ inverse-table ] start -->
                             
                                
                                
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Background-Utilities ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                 
    </section>
   
<!-- Modal Structure -->
<!-- Modal for Previewing School Details -->
<style>

    /* Make the modal dialog fullscreen */
#schoolPreviewModal .modal-dialog {
    max-width: 100%;
    width: 90%;
    margin: 0;
}

/* Optional: Make modal body take up all available space */
#schoolPreviewModal .modal-body {
    max-height: calc(100vh - 120px); /* Adjust for header/footer height */
    overflow-y: auto;
}

</style>
<div class="modal fade" id="schoolPreviewModal" tabindex="-1" role="dialog" aria-labelledby="schoolPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="schoolPreviewModalLabel">School Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- School Details Content -->
                <div id="schoolDetailsContent">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



 @endsection
 
 @push('scripts')
 
 <script>
    $(document).ready(function() {
 
        // Preview School Details in Modal
        $('.preview-school').on('click', function() {
            var schoolId = $(this).data('id'); // Get school ID from the button
            var url = "{{ route('manage.school.preview', ['id' => ':id']) }}"; // Create the URL with dynamic ID
            url = url.replace(':id', schoolId);

            // Make an AJAX request to fetch the school details
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // On success, insert the school details into the modal content
                    $('#schoolDetailsContent').html(response);
                    $('#schoolPreviewModal').modal('show'); // Open the modal
                },
                error: function() {
                    alert('Error fetching school details.');
                }
            });
        });
    });
</script>


<script>
    
    $('#state-dropdown').on('change', function() {
        var stateID = this.value;
        console.log("Selected State ID:", stateID); // Debug line
        $("#district-dropdown").html('');
        $.ajax({
            url: "{{ url('get-districts') }}/" + stateID,
            type: "GET",
            success: function(res) {
                $('#district-dropdown').html('<option value="">Select District</option>');
                $.each(res, function(key, value) {
                    $('#district-dropdown').append('<option value="' + value.districtid +'">' + value.district_title + '</option>');
                });
            }
        });
    });


 
</script>
<!-- Include Flatpickr CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

 

<!-- Initialize Flatpickr -->
<script>
  flatpickr("#multiDatePicker", {
    mode: "multiple",
    dateFormat: "Y-m-d"
  });
</script>

@endpush