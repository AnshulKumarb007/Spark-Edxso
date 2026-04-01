
@extends('layouts.website')
@section('content')
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-10">
              <h1>Our Mission</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ url('../')}}">Home</a></li>
            <li class="current">Our Mission</li>
          </ol>
        </div>
      </nav>
    </div>
    <section id="service-details" class="service-details section scan">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="services-list">
              <a href="{{ url('mission')}}" class="active">Our Mission</a>
              <a href="{{ url('vision')}}">Our Vision</a>
               <a href="{{ url('values')}}">Our Values</a>
            </div>
          </div>
          <div class="col-lg-8 scan1" data-aos="fade-up" data-aos-delay="200">
            <h3 class="font">Our Mission</h3>
            <p class="font">
              SPARK Olympiads aim to transform how student achievement is measured by providing secure, competency-based, and insightful assessments—delivered fully online, powered by global best practices, and designed to empower students, teachers, and schools through meaningful recognition and actionable feedback.
            </p>
        </div>
      </div>
      </div>
    </section><!-- /Service Details Section -->
@endsection 