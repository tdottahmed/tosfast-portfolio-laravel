<header class="header-area">
    <div class="container header__container">
        <div class="header__main">
            <a href="{{ route('frontend.home') }}" class="logo">
                <img src="{{ getFilePath(getSetting('app_logo')) }}" alt="logo">
            </a>
            <div class="main-menu">
                <nav>
                    <ul>
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li><a href="{{ route('frontend.about') }}">About</a></li>
                        <li><a href="{{ route('frontend.products') }}">Products</a></li>
                        <li><a href="{{ route('frontend.service') }}">Services</a></li>
                        <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                        <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="d-none d-lg-inline-block">
                <a href="{{ route('frontend.contact') }}" class="btn-one">Get A Quote <i
                        class="fa-regular fa-arrow-right-long"></i></a>
            </div>
            <div class="bars d-block d-lg-none">
                <i id="openButton" class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>
</header>
