<section class="service-area pt-120 pb-120">
    <div class="service__shape wow slideInRight">
        <img class="sway_Y__animation" src="assets/frontend/images/shape/service-bg-shape.png" alt="shape">
    </div>
    <div class="container">
        <div class="d-flex flex-wrap gap-4 align-items-center justify-content-between mb-60">
            <div class="section-header">
                <h5 class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <img class="me-1" src="{{ asset('assets/frontend/images/icon/section-title.png') }}"
                        alt="icon">
                    What We OFFER
                </h5>
                <h2 class="wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">Excellent It
                    Services</h2>
            </div>
            <a href="{{ route('frontend.service') }}" class="btn-one wow fadeInUp" data-wow-delay="200ms"
                data-wow-duration="1500ms">View
                All
                Services <i class="fa-regular fa-arrow-right-long"></i></a>
        </div>
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="00ms" data-wow-duration="1000ms">
                    <div class="service__item">
                        <div class="service-shape">
                            <img src="{{ asset('assets/frontend/images/shape/service-item-shape.png') }}"
                                alt="shape">
                        </div>
                        <div class="service__icon">
                            <img src="{{ asset('assets/frontend/images/icon/service-icon' . $loop->iteration . '.png') }}"
                                alt="icon">
                        </div>
                        <h4><a href="{{ route('frontend.serviceSingle', $service->id) }}">{{ $service->title }}</a></h4>
                        <p>{!! str($service->description)->limit(150) !!}</p>
                        <a class="read-more-btn" href="{{ route('frontend.serviceSingle', $service->id) }}">Read
                            More <i class="fa-regular fa-arrow-right-long"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
