
@extends('layouts.admin')
 @section('content')

 <!-- DataTables CSS -->

<style>
    
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
                                                <h5 class="m-b-10">Manage School Payments</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>                                                
                                                <li class="breadcrumb-item"><a href="#!">School Payments Data</a></li>
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
                                                                        <input type="date" name="date" class="form-control "/>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label>School Name/School Id/Invoice No</label>
                                                                        <input type="text" name="search" placeholder="School Name/School Id/Invoice No" class="form-control " />
                                                                    </div>
                            

                                                                    <div class="col-md-4 align-self-end mt-2">
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
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>School Payments Data</h5> 
                                            <!-- <a href="#" class="btn btn-success float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">Add</a> -->
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table datatable" id="schoolTable">
                                                    <thead> 
                                                        <tr>
                                                            {{-- <th style="background:#d6dce4">#</th> --}}
                                                            <th style="background:#d6dce4">Invoice #</th>
                                                            <th style="background:#d6dce4">Invoice Date</th>
                                                            <th style="background:#d6dce4">Invoice To</th>   
                                                            <th style="background:#d6dce4" class="text-center">Invoice Amount</th> 
                                                            <th style="background:#d6dce4" class="text-center">Status</th>                                               
                                                            <th style="background:#d6dce4" class="text-center">Action</th>                                                                                                                                                                                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $sr=1; @endphp
                                                        @foreach ($data as $item)
                                                        <tr>
                                                            <td>{{ $item->invoiceno }}</td> 
                                                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                                            <td>{{$item->school_name}} ({{ $item->school_id}})</td>                                                                         
                                                            <td class="text-center">{{ $item->total_amount ?? '' }}</td>      
                                                            @php
                                                            if($item->invoicestatus > 0){
                                                                $statusMap = [  
                                                                    1 => ['label' => 'Canceled invoice', 'class' => 'danger text-white'],
                                                                ];                                                            
                                                                $status = $statusMap[$item->invoicestatus] ?? ['label' => 'unknown', 'class' => 'secondary text-white'];
                                                            }else{                                                            
                                                                $statusMap = [
                                                                    2 => ['label' => 'Approved', 'class' => 'success'],
                                                                    1 => ['label' => 'Pending to approve',  'class' => 'warning'],
                                                                    3 => ['label' => 'Rejected', 'class' => 'danger'],
                                                                ];                                                            
                                                                $status = $statusMap[$item->status] ?? ['label' => 'Payment details not uploaded', 'class' => 'secondary text-white'];
                                                            }
                                                            @endphp
                          
                                                            <td>
                                                                <span class="badge bg-{{ $status['class'] }}">
                                                                {{ $status['label'] }}
                                                                </span>
                                                            </td> 

                                                        <td class="text-right"><a href="{{route('view-manage.school-paymets',['id'=>$item->invoiceid])}}" target="_blank" title="View Invoice" class="text-success "><i class='fas fa-file-invoice '></i></a> 
                                                        @if($item->invoicestatus == 0 || $item->status=='')
                                                        <a href="javascript:void(0);" 
                                                            data-id="{{ $item->id }}" 
                                                            class="text-success viewBankDetails " title="View Payment Details"><i class="fa fa-eye " aria-hidden="true"></i></a>
                                                        @endif
                                                        @if($item->invoicestatus == 0)
                                                            <a href="{{ route('view-manage.school-paymets', ['id' => $item->id]) }}"
                                                                class="text-danger cancel-payment "
                                                                data-url="{{ route('cancel.invoce', ['id' => $item->invoiceid]) }}"
                                                                title="Cancel Invoice"><i class="fa fa-times " aria-hidden="true"></i>
                                                                </a> 
                                                        @endif
                                                        </td>                                                                                                                                                                                                   
                                                        </tr>
                                                        @endforeach                                     
                                                    </tbody>
                                                </table>
                                                <div>
                                                    {{-- Pagination links --}}
                                                    {{ $data->appends(request()->query())->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Background-Utilities ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                 
    </section>
  

    <!-- Bank Details Modal -->
<div class="modal fade" id="bankDetailsModal" tabindex="-1" role="dialog" aria-labelledby="bankDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" style="width: 121%;">
        <div class="modal-header">
          <h5 class="modal-title" id="bankDetailsModalLabel">Submitted Payment Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> 
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="bankDetailsContent">
          <!-- AJAX content will load here -->
          <div class="text-center">Loading...</div>
        </div>
      </div>
    </div>
  </div>

  
 @endsection
 
 @push('scripts')
    <script>

        
        $(document).ready(function() {
            $('.viewBankDetails').on('click', function() {
                var id = $(this).data('id');
                $('#bankDetailsContent').html('<div class="text-center">Loading...</div>');
                $('#bankDetailsModal').modal('show');

                $.ajax({
                    url: 'view-submitted-school-bank-details/' + id, // Adjust this URL to match your route
                    type: 'GET',
                    success: function(response) {
                        $('#bankDetailsContent').html(response);
                    },
                    error: function(xhr) {
                        $('#bankDetailsContent').html('<div class="text-danger">Failed to load bank details.</div>');
                    }
                });
            });
        });
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.cancel-payment').forEach(function(button) {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent immediate navigation

            const url = this.getAttribute('data-url');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want cancel the invoice.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) { 
                    window.open(url);
                }
            });
        });
    });
});
</script>

 @endpush