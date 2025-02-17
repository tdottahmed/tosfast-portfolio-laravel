<x-layouts.frontend.master>
    <!-- Page banner area start here -->
    <section class="banner__inner-page bg-image pt-180 pb-180 bg-image"
        data-background="{{ asset('assets/frontend/images/banner/banner-inner-page.jpg') }}">
        <div class="shape2 wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
            <img src="{{ asset('assets/frontend/images/banner/inner-banner-shape2.png') }}" alt="shape">
        </div>
        <div class="shape1 wow slideInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
            <img src="{{ asset('assets/frontend/images/banner/inner-banner-shape1.png') }}" alt="shape">
        </div>
        <div class="shape3 wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
            <img class="sway__animationX" src="{{ asset('assets/frontend/images/banner/inner-banner-shape3.png') }}"
                alt="shape">
        </div>
        <div class="container">
            <h2 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ $product->title }}</h2>
            <div class="breadcrumb-list wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <a href="/">Home</a><span><i
                        class="fa-regular fa-angles-right mx-2"></i>{{ $product->title }}</span>
            </div>
        </div>
    </section>
    <!-- Page banner area end here -->

    <!-- Case area start here -->
    <section class="case-single-area pt-20 pb-20">
        <div class="container">
            <div class="case-single__item">

                <h3 class="case-single__title mt-40 mb-30">{{ $product->title }}</h3>
                <p>{!! $product->description !!}</p>
                <div class="image my-2">
                    <img src="{{ getFilePath($product->image) }}" alt="image">
                </div>

                <h3 class="case-single__title mt-40 mb-30">What we Provide</h3>

                <div class="case-challenge-list mt-30">
                    <ul class="case-challenge">
                        <li class="mb-3"><i class="fa-solid fa-check"></i>Technology Consultancy</li>
                        <li><i class="fa-solid fa-check"></i>Maintenance And Support</li>
                    </ul>
                    <ul class="case-challenge">
                        <li class="mb-3"><i class="fa-solid fa-check"></i>We Provide best services</li>
                        <li><i class="fa-solid fa-check"></i>Requirements Gathering</li>
                    </ul>
                    <ul class="case-challenge">
                        <li class="mb-3"><i class="fa-solid fa-check"></i>Maintenance And Support</li>
                        <li><i class="fa-solid fa-check"></i>Technology Consultancy</li>
                    </ul>
                </div>
                @include('frontend.landing.partials.service-area')
            </div>
        </div>
    </section>
    <!-- Case area end here -->
</x-layouts.frontend.master>
