@extends('layouts.school')
@section('content')
 
<!--<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>-->
<style>
.form-container {
    display: none;
    margin-top: 20px;
    padding: 10px;
}
.form-control{
    background-color: #F7F7F7;
}
.btn-getstarted {
    border:none;
    border-radius: 14px;
    background: var(--orange-gradent-2, linear-gradient(141deg, #FFC77D 1.25%, #F67C1E 65.27%, #FF6F00 98.07%));
    /* padding: 8px 20px; */
    transition: 0.3s;
    /* border: 1px solid #FFC77D !important; */
    display: flex;
    /* width: 138px; */
    height: 50px;
    padding: 20px;
    justify-content: center;
    align-items: center;
    color: var(--blackColor, #030202);
    font-family: Roboto;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 26px;
}
</style>
 
 
    @if(session('success') === true)
<div class="alert alert-success">
        {{ session('message') }}
</div>
    @elseif(session('success') === false)
<div class="alert alert-danger">
            {{ session('message') }}
</div>
    @endif
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
                                                <h5>Raise a Support Request</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#">Raise a Support Request</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <ul class="breadcrumb">
                                                
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
                                                <div class="row scan1">
                                                    <div class="col-lg-12"> 
                                                    <div class="card">    
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                     
                                                    <form>
                                                     
                                                    <select class="form-control" name="service_type" id="formSelector" onchange="showForm(this.value)">
                                                    <option value="">-- Choose Option --</option>
                                                    <option value="Customer Service (Technical Support & Billing Support)">Customer Service (Technical Support & Billing Support)</option>
                                                    <option value="Partner Program Inquries">Partner Program Inquries</option>
                                                    <!-- <option value="Report Credit card Fraud">Report Credit card Fraud</option> -->
                                                    </select>
                                                    </form>
                                                    <!-- Forms -->
                                                    <div id="Customer Service (Technical Support & Billing Support)" class="form-container">
                                                    <form action="#" method="POST">
                                                                @csrf
                                                    <input type="hidden" name="service_type" value="">
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="companyName">Your Email Address</label>
                                                    <input type="email" id="companyName" name="email" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="address">Subject</label>
                                                    <input type="text" id="address" name="subject" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="description">Description</label>
                                                    <textarea id="description1" name="description" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" name="devicetype" for="email">Device Type</label>
                                                    <select class="form-control">
                                                    <option value="Apple IOS">Apple IOS</option>
                                                    <option value="Android">Android</option>
                                                    <option value="other">Other</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Device Model</label>
                                                    <input type="text" id="name" name="devicemodel" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Where are you located?</label>
                                                    <input type="text" id="name" name="located" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Attachment</label>
                                                    <input type="file" id="name" name="attatchment" class="form-control" />
                                                    </div>
                                                    <button type="submit" class="btn-getstarted">Submit</button>
                                                    </form>
                                                    </div>
                                                    <div id="Partner Program Inquries" class="form-container">
                                                    <form action="#" method="POST">
                                                                    @csrf
                                                    <input type="hidden" name="service_type" value="">
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="companyName">Your Email Address</label>
                                                    <input type="email" id="companyName" name="email" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="address">Subject</label>
                                                    <input type="text" id="address" name="subject" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Partner Program</label>
                                                    <select class="form-control" name="partnerprogram" >
                                                    <option value="Business Roaming">Business Roaming</option>
                                                    <option value="Reseller Program">Reseller Program</option>
                                                    <option value="Connectivity API (Developers)">Connectivity API (Developers)</option>
                                                    <option value="Affiliate Program">Affiliate Program</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="description">Description</label>
                                                    <textarea id="description2" name="description" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Attachment</label>
                                                    <input type="file" id="name" name="attatchment" class="form-control" />
                                                    </div>
                                                    <button type="submit" class="btn-getstarted">Submit</button>
                                                    </form>
                                                    </div>
                                                    <div id="Report Credit card Fraud" class="form-container">
                                                    <form action="#" method="POST">
                                                                @csrf
                                                    <input type="hidden" name="service_type" value="">
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="companyName">Your Email Address</label>
                                                    <input type="email" id="companyName" name="email" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="address">Subject</label>
                                                    <input type="text" id="address" name="subject" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Unauthorized Transaction Amount</label>
                                                    <input type="text" id="number" name="transactionamount" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Transaction date</label>
                                                    <input type="date" id="date" name="transactiondate" class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="description">Description</label>
                                                    <textarea id="description3" name="description" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                    <label class="form-label" for="email">Attachment</label>
                                                    <input type="file" id="name" name="attatchment" class="form-control" />
                                                    </div>
                                                    <button type="submit" class="btn-getstarted">Submit</button>
                                                    </form>
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
                        </div>
                    </div>
                </div>
            </div>

 
 
@endsection
@push('scripts')
    
 
<script>
    function showForm(selectedId) {
        const forms = document.querySelectorAll('.form-container');
        forms.forEach(form => form.style.display = 'none');
     
        if (selectedId) {
            const selectedForm = document.getElementById(selectedId);
            if (selectedForm) selectedForm.style.display = 'block';
        }
    }
    </script>
    <script>
        CKEDITOR.replace('description1');
        CKEDITOR.replace('description2');
        CKEDITOR.replace('description3');
    </script>
     
    <script>
    function showForm(selectedId) {
        const forms = document.querySelectorAll('.form-container');
        forms.forEach(form => form.style.display = 'none');
     
        if (selectedId) {
            const selectedForm = document.getElementById(selectedId);
            if (selectedForm) {
                selectedForm.style.display = 'block';
     
                // Set the service_type hidden input value inside the form
                const hiddenInput = selectedForm.querySelector('input[name="service_type"]');
                if (hiddenInput) hiddenInput.value = selectedId;
            }
        }
    }
    </script>

    @endpush