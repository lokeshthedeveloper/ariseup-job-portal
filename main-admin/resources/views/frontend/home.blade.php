@extends('layouts.frontend')

@section('title', 'Home - ' . config('app.name'))
@section('meta_description', 'Find your dream job or hire top talent. Browse thousands of jobs from leading companies.')
@section('body-class', 'index-page')

@section('content')

    <!-- Hero Section with Banner -->
    <section id="hero" class="hero-section">
        <div class="hero-background">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Team collaboration">
            <div class="hero-overlay"></div>
        </div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="hero-content">
                        <span class="hero-badge">
                            <i class="bi bi-stars"></i> #1 White-Label Job Portal Solution
                        </span>
                        <h1 class="display-2 fw-bold mb-4">
                            Build Your<br>
                            <span class="text-gradient">Dream Job Portal</span><br>
                            In Minutes
                        </h1>
                        <p class="lead mb-5">
                            Launch your fully-branded recruitment platform with zero technical hassle.
                            Join 250+ agencies already transforming their recruitment business.
                        </p>
                        <div class="hero-cta d-flex gap-3 flex-wrap">
                            <a href="{{ route('company.register') }}" class="btn btn-primary btn-lg">
                                <i class="bi bi-rocket-takeoff me-2"></i>Start Free Trial
                            </a>
                            <a href="#features" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-play-circle me-2"></i>See How It Works
                            </a>
                        </div>
                        <div class="hero-stats mt-5">
                            <div class="row">
                                <div class="col-4">
                                    <div class="stat-box">
                                        <h3>250+</h3>
                                        <p>Portals</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-box">
                                        <h3>10K+</h3>
                                        <p>Jobs</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-box">
                                        <h3>50K+</h3>
                                        <p>Candidates</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left">
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            class="img-fluid rounded-4 shadow-lg" alt="Dashboard Preview">
                        <div class="floating-badge badge-1">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>99.9% Uptime</span>
                        </div>
                        <div class="floating-badge badge-2">
                            <i class="bi bi-shield-check text-primary"></i>
                            <span>SSL Secured</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="section bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-4 fw-bold mb-3">How It Works</h2>
                <p class="lead text-muted">Get your job portal live in 3 simple steps</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-card text-center">
                        <div class="process-number">1</div>
                        <div class="process-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <h3 class="h4 mt-4 mb-3">Sign Up</h3>
                        <p class="text-muted">Create your account in seconds. No credit card required for trial.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-card text-center">
                        <div class="process-number">2</div>
                        <div class="process-icon">
                            <i class="bi bi-palette-fill"></i>
                        </div>
                        <h3 class="h4 mt-4 mb-3">Customize</h3>
                        <p class="text-muted">Add your branding, logo, colors, and connect your domain.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="process-card text-center">
                        <div class="process-number">3</div>
                        <div class="process-icon">
                            <i class="bi bi-rocket-takeoff-fill"></i>
                        </div>
                        <h3 class="h4 mt-4 mb-3">Launch</h3>
                        <p class="text-muted">Go live and start posting jobs, managing candidates instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section with Background -->
    <section id="features" class="features-section section">
        <div class="features-background">
            <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Office workspace">
            <div class="features-overlay"></div>
        </div>
        <div class="container position-relative">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-4 fw-bold text-white mb-3">Powerful Features</h2>
                <p class="lead text-white-50">Everything you need to run a successful job portal</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-globe2"></i>
                        </div>
                        <h4 class="mt-3 mb-2">Custom Domain</h4>
                        <p class="text-muted mb-0">Use your own domain with SSL included</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-file-earmark-richtext"></i>
                        </div>
                        <h4 class="mt-3 mb-2">Resume Builder</h4>
                        <p class="text-muted mb-0">AI-powered resume creation tools</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-building"></i>
                        </div>
                        <h4 class="mt-3 mb-2">Employer Dashboard</h4>
                        <p class="text-muted mb-0">Complete job posting & tracking system</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <h4 class="mt-3 mb-2">Candidate Profiles</h4>
                        <p class="text-muted mb-0">SEO-optimized public profiles</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h4 class="mt-3 mb-2">Referral Network</h4>
                        <p class="text-muted mb-0">Built-in partner commission system</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h4 class="mt-3 mb-2">Analytics</h4>
                        <p class="text-muted mb-0">Comprehensive reports & insights</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                    <h2 class="display-5 fw-bold mb-4">Why Choose Us?</h2>
                    <div class="benefit-list">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">100% White Label</h5>
                                <p class="text-muted mb-0">Complete brand ownership with zero traces of our platform</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">No Technical Skills Required</h5>
                                <p class="text-muted mb-0">Launch your portal without any coding or technical knowledge</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">Scalable Infrastructure</h5>
                                <p class="text-muted mb-0">Handle unlimited jobs and candidates as you grow</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">24/7 Support</h5>
                                <p class="text-muted mb-0">Get help whenever you need it from our expert team</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        class="img-fluid rounded-4 shadow" alt="Business meeting">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="stats-section section">
        <div class="stats-background">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Statistics">
            <div class="stats-overlay"></div>
        </div>
        <div class="container position-relative">
            <div class="row text-center text-white">
                <div class="col-lg-3 col-6 mb-4 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="counter-box">
                        <i class="bi bi-briefcase-fill mb-3"></i>
                        <h2 class="counter-number mb-2">10,000+</h2>
                        <p class="mb-0">Jobs Posted</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-4 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="counter-box">
                        <i class="bi bi-building mb-3"></i>
                        <h2 class="counter-number mb-2">250+</h2>
                        <p class="mb-0">Portals Hosted</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="counter-box">
                        <i class="bi bi-people-fill mb-3"></i>
                        <h2 class="counter-number mb-2">50,000+</h2>
                        <p class="mb-0">Active Users</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="counter-box">
                        <i class="bi bi-globe mb-3"></i>
                        <h2 class="counter-number mb-2">25+</h2>
                        <p class="mb-0">Countries</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-4 fw-bold mb-3">Simple Pricing</h2>
                <p class="lead text-muted">Choose the plan that fits your needs</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-box">
                        <div class="pricing-header">
                            <h4 class="mb-3">Starter</h4>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">199</span>
                                <span class="period">/month</span>
                            </div>
                        </div>
                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> 1 Custom Domain</li>
                            <li><i class="bi bi-check-circle-fill"></i> Up to 50 Jobs</li>
                            <li><i class="bi bi-check-circle-fill"></i> 500 Candidates</li>
                            <li><i class="bi bi-check-circle-fill"></i> Basic Support</li>
                            <li class="text-muted"><i class="bi bi-x-circle"></i> Referral System</li>
                        </ul>
                        <a href="{{ route('company.register') }}" class="btn btn-outline-primary w-100">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-box featured">
                        <div class="popular-tag">Most Popular</div>
                        <div class="pricing-header">
                            <h4 class="mb-3">Growth</h4>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">499</span>
                                <span class="period">/month</span>
                            </div>
                        </div>
                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> 1 Custom Domain</li>
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited Jobs</li>
                            <li><i class="bi bi-check-circle-fill"></i> 5,000 Candidates</li>
                            <li><i class="bi bi-check-circle-fill"></i> Priority Support</li>
                            <li><i class="bi bi-check-circle-fill"></i> Referral System</li>
                        </ul>
                        <a href="{{ route('company.register') }}" class="btn btn-primary w-100">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-box">
                        <div class="pricing-header">
                            <h4 class="mb-3">Enterprise</h4>
                            <div class="price-tag">
                                <span class="amount">Custom</span>
                            </div>
                        </div>
                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> Multiple Domains</li>
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited Everything</li>
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited Candidates</li>
                            <li><i class="bi bi-check-circle-fill"></i> Dedicated Support</li>
                            <li><i class="bi bi-check-circle-fill"></i> Custom Features</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">Contact Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section section bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-4 fw-bold mb-3">What Our Clients Say</h2>
                <p class="lead text-muted">Trusted by 250+ recruitment agencies worldwide</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <div class="quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-4">"The best decision we made was switching to this platform. Our portal was live in
                            days, not months!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-3"
                                width="50" alt="User">
                            <div>
                                <h6 class="mb-0">James Wilson</h6>
                                <small class="text-muted">CEO, Wilson Recruitment</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <div class="quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-4">"Outstanding platform with excellent support. Highly recommend for any
                            recruitment agency."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle me-3"
                                width="50" alt="User">
                            <div>
                                <h6 class="mb-0">Sarah Jenkins</h6>
                                <small class="text-muted">Director, HR Solutions</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <div class="quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-4">"Game-changer for our agency. The referral network feature alone paid for
                            itself!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/67.jpg" class="rounded-circle me-3"
                                width="50" alt="User">
                            <div>
                                <h6 class="mb-0">Michael Ross</h6>
                                <small class="text-muted">Founder, TechTalent</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-final-section section">
        <div class="container">
            <div class="cta-card-modern" data-aos="zoom-in">
                <div class="cta-content text-center">
                    <h2 class="display-4 fw-bold mb-4">Ready to Launch Your Portal?</h2>
                    <p class="lead mb-5 opacity-90">Join 250+ recruitment agencies already scaling their business with our
                        platform. Start your free trial today.</p>

                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ route('company.register') }}"
                            class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg">
                            <i class="bi bi-rocket-takeoff me-2 text-primary"></i>Start Free Trial
                        </a>
                        <a href="{{ route('contact') }}"
                            class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-bold">
                            <i class="bi bi-headset me-2"></i>Contact Sales
                        </a>
                    </div>

                    <div class="mt-4 text-white-50 small">
                        <i class="bi bi-check-circle-fill me-1"></i> No credit card required &nbsp;•&nbsp;
                        <i class="bi bi-check-circle-fill me-1"></i> 14-day free trial &nbsp;•&nbsp;
                        <i class="bi bi-check-circle-fill me-1"></i> Cancel anytime
                    </div>
                </div>

                <!-- Decorative Shapes -->
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>
    </section>

    <style>
        .cta-card-modern {
            background: linear-gradient(135deg, #2196F3 0%, #1565C0 100%);
            border-radius: 30px;
            padding: 80px 40px;
            position: relative;
            overflow: hidden;
            color: #fff !important;
            box-shadow: 0 20px 60px rgba(33, 150, 243, 0.3);
        }

        .cta-card-modern h2,
        .cta-card-modern p {
            color: #fff !important;
        }

        .cta-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-card-modern .btn-light {
            color: #1565C0;
            transition: all 0.3s ease;
        }

        .cta-card-modern .btn-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .cta-card-modern .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -50px;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            bottom: 50px;
            right: 20%;
            opacity: 0.5;
        }
    </style>

@endsection

@push('styles')
    <style>
        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 100vh;
            color: #fff !important;
            overflow: hidden;
        }

        .hero-section * {
            color: #fff !important;
        }

        .hero-section h1,
        .hero-section .display-2 {
            color: #fff !important;
        }

        .hero-section p,
        .hero-section .lead {
            color: #fff !important;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(33, 150, 243, 0.95) 0%, rgba(21, 101, 192, 0.9) 100%);
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-block;
            padding: 10px 25px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .text-gradient {
            background: linear-gradient(135deg, #fff 0%, #81D4FA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary {
            background: linear-gradient(135deg, #42A5F5 0%, #2196F3 100%);
            border: none;
            padding: 15px 35px;
            font-weight: 600;
            box-shadow: 0 4px 20px rgba(66, 165, 245, 0.4);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(66, 165, 245, 0.6);
        }

        .btn-outline-light {
            border: 2px solid #fff;
            padding: 15px 35px;
            font-weight: 600;
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .hero-stats .stat-box {
            text-align: center;
        }

        .hero-stats h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .hero-stats p {
            margin: 0;
            opacity: 0.9;
        }

        .hero-image-wrapper {
            position: relative;
        }

        .floating-badge {
            position: absolute;
            background: #fff;
            padding: 12px 20px;
            border-radius: 50px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            animation: float 3s ease-in-out infinite;
        }

        .badge-1 {
            top: 10%;
            right: -10%;
        }

        .badge-2 {
            bottom: 20%;
            left: -10%;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Process Cards */
        .process-card {
            background: #fff;
            padding: 3rem 2rem;
            border-radius: 20px;
            height: 100%;
            position: relative;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .process-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(33, 150, 243, 0.15);
        }

        .process-number {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #42A5F5 0%, #2196F3 100%);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }

        .process-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: #2196F3;
        }

        /* Features Section */
        .features-section {
            position: relative;
            padding: 100px 0;
        }

        .features-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .features-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .features-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(13, 71, 161, 0.93);
        }

        .feature-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-icon-wrapper {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #42A5F5 0%, #2196F3 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #fff;
        }

        /* Benefits */
        .benefit-list {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .benefit-item {
            display: flex;
            gap: 1.5rem;
        }

        .benefit-icon {
            font-size: 2rem;
            flex-shrink: 0;
        }

        /* Stats Counter */
        .stats-section {
            position: relative;
            padding: 100px 0;
        }

        .stats-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .stats-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .stats-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(21, 101, 192, 0.9) 0%, rgba(25, 118, 210, 0.9) 100%);
        }

        .counter-box i {
            font-size: 3rem;
            opacity: 0.9;
        }

        .counter-number {
            font-size: 3rem;
            font-weight: 700;
        }

        /* Pricing */
        .pricing-box {
            background: #fff;
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
        }

        .pricing-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(33, 150, 243, 0.2);
        }

        .pricing-box.featured {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            color: #fff;
            transform: scale(1.05);
        }

        .popular-tag {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #42A5F5 0%, #2196F3 100%);
            color: #fff;
            padding: 5px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .price-tag .currency {
            font-size: 1.5rem;
        }

        .price-tag .amount {
            font-size: 3.5rem;
            font-weight: 700;
        }

        .price-tag .period {
            font-size: 1rem;
            opacity: 0.7;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 2rem 0;
        }

        .pricing-features li {
            padding: 0.75rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .pricing-features i {
            font-size: 1.2rem;
        }

        /* Testimonials */
        .testimonial-card {
            background: #fff;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(33, 150, 243, 0.15);
        }

        .quote-icon {
            font-size: 3rem;
            color: #2196F3;
            opacity: 0.2;
            line-height: 1;
        }

        .stars i {
            color: #FFC107;
        }

        /* Final CTA */
        .cta-final-section {
            position: relative;
            padding: 120px 0;
        }

        .cta-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .cta-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cta-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(21, 101, 192, 0.92) 0%, rgba(33, 150, 243, 0.9) 100%);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                min-height: auto;
                padding: 4rem 0;
            }

            .display-2 {
                font-size: 2.5rem;
            }

            .display-3 {
                font-size: 2rem;
            }

            .hero-stats h3 {
                font-size: 1.8rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endpush
