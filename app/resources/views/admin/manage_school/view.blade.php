
@extends('layouts.admin')
@section('content')

<!-- DataTables CSS -->

<style>
    tr td {
      font-size:13px;
      padding: 0px;
    }

    .password-wrapper {
    position: relative;
    margin-bottom: 1rem;
  }

  .eye-icon {
    position: absolute;
    top: 70%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    opacity: 0.7;
    z-index: 10;
  }

  .eye-icon.below {
    position: static;
    transform: none;
    margin-top: 0.25rem;
    display: inline-block;
  }

  .error-shown .eye-icon {
    position: static;
    transform: none;
    margin-top: 0.25rem;
    display: block;
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
                                            <h5 class="m-b-10">Manage Schools</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>                                                
                                            <li class="breadcrumb-item"><a href="#!">School Registration Status</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card card-social">										 
                                                                                
                            
                                    <div class="card-header"> 
                                        <form method="GET" action="{{ url()->current() }}" class="mb-4">
                                                <div class="row"> 
                                                    <div class="col-md-4">
                                                        <label>Date</label>
                                                        <input type="text" id="multiDatePicker" Placeholder="Select Multiple Dates" name="date" class="form-control "/>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Mobile No/Email</label>
                                                        <input type="text" name="school_name_or_code" placeholder="Mobile No/Email" class="form-control ">
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
                                        <h5>School Registration Status </h5> 
                                        <!-- <a href="#" class="btn btn-success float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">Add</a> -->
                                    </div>
                                    <div class="card-body table-border-style">
                                        
                                        <div class="table-responsive">
                                            <table class="table datatablex">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th style="font-size:11px;">registered mobile<br/> number / email</th>
                                                        <th style="font-size:11px;">School<br/>  Details </th>                   
                                                        <th style="font-size:11px;">Head of School <br/>Details</th>
                                                        <th style="font-size:11px;">Sprak Cordinator<br/> Details</th>
                                                        <th style="font-size:11px;">Enrollment/Lab <br/>Details </th>
                                                        <th style="font-size:11px;">Form <br/> Submitted </th>
                                                        <th style="font-size:11px;">Last Updated <br/>Date </th>
                                                        <th style="font-size:11px;">Action</th>               
                                                                  
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $sr=1; @endphp
                                                    @foreach($data as $m)
                                                    <tr class="main-row" data-id="{{ $m->id }}">
                                                        <td>{{$sr++}}</td>
                                                        <td>{{$m->email == '' ? $m->mobileno : $m->email}}</td>
                                                        <td>{!! $m->bregistration_id ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-close text-danger"></i>' !!}</td>
                                                        <td>{!! $m->cregistration_id ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-close text-danger"></i>' !!}</td>
                                                        <td>{!! $m->dregistration_id ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-close text-danger"></i>' !!}</td>
                                                        <td>{!! $m->eregistration_id ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-close text-danger"></i>' !!}</td>
                                                        <td>{!! $m->fregistration_id ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-close text-danger"></i>' !!}</td>
                                                        <td>{{ date('d-m-Y', strtotime($m->updated_at)) }}</td>
                                                        <td>
                                                            <a href="javascript:void(0);" 
                                                            class="preview-school" 
                                                            data-id="{{ $m->id }}" 
                                                            data-url="{{ route('manage.school.preview', ['id' => $m->id]) }}" 
                                                            title="View Details">
                                                             <i class="fa fa-chevron-down toggle-icon"></i> {{-- <-- icon to toggle --}}
                                                         </a> &nbsp;
                                                         
                                                            <a href="{{ route('manage.school.view', ['id' => $m->id]) }}" title="Edit Details"><i class="fa fa-edit"></i></a> &nbsp;
                                                           
                                                           <a href="{{ url('/admin-to-school-login/' . $m->id) }}?type=admin" target="_blank" class=""> <i class="fa fa-dashboard "></i> </a>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr class="accordion-row datatable-ignore" id="accordion-{{ $m->id }}" style="display: none;">
                                                        <td colspan="10">
                                                            <div id="content-{{ $m->id }}" class="accordion-content p-3 bg-light border rounded">
                                                                <!-- AJAX content will be loaded here -->
                                                                <p class="text-muted">Loading...</p>
                                                            </div>
                                                        </td>
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
 <input type="text" id="school_id">

 <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="passwordForm">
          <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
          </div>
          <div class="modal-body">
            <div class="mb-3 position-relative">
                <label for="newPassword" class="form-label">School id</label>
                <input type="text" readonly name="school_id" class="form-control" id="school_id2" 
                > 
            </div>


            <div class="mb-3 position-relative">
              <label for="newPassword" class="form-label">Password</label>
              <input type="password" placeholder="Password"  class="form-control" id="newPassword" name="new_password" required>
              <span class="eye-icon" onclick="togglePassword('newPassword')" >👁️</span>
            </div>

            <div class="mb-3 position-relative">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password"  placeholder="Confirm Password" class="form-control" id="confirmPassword" name="new_password_confirmation" required>
              <span class="eye-icon" onclick="togglePassword('confirmPassword')">👁️</span>
            </div>

            <div id="passwordMatchMessage" class="form-text mt-1"></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm" id="submitBtn" disabled>Change Password</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  









@endsection

@push('scripts')
<script>

 
    $(document).ready(function () {
  // 🔇 Suppress DataTables error messages
  $.fn.dataTable.ext.errMode = 'none';

  $('.datatable').each(function () {
    const table = $(this).DataTable({
      dom:
        "<'table-controls row'<'col-md-9'B><'col-md-3 text-right'f>>" +
        "<'table-body row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>",
      buttons: [
        {
          extend: 'csv',
          text: 'CSV',
          className: 'btn btn-sm btn-secondary'
        },
        {
          extend: 'excel',
          text: 'Excel',
          className: 'btn btn-sm btn-secondary'
        },
        {
          extend: 'print',
          text: 'Print',
          className: 'btn btn-sm btn-secondary'
        }
      ],
      paging: false,
      info: false,
      lengthChange: false,
      language: {
        paginate: {
          previous: '<button class="btn btn-sm btn-outline-primary me-1">Previous</button>',
          next: '<button class="btn btn-sm btn-outline-primary">Next</button>'
        }
      },

      // ✅ This fixes the root issue without hiding anything
      initComplete: function(settings, json) {
        // Remove the extra rows that break column count
        $(settings.nTBody)
          .find('tr.datatable-ignore')
          .remove();
      }
    });
  });
});



    $(document).ready(function() {
        
        $('.preview-school').on('click', function() {
            var $this = $(this);
            var schoolId = $this.data('id');
            var url = $this.data('url');
            var $accordionRow = $('#accordion-' + schoolId);
            var $contentDiv = $('#content-' + schoolId);
            var $icon = $this.find('.toggle-icon');
    
            // Hide other accordions and reset other icons
            $('.accordion-row').not($accordionRow).hide();
            $('.toggle-icon').not($icon).removeClass('fa-chevron-up').addClass('fa-chevron-down');
    
            if ($accordionRow.is(':visible')) {
                $accordionRow.hide();
                $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            } else {
                // Load content only if still showing the placeholder
                if ($contentDiv.find('p.text-muted').length > 0) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            $contentDiv.html(response);
                            $accordionRow.show();
                            $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                        },
                        error: function(xhr) {
                            $contentDiv.html('<p class="text-danger">Failed to load school details.</p>');
                            $accordionRow.show();
                            $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                        }
                    });
                } else {
                    $accordionRow.show();
                    $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                }
            }
        });
    });
    </script>
    <script>
        $(document).on('click', '.send-mail-sms', function (e) {
            e.preventDefault();
            const $btn = $(this);
            const school_id = $('#school_id').val();
            $btn.find('.spinner-border').removeClass('d-none');
            $btn.contents().filter(function() {
                return this.nodeType === 3;
            }).remove();
            $.get("{{ url('send-mail') }}/"+school_id, function (xhr) {
                if (xhr.status == 200) {
                    $btn.find('.spinner-border').addClass('d-none');
                    $btn.append(' Send Mail & SMS');
                    Swal.fire('Success!', xhr.message, 'success');
                }
            }).fail(function () {
                $btn.find('.spinner-border').addClass('d-none');
                $btn.append(' Send Mail & SMS');
                Swal.fire('Error!', 'Something went wrong!', 'error');
            });
        });
    </script>
    
    <script>
     $(document).on('change', '.active_razorpay', function(e) {
    const toggleElement = this;
    const school_id = toggleElement.dataset.schoolId;
    const label = document.getElementById('statusLabel');

    // Store current checked state, to revert if needed
    const intendedStatus = toggleElement.checked ? 2 : 0;
    // Revert toggle immediately to previous state to prevent UI flicker
    toggleElement.checked = !toggleElement.checked;

    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to turn ${intendedStatus ? 'ON' : 'OFF'} the online payment.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            toggleElement.disabled = true;

            fetch("{{ route('active.razorpay') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ status: intendedStatus, school_id: school_id })
            })
            .then(res => {
                if (!res.ok) throw new Error('Network error');
                return res.json();
            })
            .then(data => {
                // Set toggle based on confirmed status
                toggleElement.checked = data.status === 2;
                
                // Update label text and color classes dynamically
                if (toggleElement.checked) {
                    label.textContent = 'Online Payment';
                    label.classList.remove('status-off');
                    label.classList.add('status-on');
                } else {
                    label.textContent = 'Online Payment ';
                    label.classList.remove('status-on');
                    label.classList.add('status-off');
                }

                Swal.fire('Success!', data.message, 'success');
            })
            .catch(() => {
                Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                // Revert toggle and label on error
                toggleElement.checked = !intendedStatus;
                if (toggleElement.checked) {
                    label.textContent = 'Online Payment ';
                    label.classList.remove('status-off');
                    label.classList.add('status-on');
                } else {
                    label.textContent = 'Online Payment ';
                    label.classList.remove('status-on');
                    label.classList.add('status-off');
                }
            })
            .finally(() => {
                toggleElement.disabled = false;
            });
        } else {
            // User cancelled, revert label color/text to current checked state
            if (toggleElement.checked) {
                label.textContent = 'Online Payment  ';
                label.classList.remove('status-off');
                label.classList.add('status-on');
            } else {
                label.textContent = 'Online Payment ';
                label.classList.remove('status-on');
                label.classList.add('status-off');
            }
        }
    });
});


        </script>
        

        

        <script>

    

            function checkPasswordMatch() {
              const newPassword = $('#newPassword').val();
              const confirmPassword = $('#confirmPassword').val();
              const message = $('#passwordMatchMessage');
              const submitBtn = $('#submitBtn');

              
            
              if (newPassword === '' || confirmPassword === '') {
                  message.text('');
                  submitBtn.prop('disabled', true);
                return;
              }
            
              if (newPassword === confirmPassword) {
                message.text('✅ Passwords match').css('color', 'green');
                submitBtn.prop('disabled', false);
              } else {
                message.text('❌ Passwords do not match').css('color', 'red');
                submitBtn.prop('disabled', true);
              }
            }
            
            function togglePassword(id) {
              const input = document.getElementById(id);
              input.type = input.type === 'password' ? 'text' : 'password';
            }
            
            $(document).ready(function () {
               
              $('#newPassword, #confirmPassword').on('input', checkPasswordMatch);
            
              $('#passwordForm').on('submit', function (e) {
                e.preventDefault();
            
                $.ajax({
                  url: '{{ url("school-password-change-by-admin") }}',
                  method: 'POST',
                  data: {
                    password: $('#newPassword').val(),
                    password_confirmation: $('#confirmPassword').val(),
                    school_id: $('#school_id2').val(),
                    _token: '{{ csrf_token() }}'
                  },
                  beforeSend: function () {
                      // Show SweetAlert loading dialog
                      Swal.fire({
                        title: 'Processing...',
                        text: 'Please wait while we update the password.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                          Swal.showLoading();
                        }
                      });
                    },
                  success: function (response) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: response.message,
                      confirmButtonColor: '#3085d6'
                    });
            
                    $('#passwordForm')[0].reset();
                    $('#passwordMatchMessage').text('');
                    $('#submitBtn').prop('disabled', true);
                    const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
                    modal.hide();
                  },
                  error: function (xhr) {
                    
                    Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: xhr.responseJSON.error,
                      confirmButtonColor: '#d33'
                    });
                  }
                });
              });
            
            
                          // Set school ID when the reset button is clicked
                          $(document).on('click', '.reset-password', function () {
                            const schoolId = $(this).data('school-id');
                            console.log("Clicked .reset-password. schoolId:", schoolId);

                            if (!schoolId) {
                                alert("⚠️ No school ID found on clicked element.");
                                return;
                            }

                            $('#school_id2').val(schoolId);
                            $('#changePasswordModal').modal('show');
                        });


                // When the modal is shown
                $('#changePasswordModal').on('show.bs.modal', function () {
                    $('#passwordForm')[0].reset();
                    $('#passwordMatchMessage').text('');
                    $('#submitBtn').prop('disabled', true);
                   
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