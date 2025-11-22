<footer class="footer skin-light-footer">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer-widget">
                        <img src="{{ asset('assets/img/logo.png') }}" class="img-footer" alt="JobStock">
                        <div class="footer-add">
                            <p>Find the best talent for your company<br>Connect with top professionals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title text-main">For Employers</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('company.register') }}">Register Your Company</a></li>
                            <li><a href="{{ route('company.login') }}">Sign In</a></li>
                            <li><a href="#">Post a Job</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title text-main">Quick Links</h4>
                        <ul class="footer-menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <p class="mb-0">© {{ date('Y') }} JobStock. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
