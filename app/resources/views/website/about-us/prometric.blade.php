@extends('layouts.website')
@section('content')
    <!-- Page Title -->

    <div class="page-title">

      <div class="heading">

        <div class="container">

          <div class="row d-flex justify-content-center text-center">

            <div class="col-lg-10">

              <h1>About Prometric</h1>

            </div>

          </div>

        </div>

      </div>

      <nav class="breadcrumbs">

        <div class="container">

          <ol>

            <li><a href="{{ url('../')}}">Home</a></li>

            <li class="current">About Prometric</li>

          </ol>

        </div>

      </nav>

    </div><!-- End Page Title -->



    <!-- Service Details Section -->

    <section id="service-details" class="service-details section scan">



      <div class="container">



        <div class="row scan1">





          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">

              <div class="text-center">

                  <img src="{{ asset('../assets/img/Steering_Committee/prometric-logo.png')}}" class="img-fluid " alt="" />

              </div>

              

            <!-- <h3 class="text-center">About Prometric</h3> -->

            <p class="font">

              <b>Prometric</b> is a globally trusted leader in technology-enabled testing and assessment services, operating in over <b>180 countries</b> with a legacy of excellence spanning more than <b>30 years</b>. As the preferred partner for <b>licensure, certification, academic, and workforce assessments</b>, Prometric delivers over <b>7 million secure exams annually</b> for some of the world’s most respected organizations and governments.

            </p>

            <p class="font">Renowned for its cutting-edge platforms, rigorous security standards, and scalable delivery models, Prometric powers high-stakes exams for global leaders in education, healthcare, IT, finance, and language proficiency. Its unmatched reputation for <b>integrity, reliability, and innovation</b> makes Prometric the gold standard in testing worldwide.</p>

            

        </div>

      </div>



      </div>



    </section><!-- /Service Details Section -->



 @endsection