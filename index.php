<?php include "header.php"; ?>
<style>
.swiper-pagination {
  margin-top: 10px;
  position: relative;
  bottom: 0;
  z-index: 1;
}

.swiper-paginations {
  margin-top: 10px;
  position: relative;
  bottom: 0;
  z-index: 1;
  text-align: center;
}
.member {
  background: #fff;
  padding: 15px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
/* .swiper-slide {
  width: auto;
  margin-right: 170px !important;
}
.swiper-slide img{
  max-width: 200px;
} */
.clients{
  margin:30px;
}
.maq {
  margin-top: -70px;
  margin-bottom: 70px;
}
.sta{
  width: 70%;
}

.btn-animate {
  background-color: #ff5817 !important;
  border-color: orange !important;
  color: white !important;
  animation: zoomInOut 1.5s infinite ease-in-out;
}

@keyframes zoomInOut {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.15);
  }
}
@media (max-width: 767px) {
  .maq {
    display: none !important;
  }
}

</style>

    <!-- Hero Section -->
<section id="hero" class="hero section accent-background">

  <!-- ✅ Marquee Section (Top of Hero) -->
  <div class="container maq d-flex justify-content-center">
   <div class="sta">
    <div class="row align-items-center g-2 d-none d-md-flex">
    <div class="col-md-2 col-12"></div>
      <!-- Marquee -->
      <div class="col-md-5 col-12">
        <div class="bg-light rounded px-3 py-1 text-dark">
          <marquee behavior="scroll" direction="left" scrollamount="10" onmouseover="this.stop();" 
          onmouseout="this.start();">
            <span class="blink-text fw-bold">
                Results have been declared!
            </span>
          </marquee>
        </div>  
      </div>

      <!-- Animated Button -->
      <div class="col-md-3 col-12 text-center">
        <a href="/app/school-login"  target="_blank"
           class="btn fw-bold text-white mt-2 mt-md-0 btn-animate">
          <i class="fa fa-hand-o-right"></i> Check Now  

        </a>
      </div>
       
    </div>
  </div>
</div>

  <!-- End Marquee Section -->

  <!-- ✅ Main Hero Content -->
  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-1 justify-content-between">
      <div class="col-lg-6 order-1 order-lg-1 d-flex flex-column justify-content-center">
        <h4 class="hero-heading2">
          <span class="accent hero-heading-text">India’s First Fully<br>Online Olympiad</span>
        </h4>
        <p>
          Crafted for schools that believe assessments should be innovative, inspiring, insightful, and impactful to foster excellence and celebrate individual potential.
        </p>

        <div class="hero-button-registration d-none d-md-flex justify-content-center">
        <a href="/app/register-your-school" class="btn-get-started text-center">
          <i class="fa fa-building-o" aria-hidden="true"></i> School Registration
        </a>
    </div>

      </div>

      <!-- Desktop Image -->
      <div class="col-lg-5 order-2 px-0 d-none d-md-block">
        <img src="assets/img/hero-img.png" alt="" class="img-fluid w-100" />
      </div>

      <!-- Mobile Image -->
      <div class="col-lg-5 order-1 px-0 d-block d-md-none">
        <div class="hero-button-registration d-block d-md-none">
          <div class="row gx-2">
            <div class="col-12">
              <a href="/app/student-registration" class="btn-get-started-student w-100 text-center">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> Student Registration
              </a>
            </div>
            <div class="col-12 mt-3">
              <a href="/app/register-your-school" class="btn-get-started w-100 text-center">
                <i class="fa fa-building-o" aria-hidden="true"></i> School Registration
              </a>
            </div>
          </div>
        </div>

        <img src="assets/img/hero-img-mobile1.png" alt="" class="img-fluid w-100" />
      </div>
    </div>
  </div>

  <!-- ✅ Icon Boxes -->
  <div class="icon-boxes position-relative d-none d-md-block" data-aos="fade-up" data-aos-delay="200">
    <div class="container position-relative">
      <div class="row gy-4 mt-5 icon-box">
        <div class="col-xl-6 col-md-6 partner-info">
          <div>
            <div class="icon"><img src="assets/img/edxso-logo.png" alt=""></div>
            <h4 class="title">Initiative Of</h4>
            <h4 class="title">India’s Premier Education Consultants</h4>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 partner-info">
          <div>
            <div class="icon02"><img src="assets/img/prometric-logo.png" alt=""></div>
            <h4 class="title">Delivered By</h4>
            <h4 class="title">Global Leader in Online Assessments</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

</section><!-- /Hero Section --> 

     <section id="clients" class="clients section" style="padding:29px;">

      <div class="container">
          <h2 class="text-center">Partner Schools</h2>
        <div class="swiper init-swiper">
          <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 1000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;">
              <img src="assets/img/clients1111/11.png" class="img-fluid" alt="" style="max-width:200px;">
             
            </div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;">
              <img src="assets/img/clients11/21.png" class="img-fluid" alt="" style="max-width:200px;">
            </div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/1.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/2.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/3.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/4.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/5.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/6.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/7.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/8.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/9.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/10.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/11.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/12.png" class="img-fluid" alt="" style="max-width:200px;"></div>
             <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/13.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/14.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/15.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/16.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/17.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/18.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/19.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/20.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/21.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/22.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/23.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/24.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/25.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/26.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/27.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/28.png" class="img-fluid" alt="" style="max-width:200px;"></div>
            <div class="swiper-slide" style="width:auto; margin-right:170px !important;"><img src="assets/img/clients11/29.png" class="img-fluid" alt="" style="max-width:200px;"></div>
          </div>
        </div>
      </div>
 

    </section><!-- /Clients Section -->


  <!-- Video Section -->
    <section id="about" class="about section d-block d-md-none">
        <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
  <div class="container position-relative">
    <div class="swiper partner-slider mt191">
      <div class="swiper-wrapper gy-4 mt-5 icon-box">

        <!-- Slide 1 -->
        <div class="swiper-slide col-xl-6 col-md-6 partner-info">
          <div class="prometric-card">
            <div class="prometric-logo">
              <div class="icon">
                <img src="assets/img/edxso-logo.png" alt="">
              </div>
            </div>
            <div class="subtitle">Initiative Of<br><strong>India’s Premier Education Consultants</strong></div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide col-xl-6 col-md-6 partner-info">
          <div class="prometric-card">
            <div class="prometric-logo">
              <div class="icon02">
                <img src="assets/img/prometric-logo.png" alt="">
              </div>
            </div>
            <div class="subtitle">Delivered By<br><strong>Global Leader in Online Assessments</strong></div>
          </div>
        </div>

        <!-- Add more slides here if needed -->

      </div>
    </div>
  </div>
</div>

    </section> 


    <!-- Video Section -->
     <!--<section id="about" class="about section">

   
      <div class="container section-title video-title" data-aos="fade-up">
        <h2>India’s First Planet-Friendly Olympiad</h2>
        <p>SPARK Olympiads redefine assessments by going digital-eliminating paper, printing, logistics, and waste. Smart for students. Safe for the Earth.</p>
      </div>

      <section id="call-to-action" class="call-to-action india-first decoration-video section dark-background">

      <div class="container">
          <video autoplay loop muted>
  <source src="assets/img/freepik-untitled-creation-2025-06-04.mp4" type="video/mp4">
</video>
        <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center05">
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox play-btn"></a>
              <img class="stripe" src="assets/img/stripe.png">
              <p>We believe innovation must serve both education and the environment. That’s why SPARK is conducted securely in school labs, with no printed question papers, OMR sheets, or transport emissions.<br><br>

By moving assessments online, we’re not only enabling real-time diagnostics and equitable access, but also significantly reducing the carbon footprint traditionally associated with large-scale examinations.<br><br>

When your school participates in SPARK, you're not just investing in meaningful assessments—you’re contributing to a cleaner, greener, and more sustainable future.</p>
            
            </div>
          </div>
        </div>
      </div>

    </section>

    </section> -->

     <!-- GET READY Section -->
    <section id="about" class="about section top-margin">

      <!-- Section Title -->
      <div class="container section-title section-title044 getready-title" style="border-radius: 40px 40px 0px 0px;" data-aos="fade-up">
        <h2>GET READY<br>For Global Standards of Excellence in Online Testing!</h2>
      </div><!-- End Section Title -->

      <section id="call-to-action" class="get-raedy-global decoration-video section dark-background">

      <div class="container container1">
     <img src="assets/img/section3-labimage.png" class="img-fluid" alt="">
        <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <div class="certificate">
             <img src="assets/img/certificate-logo.svg"></a>
             </div>
             <p class="caption">Exclusive For Participating Schools</p>
              <h3>Prometric Certified EdAssess Lab</h3>
              <p>Set your school apart with international validation for digital readiness, test integrity, and online exam excellence.</p>
              <a class="cta-btn" href="/computer-lab-readiness/index.php">See Certification Process</a>
               <!-- <a class="cta-btn02" href="#">Download Lab Readiness Guide</a> -->
            </div>
          </div>
        </div>
      </div>

    </section>

    </section><!-- GET READY Section -->

    <!-- Clients Section x
    <section id="clients" class="clients section">

      <div class="container">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section> /Clients Section -->

 

<!-- Services Section -->
    <section id="services" class="services section grid-six">
  <!-- Section Title -->
  <div class="container section-title044 section-title" data-aos="fade-up">
    <h2>6 Reasons to Choose SPARK With Confidence</h2>
  </div>

  <div class="container">
    <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12">

        <!-- ✅ Desktop grid (visible on md and above) -->
        <div class="row six-box d-none d-md-flex">
          <!-- Keep all your 6 items here exactly as they are (unchanged) -->
          <!-- Example box 1 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <h3>Most Credible Steering Committee</h3>
              <p>A panel of national and global education leaders guiding assessment reform with integrity, innovation, and policy-aligned vision.</p>
              <div class="arrow-center">
                <a href="/international-steering-committee/g-balasubramanian.php" class="readmore stretched-link">
                  <img src="assets/img/readmore-arrow.svg">
                </a>
              </div>
              <div class="icon numbers-six-reasions">
                <img src="assets/img/numbers/img-1.svg">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item service-item-blue position-relative">
             
              <h3>Globally Trusted Prometric Test Solutions</h3>
              <p>Powered by Prometric—the world’s most trusted name in secure, high-stakes assessments across 180+ countries.</p>
              <a href="/about/prometric.php" class="readmore stretched-link">
              <div class="arrow-center">
              <img src="assets/img/readmore-arrow-white.svg"></a></div>

               <div class="icon numbers-six-reasions">
                <img src="assets/img/numbers/img-2.svg">
              </div>
            </div>
          </div><!-- End Service Item -->

           <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
             
              <h3>Competency Architecture Aligned to NCF</h3>
              <p>Built on NEP 2020 and NCF 2023, our assessments reflect real learning, not just rote retention.</p>
              <a href="/competency-architecture/" class="readmore stretched-link">
              <div class="arrow-center">
                <img src="assets/img/readmore-arrow.svg"></a></div>

               <div class="icon numbers-six-reasions">
                <img src="assets/img/numbers/img-3.svg">
              </div>
            </div>
          </div><!-- End Service Item -->
         <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item service-item-blue position-relative">
             
              <h3>Ultra-secure EdAssess Online Testing Platform</h3>
              <p>Our AI-enabled platform ensures exam integrity with advanced security, proctoring, and seamless student experience.</p>
              <a href="/computer-lab-readiness/index.php" class="readmore stretched-link">

              <div class="arrow-center">
                <img src="assets/img/readmore-arrow-white.svg"></a></div>

               <div class="icon numbers-six-reasions">
                <img src="assets/img/numbers/img-4.svg">
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
             
              <h3>Detailed Granular Report and Feedback</h3>
              <p>Receive precision-crafted insights for each student—highlighting strengths, learning gaps, and actionable next steps.</p>
              <a class="readmore stretched-link">
                <div class="arrow-center">
                  <img src="assets/img/readmore-arrow.svg"></a></div>

               <div class="icon numbers-six-reasions">
                <img src="assets/img/numbers/img-5.svg">
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item service-item-blue position-relative">
             
              <h3>Recognition, Rewards and Accolades</h3>
              <p>Celebrate student growth, teacher impact, and school excellence through medals, certificates, cash awards, and national visibility.</p>
              <a href="/awards-and-acolades" class="readmore stretched-link">
                <div class="arrow-center">
                  <img src="assets/img/readmore-arrow-white.svg"></a></div>

               <div class="icon numbers-six-reasions">
                <img src="assets/img/numbers/img-6.svg">
              </div>
            </div>
          </div><!-- End Service Item -->


          <!-- Repeat your original 5 more boxes here, same layout -->
          <!-- ... -->
        </div>

        <!-- ✅ Mobile Swiper Slider (only on small screen) -->
        <div class="d-block d-md-none">
          <div class="swiper six-reason-swiper">
            <div class="swiper-wrapper">
              <!-- Just move your same 6 boxes here and change class col-lg-4 col-md-6 to full width in slide -->
              <div class="swiper-slide">
                <div class="service-item position-relative">
                  <h3>Most Credible Steering Committee</h3>
                  <p>A panel of national and global education leaders guiding assessment reform with integrity, innovation, and policy-aligned vision.</p>
                  <div class="arrow-center">
                    <a href="/international-steering-committee/g-balasubramanian.php" class="readmore stretched-link">
                      <img src="assets/img/readmore-arrow.svg">
                    </a>
                  </div>
                  <div class="icon numbers-six-reasions">
                    <img src="assets/img/numbers/img-1.svg">
                  </div>
                </div>
              </div>
<!-- Repeat same 5 boxes inside swiper-slide -->


              <!-- Slide 2 -->
              <div class="swiper-slide">
                <div class="service-item service-item-blue position-relative">
                  <h3>Globally Trusted Prometric Test Solutions</h3>
                  <p>Powered by Prometric—the world’s most trusted name in secure, high-stakes assessments across 180+ countries.</p>
                  <div class="arrow-center">
                    <a href="/about/prometric.php" class="readmore stretched-link">
                      <img src="assets/img/readmore-arrow-white.svg">
                    </a>
                  </div>
                  <div class="icon numbers-six-reasions">
                    <img src="assets/img/numbers/img-2.svg">
                  </div>
                </div>
              </div>

              <!-- Slide 3 -->
              <div class="swiper-slide">
                <div class="service-item position-relative">
                  <h3>Competency Architecture Aligned to NCF</h3>
                  <p>Built on NEP 2020 and NCF 2023, our assessments reflect real learning, not just rote retention.</p>
                  <div class="arrow-center">
                    <a href="/competency-architecture/" class="readmore stretched-link">
                      <img src="assets/img/readmore-arrow.svg">
                    </a>
                  </div>
                  <div class="icon numbers-six-reasions">
                    <img src="assets/img/numbers/img-3.svg">
                  </div>
                </div>
              </div>

              <!-- Slide 4 -->
              <div class="swiper-slide">
                <div class="service-item service-item-blue position-relative">
                  <h3>Ultra-secure EdAssess Online Testing Platform</h3>
                  <p>Our AI-enabled platform ensures exam integrity with advanced security, proctoring, and seamless student experience.</p>
                  <div class="arrow-center">
                    <a href="/computer-lab-readiness/index.php" class="readmore stretched-link">
                      <img src="assets/img/readmore-arrow-white.svg">
                    </a>
                  </div>
                  <div class="icon numbers-six-reasions">
                    <img src="assets/img/numbers/img-4.svg">
                  </div>
                </div>
              </div>

              <!-- Slide 5 -->
              <div class="swiper-slide">
                <div class="service-item position-relative">
                  <h3>Detailed Granular Report and Feedback</h3>
                  <p>Receive precision-crafted insights for each student—highlighting strengths, learning gaps, and actionable next steps.</p>
                  <div class="arrow-center">
                    <a  class="readmore stretched-link">
                      <img src="assets/img/readmore-arrow.svg">
                    </a>
                  </div>
                  <div class="icon numbers-six-reasions">
                    <img src="assets/img/numbers/img-5.svg">
                  </div>
                </div>
              </div>

              <!-- Slide 6 -->
              <div class="swiper-slide">
                <div class="service-item service-item-blue position-relative">
                  <h3>Recognition, Rewards,and Accolades</h3>
                  <p>Celebrate student growth, teacher impact, and school excellence through medals, certificates, cash awards, and national visibility.</p>
                  <div class="arrow-center">
                    <a href="/awards-and-acolades" class="readmore stretched-link">
                      <img src="assets/img/readmore-arrow-white.svg">
                    </a>
                  </div>
                  <div class="icon numbers-six-reasions">
                    <img src="assets/img/numbers/img-6.svg">
                  </div>
                </div>
              </div>
            </div>

            <!-- Optional pagination -->
            <div class="swiper-paginations mt-3"></div>
          </div>
        </div>
      </div>

      <div class="six-reasons-button text-center mt-4">
        <a href="/app/register-your-school" class="button-header-registration btn-get-started">Register Your School</a>
      </div>
    </div>
  </div>
</section>










    <!-- Stats Subjects -->
    <section id="stats" class="stats section" style="padding: 100px 0px 0px 0px !important;">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-4 subject-logo">
            <img src="assets/img/logo.svg" alt="" class="img-fluid img-logo-size">
          </div>

          <div class="col-lg-8">
                <div class="stats-item d-flex">
                  <div class="section-title022 subject-headind">
                    <h2>For Classes 1 - 8</h2>
                    <p>The subjects in SPARK Olympiads are carefully chosen to align with NEP 2020 and NCF 2023. They build foundational skills, promote real-world understanding, and reinforce classroom learning, making the Olympiad relevant, inclusive, and empowering for schools and teachers.</p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Stats subjects -->

<section id="team" class="team section">
  <div class="container">

    <!-- Swiper Wrapper for mobile -->
    <div class="swiper mySwiper d-block d-md-none">
  <div class="swiper-wrapper">

    <!-- Slide 1 -->
    <div class="swiper-slide">
      <div class="member">
        <img src="/assets/img/subject/english-img.jpg" class="img-fluid" alt="">
        <h4>English</h4>
        <span>Vocabulary, reading comprehension, grammar, expression, fluency, and communication skills.</span>
        <div class="social">
          <a><img src="assets/img/readmore-arrow.svg"></a>
        </div>
      </div>
    </div>
   
    <!-- Slide 2 -->
    <div class="swiper-slide">
      <div class="member">
        <img src="/assets/img/subject/mathamatics-img.jpg" class="img-fluid" alt="">
        <h4>Mathematics</h4>
        <span>Logical reasoning, problem-solving, numeracy, patterns, quantities, and measurements.</span>
        <div class="social">
          <a ><img src="assets/img/readmore-arrow.svg"></a>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="swiper-slide">
      <div class="member">
        <img src="/assets/img/subject/evs-img.jpg" class="img-fluid" alt="">
        <h4>EVS</h4>
        <span>Environment, hygiene, awareness, habits, sustainability, values, and daily observations.</span>
        <div class="social">
          <a ><img src="assets/img/readmore-arrow.svg"></a>
        </div>
      </div>
    </div>

    <!-- Slide 4 -->
    <div class="swiper-slide">
      <div class="member">
        <img src="/assets/img/subject/science-img.jpg" class="img-fluid" alt="">
        <h4>Science</h4>
        <span>Inquiry, cause-effect, experimentation, observation, analysis, discovery, and scientific thinking.</span>
        <div class="social">
          <a ><img src="assets/img/readmore-arrow.svg"></a>
        </div>
      </div>
    </div>

    <!-- Slide 5 -->
    <div class="swiper-slide">
      <div class="member">
        <img src="/assets/img/subject/india-Awareness-img.jpg" class="img-fluid" alt="">
        <h4>India Awareness</h4>
        <span>Culture, heritage, civics, diversity, festivals, geography, leaders, and traditions.</span>
        <div class="social">
          <a><img src="assets/img/readmore-arrow.svg"></a>
        </div>
      </div>
    </div>   

  </div>

  <!-- Pagination (added below swiper-wrapper but inside swiper) -->
  <div class="swiper-pagination mt-3 text-center"></div>
</div>
    <!-- Desktop View Boxes -->
    <div class="row gy-4 justify-content-between d-none d-md-flex">
      <!-- Same 6 boxes as your original code -->
      <div class="col-xl-2 col-md-6 d-flex six-reasons" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <img src="/assets/img/subject2/english-img.jpg" class="img-fluid" alt="">
          <h4>English</h4>
          <span>Vocabulary, reading comprehension, grammar, expression, fluency, and communication skills.</span>
          <div class="social">
            <a><img src="assets/img/readmore-arrow.svg"></a>
          </div>
        </div>  
      </div>
      <div class="col-xl-2 col-md-6 d-flex six-reasons" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="/assets/img/subject2/mathamatics-img.jpg" class="img-fluid" alt="">
              <h4>Mathematics</h4>
              <span>Logical reasoning, problem-solving, numeracy, patterns, quantities, and measurements.</span>
              <div class="social">
                <a ><img src="assets/img/readmore-arrow.svg"></a>
              </div>
            </div>
          </div><!-- End Subject -->

          <div class="col-xl-2 col-md-6 d-flex six-reasons" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="/assets/img/subject2/evs-img.jpg" class="img-fluid" alt="">
              <h4>EVS</h4>
              <span>Environment, hygiene, awareness, habits, sustainability, values, and daily observations.</span>
              <div class="social">
                <a><img src="assets/img/readmore-arrow.svg"></a>
                </div>
            </div>
          </div><!-- End Subject -->

          <div class="col-xl-2 col-md-6 d-flex six-reasons" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <img src="/assets/img/subject2/science-img.jpg" class="img-fluid" alt="">
              <h4>Science</h4>
              <span>Inquiry, cause-effect, experimentation, observation, analysis, discovery, and scientific thinking.</span>
              <div class="social">
                <a><img src="assets/img/readmore-arrow.svg"></a>
                
              </div>
            </div>
          </div><!-- End Subject -->

           <div class="col-xl-2 col-md-6 d-flex six-reasons" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <img src="/assets/img/subject2/india-Awareness-img.jpg" class="img-fluid" alt="">
              <h4>India Awareness</h4>
              <span>Culture, heritage, civics, diversity, festivals, geography, leaders, and traditions.</span>
              <div class="social">
                <a><img src="assets/img/readmore-arrow.svg"></a>
              </div>
            </div>
          </div>

    </div>

  </div>
</section><!-- End Subject -->


 

    


 <!-- fees-shedule Section -->
    <section id="hero" class="hero section accent-background fees-shedule top-margin">


          <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
          <div class="row gy-4 mt-5 icon-box icon-box02">

          <div class="col-xl-6 col-md-6">
              <div class="fees-shedule-box title04">
                <h4>Schedule 2025</h4>
                <p>18th November - 27th November (Registration Closed)<br> 1st December - 31st December (Exam window is 9 days only)</p>
              </div>
            </div><!--End Icon Box -->
 

            <div class="col-xl-6 col-md-6">
              <div class="fees-shedule-box title04">
                <h4>Fees</h4>
                <p>Up to 3 tests: ₹200 per test<br>All 4 tests: ₹700</p>
              </div>
            </div><!--End Icon Box -->
            <div class="col-xl-6 col-md-6">
              <a href="/app/SPARK-Exam-Schedule.pdf" target="_blank" class="button-header-registration btn-get-started-student1">Download Schedule</a>
              <a href="/app/register-your-school" class="button-header-registration btn-get-started">Register Your School</a>
            </div>
        </div>
          
        </div>
      </div>
       

      

    </section><!-- /fees-shedule Section -->

    

    <!-- Recent Assessment Blueprints -->
    <section id="recent-posts" class="d-none d-md-block recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Assessment Blueprints</h2>
        <p>Understand the test structure to plan better, improve time management, and focus on the right types of questions to showcase your true performance.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 blueprint-img">

          <div class="col-xl-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
            <article>

              <div class="post-img">
                <img src="assets/img/blueprint.svg" alt="" class="img-fluid">
              </div>

              <a href="/sample-question" class="button-header-registration btn-get-started">See Sample Questions</a>

            </article>
          </div><!-- End post list item -->

        

      

        </div><!-- End recent posts list -->

      </div>

    </section><!-- /Recent Posts Section -->



            <!-- mobile version -->
        <!-- Recent Assessment Blueprints -->
   <section id="recent-posts" class="recent-posts section d-block d-md-none">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Assessment Blueprints</h2>
    <p>Understand the test structure to plan better, improve time management, and focus on the right types of questions to showcase your true performance.</p>
  </div>

  <div class="container">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="assets/img/p-1.png" alt="Level 1" class="img-fluid">
        </div>
        <div class="swiper-slide">
          <img src="assets/img/p-2.png" alt="Level 2" class="img-fluid">
        </div>
        <div class="swiper-slide">
          <img src="assets/img/p-3.png" alt="Level 3" class="img-fluid">
        </div>
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-3"></div>
    </div>

    <div class="text-center mt-4">
      <a href="#about" class="button-header-registration btn-get-started">See Sample Questions</a>
    </div>
  </div>

</section>
<!-- /Recent Posts Section -->



        




    

      <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title011" data-aos="fade-up">
        <p style="font-weight: 500;">Introducing Global Standards of Performance Reporting</p>
        <h2>Precision-Crafted Reports and Granular Insights</h2>
        <p>SPARK delivers insightful, timely, and actionable reports for students, teachers, schools, and school chains enabling progress tracking, informed decisions, and targeted academic improvement.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <!-- Swiper -->
      <div class="swiper portfolioSwiper d-block d-md-none" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">

          <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info1 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                      <h4>Prometric’s Globally Tested Advanced Analytics</h4>
                      <p>For Data-Driven Decision Making</p>
                      <a class="readmore stretched-link"><img src="assets/img/readmore-arrow-white.svg"></a>
                    </div>
                  </div>
                </div>
                <a  class="glightbox">
                  <img src="assets/img/grid/grid-1.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="swiper-slide">
            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info2 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                      <h4><a title="More Details">India's Only Olympiad Offering<br>LIVE SCORE and INSTANT REPORT</a></h4>
                      <a  class="readmore stretched-link"><img src="assets/img/readmore-arrow.svg"></a>
                    </div>
                  </div>
                </div>
               
                  <img src="assets/img/grid/grid-2.png" class="img-fluid" alt="">
              
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="swiper-slide">
            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info2 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                      <h4><a  title="More Details">I know what to learn to improve<br>my performance!</a></h4>
                      <p>Thanks to the detailed feedback I got.</p>
                      <a class="readmore stretched-link"><img src="assets/img/readmore-arrow.svg"></a>
                    </div>
                  </div>
                </div>
                <a class="glightbox">
                  <img src="assets/img/grid/grid-3.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="swiper-slide">
            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info1 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                      <h4><a title="More Details">I know what to teach to<br>improve my class performance!</a></h4>
                      <p>Thanks to the insightful class reports.</p>
                      <a class="readmore stretched-link"><img src="assets/img/readmore-arrow-white.svg"></a>
                    </div>
                  </div>
                </div>
                
                  <img src="assets/img/grid/grid-4.png" class="img-fluid" alt="">
               
              </div>
            </div>
          </div>

          <!-- Slide 5 -->
          <div class="swiper-slide">
            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info1 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                      <h4><a  title="More Details">I get relevant data to plan the academic<br>performance and progress of my school!</a></h4>
                      <a class="readmore stretched-link"><img src="assets/img/readmore-arrow-white.svg"></a>
                    </div>
                  </div>
                </div>
                
                  <img src="assets/img/grid/grid-5.png" class="img-fluid" alt="">
               
              </div>
            </div>
          </div>

          <!-- Slide 6 -->
          <div class="swiper-slide">
            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info2 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                      <h4><a  title="More Details">We can set the performance benchmarks<br>across all our 85 branches!</a></h4>
                      <a  class="readmore stretched-link"><img src="assets/img/readmore-arrow.svg"></a>
                    </div>
                  </div>
                </div>
                
                  <img src="assets/img/grid/grid-6.png" class="img-fluid" alt="">
                
              </div>
            </div>
          </div>

        </div>

        
        <div class="swiper-pagination"></div>
      </div>

        
          <div class="row gy-4 isotope-container d-none d-md-block" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info1 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                  <h4><a title="More Details">Prometric’s Globally Tested Advanced Analytics</a></h4>
                  <p>For Data-Driven Decision Making</p>
                 <a class="readmore stretched-link"><img src="assets/img/readmore-arrow-white.svg"></a>
                  </div>
                </div>
                </div>
               <img src="assets/img/grid/grid-1.png" class="img-fluid" alt="">
                
              </div>
            </div><!-- End Portfolio Item -->

             <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info2 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                  <h4><a title="More Details">India's Only Olympiad Offering<br>LIVE SCORE and INSTANT REPORT</a></h4>
                  <a class="readmore stretched-link"><img src="assets/img/readmore-arrow.svg"></a>

                  </div>
                </div>
                </div>
                <img src="assets/img/grid/grid-2.png" class="img-fluid" alt="">
                
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info2 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                  <h4><a  title="More Details">I know what to learn to improve<br>my performance!</a></h4>
                  <p>Thanks to the detailed feedback I got.</p>
                  <a class="readmore stretched-link"><img src="assets/img/readmore-arrow.svg"></a>
                  </div>
                </div>
                </div>
                <img src="assets/img/grid/grid-3.png" class="img-fluid" alt="">
                
              </div>
            </div><!-- End Portfolio Item -->

             <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info1 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                  <h4><a title="More Details">I know what to teach to<br>improve my class performance!</a></h4>
                  <p>Thanks to the insightful class reports.</p>
                  <a class="readmore stretched-link"><img src="assets/img/readmore-arrow-white.svg"></a>
                  </div>
                </div>
                </div>
                <img src="assets/img/grid/grid-4.png" class="img-fluid" alt="">
                
              </div>
            </div><!-- End Portfolio Item -->

              <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info1 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                  <h4><a  title="More Details">I get relevant data to plan the academic<br>performance and progress of my school!</a></h4>
                  <a  class="readmore stretched-link"><img src="assets/img/readmore-arrow-white.svg"></a>
      
                  </div>
                </div>
                </div>
                <img src="assets/img/grid/grid-5.png" class="img-fluid" alt="">
                
              </div>
            </div><!-- End Portfolio Item -->


            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <div class="portfolio-info portfolio-info2 d-flex justify-content-center align-items-center">
                  <div class="col-xl-10">
                    <div class="text-center">
                  <h4><a  title="More Details">We can set the performance benchmarks<br>across all our 85 branches!</a></h4>
                  <a  class="readmore stretched-link"><img src="assets/img/readmore-arrow.svg"></a>
                  </div>
                </div>
                </div>
                <img src="assets/img/grid/grid-6.png" class="img-fluid" alt="">
                
              </div>
            </div><!-- End Portfolio Item -->   

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->
   
   <!-- Call To Action Section -->
    <section id="call-to-action" class="d-none d-md-block call-to-action call-to-action02 award-section section dark-background">

      <div class="container">
        <img class="object-fit-contain border rounded" src="assets/img/awaord-img.png" alt="">
        <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center01">
              <p style="font-weight:500 !important; margin-bottom: 0px !important;">Every Effort is Celebrated.</p>
              <h3>Every Achievement Counts</h3>
              <p class="award-section-para">SPARK Olympiads honour not just toppers—but teachers, schools, and students who show courage, curiosity, and commitment to learning.</p>
              <a class="cta-btn" href="/awards-and-acolades/">View Award Details</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

    <section class="d-block d-md-none">
                 <div class="container">
                 <div class="row">
                     <img src="assets/img/awaord_1.png" class="" alt="award" />
                 </div>
             </div>
             <div class="mt-4 text-center">
                  <p class="eeffort">Every Effort is Celebrated.</p>
                 <h4 class="achievements">Every Achievement Counts.</h4>
                 <p class="honour">SPARK Olympiads honour not just toppers—but teachers, schools, and students who show courage, curiosity, and commitment to learning.</p>
                 <a href="/awards-and-acolades/" class="button-header-registration btn-get-started text-center">View Award Details</a>
            </div>
            </section>
  <!-- Section Lao Apne School Mein Spark -->
      <div class="container section-title getready-title" style="border-radius: 50px 50px 0px 0px;" data-aos="fade-up">
        <h5 class="laoo-apne-school">Lao Apne <span class="school">School</span> Mein <img class="logo-spark-size" src="assets/img/onysparklogo.svg"></h5>
<div class="lao-apne-school-button">
           <a href="/app/register-your-school" class="button-header-registration btn-get-started">Register Your School</a></div>

      </div>


      <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1.2,
    spaceBetween: 15,
    loop: true,
    autoplay: {
      delay: 5000, // 3 seconds delay between slides
      disableOnInteraction: false, // autoplay won't stop after swipe
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    }
  });
</script>



<script>
  var swiper = new Swiper(".six-reason-swiper", {
    loop: true,
    spaceBetween: 20,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: ".swiper-paginations",
      clickable: true,
    },
  });
</script>

<script>
  new Swiper(".partner-slider", {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 1,
    spaceBetween: 30,
    breakpoints: {
      768: {
        slidesPerView: 2
      }
    }
  });
</script>

 <!-- Swiper Init -->
  <script>
    var swiper = new Swiper(".portfolioSwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 5000,      // 3 seconds per slide
    disableOnInteraction: false, // continues autoplay after interaction
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    768: {
      slidesPerView: 2
    },
    992: {
      slidesPerView: 2
    }
  }
});

  </script>

  <?php include "footer.php"; ?>