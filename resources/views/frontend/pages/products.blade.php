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
            <h2 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Products</h2>
            <div class="breadcrumb-list wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <a href="/">Home</a><span><i class="fa-regular fa-angles-right mx-2"></i>Products</span>
            </div>
        </div>
    </section>
    <!-- Page banner area end here -->

    <!-- Cause area start here -->
    <section class="case-area pt-120 pb-120">
        <div class="container">
            <div class="section-header text-center mb-60">
                <h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <img class="me-1" src="assets/frontend/images/icon/section-title.png" alt="icon">
                    Our Top notch Solution
                </h5>
                <h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Our All Products
                </h2>
            </div>
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="case__item">
                            <div class="image case__image">
                                <img src="{{ getFilePath($product->image) }}" alt="image"
                                    style="width: 100%;height: 400px;">
                            </div>
                            <div class="case__content">
                                <span class="primary-color sm-font">Business Solutions</span>
                                <h3><a href="{{ route('frontend.productSingle', $product->id) }}"
                                        class="text-white primary-hover">{{ $product->title }}</a></h3>
                            </div>
                            <a href="{{ route('frontend.productSingle', $product->id) }}" class="case__btn">
                                <i class="fa-regular fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('frontend.landing.partials.service-area', compact('services'))
    <!-- Cause area end here -->
</x-layouts.frontend.master>
