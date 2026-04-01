@if(!empty($payment))
            <div class="row">
              <div class="col-md-12 col-xl-12">
                <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                  <div class="card card-social">
                    <div class="card-block">
                      
                      <table class="table  table-striped">
                        
                        <thead class="table-dark">
                          <tr>
                             
                            <th>Payment Mode</th>
                            @if(!empty($payment->payment_mode=="cheque"))                            
                            <th>Cheque No.</th>
                            <th>Cheque Date</th>
                            <th>Bank Name</th>
                            <th>Branch</th>
                            @else
                            <th>Transaction <br/>Type</th>
                            <th>Transaction <br/>Date</th>                                                                               
                            <th>UTR/Transaction<br/> No</th>
                            @endif
                            <th>Attachment</th>
                            <th>Amount</th> 
                            <th>Created Date</th>
                            {{-- <th>Status</th>--}}
                          </tr>
                        </thead>
                        <tbody>
                         
                            <tr>
                              
                              <td>{{ $payment->payment_mode }}</td>
                              @if(!empty($payment->payment_mode=="cheque"))
                                  <td>{{ $payment->cheque_no }}</td>                                
                                  <td>{{ date('d-m-Y', strtotime($payment->cheque_date)) }}</td>
                                  <td>{{ $payment->bank_name }}</td>
                                  <td>{{ $payment->branch }}</td>
                                @else
                                  <td>{{ $payment->transaction_type }}</td>                                 
                                  <td>{{ date('d-m-Y', strtotime($payment->transaction_date)) }}</td>
                                  <td>{{ $payment->utr_no }}</td> 
                               @endif
                              <td>
                                @if($payment->attachment_path)
                                  <a href="{{ asset($payment->attachment_path) }}" target="_blank">View</a>
                                @else
                                  N/A
                                @endif
                              </td>
                              <td>{{ number_format($payment->amount, 2) }}</td>
                             
                              <td>{{ $payment->created_at }}</td>
                              {{-- @php
                              $statusMap = [
                                  2 => ['label' => 'Approved', 'class' => 'success'],
                                  1 => ['label' => 'Pending',  'class' => 'warning'],
                                  3 => ['label' => 'Rejected', 'class' => 'danger'],
                              ];
                          
                              $status = $statusMap[$payment->status] ?? ['label' => 'Unknown', 'class' => 'secondary'];
                          @endphp
                          
                          <td>
                            <span class="badge bg-{{ $status['class'] }}">
                              {{ $status['label'] }}
                            </span>
                          </td> --}}
                           
                            </tr>                          
                          </tbody>
                          <tr>                                                                                     
                                  <td colspan="8"><p>Enter Your Remarks <span class="text-danger">*</span> </p> 
                                    <textarea class="form-control" placeholder="Type here..."  id="remarks"  maxlength="200" required></textarea>
                                  </td>                                                                                   
                          </tr> 

                        <tr>                                                                                                   
                              <td colspan="8">
                                <p>Select Status <span class="text-danger">*</span></p>
                                  <select class="form-control status-select" id="status-{{ $payment->id }}" required>
                                    <option value="">--Select--</option>
                                    <option value="1" {{ $payment->status == 1 ? 'selected' : '' }}>Pending</option>
                                    <option value="2" {{ $payment->status == 2 ? 'selected' : '' }}>Approved</option>
                                    <option value="3" {{ $payment->status == 3 ? 'selected' : '' }}>Rejected</option>
                                  </select>
                              </td>                                                                              
                        </tr>
                        <tr>                                                         
                              <td colspan="8" class="text-right">
                                <a href="{{url('manage-school-paymets')}}" class="btn btn-sm btn-danger">
                                  Go Back
                                </a>
                                    <button class="btn btn-sm btn-success update-status-btn" data-id="{{ $payment->id }}" data-school-id="{{ $payment->school_id }}">
                                       Save & Update
                                    </button>                                    
                              </td>
                                                    
                         </tr>

                      </table>
                      
                    </div>  
                  </div>  
                </div>  
              </div>  

          @endif


          
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery (Required for AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AJAX + SweetAlert Script -->
<script>
$(document).on('click', '.update-status-btn', function() {
    var button = $(this);
    var paymentId = button.data('id');
    var schoolId = button.data('school-id');
    var selectedStatus = $('#status-' + paymentId).val();
    var remarks = $('#remarks').val().trim(); // Trim to avoid spaces only

    let statusText = {
        1: 'Pending',
        2: 'Approved',
        3: 'Rejected'
    };

    // Check if status is Rejected and remarks is empty
    if (remarks === '') {
        Swal.fire({
            title: 'Remarks Required',
            text: 'Please provide remarks when change remarks.',
            icon: 'warning',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2ca961'
        });
        return; // Stop the process
    }

    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to change the status to "${statusText[selectedStatus]}" with your remarks.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        confirmButtonColor: '#2ca961',
        cancelButtonText: 'Cancel',
        cancelButtonColor: 'red',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Updating...',
                text: 'Please wait while the status is being updated.',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '{{ route("payment.updateStatus") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: paymentId,
                    school_id: schoolId,
                    status: selectedStatus,
                    remarks: remarks
                },
                success: function(response) {
                    if (response.success == 200) {
                        Swal.fire({
                            title: 'Updated!',
                            text: 'Status has been updated.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        Swal.fire('Error', 'Status update failed.', 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Server error occurred.', 'error');
                }
            });
        }
    });
});


</script>