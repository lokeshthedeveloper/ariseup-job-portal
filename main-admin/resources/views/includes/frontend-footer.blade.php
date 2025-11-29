<footer id="footer" class="footer modern-footer">
    <div class="footer-main">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-about">
                        <a href="{{ route('home') }}" class="footer-logo">
                            <h3>{{ config('app.name') }}</h3>
                        </a>
                        <p class="mt-3">Launch your fully-branded job portal with zero technical hassle. The ultimate
                            white-label solution for recruitment agencies.</p>
                        <div class="social-links mt-4">
                            <a href="{{ config('app.social_twitter', '#') }}"><i class="bi bi-twitter-x"></i></a>
                            <a href="{{ config('app.social_facebook', '#') }}"><i class="bi bi-facebook"></i></a>
                            <a href="{{ config('app.social_instagram', '#') }}"><i class="bi bi-instagram"></i></a>
                            <a href="{{ config('app.social_linkedin', '#') }}"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-links">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('home') }}#features">Features</a></li>
                            <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                            <li><a href="{{ route('blog.index') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-links">
                        <h4>Solutions</h4>
                        <ul>
                            <li><a href="#">White-Label Portal</a></li>
                            <li><a href="#">Resume Builder</a></li>
                            <li><a href="#">Job Posting</a></li>
                            <li><a href="#">Referral System</a></li>
                            <li><a href="#">Analytics</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-contact">
                        <h4>Get In Touch</h4>
                        <p><i class="bi bi-geo-alt"></i> {{ config('app.address_line1', 'Your Address') }}</p>
                        <p><i class="bi bi-telephone"></i> {{ config('app.contact_phone', '+1 234 567 890') }}</p>
                        <p><i class="bi bi-envelope"></i> {{ config('app.contact_email', 'info@example.com') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} <strong>{{ config('app.name') }}</strong>. All Rights
                        Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        <a href="#">Privacy Policy</a> •
                        <a href="#">Terms of Service</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top">
    <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Preloader -->
<div id="preloader"></div>

<style>
    .modern-footer {
        background: linear-gradient(135deg, #1565C0 0%, #1976D2 100%);
        color: #fff;
    }

    .footer-main {
        padding: 60px 0 30px;
    }

    .footer-logo h3 {
        color: #fff;
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .footer-about p {
        color: #fff !important;
        line-height: 1.8;
        opacity: 0.9;
    }

    .social-links {
        display: flex;
        gap: 10px;
    }

    .social-links a {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        color: #fff !important;
        transition: all 0.3s ease;
    }

    .social-links a:hover {
        background: #fff;
        color: #2196F3 !important;
        transform: translateY(-5px);
    }

    .footer-links h4,
    .footer-contact h4 {
        color: #fff !important;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-links h4::after,
    .footer-contact h4::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: #fff;
        border-radius: 3px;
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links ul li {
        padding: 8px 0;
    }

    .footer-links ul li a {
        color: #fff !important;
        opacity: 0.9;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .footer-links ul li a:hover {
        opacity: 1;
        padding-left: 5px;
        color: #fff !important;
    }

    .footer-contact p {
        color: #fff !important;
        opacity: 0.9;
        padding: 8px 0;
        display: flex;
        align-items: start;
        gap: 10px;
    }

    .footer-contact i {
        color: #fff !important;
        font-size: 1.1rem;
        margin-top: 3px;
    }

    .footer-bottom {
        background: rgba(0, 0, 0, 0.2);
        padding: 20px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-bottom p {
        margin: 0;
        color: #fff !important;
        opacity: 0.9;
    }

    .footer-bottom a {
        color: #fff !important;
        opacity: 0.9;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-bottom a:hover {
        opacity: 1;
        color: #fff !important;
    }

    .scroll-top {
        position: fixed;
        right: 20px;
        bottom: 20px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.5rem;
        box-shadow: 0 5px 20px rgba(33, 150, 243, 0.4);
        transition: all 0.3s ease;
        opacity: 0;
        visibility: hidden;
        z-index: 996;
    }

    .scroll-top.active {
        opacity: 1;
        visibility: visible;
    }

    .scroll-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(33, 150, 243, 0.6);
    }
</style>

<script>
    // Scroll to top button
    const scrollTop = document.querySelector('.scroll-top');
    if (scrollTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                scrollTop.classList.add('active');
            } else {
                scrollTop.classList.remove('active');
            }
        });

        scrollTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Hide preloader
    window.addEventListener('load', () => {
        const preloader = document.getElementById('preloader');
        if (preloader) {
            preloader.style.display = 'none';
        }
    });
</script>
