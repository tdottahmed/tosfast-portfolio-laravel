<header class="header-area">
    <div class="container header__container">
        <div class="header__main">
            <a href="{{ route('frontend.home') }}" class="logo">
                <img src="{{ getSetting('light_logo') }}" alt="logo">
            </a>
            <div class="main-menu">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <li><a href="{{ route('frontend.about') }}">About</a></li>
                        <li>
                            <a href="{{ route('frontend.service') }}">Services</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.blog') }}">Blog</a>
                        </li>
                        <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                        <li class="ml-20 d-none d-lg-block"><a class="search-trigger" href="#0"><svg width="17"
                                    height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_307_344)">
                                        <path
                                            d="M16.0375 14.9381L12.0784 11.0334C13.0625 9.86621 13.6554 8.36744 13.6554 6.73438C13.6554 3.02103 10.5925 0 6.82774 0C3.0629 0 0 3.02103 0 6.73438C0 10.4475 3.0629 13.4683 6.82774 13.4683C8.4834 13.4683 10.0031 12.8836 11.1865 11.913L15.1456 15.8178C15.2687 15.9393 15.4301 16 15.5915 16C15.7529 16 15.9143 15.9393 16.0375 15.8178C16.2839 15.5748 16.2839 15.181 16.0375 14.9381ZM1.26142 6.73438C1.26142 3.70705 3.75845 1.24414 6.82774 1.24414C9.89695 1.24414 12.3939 3.70705 12.3939 6.73438C12.3939 9.76146 9.89695 12.2241 6.82774 12.2241C3.75845 12.2241 1.26142 9.76146 1.26142 6.73438Z"
                                            fill="#0F0D1D" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_307_344">
                                            <rect width="16.2222" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a></li>
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
