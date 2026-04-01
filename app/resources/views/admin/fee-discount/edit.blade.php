

@extends('layouts.admin')
 @section('content')

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
                                                <h5 class="m-b-10">Edit Fee Discount</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Fee Discount</a></li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Edit Fee Discount</h5>
                                            <a href="{{route('fee-discount.index')}}" class="btn btn-success btn-sm float-right" title="" data-toggle="tooltip" data-original-title="btn btn-success">List</a>
                                        </div>
                                        <div class="card-body"> 
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ route('fee-discount.update', $discount->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                
                                                        <div class="form-group">
                                                            <label for="from_qty">Minimum Quantity <span class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" name="from_qty" id="from_qty"
                                                                   value="{{ old('from_qty', $discount->from_qty) }}" required>
                                                            @error('from_qty') <small class="text-danger">{{ $message }}</small> @enderror
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label for="to_qty">Maximum Quantity <span class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" name="to_qty" id="to_qty"
                                                                   value="{{ old('to_qty', $discount->to_qty) }}" required>
                                                            @error('to_qty') <small class="text-danger">{{ $message }}</small> @enderror
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label for="discount_option">Discount Type <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="discount_option" id="discount_option" required>
                                                                <option value="">-- Select Type --</option>
                                                                <option value="percentage" {{ old('discount_option', $discount->discount_option) == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                                                <option value="fixed" {{ old('discount_option', $discount->discount_option) == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                                            </select>
                                                            @error('discount_option') <small class="text-danger">{{ $message }}</small> @enderror
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label for="discount_value">Discount Value <span class="text-danger">*</span></label>
                                                            <input type="number" step="0.01" class="form-control" name="discount_value" id="discount_value"
                                                                   value="{{ old('discount_value', $discount->discount_value) }}" required>
                                                            @error('discount_value') <small class="text-danger">{{ $message }}</small> @enderror
                                                        </div>
                                                
                                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                        
                                                    </form>
                                                </div>
                                                
                                <!-- [ form-element ] end -->
                                <!-- [ Main Content ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





 @endsection