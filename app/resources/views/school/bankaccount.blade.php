@extends('layouts.school')
@section('content')
<style>
  .own i {
    font-size: 25px;
  }

  .own a {
    margin-left: 5px;
  }


  .bank-details {
     height: 400px;
    padding: 20px;
    border: 1px solid #cccccc;
    border-radius: 8px;
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
  }

  .bank-details h2 {
    text-align: center;
    color: #333333;
    font-size: 30px;
  }

  .bank-details table {
    width: 100%;
    border-collapse: collapse;
  }

  .bank-details td {
    padding: 8px;
    border-bottom: 1px solid #dddddd;
  }

  .label {
    font-weight: bold;
    color: #555555;
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
                  <div class="col-md-10">
                    <div class="page-header-title">
                      <h5>Fee Payment</h5>
                    </div>
                    <ul class="breadcrumb">
                      {{-- <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                            class="feather icon-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Fee Payment</a></li> --}}
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
                      <p class="my-font-weight">Please refer to the bank details below to make your payment. Once completed, click the green button to submit transaction details for confirmation. Ensure the amount and reference number are accurate to avoid delays </p>   
                               
                    </div>
                </div>
            </div>
            </div>
               <div class="row">
              <div class="col-md-12 col-xl-12">
                <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                  <div class="card card-social">
                    <div class="card-block">
                      <div class="row">

                       <div class="col-md-4">
                          <div class="bank-details">
                            <h3>Generate Invoice</h3>
                            <hr />
                              <br />
                            <p class="text-center mt-5">If you have deposited or transferred the amount to the above bank details, please submit the details here.</p>
                            <div class="text-center">
                               @if(!empty($invoice))
                                      <a href="{{route('view-manage.school-paymets',['id'=>$invoice->id])}}"
                                        class="btn btn-primary text-center">
                                        Click here to view the invoice 
                                      </a>                    
                                      @else
                                      <a href="{{url('Spark-bank-generete-invoice')}}"
                                      class="btn btn-primary text-center" target="_blank"
                                      id="generateInvoiceBtn">
                                      Click here to generate the invoice for the due amount
                                    </a>
								               @endif
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-4">
                          <div class="bank-details">
                            <h3>Bank Details</h3>
                            <hr />
                            <table>
                              <tr>
                                <td class="label" style="width:138px">Account Name:</td>
                                <td>EDXSO LLP</td>
                              </tr>
                              <tr>
                                <td class="label">Bank Name:</td>
                                <td>ICICI Bank Limited</td>
                              </tr>
                              <tr>
                                <td class="label">Account Number:</td>
                                <td>348905001381</td>
                              </tr>
                              <tr>
                                <td class="label">IFSC Code:</td>
                                <td>ICIC0003489</td>
                              </tr>
                              <tr>
                                <td class="label">Branch Address:</td>
                                <td>PLOT NO-7 LSC OKHLA PHASE-2, NEW DELHI-110020, DELHI, INDIA</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="bank-details">
                            <h3>Submit Payment Details</h3>
                            <hr />
                            <br />
                            <p class="text-center mt-5">If you have deposited or transferred the amount to the above bank details, please submit the details here.</p>
                            <br />
                            @if(!empty($invoice))
                            @if($payment)
                            <!-- Trigger Button -->
                            @if(!empty($payment) && $payment->status == 3)
                            <h3 class="mt-2 text-center">
                              <a href="#" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                Click here to submit the payment details
                              </a>
                            </h3>
                          
                          @elseif(!empty($payment) && $payment->status == 1 
                          || $payment->status == 2)
                            <h3 class="mt-2 text-center">
                              <a href="#" class="btn btn-primary text-center">
                                Payment details already submitted
                              </a>
                            </h3>
                          @endif
                          @else
                            <h3 class="mt-2 text-center">
                              <a href="#" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                Click here to submit the payment details
                              </a>
                            </h3>
                          @endif
                          @else
                          <h3 class="mt-2 text-center">
                            <a href="#" class="btn btn-primary text-center">
                              Create invoice first
                            </a>
                          </h3>
                          @endif
                           

                            <!-- Modal -->
                            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <form id="paymentForm" enctype="multipart/form-data">
                                    <input type="hidden" name="invoce_id" value="{{ !empty($invoice) && $invoice->id ? $invoice->id : '' }}" />

                                    @csrf
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="paymentModalLabel">Submit Payment Details</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                    </div>

                                    <div class="modal-body">
                                      <!-- Radio Buttons -->
                                      <div class="mb-3">
                                        <label class="form-label d-block">Select Payment Mode:</label>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="paymentMode" id="chequeOption" value="Cheque Deposit" checked>
                                          <label class="form-check-label" for="chequeOption">Cheque Deposit</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="paymentMode" id="onlineOption" value="Online Transfer">
                                          <label class="form-check-label" for="onlineOption">Online Transfer</label>
                                        </div>
                                      </div>
   
                                        
                                      <!-- Cheque Fields -->
                                        <div id="chequeFields">
                                          <div class="row">

                                          <div class="mb-3 col-md-6">
                                            <label for="chequeNo" class="form-label">Cheque No. <span class="text-danger">*</span></label>
                                            <input type="text"  pattern="\d*" maxlength="6" class="form-control" id="chequeNo" name="chequeNo" placeholder="Enter Cheque Number">
                                          </div>

                                          <div class="mb-3 col-md-6">
                                            <label for="chequeDate" class="form-label">Date on Cheque <span class="text-danger">*</span></label>
                                            @php $minDate = date('Y-m-d', strtotime('-3 days'));  @endphp
                                            <input type="date" class="form-control" id="chequeDate" name="chequeDate" min="{{$minDate}}"  placeholder="Select Cheque Date">
                                          </div>

                                          </div>
                                          <div class="row">

                                          <div class="mb-3 col-md-6">
                                            <label for="bankName" class="form-label">Bank Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="bankName" name="bankName"
                                            placeholder="Enter Bank Name"
                                            pattern="[A-Za-z\s]+" title="Bank name should contain only letters">
                                     
                                          </div>

                                            <div class="mb-3 col-md-6">
                                              <label for="branch" class="form-label">Branch Name <span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter Branch Name">
                                            </div>
                                        </div>
                                        
                                      </div>

                                        <!-- Online Fields -->
                                        <div id="onlineFields"  style="display: none;">
                                          <div class="row">

                                                <div class="mb-3 col-md-6">
                                                  <label for="transType" class="form-label">Transaction Type <span class="text-danger">*</span></label>
                                                  <select class="form-control" id="transType" name="transType">
                                                    <option value="" disabled selected>Select Transaction Type</option>
                                                    <option value="NEFT">NEFT</option>
                                                    <option value="IMPS">IMPS</option>
                                                    <option value="UPI">UPI</option>
                                                    <option value="RTGS">RTGS</option>
                                                 
                                                    <!-- add more options as needed -->
                                                  </select>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                  <label for="transDate" class="form-label">Date of Transaction <span class="text-danger">*</span></label>
                                                  <input type="date" class="form-control" min="12" max="35" id="transDate" name="transDate" placeholder="Select Transaction Date">
                                                </div>

                                                <div class="mb-3 col-md-12">
                                                  <label for="utrNo" class="form-label">UTR No. / Transaction ID <span class="text-danger">*</span></label>
                                                  <input type="text" class="form-control" id="utrNo" name="utrNo" placeholder="Enter UTR or Transaction ID" minlength="16" maxlength="22">
                                                </div>
                                                                                                                                                                                       
                                            </div>
                                          </div>
                                          <div class="row">
    
                                          <div class="mb-3 col-md-6">
                                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" max="10000000" min="1" required>

                                          </div>

                                          <div class="mb-3 col-md-6">
                                            <label for="attachment" class="form-label">Attach Screenshot or Receipt <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="attachment" name="attachment" required>
                                            <b class="">Note: File size should not exceed more than 1 MB. Supported file formats: *.pdf, *.jpeg, *.png, *.jpg only.</b>
                                          </div>
                                        </div>


                                      </div>

                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-success">Submit</button>
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>

                                  </form>
                                </div>
                              </div>
                            </div>
                            <br> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  
              </div>
            </div>
          @if(!empty($payment))
            <div class="row">
              <div class="col-md-12 col-xl-12">
                <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                  <div class="card card-social">
                    <div class="card-block">
                      <div class="page-header-title">
                        <h5>Payment Verification Status</h5>
                      </div>
                      <div class="table-responsive">
                      <table class="table table-striped">
                        
                        <thead>
                          <tr>
                             
                            <th>Payment Mode</th>
                            @if(!empty($payment->payment_mode=="Cheque Deposit"))
                            <th>Cheque No</th>
                            <th>Cheque Date</th>
                            <th>Bank Name</th>
                            <th>Branch</th>
                            @else
                            <th>UTR No</th>
                            <th>Transaction Date</th>
                            <th>Transaction Type</th>
                            @endif
                            <th>Attachment</th>
                            <th>Amount</th> 
                            <th>Submitted At</th>
                            <th>Status</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                         
                            <tr>
                              
                              <td>{{ $payment->payment_mode }}</td>
                              @if(!empty($payment->payment_mode=="Cheque Deposit"))
                                  <td>{{ $payment->cheque_no }}</td>                                
                                  <td>{{ date('d-m-Y', strtotime($payment->cheque_date)) }}</td>
                                  <td>{{ $payment->bank_name }}</td>
                                  <td>{{ $payment->branch }}</td>
                                @else
                                  <td>{{ $payment->utr_no }}</td> 
                                  <td>{{ date('d-m-Y', strtotime($payment->transaction_date)) }}</td>
                                  <td>{{ $payment->transaction_type }}</td>
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
                              @php
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
                          </td>
                          
                            </tr>                          
                          </tbody>
                      </table>
                      
                    </div>  
                  </div>  
                </div>  
              </div>  
              </div>  

          @endif

          </div>



          <!-- [ Main Content ] end -->
          @endsection


          @push('scripts')
          <script>
            document.addEventListener('DOMContentLoaded', function () {
              const paymentRadios = document.querySelectorAll('input[name="paymentMode"]');
              const chequeFields = document.getElementById('chequeFields');
              const onlineFields = document.getElementById('onlineFields');
          
              function togglePaymentFields() {
                const selectedValue = document.querySelector('input[name="paymentMode"]:checked').value;
          
                if (selectedValue === 'Cheque Deposit') {
                  chequeFields.style.display = 'block';
                  onlineFields.style.display = 'none';
                  Array.from(chequeFields.querySelectorAll('input, select')).forEach(field => {
                       field.required = true;
                  });

                  Array.from(onlineFields.querySelectorAll('input, select, textarea')).forEach(field => {
                      field.required = false;
                  });

                } else if (selectedValue === 'Online Transfer') {
                  chequeFields.style.display = 'none';
                  onlineFields.style.display = 'block';
                  Array.from(chequeFields.querySelectorAll('input, select')).forEach(field => {
                      field.required = false;
                   });

                   Array.from(onlineFields.querySelectorAll('input, select, textarea')).forEach(field => {
                      field.required = true;
                    });
                }
              }
          
              // Attach event listeners to all radio buttons
              paymentRadios.forEach(function (radio) {
                radio.addEventListener('change', togglePaymentFields);
              });
          
              // Initial toggle on page load
              togglePaymentFields();
            });
          </script>
         
          
          

<script>
  $(document).ready(function () {
  // Show/hide fields based on payment mode
  $('input[name="paymentMode"]').change(function () {
    const selectedValue = $(this).val();

    if (selectedValue === 'Cheque Deposit') {
      $('#chequeFields').show();
      $('#onlineFields').hide();
    } else if (selectedValue === 'Online Transfer') {
      $('#chequeFields').hide();
      $('#onlineFields').show();
    }
  });
  $('input[name="paymentMode"]:checked').trigger('change');
  // Handle form submission via AJAX with confirmation
  $('#paymentForm').on('submit', function (e) {
    e.preventDefault();

  Swal.fire({
  title: 'Are you sure?',
  text: 'Do you want to submit the payment details?',
  icon: 'question',
  showCancelButton: true,
  confirmButtonText: 'Yes, submit it!',
  cancelButtonText: 'Cancel',
  confirmButtonColor: '#198754',  // Bootstrap 'success' green
  cancelButtonColor: '#dc3545'    // Bootstrap 'danger' red
}).then((result) => {
      if (result.isConfirmed) {
        let formData = new FormData(this);

        $.ajax({
          url: "{{ route('school-bank-invoice.store') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          beforeSend: function () {
            Swal.fire({
              title: 'Submitting...',
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading();
              }
            });
          },
          success: function (response) {
            Swal.close();

            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: response.message || 'Payment saved successfully!',
              timer: 2000,
              showConfirmButton: false
            });

            setTimeout(function () {
              location.reload();
            }, 2000);
          },
          error: function (xhr) {
            Swal.close();

            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;
              let errorMessages = '';
              $.each(errors, function (key, value) {
                errorMessages += '<div>' + value[0] + '</div>';
              });

              Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: errorMessages,
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: xhr.responseJSON?.message || 'Something went wrong. Please try again.',
              });
            }
          }
        });
      }
    });
  });

  // Allow only letters in Bank Name
  document.getElementById('bankName').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^A-Za-z\s]/g, '');
  });
});


</script>

          @endpush