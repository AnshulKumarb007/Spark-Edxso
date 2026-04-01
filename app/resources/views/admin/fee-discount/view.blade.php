
@extends('layouts.admin')
 @section('content')

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
                                                <h5 class="m-b-10">Fee Discount List</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>                                                
                                                <li class="breadcrumb-item"><a href="#!">Fee Discount List</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Manage Fee Discount </h5> 
                                            <a href="{{route('fee-discount.create')}}" class="btn btn-sm btn-success float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">Add</a>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Min. Qty.</th>
                                                            <th>Max. Qty.</th>
                                                            <th>Discount Type</th>
                                                            <th>Discount Value</th> 
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($discounts as $index => $discount)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $discount->from_qty }}</td>
                                                                <td>{{ $discount->to_qty }}</td>
                                                                <td>{{ ucfirst($discount->discount_option) }}</td>
                                                                <td>{{ $discount->discount_value }}</td>
                                                                 
                                                                <td> 
                                                                    <a href="{{ route('fee-discount.edit', $discount->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                                                     
                                                                </td>
                                                            </tr>
                                                                                                                     
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
   


 @endsection