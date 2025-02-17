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
            <h2 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Services</h2>
            <div class="breadcrumb-list wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <a href="/">Home</a><span><i class="fa-regular fa-angles-right mx-2"></i>Services</span>
            </div>
        </div>
    </section>
    <!-- Page banner area end here -->

    <!-- Service area start here -->
    <section class="service-inner-area pt-120 pb-120">
        <div class="container">
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-two__item">
                            <div class="image">
                                <img src="{{ getFilePath($service->image) }}" alt="image"
                                    style="width: 100%;height: 250px;">
                            </div>
                            <div class="service-two__content">
                                <div class="icon">
                                    <img src="assets/frontend/images/icon/service-two-icon{{ $loop->iteration }}.png"
                                        alt="icon">
                                </div>
                                <div class="shape"><img src="assets/frontend/images/shape/service-two-item-shape.png"
                                        alt="shape"></div>
                                <h4><a href="{{ route('frontend.serviceSingle', $service->id) }}"
                                        class="primary-hover">{{ $service->title }}</a></h4>
                                <p>{!! str($service->description)->limit(150) !!}</p>
                                <a class="read-more-btn" href="{{ route('frontend.serviceSingle', $service->id) }}">Read
                                    More <i class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('frontend.landing.partials.case-area',compact('products'))
    <!-- Service area end here -->
</x-layouts.frontend.master>
