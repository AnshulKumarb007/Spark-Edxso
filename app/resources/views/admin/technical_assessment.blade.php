@extends('layouts.admin')
@section('content')
<style>


.text-success {
font-weight: bold;
color: green;
}

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


table tr td {
font-size:12px;
}
table tr th {
font-size:13px;
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
                                        <h5>Technical Assesment </h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('school.dashboard')}}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item">Technical Assesment List</li>
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
                                        <select name="slot" id="exam-slot" class="form-control" >                      
                                            <option>--Select Exam Slot --</option>                                           
                                                <option value="all">All</option>
                                            @foreach($exam_shedule as $es) 
                                                <option value="{{ $es->id }}"> {{ date('jS F', strtotime($es->shedule_date)) }} To {{ date('jS F', strtotime($es->to_date)) }}</option>                                   
                                            @endforeach
                                     </select> 
                                    </div>


                              

                                <div class="col-md-4 mb-3">
                                    <label>School</label>
                                    <select name="school_id[]" id="school" class="form-control class-select" multiple>
                                        <!-- Options will be populated dynamically -->
                                    </select>
                                </div> 

                                    <div class="col-md-4 mt-4">
                                        <button type="submit" class="btn  btn-success">Filter</button>
                                        <a href="{{ url()->current() }}" class="btn btn-danger">Reset</a>
                                    </div>
                                </div>
                    </form> 
                    
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 col-xl-12">
                          									 

                                        
                            <div class="card">
                                <div class="card-header"> 
                                    

                                </div>
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                    @php
                                        $sr = 1;
                                        $grandTotal = 0;
                                        $duetotal = 0;
                                    @endphp

                                <table class="table datatable" id="schoolTable">
                                    <thead>
                                        <tr>
                                            {{-- <th><input type="checkbox" id="select_all_fee_status" title="select all for update fee status verified or unverified" /></th> --}}
                                            <th>#</th>
                                            
                                            <th class="sticky-col">School Name</th>  
                                            <th>Enrolled LABS_Computers</th>
                                            <th>Total Labs</th>
                                            <th>Total Computers</th>
                                            <th>Assessed Computers</th>
                                           
                                            <th>Action</th> 
                                            
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach($assessemts as $st)  
                                            <tr> 
                                                <td>{{ $sr++ }}</td> 
                                                <td class="sticky-col text-capitalize">{{ $st->school_name }}({{$st->schoolid}})</td>   
                                                <td >{!! str_replace(',', '<br>', $st->labs_summary) !!}
</td>   
                                                <td CLASS="text-center">{{ $st->total_com_labs }}</td>   
                                                <td CLASS="text-center">{{ $st->total_computers }}</td>   
                                                <td >{!! str_replace('!', '<br>', $st->labs_tested_computers)!!}</td>   
                                                <td ><a href="{{ route('manage.technical.details', ['id' => $st->school_id ??  1 ]) }}" target="_blank" class="btn btn-success btn-sm">View</a>

                                                    
                                                
                                                 
                                                 </td>   
                                                  
                                            </tr> 
                                        @endforeach 

                                 

                                    </tbody>
                                    
                                </table> 
                                </div> 
                                   
                                        <div class="d-flex justify-content-between align-items-center mt-3 float-right">
                                         {{ $assessemts->appends(request()->query())->links() }}
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

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Verify Student</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
    <span>&times;</span>
</button>
</div>
<div class="modal-body">
Are you sure you want to verify this student?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reject</button>
<button type="button" class="btn btn-success" id="confirmVerifyBtn">Verified</button>
</div>
</div>
</div>
</div>


@endsection

@push("scripts")
<script>
$(document).ready(function () {
$('#class').on('change', function () {
var stateID = this.value;
console.log("Selected State ID:", stateID); // Debug line
$("#subject").html('');
    $.ajax({
        url: "{{ url('get-subject') }}/" + stateID,
        type: "GET",
        success: function (res) {
            $('#subject').html('<option value="">--Select Exam--</option>');
            $('#subject').append('<option value="all">All</option>');
            $('#subject').select2({
                placeholder: "Select Exam",
                allowClear: true
            });
            $.each(res, function (key, value) {
                $('#subject').append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        }
    });
});
});

$(document).ready(function() {
$('#subject').select2({      
placeholder: "Select class first",
allowClear: true
});
});

$(document).ready(function() {
$('#school').select2({      
placeholder: "--Select --",
allowClear: true
});
});

 
</script>  




<script>
$(document).ready(function () {
    $('.verify-btn').click(function (e) {
        e.preventDefault();

        let button = $(this);
        let originalText = button.text(); // Store original text
        let studentId = button.data('student-id');

        // SweetAlert confirmation
        Swal.fire({
            title: 'Confirm fee verification for this student?',
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#28a745',
            denyButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            let status;
            if (result.isConfirmed) {
                status = 1; // Accepted
            } else if (result.isDenied) {
                status = 2; // Rejected
            } else {
                return; // Cancelled
            }

            // Show loader in button
            button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

            // AJAX request
            $.ajax({
                url: '{{ route("admin.student.fee.verify") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    student_id: studentId,
                    status: status
                },
                success: function (response) {
                    if (response.status === 'success') {
                        const statusCell = button.closest('tr').find('.student-verification-status');
                        if (status === 1) {
                            statusCell.html(
                                `<p style="background: green; padding:2px; border-radius:4px; color:#fff; text-align: center; font-size: 11px;">Verified</p>`
                            );
                        } else {
                            statusCell.html(
                                `<p style="background: red; padding:2px; border-radius:4px; color:#fff; text-align: center; font-size: 11px;">Rejected</p>`
                            );
                        }

                        // Update button text and disable
                        button.text(status === 1 ? 'Verified' : 'Rejected').prop('disabled', true);

                        // Show success SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: status === 1 ? 'Verified!' : 'Rejected!',
                            text: 'The student fee verification status has been updated.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        // Handle unexpected failure
                        button.prop('disabled', false).text(originalText);
                        Swal.fire('Error', 'Operation failed. Please try again.', 'error');
                    }
                },
                error: function () {
                    button.prop('disabled', false).text(originalText);
                    Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                }
            });
        });
    });
});


$(document).ready(function () {
    $('.not-verify').click(function () {
        Swal.fire({
            title: 'Please verify student detail first',
            icon: 'warning',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        });
    });

    $('.paymen-verified').click(function () {
        Swal.fire({
            title: 'Payment already verified',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2ca961'
        });
    });
});
</script>


<script>
    $(document).ready(function() {
        $('#exam-slot').on('change', function() {
            let examSlotId = $(this).val();
            let url = '{{ route("get.schools.by.slot", ":id") }}';
            url = url.replace(':id', examSlotId);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#school').empty();
                      $('#school').append('<option value="all">All</option>');
                    $.each(data, function(key, value) {
                        $('#school').append(`<option value="${value.school_id}">${value.school_name} - ${value.school_id}</option>`);
                    });
                },
                error: function(xhr) {
                    console.error("Failed to fetch schools:", xhr.responseText);
                }
            });
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