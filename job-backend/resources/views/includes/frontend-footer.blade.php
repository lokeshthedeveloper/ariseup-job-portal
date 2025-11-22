<footer id="footer" class="footer light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <span class="sitename">{{ config('app.name', 'JobPortal') }}</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>A fully white-labeled, multi-tenant recruitment platform. Launch your own branded job portal
                        using your custom domain on our centralized infrastructure.</p>
                    <p class="mt-3">{{ config('app.address_line1', 'A108 Adam Street') }}</p>
                    <p>{{ config('app.address_line2', 'New York, NY 535022') }}</p>
                    <p class="mt-3"><strong>Phone:</strong>
                        <span>{{ config('app.contact_phone', '+1 5589 55488 55') }}</span></p>
                    <p><strong>Email:</strong> <span>{{ config('app.contact_email', 'info@example.com') }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="{{ config('app.social_twitter', '#') }}"><i class="bi bi-twitter-x"></i></a>
                    <a href="{{ config('app.social_facebook', '#') }}"><i class="bi bi-facebook"></i></a>
                    <a href="{{ config('app.social_instagram', '#') }}"><i class="bi bi-instagram"></i></a>
                    <a href="{{ config('app.social_linkedin', '#') }}"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('home') }}#about">About Us</a></li>
                    <li><a href="{{ route('home') }}#services">Services</a></li>
                    <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Solutions</h4>
                <ul>
                    <li><a href="#">White-Label Hosting</a></li>
                    <li><a href="#">Resume Builder</a></li>
                    <li><a href="#">Employer Management</a></li>
                    <li><a href="#">Referral Network</a></li>
                    <li><a href="#">Mobile App</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>For Agencies</h4>
                <ul>
                    <li><a href="{{ route('company.register') }}">Start Free Trial</a></li>
                    <li><a href="{{ route('company.login') }}">Agency Login</a></li>
                    <li><a href="#">Request Demo</a></li>
                    <li><a href="#">Success Stories</a></li>
                    <li><a href="#">API Documentation</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Resources</h4>
                <ul>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="#">Knowledge Base</a></li>
                    <li><a href="{{ route('contact') }}">Contact Support</a></li>
                    <li><a href="#">System Status</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>&copy; <span>Copyright</span> <strong class="px-1 sitename">{{ config('app.name', 'JobPortal') }}</strong>
            <span>All Rights Reserved</span>
        </p>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
