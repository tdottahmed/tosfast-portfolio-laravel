<section class="banner-area">
    <div class="banner__line">
        <img class="sway__animation" src="assets/frontend/images/banner/banner-line.png" alt="shape">
    </div>
    <div class="swiper banner__slider">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <div data-animation="slideInLeft" data-duration="2s" data-delay=".3s" class="banner__shape-left2">
                        <img src="assets/frontend/images/banner/banner-regular-left-shape.png" alt="shape">
                    </div>
                    <div data-animation="slideInLeft" data-duration="2s" data-delay=".9s" class="banner__shape-left1">
                        <img src="assets/frontend/images/banner/banner-solid-left-shape.png" alt="shape">
                    </div>
                    <div class="banner__shape-left3 wow slideInLeft">
                        <img class="sway__animation" src="assets/frontend/images/banner/banner-shape-left.png"
                            alt="shape">
                    </div>
                    <div class="banner__shape-right2" data-animation="slideInRight" data-duration="3s" data-delay=".3s">
                        <img src="assets/frontend/images/banner/banner-shape-right-line.png" alt="shape">
                    </div>
                    <div class="banner__shape-right1" data-animation="slideInRight" data-duration="2s" data-delay=".3s">
                        <img src="assets/frontend/images/banner/banner-shape-right.png" alt="shape">
                    </div>
                    <div class="banner__right-line1" data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                        <img src="assets/frontend/images/banner/banner-right-line1.png" alt="shape">
                    </div>
                    <div class="banner__right-line2" data-animation="slideInRight" data-duration="2s" data-delay=".7s">
                        <img src="assets/frontend/images/banner/banner-right-line2.png" alt="shape">
                    </div>
                    <div class="banner__right-line3" data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                        <img src="assets/frontend/images/banner/banner-right-line3.png" alt="shape">
                    </div>
                    <div class="banner__right-line4" data-animation="slideInRight" data-duration="2s" data-delay=".3s">
                        <img src="assets/frontend/images/banner/banner-right-line4.png" alt="shape">
                    </div>
                    <div class="slide-bg" data-background="{{ getFilePath($banner->image) }}"></div>
                    <div class="container">
                        <div class="banner__content">

                            <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s"
                                class="text-white editable">
                                {{ $banner->title }}
                            </h1>
                            <p data-animation="slideInRight" data-duration="2s" data-delay=".7s" class="mt-20">
                                {{ $banner->description }}
                            </p>
                            <a href="{{ route('frontend.contact') }}" data-animation="slideInRight" data-duration="2s"
                                data-delay=".9s" href="about.html" class="btn-one mt-60">Explore
                                More <i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <div class="banner__dot-wrp">
        <div class="dot-light banner__dot"></div>
    </div>
</section>
