@extends('layouts.school')
@section('content')
<style>
  .own i {
    font-size: 18px;
  }

  .own a {
    margin-left: 5px;
  }

  .dfont {
    font-size: 12px;
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
                      <h5>Download Resources</h5>
                    </div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i class="feather icon-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Download Resource</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-xl-12">


                <ul class="list-group own list-unstyled">

                  <div class="card card-social">
                    <div class="card-block">
                      <li style="list-style: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div>
                            <i class="fas fa-file-pdf" style="color:#d32f2f;"></i>
                            <a href="{{ asset('dummy.pdf') }}" download target="_blank">Spark Olympiad Brochure</a>
                          </div>
                          <a href="{{ asset('dummy.pdf') }}" download target="_blank"><i class="fas fa-download" style="color: #004aad;"> <span class="dfont"> Download Now </span></i></a>
                        </div>
                      </li>
                    </div>
                  </div>

                  <div class="card card-social">
                    <div class="card-block">
                      <li style="list-style: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div>
                            <i class="fas fa-file-pdf" style="color:#d32f2f;"></i>
                            <a href="{{ asset('dummy.pdf') }}" download target="_blank">Spark Olympiad Letter to Principal</a>
                          </div>
                          <a href="{{ asset('dummy.pdf') }}" download target="_blank"><i class="fas fa-download" style="color: #004aad;"> <span class="dfont"> Download Now </span></i></a>
                        </div>
                      </li>
                    </div>
                  </div>


                  <div class="card card-social">
                    <div class="card-block">
                      <li style="list-style: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div>
                            <i class="fas fa-file-pdf" style="color:#d32f2f;"></i>
                            <a href="{{ asset('dummy.pdf') }}" download target="_blank">Spark Olympiad Letter to Parent </a>
                          </div>
                          <a href="{{ asset('dummy.pdf') }}" download target="_blank"><i class="fas fa-download" style="color: #004aad;"> <span class="dfont"> Download Now </span></i></a>
                        </div>
                      </li>
                    </div>
                  </div>


                  <div class="card card-social">
                    <div class="card-block">
                      <li style="list-style: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div>
                            <i class="fas fa-file-pdf" style="color:#d32f2f;"></i>
                            <a href="{{ asset('dummy.pdf') }}" download target="_blank">Download Reports</a>
                          </div>
                          <a href="{{ asset('dummy.pdf') }}" download target="_blank"><i class="fas fa-download" style="color: #004aad;"> <span class="dfont"> Download Now </span></i></a>
                        </div>
                      </li>
                    </div>
                  </div>

                  <div class="card card-social">
                    <div class="card-block">
                      <li style="list-style: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div>
                            <i class="fas fa-file-pdf" style="color:#d32f2f;"></i>
                            <a href="{{ asset('dummy.pdf') }}" download target="_blank">Download Sample Question - PDF</a>
                          </div>
                          <a href="{{ asset('dummy.pdf') }}" download target="_blank"><i class="fas fa-download" style="color: #004aad;"> <span class="dfont"> Download Now </span></i></a>
                        </div>
                      </li>
                    </div>
                  </div>

                  <div class="card card-social">
                    <div class="card-block">
                      <li style="list-style: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div>
                            <i class="fas fa-file-pdf" style="color:#d32f2f;"></i>
                            <a href="https://sparkolympiads.com/app/upload_student_sample.csv" download target="_blank">Download Sample CSV File - PDF</a>
                          </div>
                          <a href="https://sparkolympiads.com/app/upload_student_sample.csv" download target="_blank"><i class="fas fa-download" style="color: #004aad;"> <span class="dfont"> Download Now </span></i></a>
                        </div>
                      </li>
                    </div>
                  </div>



                </ul>


              </div>
            </div>
          </div>
        </div>
















        <!-- [ Main Content ] end -->
        @endsection


        @push('script')

        <script>
          document.querySelectorAll('.download-link').forEach(link => {
            link.addEventListener('click', function(e) {
              e.preventDefault(); // Stop the default download

              const href = this.getAttribute('href');
              const fileName = this.dataset.filename;

              Swal.fire({
                title: 'Are you sure?',
                text: `You are about to download "${fileName}".`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, download it!',
                cancelButtonText: 'Cancel'
              }).then((result) => {
                if (result.isConfirmed) {
                  // Trigger the download
                  window.open(href, '_blank');
                }
              });
            });
          });
        </script>

        @endpush