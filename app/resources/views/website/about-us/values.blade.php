@extends('layouts.website')
@section('content')



    <!-- Page Title -->

    <div class="page-title">

      <div class="heading">

        <div class="container">

          <div class="row d-flex justify-content-center text-center">

            <div class="col-lg-10">

              <h1>Our Values</h1>

        

            </div>

          </div>

        </div>

      </div>

      <nav class="breadcrumbs">

        <div class="container">

          <ol>

            <li><a href="{{ url('../')}}">Home</a></li>

            <li class="current">Our Values</li>

          </ol>

        </div>

      </nav>

    </div><!-- End Page Title -->



    <!-- Service Details Section -->

    <section id="service-details" class="service-details section scan">



      <div class="container">



        <div class="row gy-4">



          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="services-list">

              <a href="{{ url('mission')}}">Our Mission</a>

              <a href="{{ url('vision')}}">Our Vision</a>

              <a href="{{ url('values')}}" class="active">Our Values</a>

              

            </div>
          </div>



          <div class="col-lg-8 scan1" data-aos="fade-up" data-aos-delay="200">

            <h3 class="font">Our Values</h3>

            <p class="font">

              At SPARK, our work is guided by six core values that define who we are and what we stand for:

            </p>

            <h5 class="font">Integrity in Assessment :</h5>
            <p class="font">We uphold the highest standards of fairness, transparency, and security in every test we deliver.</p>
            <h5 class="font">Learning-Centered Purpose :</h5>
            <p class="font">We design assessments that support learning, not stress—helping students grow through feedback, not fear.</p>
            <h5 class="font">Insightful & Actionable Reporting :</h5>
            <p class="font">We turn data into direction—empowering schools, teachers, and students with insights that lead to better teaching and learning.</p>
           <h5 class="font">Environmental Responsibility :</h5>
            <p class="font">By going fully online, we reduce waste and promote sustainability—making education part of the planet’s future.</p>

            <h5 class="font">Equity & Inclusion :</h5>
            <p class="font">We believe every student deserves the opportunity to shine—regardless of background, board, or location.</p>  
            <h5 class="font">Celebrating All Contributors :</h5>
            <p class="font">We recognize and reward the efforts of students, teachers, and schools—because excellence is a collective achievement.</p>
        </div>
      </div>

      </div>
    </section>
@endsection