@extends('layouts.school')
@section('content')
<style>
    .icon-toggle {
  font-size: 1.2rem;
  transition: transform 0.3s;
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
                                            <h5>Frequently Asked Questions</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('school-dashboard')}}"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">Frequently Asked Questions</a></li>
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
                                                  <div class="accordion" id="accordionExample">
                                                    <div class="card">
                                                      <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Test Faq - 1   </a> </h5>
                                                        <span class="icon-toggle float-right">+</span>
                                                      </div>
                                                      <div id="collapseOne" class="card-body collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                                        sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                        sustainable VHS.
                                                      </div>
                                                    </div>
                                                    <div class="card">
                                                      <div class="card-header" id="headingTwo">
                                                        <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Test - 2</a></h5>
                                                        <span class="icon-toggle float-right">+</span>
                                                      </div>
                                                      <div id="collapseTwo" class="card-body collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                                        sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                        sustainable VHS.
                                                      </div>
                                                    </div>
                                                    <div class="card">
                                                      <div class="card-header" id="headingThree">
                                                        <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Test - 3</a></h5>
                                                        <span class="icon-toggle float-right">+</span>
                                                      </div>
                                                      <div id="collapseThree" class="card-body collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                                        sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                        sustainable VHS.
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
                  $(document).ready(function () {
                    $('.collapse').on('show.bs.collapse', function () {
                      $(this).prev('.card-header').find('.icon-toggle').text('–');
                    });
                
                    $('.collapse').on('hide.bs.collapse', function () {
                      $(this).prev('.card-header').find('.icon-toggle').text('+');
                    });
                  });
                </script>


                @endpush