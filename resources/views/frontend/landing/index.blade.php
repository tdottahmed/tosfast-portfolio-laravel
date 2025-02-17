<x-layouts.frontend.master>
    <!-- Banner area start here -->
    @include('frontend.landing.partials.banner', compact('banners'))
    <!-- Banner area end here -->

    <!-- Service area start here -->
    @include('frontend.landing.partials.service-area', compact('services'))
    <!-- Service area end here -->

    <!-- Case area start here -->
    @include('frontend.landing.partials.case-area', compact('products'))
    <!-- Case area end here -->

    <!-- About area start here -->
    @include('frontend.landing.partials.about-area')
    <!-- About area end here -->

    <!-- Offer area start here -->
    @include('frontend.landing.partials.offer-area')
    <!-- Offer area end here -->

    <!-- Counter area start here -->
    @include('frontend.landing.partials.counter-area')
    <!-- Counter area end here -->
    <!-- Process area start here -->
    @include('frontend.landing.partials.process-area')
    <!-- Process area end here -->

    <!-- Testimonial area start here -->
    @include('frontend.landing.partials.testimonial-area')
    <!-- Testimonial area end here -->

    <!-- Blog area start here -->
    @include('frontend.landing.partials.blog-area')
    <!-- Blog area end here -->
</x-layouts.frontend.master>
