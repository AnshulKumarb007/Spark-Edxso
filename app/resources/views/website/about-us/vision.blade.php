@extends('layouts.website')
@section('content')
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-10">
              <h1>Our Vision</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ url('../')}}">Home</a></li>
            <li class="current">Our Vision</li>
          </ol>
        </div>
      </nav>
    </div>
    <section id="service-details" class="service-details section scan">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="services-list">
              <a href="{{ url('mission')}}">Our Mission</a>
              <a href="{{ url('vision')}}" class="active">Our Vision</a>
               <a href="{{ url('values')}}">Our Values</a>
            </div>
          </div>
          <div class="col-lg-8 scan1" data-aos="fade-up" data-aos-delay="200">
            <h3 class="font">Our Vision</h3>
            <p class="font">
              To ignite a nationwide movement where assessments inspire learning, drive equity, and celebrate every learner’s potential—fueling India’s journey toward a future-ready education system.
            </p>
        </div>
      </div>
      </div>
    </section>
@endsection