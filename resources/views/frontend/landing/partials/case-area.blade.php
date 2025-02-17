@push('styles')
    <style>
        .about-area,
        .about-two-area {
            overflow: hidden;
            position: relative;
            padding-bottom: 115px !important;
        }
    </style>
@endpush
<section class="about-area sub-bg">
    <div class="container d-flex flex-wrap gap-4 align-items-center justify-content-between mb-60">
        <div class="section-header">
            <h5 class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms" class="editable"
                data-key="section_header">
                <img class="me-1" src="assets/frontend/images/icon/section-title.png" alt="icon">
                FROM OUR CASE studies
            </h5>
            <h2 class="wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms" class="editable"
                data-key="section_title">
                We Delivered Best Solution
            </h2>
        </div>
        <a href="case.html" class="btn-one wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">view
            All
            Case <i class="fa-regular fa-arrow-right-long"></i></a>
    </div>
    <div class="swiper case__slider">
        <div class="swiper-wrapper">
            @foreach ($products as $product)
                <div class="swiper-slide">
                    <div class="case__item">
                        <div class="image case__image">
                            <img src="{{ getFilePath($product->image) }}" alt="image"
                                style="width: 100%;height: 400px;">
                        </div>
                        <div class="case__content">
                            <span class="primary-color sm-font" data-key="case_solution_1">Solution</span>
                            <h5><a href="{{ route('frontend.productSingle', $product->id) }}"
                                    class="text-white primary-hover" data-key="case_title_1">{{ $product->title }}</a>
                            </h5>
                        </div>
                        <a href="{{ route('frontend.productSingle', $product->id) }}" class="case__btn">
                            <i class="fa-regular fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-60 text-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
        <div class="dot case__dot"></div>
    </div>
</section>
