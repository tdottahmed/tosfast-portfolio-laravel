<footer class="footer-area secondary-bg">
    <div class="footer__shape-regular-left wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
        <img src="{{ asset('assets/frontend/images/shape/footer-regular-left.png') }}" alt="shape">
    </div>
    <div class="footer__shape-solid-left wow slideInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
        <img class="sway_Y__animation" src="{{ asset('assets/frontend/images/shape/footer-solid-left.png') }}"
            alt="shape">
    </div>
    <div class="footer__shape-solid-right wow slideInRight" data-wow-delay="00ms" data-wow-duration="1500ms">
        <img class="sway_Y__animation" src="{{ asset('assets/frontend/images/shape/footer-regular-right.png') }}"
            alt="shape">
    </div>
    <div class="footer__shape-regular-right wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
        <img src="{{ asset('assets/frontend/images/shape/footer-solid-right.png') }}" alt="shape">
    </div>
    <div class="footer__shadow-shape">
        <img src="{{ asset('assets/frontend/images/shape/footer-shadow-shape.png') }}" alt="shodow">
    </div>
    <div class="container">
        <div class="footer__wrp pt-100 pb-100">
            <div class="footer__item item-big wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                <a href="index.html" class="logo mb-30">
                    <img src="{{ getFilePath(getSetting('app_logo')) }}" alt="image">
                </a>
                <p>Tosfast is a cutting-edge tech company specializing in business IT solutions. We empower businesses
                    with innovative software development, cloud solutions, and digital transformation services.At
                    Tosfast, we combine technology with strategy to drive
                    efficiency, security, and success.</p>
                <div class="social-icon">
                    <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#0"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#0"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer__item item-sm wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <h3 class="footer-title">IT Solution</h3>
                <ul>
                    <li><a href="{{ route('frontend.service') }}"><i class="fa-regular fa-angles-right me-1"></i> IT
                            Management</a></li>
                    <li><a href="{{ route('frontend.service') }}"><i class="fa-regular fa-angles-right me-1"></i> SEO
                            Optimization</a>
                    </li>
                    <li><a href="{{ route('frontend.service') }}"><i class="fa-regular fa-angles-right me-1"></i> Web
                            Development</a>
                    </li>
                    <li><a href="{{ route('frontend.service') }}"><i class="fa-regular fa-angles-right me-1"></i> Cyber
                            Security</a></li>
                    <li><a href="{{ route('frontend.service') }}"><i class="fa-regular fa-angles-right me-1"></i> Data
                            Security</a></li>
                </ul>
            </div>
            <div class="footer__item item-sm wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                <h3 class="footer-title">Quick Link</h3>
                <ul>
                    <li><a href="{{ route('frontend.about') }}"><i class="fa-regular fa-angles-right me-1"></i> About
                            Tosfast</a>
                    </li>
                    <li><a href="{{ route('frontend.service') }}"><i class="fa-regular fa-angles-right me-1"></i> Our
                            Services</a>
                    </li>

                    <li><a href="{{ route('frontend.products') }}"><i class="fa-regular fa-angles-right me-1"></i> Our
                            Projects</a>
                    </li>
                    <li><a href="{{ route('frontend.about') }}"><i class="fa-regular fa-angles-right me-1"></i> Our
                            Team</a></li>
                </ul>
            </div>
            <div class="footer__item item-big wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                <h3 class="footer-title">Contact Us</h3>
                <p class="mb-20">Mawna Chowrasta, Gazipur, Dhaka, Bangladesh</p>
                <ul class="footer-contact">
                    <li>
                        <i class="fa-regular fa-clock"></i>
                        <div class="info">
                            <h5>
                                Opening Hours:
                            </h5>
                            <p>Mon - Sat: 10.00 AM - 4.00 PM</p>
                        </div>
                    </li>
                    <li>
                        <i class="fa-duotone fa-phone"></i>
                        <div class="info">
                            <h5>
                                Phone Call:
                            </h5>
                            <p>+8801876525073,+8801921189005</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="container">
            <div class="d-flex gap-1 flex-wrap align-items-center justify-content-center">
                <p class="wow fadeInDown text-center" data-wow-delay="00ms" data-wow-duration="1500ms">&copy; All
                    Right Reserved {{ now()->year }} by <a href="/" class="text-danger">Tosfast</a></p>
            </div>
        </div>
    </div>
</footer>
