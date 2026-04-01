@extends('layouts.website')
@section('content')
@php
    $val = 'G. Balasubramanian'; // Or whichever name you're trying to show
@endphp
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
        <div class="row">
            
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="services-list">
                                <a href="{{url('mentors')}}/G. Balasubramanian" class="active">G. Balasubramanian</a>
								<a href="{{url('mentors')}}/Dr. Sadhana Parashar">Dr. Sadhana Parashar</a>
								<a href="{{url('mentors')}}/Dr. Rajesh Hassija">Dr. Rajesh Hassija</a>
								<a href="{{url('mentors')}}/Kevin Baird">Kevin Baird</a>
								<a href="{{url('mentors')}}/Dr. Swati Popat Vats">Dr. Swati Popat Vats</a>
								<a href="{{url('mentors')}}/Dr. Jesús Jara">Dr. Jesús Jara</a>
								<a href="{{url('mentors')}}/Mrs. Abha Meghe">Mrs. Abha Meghe</a>
								<a href="{{url('mentors')}}/Dr. Andrew Ordover">Dr. Andrew Ordover</a>
								<a href="{{url('mentors')}}/Humphrey Chan">Humphrey Chan</a>
								<a href="{{url('mentors')}}/Pamit Anand">Pamit Anand</a>
								<a href="{{url('mentors')}}/Vishnu Patro">Vishnu Patro</a>
								<a href="{{url('mentors')}}/Pramod Sharma">Pramod Sharma</a>
								<a href="{{url('mentors')}}/Ms. Sneh Verma">Ms. Sneh Verma</a>
								<a href="{{url('mentors')}}/Dr. Punam Kashyap">Dr. Punam Kashyap</a>
								<a href="{{url('mentors')}}/Ms. Sangeeta Krishan">Ms. Sangeeta Krishan</a>
								<a href="{{url('mentors')}}/Giri Balasubramaniam">Giri Balasubramaniam</a>
                    </div>
                </div>

                <div class="col-lg-8 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="font">Guiding Excellence. Shaping the Future with Integrity and
                        Inclusivity.</h3>
                    <p class="font">
                        The SPARK Olympiads bring together some of the most distinguished minds in
                        Indian and global education. With deep expertise in assessment innovation,
                        student engagement, and large-scale assessment management, the Committee ensures
                        that the SPARK Olympiads are future-ready, aligned with NEP 2020 and NCF, and
                        driven by the highest standards of academic integrity and
                        inclusivity.<br><br>Together, the members of the Spark Olympiads Steering
                        Committee have influenced over 25,000 schools, led reforms at national and
                        international levels, and shaped educational experiences for millions of
                        learners. Their combined expertise ensures that Spark Olympiads are not just
                        assessments but a national movement towards future-ready learning.

                    </p>
                    <div class="card card-social">
                        <div class="card-block">
                            <div class="row scan1">
                                @if(!empty($val == 'G. Balasubramanian'))
                                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="200"><img
                                        src="{{ asset('assets/img/Steering_Committee/image5.jpg')}}"
                                        alt="" class="img-fluid services-img"></div>
                                <div class="col-lg-8">
                                    <h3 class="font">G. Balasubramanian, Chief Mentor, ISCAR</h3>
                                    <h5 class="font">Former Director (Academics), CBSE</h5>
                                    <p class="font">
                                        Mr. Balasubramanian is a distinguished educationist, author, and
                                        speaker with over four decades of impact in Indian education. As
                                        the former Director (Academics) at CBSE, he led transformative
                                        reforms in curriculum design, assessment practices, and holistic
                                        education. A pioneer in introducing innovative initiatives, he
                                        has shaped national policies and teacher development frameworks.
                                        Mr. Balasubramanian is widely respected for his thought
                                        leadership, deep insights into learner psychology, and
                                        commitment to educational excellence. His visionary work
                                        continues to inspire educators and institutions across India and
                                        beyond, positioning him as a key influencer in 21st-century
                                        school education.

                                    </p>
                                </div>
                            </div>
                            @elseif($val == 'Dr. Sadhana Parashar')


                            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
                                data-aos-delay="200"><img
                                    src="{{ asset('assets/img/Steering_Committee/image15.png')}}"
                                    alt="" class="img-fluid services-img"></div>
                            <div class="col-lg-8">
                                <h3 class="font">Dr. Sadhana Parashar, Chairperson, ISCAR</h3>
                                <h5 class="font">Large Scale Assessment and Examination Reform Leader
                                </h5>
                                <p class="font">
                                    Dr. Sadhana Parashar is an experienced educator and expert in
                                    assessment and examination reform, with more than 40 years of work
                                    in academic leadership, school education, and large-scale testing.
                                    She has played key roles in designing and improving examinations,
                                    developing test items in multiple languages, and helping transit
                                    national-level exams to digital formats. She has contributed to
                                    planning, managing, and reviewing many competitive tests that
                                    support admissions to higher education, research programmes, and
                                    teaching positions.<br><br>

                                    Her main strengths include planning large examinations, checking the
                                    quality and fairness of test questions, building multilingual
                                    question banks, supporting the goals of the National Education
                                    Policy (NEP 2020), translating and publishing textbooks, and
                                    training academic and exam staff. She is well known for her honest
                                    and inclusive approach to improving assessments.<br><br>

                                    Over the years, she has helped conduct exams taken by millions of
                                    candidates across various subjects and education levels. She led the
                                    creation of a question bank with more than five lakh questions,
                                    trained over 7,000 subject experts through more than 750 workshops,
                                    and supported exams in over 30 languages. Her efforts have helped
                                    make assessments more accessible, reliable, and student-friendly.
                                </p>

                            </div>
                        </div>

                        @elseif($val == 'Dr. Rajesh Hassija')


                        <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="200"><img
                                src="{{ asset('assets/img/Steering_Committee/hassija.jpg')}}"
                                alt="" class="img-fluid services-img"></div>
                        <div class="col-lg-8">
                            <h3 class="font">Dr. Rajesh Hassija, Quality Head, ISCAR</h3>

                            <h5 class="font">Director &amp; Principal, Indraprastha Group of Schools</h5>

                            <p class="font">

                                Dr. Rajesh Hassija is a seasoned educationist with over three decades of leadership in K'12 education, known for driving innovation in curriculum, pedagogy, and school transformation. As Director of the Indraprastha Group of Schools, he has consistently promoted values-based learning, technology integration, and teacher empowerment. An accomplished author, master trainer, and international consultant, he brings a nuanced understanding of learner diversity and institutional excellence. His rich experience in both national and global education systems adds valuable perspective to shaping progressive, inclusive, and future-ready approaches to assessment and evaluation
                            </p>
                        </div>
                    </div>
                    @elseif($val == 'Kevin Baird')
                    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
                        data-aos-delay="200"><img
                            src="{{ asset('assets/img/Steering_Committee/Kevin Baird.jfif')}}"
                            alt="" class="img-fluid services-img"></div>
                    <div class="col-lg-8">
                        <h3 class="font">Kevin Baird, Predictive Analytics, ISCAR</h3>

                        <h5 class="font">Chief Experience Officer, Center of Excellence for Education &amp; Talent Development, Prometric</h5>

                        <p class="font">

                            Kevin Baird leads global initiatives to advance learning, credentialing, and workforce readiness. He partners with educators, credentialing bodies, and industry leaders to develop innovative, data-informed solutions that promote equitable access to education and professional advancement. With more than 20 years of experience, Mr. Baird is a recognized leader in competency-based education, predictive analytics, and scalable assessment design. He previously served as Chairman and CEO of Huafeng WFOE, where he led AI-driven learning and credentialing initiatives. He also chairs the Global Center for College &amp; Career Readiness and has authored books and patents focused on education innovation and workforce development.

                        </p>


                    </div>
                </div>


                @elseif($val == 'Dr. Swati Popat Vats')


                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
                    data-aos-delay="200"><img
                        src="{{ asset('assets/img/Steering_Committee/SwatiPopat.png')}}"
                        alt="" class="img-fluid services-img"></div>
                <div class="col-lg-8">
                    <h3 class="font">Dr. Swati Popat Vats, K-5 Assessment, ISCAR</h3>

                    <h5 class="font">President - Podar Education Network Founder-President, Early Childhood Association, Association for Primary Education and Research</h5>

                    <p class="font">

                        Dr. Swati Popat Vats, a pioneering educationist with over 38 years of experience in early childhood education, oversees 500+ early childhood centers. Her expertise in developmentally appropriate practices and alternative assessment approaches ensures a strong foundation for reimagining how young learners are evaluated - fostering joyful, inclusive, and meaningful learning experiences from the earliest years.
                    </p>
                </div>
            </div>

            @elseif($val == 'Dr. Jes�s Jara')


            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
                data-aos-delay="200"><img
                    src="https://sparkolympiads.com/assets/img/Steering_Committee/jesus Jara.png"
                    alt="" class="img-fluid services-img">
            </div>
            <div class="col-lg-8">
                <h3 class="font">Dr. Jes�s Jara, AI in K12 Assessment, ISCAR</h3>

                <h5 class="font">K-12 Global Practice Leader, Prometric</h5>

                <p class="font">
                    Dr. Jes�s Jara guides strategy and solutions for school systems worldwide. With over 25 years of experience in public education, he is known for advancing equity, improving student outcomes, and driving systemic innovation. Before joining Prometric, Dr. Jara was Superintendent of the Clark County School District�one of the largest in the U.S. - where he led efforts that increased graduation rates, expanded AP participation, and improved math proficiency. At Prometric, he supports the integration of AI-powered assessment tools to strengthen student learning and district performance.
                </p>

            </div>
        </div>

        @elseif($val == 'Mrs. Abha Meghe')


        <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
            data-aos-delay="200"><img
                src="https://sparkolympiads.com/assets/img/Steering_Committee/abha meghe.png"
                alt="" class="img-fluid services-img">
        </div>
        <div class="col-lg-8">
            <h3 class="font">Mrs. Abha Meghe</h3>

            <h5 class="font">CEO, Meghe Group of Schools</h5>
            <p class="font">
                Mrs. Abha Meghe is a visionary educationist and the driving force behind the Meghe Group of Schools (MGS), a network of institutions committed to delivering globally benchmarked education rooted in Indian values. Under her leadership, MGS has expanded across Maharashtra, fostering academic excellence, innovation, and holistic development. She emphasizes nurturing 21st-century skills, cultural identity, and ethical values among students. Her insights are instrumental in shaping assessment practices that balance academic rigor with inclusivity and real-world relevance.
            </p>
        </div>
    </div>
    @elseif($val == 'Dr. Andrew Ordover')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/and.jpg"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Dr. Andrew Ordover, Ed.D.</h3>

        <h5 class="font">Vice President, Experience Design, Global K-12, Prometric</h5>
        <p class="font">
            Andrew Ordover, Ed.D., is Vice President of Experience Design for Prometric�s Global K-12 division. In this role, he leads product strategy, user experience, and solution development for school-focused offerings that help educators meet evolving instructional and assessment need
        </p>
    </div>
    </div>

    @elseif($val == 'Humphrey Chan')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/chan.jpg"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Humphrey Chan</h3>

        <h5 class="font">Senior Vice President and Managing Director, Asia Pacific, Prometric</h5>
        <p class="font">
            Humphrey Chan leads regional growth strategy and client engagement across corporate, governmental, and non-governmental sectors. His work supports the expansion of education and credentialing programs that meet regional workforce demands. With more than 20 years of experience in business development and digital transformation, Mr. Chan helps organizations across Asia Pacific implement scalable learning and assessment strategies. He directs corporate teams to deliver customized testing solutions that align with partner goals and regional priorities.
        </p>
    </div>
    </div>


    @elseif($val == 'Pamit Anand')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/pamit anand.jfif"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Pamit Anand</h3>

        <h5 class="font">Managing Director, Business Development � India, Prometric</h5>

        <p class="font">
            Pamit Anand leads business strategy, market growth, and client engagement across the region, working closely with corporate, government, and nonprofit partners to expand Prometric�s footprint in education, credentialing, and workforce development.
        </p>
        <p class="font">Mr. Anand brings nearly 20 years of experience in product and business leadership across Enterprise SaaS, EdTech, FinTech, and consumer technology sectors. Before joining Prometric, he led product and new business initiatives for Magicbricks, part of the Times of India Group. He also served as Deputy CEO of BeMasterly, an EdTech startup focused on competitive exams, and played a foundational role in scaling Shaadi.com, where he served as VP and Business Head.</p>
    </div>
    </div>

    @elseif($val == 'Vishnu Patro')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/vishnu patro.png"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Vishnu Patro, Test Delivery, ISCAR</h3>

        <h5 class="font">Director, Assessment Solutions � Emerging Markets, Prometric</h5>

        <p class="font">

            Vishnu Patro leads the design and delivery of solutions that address complex operational challenges for organisations across education, licensure, and certification. With more than 20 years of experience spanning operations management, customer service, and channel development, Mr. Patro plays a key role in ensuring successful, scalable test delivery in high-growth markets. He specializes in translating customer needs into viable, impactful solutions that support education and professional advancement.
        </p>
    </div>
    </div>


    @elseif($val == 'Pramod Sharma')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/pramod sharma.jfif"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Pramod Sharma</h3>

        <h5 class="font">Education Consultant</h5>

        <p class="font">

            With a distinguished career spanning over 53 years, Shri Pramod Sharma is a renowned figure in Indian and international education. Beginning as a teacher at The Doon School, Dehradun, he has also taught in Afghanistan and Nigeria. As Principal across eminent schools like Tashi Namgyal Academy, Yadavindra Public School, Mayo College, and Genesis Global School, he has led institutions to national prominence.

        </p>

        <p class="font">Honored with the National Award for Teachers by the President of India in 2000, he has also served on the Governing Body of CBSE and chaired the Indian Public Schools� Conference (IPSC), receiving IPSC�s Lifetime Achievement Award in 2008. </p>

        <p class="font">He is an Honorary Member of both Round Square and IPSC.He is currently President of IPSC Trust and was Member of Governing Body of NABET - Quality Council of India.</p>

    </div>
    </div>

    @elseif($val == 'Ms. Sneh Verma')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/sneh verma.png"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Ms. Sneh Verma</h3>

        <h5 class="font">Principal, Kulachi Hansraj Model School, Delhi</h5>

        <p class="font">

            Ms. Sneh Verma is a seasoned educationist with over 37 years of experience in school leadership and curriculum development. As Principal of Kulachi Hansraj Model School, she has been instrumental in implementing progressive pedagogies and fostering global collaborations. Her contributions have been recognized with accolades such as the CBSE State Award for Teachers and the Best Principal Award by the DAV Managing Committee. Ms. Verma's expertise in integrating technology and promoting inclusive education provides valuable insights into developing assessment frameworks that are equitable, innovative, and aligned with 21st-century learning goals.



        </p>

    </div>
    </div>

    @elseif($val == 'Dr. Punam Kashyap')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/punam kashyap.png"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Dr. Punam Kashyap</h3>

        <h5 class="font">Former Director - Delhi World Foundation</h5>

        <p class="font">
            Dr. Punam Kashyap is an accomplished educationist with over four decades of experience in curriculum reform, teacher training, and academic quality enhancement. She currently serves as Director of Education at the Delhi World Foundation nd is the Founder Director of Eduquest India. Widely respected for her contributions to school education, she has led numerous national-level training programs and academic audits. Her work reflects a deep commitment to inclusive, learner-centred practices and educational excellence. Dr. Kashyap has been recognized with numerous accolades, including a Lifetime Achievement Award from the Government of India.
        </p>
    </div>
    </div>

    @elseif($val == 'Ms. Sangeeta Krishan')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/sangeeta krishan.jfif"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Ms. Sangeeta Krishane</h3>

        <h5 class="font">Education Consultant</h5>

        <p class="font">

            Sangeeta Krishan is a seasoned educationist with over 30 years of experience in school systems and pedagogy. She served as Head of Training and Curriculum at Bharti Foundation, where she led curriculum development and teacher training initiatives. Her work has significantly contributed to competency-based education and inclusive classroom practices across Indian schools. With a keen understanding of academic frameworks and ground-level implementation, she offers valuable perspectives on integrating assessment with learning. Her guidance supports the development of evaluation systems that are fair, developmentally appropriate, and aligned with the evolving needs of both learners and educators.
        </p>

    </div>
    </div>

    @elseif($val == 'Giri Balasubramaniam')


    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up"
        data-aos-delay="200"><img
            src="https://sparkolympiads.com/assets/img/Steering_Committee/gir.jpg"
            alt="" class="img-fluid services-img">
    </div>
    <div class="col-lg-8">
        <h3 class="font">Giri Balasubramaniam</h3>

        <h5 class="font">Founder &amp; CEO, Greycaps | Quizmaster</h5>

        <p class="font">
            Giri Balasubramaniam, popularly known as "Pickbrain," is one of India�s most respected knowledge evangelists and the founder of Greycaps, Asia�s largest onstage quizzing and knowledge services company. With decades of experience in engaging young minds through innovation, curiosity, and critical thinking, he has redefined how knowledge is perceived and disseminated. His deep understanding of learner psychology and engagement strategies offers valuable inputs in designing assessments that move beyond rote learning�towards stimulating curiosity, real-world application, and lifelong learning among students.
        </p>
    </div>
    </div>

    @endif

    </div>
    </div>
    </div>
    </div>
    </div>
</section>
<!-- /Service Details Section -->

@endsection