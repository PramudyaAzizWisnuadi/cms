<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light"
    data-sidebar-image="none" data-preloader="disable" data-bs-theme="">

    <head>

        <meta charset="utf-8" />
        <title>MD Group | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="MD Group" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logomd.ico') }}">

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
        <link rel="stylesheet" href="{{ asset('assets/libs/aos/aos.css') }}" />

        <style>
            .theme-toggle {
                cursor: pointer;
            }

            .logo-kami img {
                width: 150px;
                /* Atur ukuran lebar gambar sesuai kebutuhan Anda */
                height: 150px;
                /* Atur ukuran tinggi gambar sesuai kebutuhan Anda */
                object-fit: contain;
                /* Pertahankan rasio aspek gambar */
                display: block;
                margin: 0 auto;
                /* Pusatkan gambar secara horizontal */
                padding: 1px;
                /* Atur jarak antara gambar dan border */
            }
        </style>
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
                            alt="logo dark" width="60" height="35">
                        <img src="{{ asset('assets/images/logo-md-group.jpg') }}" class="card-logo card-logo-light"
                            alt="logo light" width="60" height="35">
                    </a>
                    <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                            @if (!request()->routeIs('home'))
                                <li class="nav-item">

                                    <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href=" {{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href=" {{ route('home') }}#tentangkami">Tentang Kami</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href=" {{ route('home') }}#features">Features</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href=" {{ route('home') }}#contact">Kontak</a>
                                </li>
                            @endif
                            @if (!request()->routeIs('post.list', 'posts.show', 'posts.search'))
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold" href="#hero">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold" href="#tentangkami">Tentang Kami</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold" href="#features">Features</a>
                                </li> --}}

                                <li class="nav-item">
                                    <a class="nav-link fs-15 fw-semibold" href="#contact">Kontak</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link fs-15 fw-semibold {{ request()->routeIs('post.list', 'posts.show', 'posts.search') || request()->is('blog*') ? 'active' : '' }}"
                                    href="{{ route('post.list') }}">Blog</a>
                            </li>
                        </ul>

                    </div>
                    <ul class="navbar-nav ms-auto">
                        <!-- Other nav items -->
                        <li class="nav-item">
                            <div class="d-flex align-items-center">
                                <i class="ri-sun-line me-2"></i>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="theme-toggle"
                                        onclick="toggleTheme()">
                                </div>
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                    </ul>
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
                                    <img src="{{ asset('assets/images/logo-md-group.jpg') }}" alt="logo light"
                                        height="50">
                                </div>
                                <div class=mt-4 fs-13">
                                    <p>High Productivity & Technology</p>
                                    <p class="ff-secondary">You can build any type of web application like eCommerce,
                                        CRM, CMS, Project
                                        management apps, Admin Panels, etc using Velzon.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 ms-lg-auto">
                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Menu</h5>
                                    @if (!request()->routeIs('post.list', 'posts.show', 'posts.search'))
                                        <div class="text-muted mt-3">
                                            <ul class="list-unstyled ff-secondary footer-list fs-14">
                                                <li><a href="#hero">Home</a></li>
                                                <li><a href="#tentangkami">Tentang Kami</a></li>
                                                <li><a href="#contact">Kontak</a></li>
                                                <li><a href="{{ route('post.list') }}">Blog</a></li>
                                        </div>
                                    @endif
                                    @if (!request()->routeIs('home'))
                                        <div class="text-muted mt-3">
                                            <ul class="list-unstyled ff-secondary footer-list fs-14">
                                                <li><a href="{{ route('home') }}#hero">Home</a></li>
                                                <li><a href="{{ route('home') }}#tentangkami">Tentang Kami</a></li>
                                                <li><a href="{{ route('home') }}#contact">Kontak</a></li>
                                                <li><a href="{{ route('post.list') }}">Blog</a></li>
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
                                    @if (!request()->routeIs('post.list', 'posts.show', 'posts.search'))
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
                                    </script> © MD - Group
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
                                        <a target="_blank" href="https://www.instagram.com/{{ $sosial->instagram }}/"
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
            <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
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
    </body>

</html>
