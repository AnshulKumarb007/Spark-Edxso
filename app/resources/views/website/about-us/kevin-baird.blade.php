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
          <a href="{{ url('kevin-baird')}}" class="active">Kevin Baird</a>
          <a href="{{ url('dr-swati-popat')}}" >Dr. Swati Popat Vats</a>
          <a href="{{ url('dr-jesus-jara')}}" >Dr. Jesús Jara</a>
          <a href="{{ url('mrs-abha-meghe')}}">Mrs. Abha Meghe</a>
          <a href="{{ url('dr-andrew-odover')}}">Dr. Andrew Ordover</a>
          <a href="{{ url('humphrey-chan')}}" >Humphrey Chan</a>
          <a href="{{ url('pamit-anand')}}">Pamit Anand</a>
          <a href="{{ url('vishnu-patro')}}">Vishnu Patro</a>
          <a href="{{ url('pramod-sharma')}}">Pramod Sharma</a>
          <a href="{{ url('mrs-sneh-verma')}}">Ms. Sneh Verma</a>
          <a href="{{ url('dr-punam-kashyap')}}" >Dr. Punam Kashyap</a>
          <a href="{{ url('mrs-sangita-krishan')}}">Ms. Sangeeta Krishan</a>
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
            <img src="{{ asset('../assets/img/Steering_Committee/Kevin Baird.jfif')}}" alt="Kevin Baird" class="img-fluid services-img">
          </div>
          <div class="col-lg-8">
            <h3 class="font">Kevin Baird, Predictive Analytics, ISCAR</h3>
            <h5 class="font">Chief Experience Officer, Center of Excellence for Education & Talent Development, Prometric</h5>
            <p class="font">
              Kevin Baird leads global initiatives to advance learning, credentialing, and workforce readiness. He partners with educators, credentialing bodies, and industry leaders to develop innovative, data-informed solutions that promote equitable access to education and professional advancement. With more than 20 years of experience, Mr. Baird is a recognized leader in competency-based education, predictive analytics, and scalable assessment design. He previously served as Chairman and CEO of Huafeng WFOE, where he led AI-driven learning and credentialing initiatives. He also chairs the Global Center for College & Career Readiness and has authored books and patents focused on education innovation and workforce development.
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
