<x-layouts.frontend.master>
    <!-- Page banner area start here -->
    <section class="banner__inner-page bg-image pt-180 pb-180 bg-image"
        data-background="assets/frontend/images/banner/banner-inner-page.jpg">
        <div class="shape2 wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
            <img src="assets/frontend/images/banner/inner-banner-shape2.png" alt="shape">
        </div>
        <div class="shape1 wow slideInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
            <img src="assets/frontend/images/banner/inner-banner-shape1.png" alt="shape">
        </div>
        <div class="shape3 wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
            <img class="sway__animationX" src="assets/frontend/images/banner/inner-banner-shape3.png" alt="shape">
        </div>
        <div class="container">
            <h2 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">About Us</h2>
            <div class="breadcrumb-list wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <a href="index.html">Home</a><span><i class="fa-regular fa-angles-right mx-2"></i>About
                    Us</span>
            </div>
        </div>
    </section>
    <!-- Page banner area end here -->

    <!-- About area start here -->
    @include('frontend.landing.partials.about-area')
    <!-- About area end here -->

    <!-- Offer area start here -->
    @include('frontend.landing.partials.offer-area')
    <!-- Offer area end here -->

    <!-- Brand area start here -->
    @include('frontend.landing.partials.brand-area')
    <!-- Brand area end here -->

    <!-- Case area start here -->
    @include('frontend.landing.partials.case-area')
    <!-- Case area end here -->

    <!-- Testimonial area start here -->
    @include('frontend.landing.partials.testimonial-area')
    <!-- Testimonial area end here -->

    <!-- Team area start here -->
    <section class="team-area pt-120 pb-120">
        <div class="container">
            <div class="section-header text-center mb-60">
                <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <img class="me-1" src="assets/frontend/images/icon/section-title.png" alt="icon">
                    OUR team
                </h5>
                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Our Leadership Team</h2>
            </div>
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="team__item">
                        <div class="image">
                            <img src="assets/frontend/images/team/team-image1.jpg" alt="image">
                        </div>
                        <div class="team__content">
                            <h4><a class="text-white" href="team-details.html">Kawser Ahmed</a></h4>
                            <span class="text-white">Web Designer</span>
                        </div>
                        <div class="team__share">
                            <ul>
                                <li>
                                    <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#0"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#0"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                            <button><i class="fa-sharp fa-light fa-share-nodes"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="team__item">
                        <div class="image">
                            <img src="assets/frontend/images/team/team-image2.jpg" alt="image">
                        </div>
                        <div class="team__content">
                            <h4><a class="text-white" href="team-details.html">Karniz Fatema</a></h4>
                            <span class="text-white">Customer Support</span>
                        </div>
                        <div class="team__share">
                            <ul>
                                <li>
                                    <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#0"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#0"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                            <button><i class="fa-sharp fa-light fa-share-nodes"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="team__item">
                        <div class="image">
                            <img src="assets/frontend/images/team/team-image3.jpg" alt="image">
                        </div>
                        <div class="team__content">
                            <h4><a class="text-white" href="team-details.html">Alex Pranto</a></h4>
                            <span class="text-white">UI/UX Designer</span>
                        </div>
                        <div class="team__share">
                            <ul>
                                <li>
                                    <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#0"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#0"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                            <button><i class="fa-sharp fa-light fa-share-nodes"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team area end here -->
</x-layouts.frontend.master>
