<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light"
    data-sidebar-image="none" data-preloader="disable" data-bs-theme="">

    <head>

        <meta charset="utf-8" />
        <title>MD Group | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('description', 'MD Group - Organisasi Terpercaya')">
        <meta name="keywords" content="@yield('keywords', 'MD Group, organisasi, berita, galeri, promosi')">
        <meta name="author" content="MD Group">

        {{-- SEO Meta Tags --}}
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">

        {{-- Open Graph for Social Media --}}
        <meta property="og:title" content="@yield('title', 'MD Group')">
        <meta property="og:description" content="@yield('description', 'MD Group - Together We Thrive')">
        <meta property="og:image" content="@yield('image', asset('assets/images/logo-md-group.jpg'))">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="@yield('og_type', 'website')">
        <meta property="og:site_name" content="MD Group">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', 'MD Group')">
        <meta name="twitter:description" content="@yield('description', 'MD Group - Together We Thrive')">
        <meta name="twitter:image" content="@yield('image', asset('assets/images/logo-md-group.jpg'))">

        {{-- Additional Meta Tags --}}
        @stack('meta')

        {{-- Sitemap --}}
        <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ route('sitemap') }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logomd.ico') }}">

        <!-- Preload critical resources -->
        <link rel="preload" href="{{ asset('assets/css/bootstrap.min.css') }}" as="style">
        <link rel="preload" href="{{ asset('assets/css/icons.min.css') }}" as="style">

        <!-- Critical CSS - Load immediately -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Non-critical CSS - Load with defer -->
        <link rel="preload" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}">
        </noscript>

        <link rel="preload" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">
        </noscript>

        <!-- Layout config Js - Inline critical JS -->
        <script>
            // Critical inline JS for layout
            if (sessionStorage.getItem("defaultAttribute")) {
                var attributeValue = JSON.parse(sessionStorage.getItem("defaultAttribute"));
                var layout = attributeValue["data-layout"];
                document.getElementsByTagName("html")[0].setAttribute("data-layout", layout);
            }
        </script>

        <!-- Non-critical CSS - Load with defer -->
        <link rel="preload" href="{{ asset('assets/css/custom.min.css') }}" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}">
        </noscript>

        <!-- Load AOS CSS only on desktop devices -->
        <script>
            const isMobile = window.innerWidth <= 768 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                navigator.userAgent);
            if (!isMobile) {
                const aosLink = document.createElement('link');
                aosLink.rel = 'preload';
                aosLink.href = "{{ asset('assets/libs/aos/aos.css') }}";
                aosLink.as = 'style';
                aosLink.onload = function() {
                    this.rel = 'stylesheet';
                };
                document.head.appendChild(aosLink);
            }
        </script>

        <!-- Preconnect to external domains -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- Critical CSS Inline -->
        {!! criticalCSS() !!}

        <!-- Mobile Optimization CSS -->
        <style>
            /* Mobile Performance Optimization - Disable animations on mobile */
            @media (max-width: 768px) {

                /* Completely disable all animations on mobile */
                *,
                *::before,
                *::after {
                    animation-duration: 0s !important;
                    animation-delay: 0s !important;
                    transition-duration: 0s !important;
                    transition-delay: 0s !important;
                    transform: none !important;
                }

                /* Force opacity to 1 for all AOS elements */
                [data-aos] {
                    opacity: 1 !important;
                    transform: none !important;
                }

                /* Disable Bootstrap animations */
                .fade {
                    opacity: 1 !important;
                }

                .collapsing {
                    transition: none !important;
                }

                /* Disable carousel slide animation */
                .carousel-item {
                    transform: none !important;
                }

                .carousel.slide .carousel-item {
                    transform: none !important;
                }
            }

            /* Reduce motion for accessibility */
            @media (prefers-reduced-motion: reduce) {

                *,
                *::before,
                *::after {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                    scroll-behavior: auto !important;
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const iframes = document.querySelectorAll('iframe');
                iframes.forEach(iframe => {
                    const wrapper = document.createElement('div');
                    wrapper.classList.add('responsive-iframe');
                    iframe.parentNode.insertBefore(wrapper, iframe);
                    wrapper.appendChild(iframe);
                });
            });
        </script>
        <script>
            // Set theme on page load based on localStorage
            (function() {
                const savedTheme = localStorage.getItem('theme') || 'light';
                document.documentElement.setAttribute('data-bs-theme', savedTheme);
            })();
        </script>
    </head>

    <body data-bs-spy="scroll" data-bs-target="#navbar-example">

        <!-- Begin page -->
        <div class="layout-wrapper landing">
            <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo-md-group.jpg') }}" class="card-logo card-logo-dark"
                            alt="logo dark" width="70" height="40">
                        <img src="{{ asset('assets/images/logo-md-group.jpg') }}" class="card-logo card-logo-light"
                            alt="logo light" width="70" height="40">
                    </a>
                    <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0" id="navbar-example">
                            @if (!request()->routeIs('home'))
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href=" {{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href=" {{ route('home') }}#tentangkami">Tentang Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href=" {{ route('home') }}#contact">Kontak</a>
                                </li>
                            @endif
                            @if (!request()->routeIs('post.list', 'posts.show', 'posts.search', 'galery.index', 'promosi.index'))
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold" href="#hero">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold" href="#tentangkami">Tentang Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold" href="#contact">Kontak</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fs-15 fw-semibold" href="#"
                                    id="navbarEventDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Event
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarEventDropdown"
                                    data-bs-auto-close="outside">
                                    @forelse($events as $event)
                                        <li>
                                            <a target="_blank" class="dropdown-item"
                                                href="{{ $event->link }}">{{ $event->title }}</a>
                                        </li>
                                    @empty
                                        <li>
                                            <a class="dropdown-item disabled" href="#">Belum ada event
                                                mendatang</a>
                                        </li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('post.list', 'posts.show', 'posts.search') || request()->is('blog*') ? 'active' : '' }}"
                                    href="{{ route('post.list') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('promosi.index') ? 'active' : '' }} "
                                    href="{{ route('promosi.index') }}">Promosi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('galery.index') ? 'active' : '' }} "
                                    href="{{ route('galery.index') }}">Galery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-15 fw-semibold" href="https://shop.mdgroup.id">Shop Now</a>
                            </li>
                            <li class="nav-item">
                                <div class="d-flex nav-link fs-15 fw-semibold">
                                    <i class="ri-sun-line me-1"></i>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="theme-toggle"
                                            onclick="toggleTheme()">
                                    </div>
                                    <i class="ri-moon-line"></i>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <!-- end navbar -->
            <div class="vertical-overlay" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent.show">
            </div>

            @yield('konten')
            <footer class="custom-footer bg-dark py-5 position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mt-4">
                            <div>
                                <div>
                                    <img class="card-logo card-logo-dark"
                                        src="{{ asset('assets/images/logo-md-group.jpg') }}" alt="logo light"
                                        height="50">
                                    <img class="card-logo card-logo-light"
                                        src="{{ asset('assets/images/logo-md-group-putih.png') }}" alt="logo drak"
                                        height="50">
                                </div>
                                <div class="mt-4 fs-13">
                                    <p>High Productivity & Technology</p>
                                    {{-- <p class="ff-secondary">NPWP :
                                        {{ $sosial->telegram }}
                                    </p> --}}
                                    <p class="ff-secondary">Jl. Pemuda No.3, Kunden, Kec. Blora, Kabupaten Blora, Jawa
                                        Tengah, 58211
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 ms-lg-auto">
                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Menu</h5>
                                    @if (!request()->routeIs('post.list', 'posts.show', 'posts.search', 'galery.index', 'promosi.index'))
                                        <div class="text-muted mt-3">
                                            <ul class="list-unstyled ff-secondary footer-list fs-14">
                                                <li><a href="#hero">Home</a></li>
                                                <li><a href="#tentangkami">Tentang Kami</a></li>
                                                <li><a href="#contact">Kontak</a></li>
                                                <li><a href="{{ route('post.list') }}">Blog</a></li>
                                                <li><a href="{{ route('promosi.index') }}">Promosi</a></li>
                                                <li><a href="{{ route('galery.index') }}">Galery</a></li>
                                        </div>
                                    @endif
                                    @if (!request()->routeIs('home'))
                                        <div class="text-muted mt-3">
                                            <ul class="list-unstyled ff-secondary footer-list fs-14">
                                                <li><a href="{{ route('home') }}#hero">Home</a></li>
                                                <li><a href="{{ route('home') }}#tentangkami">Tentang Kami</a></li>
                                                <li><a href="{{ route('home') }}#contact">Kontak</a></li>
                                                <li><a href="{{ route('post.list') }}">Blog</a></li>
                                                <li><a href="{{ route('promosi.index') }}">Promosi</a></li>
                                                <li><a href="{{ route('galery.index') }}">Galery</a></li>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-4
                                                    mt-4">
                                    <h5 class="text-white mb-0">Pages</h5>
                                    <div class="text-muted mt-3">
                                        <ul class="list-unstyled ff-secondary footer-list fs-14">
                                            <li><a href="{{ route('post.list') }}">Blog</a></li>
                                            <li><a target="_blank"
                                                    href="https://maps.app.goo.gl/YwPziBYUUiTqwKjA7">Maps</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Support</h5>
                                    @if (!request()->routeIs('post.list', 'posts.show', 'posts.search', 'galery.index', 'promosi.index'))
                                        <div class="text-muted mt-3">
                                            <ul class="list-unstyled ff-secondary footer-list fs-14">
                                                <li><a href="#contact">Kontak</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                    @if (!request()->routeIs('home'))
                                        <div class="text-muted mt-3">
                                            <ul class="list-unstyled ff-secondary footer-list fs-14">
                                                <li><a href="{{ route('home') }}#contact">Kontak</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row text-center text-sm-start align-items-center mt-5">
                        <div class="col-sm-6">

                            <div>
                                <p class="copy-rights mb-0">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> © MD - Group | NPWP
                                    {{ $sosial->telegram }}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end mt-3 mt-sm-0">
                                <ul class="list-inline mb-0 footer-social-link">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/people/{{ $sosial->facebook }}/100088871923472/"
                                            target="_blank" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-facebook-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://wa.me/{{ $sosial->whatsapp }}/" target="_blank"
                                            class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-whatsapp-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.tiktok.com/{{ $sosial->tiktok }}/" target="_blank"
                                            class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-tiktok-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a target="_blank"
                                            href="https://www.instagram.com/{{ $sosial->instagram }}/?hl=id"
                                            class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-instagram-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end footer -->

            <!--start back-to-top-->
            <button onclick="topFunction()" class="btn btn-success btn-icon landing-back-top" id="back-to-top">
                <i class="ri-arrow-up-line"></i>
            </button>
            <!--end back-to-top-->

        </div>
        <!-- end layout wrapper -->


        <!-- JAVASCRIPT - Critical first -->
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Non-critical JavaScript - Load with defer -->
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}" defer></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}" defer></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins.js') }}" defer></script>

        <!-- Swiper slider js - Load when needed -->
        <script>
            // Lazy load Swiper
            function loadSwiper() {
                if (document.querySelector('.swiper')) {
                    const script = document.createElement('script');
                    script.src = "{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}";
                    script.onload = function() {
                        loadScript("{{ asset('assets/js/pages/landing.init.js') }}");
                    };
                    document.head.appendChild(script);
                }
            }

            // Lazy load AOS
            function loadAOS() {
                // Check if device is mobile
                const isMobile = window.innerWidth <= 768 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i
                    .test(navigator.userAgent);

                if (!isMobile) {
                    const script = document.createElement('script');
                    script.src = "{{ asset('assets/libs/aos/aos.js') }}";
                    script.onload = function() {
                        AOS.init({
                            offset: 120,
                            duration: 800,
                            easing: 'ease-in-out',
                            disable: false
                        });
                    };
                    document.head.appendChild(script);
                } else {
                    // On mobile, disable AOS completely
                    console.log('AOS disabled on mobile for better performance');
                }
            }

            // Helper function to load scripts
            function loadScript(src, callback) {
                const script = document.createElement('script');
                script.src = src;
                if (callback) script.onload = callback;
                document.head.appendChild(script);
            }

            // Lazy load gallery scripts when needed
            function loadGalleryScripts() {
                if (document.querySelector('.gallery-wrapper')) {
                    loadScript("{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}", function() {
                        loadScript("{{ asset('assets/libs/isotope-layout/isotope.pkgd.min.js') }}", function() {
                            loadScript("{{ asset('assets/js/pages/gallery.init.js') }}");
                        });
                    });
                }
            }

            // Load scripts on DOM ready
            document.addEventListener('DOMContentLoaded', function() {
                // Load essential scripts
                loadSwiper();
                loadAOS();
                loadGalleryScripts();
            });

            // Handle theme toggle
            function toggleTheme() {
                const htmlElement = document.documentElement;
                const currentTheme = htmlElement.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                htmlElement.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);

                // Update the switch state
                const themeToggle = document.getElementById('theme-toggle');
                themeToggle.checked = newTheme === 'dark';
            }

            // Set theme on page load based on localStorage
            document.addEventListener('DOMContentLoaded', () => {
                const savedTheme = localStorage.getItem('theme') || 'light';
                document.documentElement.setAttribute('data-bs-theme', savedTheme);

                // Update the switch state
                const themeToggle = document.getElementById('theme-toggle');
                themeToggle.checked = savedTheme === 'dark';
            });
        </script>
        <script>
            // Initialize AOS only on desktop devices
            document.addEventListener('DOMContentLoaded', function() {
                const isMobile = window.innerWidth <= 768 ||
                    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

                if (!isMobile && typeof AOS !== 'undefined') {
                    AOS.init();
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function autoOpenEventDropdown() {
                    // Cek jika lebar layar <= 991px (Bootstrap breakpoint untuk navbar mobile)
                    if (window.innerWidth <= 991) {
                        var dropdown = document.getElementById('navbarEventDropdown');
                        var dropdownMenu = dropdown && dropdown.nextElementSibling;
                        if (dropdownMenu && !dropdownMenu.classList.contains('show')) {
                            dropdownMenu.classList.add('show');
                            dropdown.setAttribute('aria-expanded', 'true');
                        }
                    } else {
                        // Hilangkan show jika bukan mobile
                        var dropdown = document.getElementById('navbarEventDropdown');
                        var dropdownMenu = dropdown && dropdown.nextElementSibling;
                        if (dropdownMenu && dropdownMenu.classList.contains('show')) {
                            dropdownMenu.classList.remove('show');
                            dropdown.setAttribute('aria-expanded', 'false');
                        }
                    }
                }

                // Jalankan saat navbar dibuka (collapse show)
                var navbar = document.getElementById('navbarSupportedContent');
                if (navbar) {
                    navbar.addEventListener('show.bs.collapse', autoOpenEventDropdown);
                    navbar.addEventListener('hide.bs.collapse', autoOpenEventDropdown);
                }

                // Jalankan juga saat resize
                window.addEventListener('resize', autoOpenEventDropdown);
            });
        </script>
    </body>

</html>
