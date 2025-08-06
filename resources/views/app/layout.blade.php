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

        <!-- glightbox css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}">
        <!--Swiper slider css-->
        <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Layout config Js -->
        <script src="{{ asset('assets/js/layout.js') }}"></script>
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- aos css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/aos/aos.css') }}" type="text/css" />

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


        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <!--Swiper slider js-->
        <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

        <!-- landing init -->
        <script src="{{ asset('assets/js/pages/landing.init.js') }}"></script>
        <!-- aos js -->
        <script src="{{ asset('assets/libs/aos/aos.js') }}"></script>
        <!-- glightbox js -->
        <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script>

        <!-- isotope-layout -->
        <script src="{{ asset('assets/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/gallery.init.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                AOS.init({
                    offset: window.innerWidth < 768 ? 50 : 120, // Sesuaikan offset untuk perangkat mobile
                    duration: window.innerWidth < 768 ? 400 : 800, // Sesuaikan durasi untuk perangkat mobile
                    easing: 'ease-in-out',
                    disable: 'mobile' // Nonaktifkan AOS pada perangkat mobile
                });
            });

            window.addEventListener('resize', function() {
                AOS.init({
                    offset: window.innerWidth < 768 ? 50 : 120, // Sesuaikan offset untuk perangkat mobile
                    duration: window.innerWidth < 768 ? 400 : 800, // Sesuaikan durasi untuk perangkat mobile
                    easing: 'ease-in-out',
                    disable: 'mobile' // Nonaktifkan AOS pada perangkat mobile
                });
            });
        </script>
        <script>
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
            AOS.init();
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
