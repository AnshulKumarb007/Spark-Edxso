@extends('layouts.school')
@section('content')
 
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
                                            <h5>Change Password</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                                        </ul>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
   
                        <div class="row">
                            
                            <div class="col-md-12 col-xl-12">

                                <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                   
                                   
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form method="POST" action="{{ route('first.password.update') }}" id="passwordForm">
                                                        @csrf
                                                        @method('PUT')
                                                         
                                                                <!-- New Password -->
                                                                <div class="mb-3 position-relative">
                                                                    <label for="password">New Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                                                                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                                                                            👁️
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                 
                                                                <!-- Confirm Password -->
                                                                <div class="mb-3 position-relative">
                                                                    <label for="password_confirmation">Confirm Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password" name="password_confirmation" placeholder="Confirmation Password" id="password_confirmation" class="form-control" required>
                                                                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                                                                            👁️
                                                                        </button>
                                                                    </div>
                                                                    <small id="passwordError" class="text-danger d-none">Passwords do not match.</small>
                                                                </div>
                                                                                                                                                                      
                                                                <button type="submit" class="btn btn-primary">Update Password</button>
                                                                                                                  
                                                    </form>
                                                </div>                                            
                                            </div>                                                                              
                                    </div>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        @endsection
      
        @push('scripts')
 
        <script>
            $(document).ready(function () {
        
                // Toggle password visibility
                $('.toggle-password').on('click', function () {
                    const targetId = $(this).data('target');
                    const input = $('#' + targetId);
                    const type = input.attr('type') === 'password' ? 'text' : 'password';
                    input.attr('type', type);
        
                    // Optional: Change the icon (👁️ / 🙈)
                    $(this).text(type === 'text' ? '🙈' : '👁️');
                });
        
                // Real-time password match check
                $('#password, #password_confirmation').on('input', function () {
                    const password = $('#password').val();
                    const confirmPassword = $('#password_confirmation').val();
                    const errorMsg = $('#passwordError');
        
                    if (password && confirmPassword && password !== confirmPassword) {
                        errorMsg.removeClass('d-none');
                    } else {
                        errorMsg.addClass('d-none');
                    }
                });
            });
        </script>
        @endpush