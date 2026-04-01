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
        <li><a href="{{ url('../')}}">Home</a></li>
        <li class="current">International Steering Committee</li>
      </ol>
    </div>
  </nav>
</div>
<!-- End Page Title -->

<!-- Service Details Section -->
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
          <a href="{{ url('pamit-anand')}}" class="active">Pamit Anand</a>
          <a href="{{ url('vishnu-patro')}}">Vishnu Patro</a>
          <a href="{{ url('pramod-sharma')}}">Pramod Sharma</a>
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
          The SPARK Olympiads bring together some of the most distinguished minds in Indian and global education. 
          With deep expertise in assessment innovation, student engagement, and large-scale assessment management, 
          the Committee ensures that the SPARK Olympiads are future-ready, aligned with NEP 2020 and NCF, and 
          driven by the highest standards of academic integrity and inclusivity.
         
        </p>

        <div class="row scan1">
          <div class="col-lg-4">
            <img src="{{ asset('../assets/img/Steering_Committee/pamit anand.jfif')}}" alt="Pamit Anand" class="img-fluid services-img">
          </div>
          <div class="col-lg-8">
            <h3 class="font">Pamit Anand</h3>
            <h5 class="font">Managing Director India, Prometric</h5>
            <p class="font">
              Pamit Anand leads business strategy, market growth, and client engagement across the region, working closely 
              with corporate, government, and nonprofit partners to expand Prometric’s footprint in education, credentialing, 
              and workforce development.
            </p>
            <p class="font">
              Mr. Anand brings nearly 20 years of experience in product and business leadership across Enterprise SaaS, 
              EdTech, FinTech, and consumer technology sectors. Before joining Prometric, he led product and new business 
              initiatives for Magicbricks, part of the Times of India Group. He also served as Deputy CEO of BeMasterly, 
              an EdTech startup focused on competitive exams, and played a foundational role in scaling Shaadi.com, where 
              he served as VP and Business Head.
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
