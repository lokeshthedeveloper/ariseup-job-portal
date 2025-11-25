@extends('layouts.frontend')

@section('title', 'Contact Us - ' . config('app.name'))
@section('meta_description', 'Get in touch with us. We\'re here to help you with any questions or concerns.')
@section('body-class', 'contact-page')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
            <h1>Contact Us</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Get in Touch</h2>
            <p>Have questions? We're here to help. Send us a message and we'll respond as soon as possible.</p>
        </div><!-- End Section Title -->

        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 270px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt shrink-0"></i>
                        <div>
                            <h3>Location</h3>
                            <p>{{ config('app.address_line1', 'A108 Adam Street') }},
                                {{ config('app.address_line2', 'New York, NY 535022') }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>{{ config('app.contact_phone', '+1 5589 55488 55') }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>{{ config('app.contact_email', 'info@example.com') }}</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6"
                                    placeholder="Message" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn-submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

@endsection

@push('styles')
    <style>
        .page-title {
            background: linear-gradient(rgba(63, 187, 192, 0.8), rgba(63, 187, 192, 0.8)), url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center center;
            background-size: cover;
            padding: 60px 0;
            margin-bottom: 60px;
        }

        .page-title h1 {
            color: #fff;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .breadcrumbs {
            margin-bottom: 20px;
        }

        .breadcrumbs ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 14px;
        }

        .breadcrumbs ol li+li {
            padding-left: 10px;
        }

        .breadcrumbs ol li+li::before {
            display: inline-block;
            padding-right: 10px;
            color: rgba(255, 255, 255, 0.7);
            content: "/";
        }

        .breadcrumbs ol a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
        }

        .breadcrumbs ol a:hover,
        .breadcrumbs ol .current {
            color: #fff;
        }

        .contact .info-item {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .contact .info-item i {
            font-size: 38px;
            color: #3fbbc0;
            margin-right: 20px;
        }

        .contact .info-item h3 {
            font-size: 20px;
            font-weight: 700;
            color: #2c4964;
            margin-bottom: 5px;
        }

        .contact .info-item p {
            margin: 0;
            color: #555;
            font-size: 14px;
        }

        .contact .php-email-form {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .contact .php-email-form .form-control {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 12px 15px;
            font-size: 14px;
        }

        .contact .php-email-form .form-control:focus {
            border-color: #3fbbc0;
            box-shadow: 0 0 0 0.2rem rgba(63, 187, 192, 0.25);
        }

        .contact .php-email-form textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .contact .php-email-form .btn-submit {
            background: #3fbbc0;
            color: #fff;
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
            cursor: pointer;
        }

        .contact .php-email-form .btn-submit:hover {
            background: #65c9cd;
        }
    </style>
@endpush
