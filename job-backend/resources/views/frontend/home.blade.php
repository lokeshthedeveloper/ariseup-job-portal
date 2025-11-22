@extends('layouts.frontend')

@section('title', 'Home - ' . config('app.name'))
@section('meta_description', 'Find your dream job or hire top talent. Browse thousands of jobs from leading companies.')
@section('body-class', 'index-page')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

        <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="" data-aos="fade-in">

        <div class="container position-relative">

            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2>LAUNCH YOUR OWN BRANDED JOB PORTAL</h2>
                <p>The Ultimate White-Label ERP Solution for Recruitment Agencies & Consultancies</p>
            </div><!-- End Welcome -->

            <div class="content row gy-4">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                        <h3>Why Choose Our ERP?</h3>
                        <p>
                            Empower your recruitment business with a fully customizable, white-label job portal.
                            Map your own domain, use your branding, and leverage our powerful infrastructure to
                            manage employers, candidates, and job postings efficiently.
                        </p>
                        <div class="text-center">
                            <a href="#about" class="more-btn"><span>Learn More</span> <i
                                    class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box -->

                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="row gy-4">

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                    <i class="bi bi-briefcase"></i>
                                    <h4>10,000+ Jobs</h4>
                                    <p>Browse thousands of job opportunities from leading companies across industries</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                    <i class="bi bi-building"></i>
                                    <h4>5,000+ Companies</h4>
                                    <p>Connect with verified employers actively looking for talented professionals</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                    <i class="bi bi-people"></i>
                                    <h4>50,000+ Job Seekers</h4>
                                    <p>Join our growing community of professionals advancing their careers</p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>
                </div>
            </div><!-- End  Content-->

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 order-2 order-lg-1 content">
                    <h3>Why Choose Our ERP?</h3>
                    <p class="fst-italic">
                        Our Job Portal ERP System is a fully white-labeled, multi-tenant recruitment platform that allows
                        you to launch your own branded job portal using your custom domain.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span><strong>Fully White Label:</strong> Full brand ownership
                                with no reference to us.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span><strong>Custom Domain Integration:</strong> Host on your
                                own domain (e.g., jobs.yourcompany.com).</span></li>
                        <li><i class="bi bi-check2-all"></i> <span><strong>All-in-One Ecosystem:</strong> Manage employers,
                                candidates, and referrals in one place.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span><strong>No Hosting Headache:</strong> We handle the
                                server, database, and technology.</span></li>
                    </ul>
                    <p>
                        Ideal for consultancy firms, recruitment agencies, HR companies, and training institutes. Scale your
                        business with our centralized infrastructure and powerful features.
                    </p>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background">

        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="" data-aos="fade-in">

        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Jobs Posted</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Portals Hosted</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="8500" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Total Candidates</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="120" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Agencies Trust Us</p>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Solutions</h2>
            <p>Comprehensive features to power your recruitment business</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-globe"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Domain & Branding</h3>
                        </a>
                        <p>Register your own domain, point nameservers, and customize your portal's logo, colors, and layout
                            to match your brand identity.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-file-earmark-richtext"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Resume Builder</h3>
                        </a>
                        <p>Built-in resume writing system with professional templates, multiple layouts, ATS-friendly
                            formats, and PDF downloads.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Employer Management</h3>
                        </a>
                        <p>Manage employers, job postings, and applications. Support for various job types including Free,
                            Premium, Urgent, and E-Hire.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Public Profiles</h3>
                        </a>
                        <p>Each candidate gets a shareable public profile URL with bio, skills, experience, and portfolio.
                            SEO optimized with multiple layouts.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-share"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Referral Network</h3>
                        </a>
                        <p>Empower referral partners to register, refer candidates, track earnings, and manage commissions
                            through a dedicated dashboard.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Analytics & Reports</h3>
                        </a>
                        <p>Comprehensive dashboards for companies, employers, and referrals showing job performance,
                            applicant quality, and income reports.</p>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pricing Plans</h2>
            <p>Choose the perfect ERP subscription for your agency</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item">
                        <h3>Starter ERP</h3>
                        <h4><sup>$</sup>199<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>1 Custom Domain</span></li>
                            <li><i class="bi bi-check"></i> <span>Basic Branding</span></li>
                            <li><i class="bi bi-check"></i> <span>Up to 50 Active Jobs</span></li>
                            <li><i class="bi bi-check"></i> <span>Candidate Database (500)</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>Referral System</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>API Access</span></li>
                        </ul>
                        <a href="#" class="buy-btn">Start Free Trial</a>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-item featured">
                        <h3>Growth ERP</h3>
                        <h4><sup>$</sup>499<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>1 Custom Domain</span></li>
                            <li><i class="bi bi-check"></i> <span>Advanced Branding</span></li>
                            <li><i class="bi bi-check"></i> <span>Unlimited Active Jobs</span></li>
                            <li><i class="bi bi-check"></i> <span>Candidate Database (5000)</span></li>
                            <li><i class="bi bi-check"></i> <span>Referral System</span></li>
                            <li><i class="bi bi-check"></i> <span>Resume Builder Access</span></li>
                        </ul>
                        <a href="#" class="buy-btn">Start Free Trial</a>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="pricing-item">
                        <h3>Enterprise</h3>
                        <h4>Custom<span> Pricing</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Multiple Domains</span></li>
                            <li><i class="bi bi-check"></i> <span>Full White-Label</span></li>
                            <li><i class="bi bi-check"></i> <span>Unlimited Everything</span></li>
                            <li><i class="bi bi-check"></i> <span>Dedicated Server</span></li>
                            <li><i class="bi bi-check"></i> <span>Custom Features</span></li>
                            <li><i class="bi bi-check"></i> <span>Priority Support</span></li>
                        </ul>
                        <a href="#" class="buy-btn">Contact Sales</a>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

        </div>

    </section><!-- /Pricing Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3>Success Stories</h3>
                    <p>
                        Hear from recruitment agencies and consultancies that have scaled their business using our
                        White-Label ERP System.
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

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
              }
            }
          </script>
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            class="testimonial-img shrink-0" alt="">
                                        <div>
                                            <h3>James Wilson</h3>
                                            <h4>CEO, Wilson Recruitment</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Switching to this ERP system was the best decision for our agency. The
                                            white-label feature allowed us to launch our own branded portal in days, not
                                            months.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            class="testimonial-img shrink-0" alt="">
                                        <div>
                                            <h3>Sarah Jenkins</h3>
                                            <h4>Director, HR Solutions Inc.</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>The employer management and resume builder tools have streamlined our
                                            operations significantly. Our clients love the new portal interface.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            class="testimonial-img shrink-0" alt="">
                                        <div>
                                            <h3>Michael Ross</h3>
                                            <h4>Founder, TechTalent Search</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>The referral network system helped us expand our candidate pool exponentially.
                                            Highly recommended for any growing recruitment firm.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Call To Action Section -->
    <section id="cta" class="services section">

        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2>Ready to Scale Your Agency?</h2>
                    <p class="my-4">Join hundreds of recruitment agencies and consultancies already using our ERP system.
                        Launch your branded portal today.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('company.register') }}" class="btn-get-started">Start Free Trial</a>
                        <a href="{{ route('contact') }}" class="btn-get-started"
                            style="background: transparent; border: 2px solid #3fbbc0; color: #3fbbc0;">Contact Sales</a>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Call To Action Section -->

@endsection

@push('styles')
    <style>
        .btn-get-started {
            display: inline-block;
            padding: 12px 30px;
            background: #3fbbc0;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-get-started:hover {
            background: #65c9cd;
            color: #fff;
        }

        .service-item ul {
            list-style: none;
            padding: 0;
        }

        .service-item ul li {
            padding: 5px 0;
        }
    </style>
@endpush
