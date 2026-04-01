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
      <div class="col-lg-4">
       <div class="services-list">
          <a href="{{ url('g-balasubramanian')}}">G. Balasubramanian</a>
          <a href="{{ url('dr-sadhana-parashar')}}" class="active">Dr. Sadhana Parashar</a>
          <a href="{{ url('dr-rajesh-hassija')}}">Dr. Rajesh Hassija</a>
          <a href="{{ url('kevin-baird')}}">Kevin Baird</a>
          <a href="{{ url('dr-swati-popat')}}">Dr. Swati Popat Vats</a>
          <a href="{{ url('dr-jesus-jara')}}" >Dr. Jesús Jara</a>
          <a href="{{ url('mrs-abha-meghe')}}">Mrs. Abha Meghe</a>
          <a href="{{ url('dr-andrew-odover')}}">Dr. Andrew Ordover</a>
          <a href="{{ url('humphrey-chan')}}">Humphrey Chan</a>
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
        <p>
          The SPARK Olympiads bring together some of the most distinguished minds in Indian and global education. With deep expertise in assessment innovation, student engagement, and large-scale assessment management, the Committee ensures that the SPARK Olympiads are future-ready, aligned with NEP 2020 and NCF, and driven by the highest standards of academic integrity and inclusivity.
          
        </p>

        <div class="row scan1">
          <div class="col-lg-4">
            <img src="{{ asset('../assets/img/Steering_Committee/image15.png')}}" alt="Dr. Sadhana Parashar" class="img-fluid services-img">
          </div>
          <div class="col-lg-8">
            <h3 class="font">Dr. Sadhana Parashar, Chairperson, ISCAR</h3>
            <h5 class="font">Large Scale Assessment and Examination Reform Leader</h5>
            <p class="font">
              Dr. Sadhana Parashar is an experienced educator and expert in assessment and examination reform, with more than 40 years of work in academic leadership, school education, and large-scale testing. She has played key roles in designing and improving examinations, developing test items in multiple languages, and helping transit national-level exams to digital formats. She has contributed to planning, managing, and reviewing many competitive tests that support admissions to higher education, research programmes, and teaching positions.
              <br><br>
              Her main strengths include planning large examinations, checking the quality and fairness of test questions, building multilingual question banks, supporting the goals of the National Education Policy (NEP 2020), translating and publishing textbooks, and training academic and exam staff. She is well known for her honest and inclusive approach to improving assessments.
              <br><br>
              Over the years, she has helped conduct exams taken by millions of candidates across various subjects and education levels. She led the creation of a question bank with more than five lakh questions, trained over 7,000 subject experts through more than 750 workshops, and supported exams in over 30 languages. Her efforts have helped make assessments more accessible, reliable, and student-friendly.
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
