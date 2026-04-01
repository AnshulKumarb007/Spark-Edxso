@extends('layouts.website')
@section('content')

<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-12">
          <h1>International Steering Committee</h1>
        </div>
      </div>
    </div>
  </div>

  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{('../')}}">Home</a></li>
        <li class="current">International Steering Committee</li>
      </ol>
    </div>
  </nav>
</div>
<section id="service-details" class="service-details section scan">
  <div class="container">
    <div class="row gy-4">

      <!-- Sidebar -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
         <div class="services-list">
          <a href="{{ url('g-balasubramanian')}}" >G. Balasubramanian</a>
          <a href="{{ url('dr-sadhana-parashar')}}" >Dr. Sadhana Parashar</a>
          <a href="{{ url('dr-rajesh-hassija')}}">Dr. Rajesh Hassija</a>
          <a href="{{ url('kevin-baird')}}">Kevin Baird</a>
          <a href="{{ url('dr-swati-popat')}}" >Dr. Swati Popat Vats</a>
          <a href="{{ url('dr-jesus-jara')}}" >Dr. Jesús Jara</a>
          <a href="{{ url('mrs-abha-meghe')}}" >Mrs. Abha Meghe</a>
          <a href="{{ url('dr-andrew-odover')}}">Dr. Andrew Ordover</a>
          <a href="{{ url('humphrey-chan')}}" >Humphrey Chan</a>
          <a href="{{ url('pamit-anand')}}" >Pamit Anand</a>
          <a href="{{ url('vishnu-patro')}}">Vishnu Patro</a>
          <a href="{{ url('pramod-sharma')}}" class="active">Pramod Sharma</a>
          <a href="{{ url('mrs-sneh-verma')}}">Ms. Sneh Verma</a>
          <a href="{{ url('dr-punam-kashyap')}}" >Dr. Punam Kashyap</a>
          <a href="{{ url('mrs-sangita-krishan')}}" >Ms. Sangeeta Krishan</a>
          <a href="{{ url('giri-balasubramaniam')}}">Giri Balasubramaniam</a>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-lg-8">
        <h3 class="font">Guiding Excellence. Shaping the Future with Integrity and Inclusivity.</h3>
        <p class="font">
          The SPARK Olympiads bring together some of the most distinguished minds in Indian and global education. With deep expertise in assessment innovation, student engagement, and large-scale assessment management, the Committee ensures that the SPARK Olympiads are future-ready, aligned with NEP 2020 and NCF, and driven by the highest standards of academic integrity and inclusivity.
        </p>

        <div class="row scan1">
          <div class="col-lg-4">
            <img src="{{ asset('../assets/img/Steering_Committee/pramod sharma.jfif')}}" alt="Pramod Sharma" class="img-fluid services-img">
          </div>
          <div class="col-lg-8">
            <h3 class="font">Pramod Sharma</h3>
            <h5 class="font">Education Consultant</h5>

            <p class="font">
              With a distinguished career spanning over 53 years, Shri Pramod Sharma is a renowned figure in Indian and international education. Beginning as a teacher at The Doon School, Dehradun, he has also taught in Afghanistan and Nigeria. As Principal across eminent schools like Tashi Namgyal Academy, Yadavindra Public School, Mayo College, and Genesis Global School, he has led institutions to national prominence.
            </p>

            <p class="font">
              Honored with the National Award for Teachers by the President of India in 2000, he has also served on the Governing Body of CBSE and chaired the Indian Public Schools’ Conference (IPSC), receiving IPSC’s Lifetime Achievement Award in 2008.
            </p>

            <p class="font">
              He is an Honorary Member of both Round Square and IPSC. He is currently President of IPSC Trust and was Member of Governing Body of NABET - Quality Council of India.
            </p>
          </div>
        </div>
        <p class="font">
          <p class="font">Together, the members of the Spark Olympiads Steering Committee have influenced over 25,000 schools, led reforms at national and international levels, and shaped educational experiences for millions of learners. Their combined expertise ensures that Spark Olympiads are not just assessments but a national movement towards future-ready learning.</p>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /Service Details Section -->

@endsection
