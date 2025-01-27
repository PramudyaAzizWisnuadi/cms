@extends('app.layout')
@section('title', 'Home')
@section('konten')
    <!-- start hero section -->
    <section class="section pb-0 hero-section" id="hero">
        <div class="bg-overlay bg-overlay-pattern">
            {{-- <img src="{{ asset('assets/images/logo-md-group.jpg') }}" alt=""> --}}
        </div>
        <div class="container mb-10">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10">
                    <div class="text-center mt-lg-5 pt-5">
                        <div data-aos="zoom-in" data-aos-duration="2000" class="display-6 fw-bold mb-3 lh-base">
                            {!! convertRelativePathsToAbsolute($landingpage->home) !!}
                        </div>
                        <div data-aos="zoom-in-up"data-aos-duration="2500">
                            <div class="d-flex gap-2 justify-content-center mt-4">
                                <a href="#tentangkami" class="btn btn-primary">Get Started <i
                                        class="ri-arrow-right-line align-middle ms-1"></i></a>
                            </div>
                        </div>

                    </div>

                    <div data-aos="fade-up" data-aos-duration="1500" class="mt-4 mt-sm-5 pt-sm-5 mb-sm-n5 demo-carousel">
                        <div class="demo-img-patten-top d-none d-sm-block">
                            <img src="{{ asset('') }}assets/images/landing/img-pattern.png" class="d-block img-fluid"
                                alt="...">
                        </div>
                        <div class="demo-img-patten-bottom d-none d-sm-block">
                            <img src="{{ asset('') }}assets/images/landing/img-pattern.png" class="d-block img-fluid"
                                alt="...">
                        </div>
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <img src="{{ asset('') }}assets/images/demos/default.png" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('') }}assets/images/demos/saas.png" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('') }}assets/images/demos/material.png" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('') }}assets/images/demos/minimal.png" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('') }}assets/images/demos/creative.png" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('') }}assets/images/demos/modern.png" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('') }}assets/images/demos/interactive.png" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        <div class="position-absolute start-0 end-0 bottom-0 hero-shape-svg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,288L60,282.7C120,277,240,267,360,266.7C480,267,600,277,720,288C840,299,960,309,1080,293.3C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </div>
        <!-- end shape -->
    </section>
    <!-- end hero section -->

    <!-- start client section -->
    <div class="pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="text-center mt-5">
                        <h5 class="fs-20">Bagian dari kami :</h5>

                        <!-- Swiper -->
                        <div class="swiper trusted-client-slider mt-sm-5 mt-4 mb-sm-5 mb-4" dir="ltr">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo Olive.svg') }}" alt="client-img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo MD Mall New.png') }}" alt="client-img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo Holy Kids.png') }}" alt="client-img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo Utama Eight.png') }}" alt="client-img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo Olive.svg') }}" alt="client-img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo MD Mall New.png') }}" alt="client-img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo Holy Kids.png') }}" alt="client-img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="logo-kami">
                                        <img src="{{ asset('assets/images/Logo Utama Eight.png') }}" alt="client-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end client section -->

    <!-- start services -->
    <section class="section" id="tentangkami">
        <div data-aos="fade-down" data-aos-duration="2500" class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 ff-secondary fw-bold lh-base">Tentang Kami</h1>
                        <p class="text-muted">To achieve this, it would be necessary to have uniform grammar,
                            pronunciation and more common words. If several languages coalesce the grammar</p>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            {{-- <div class="row g-3">
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-pencil-ruler-2-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Creative Design</h5>
                            <p class="text-muted my-3">The creative design includes designs that are unique,
                                effective and memorable.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-palette-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Unlimited Colors</h5>
                            <p class="text-muted my-3">The collection of rules and guidelines which designers
                                use to communicate with users through appealing.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-lightbulb-flash-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Strategy Solutions</h5>
                            <p class="text-muted my-3">Business development firm that provides strategic
                                planning, market research services and project.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-customer-service-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Awesome Support</h5>
                            <p class="text-muted my-3">Awesome Support is the most versatile and feature-rich
                                support plugin for all version.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-stack-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Truly Multipurpose</h5>
                            <p class="text-muted my-3">You usually get a broad range of options to play with.
                                This enables you to use a single theme across multiple.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-settings-2-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Easy to customize</h5>
                            <p class="text-muted my-3">Personalise your own website, no matter what theme and
                                what customization options.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-slideshow-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Responsive & Clean Design</h5>
                            <p class="text-muted my-3">Responsive design is a graphic user interface (GUI)
                                design approach used to create content.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-google-fill fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Google Font Collection</h5>
                            <p class="text-muted my-3">Google Fonts is a collection of 915 fonts, all available
                                to use for free on your website.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm icon-effect">
                                <div class="avatar-title bg-transparent text-success rounded-circle">
                                    <i class="ri-briefcase-5-line fs-36"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-18">Top Industry Specialists</h5>
                            <p class="text-muted my-3">An industrial specialist works with industrial
                                operations to ensure that manufacturing facilities work.</p>
                            <div>
                                <a href="#" class="fs-13 fw-medium">Learn More <i
                                        class="ri-arrow-right-s-line align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div> --}}
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end Tentang Kami -->

    <!-- start features -->
    {{-- <section class="section bg-light py-5" id="tentangkami">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6 col-sm-7 mx-auto">
                    <div>
                        <img src="{{ asset('') }}assets/images/landing/features/img-1.png" alt=""
                            class="img-fluid mx-auto">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-muted">
                        <div class="avatar-sm icon-effect mb-4">
                            <div class="avatar-title bg-transparent rounded-circle text-success h1">
                                <i class="ri-collage-line fs-36"></i>
                            </div>
                        </div>
                        <h3 class="mb-3 fs-20">Huge collection of widgets</h3>
                        <p class="mb-4 fs-16">Collection widgets specialize in displaying many elements of the
                            same type, such as a collection of pictures from a collection of articles from a
                            news app or a collection of messages from a communication app.</p>

                        <div class="row pt-3">
                            <div class="col-3">
                                <div class="text-center">
                                    <h4>5</h4>
                                    <p>Dashboards</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <h4>150+</h4>
                                    <p>Pages</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center">
                                    <h4>7+</h4>
                                    <p>Functional Apps</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section> --}}
    <!-- end features -->
    <!-- start features -->
    <section class="section">
        <div data-aos="fade-up-right" data-aos-duration="2000" class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="text-muted">
                        <h5 class="fs-12 text-uppercase text-success">Design</h5>
                        <h4 class="mb-3">Well Designed Dashboards</h4>
                        <p class="mb-4">Quality Dashboards (QD) is a condition-specific, actionable web-based
                            application for quality reporting and population
                            management that is integrated into the Electronic Health Record (EHR).</p>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="vstack gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-0">Ecommerce</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-0">Analytics</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-0">CRM</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="vstack gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-0">Crypto</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-0">Projects</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-sm-7 col-10 ms-auto order-1 order-lg-2">
                    <div>
                        <img src="{{ asset('') }}assets/images/landing/features/img-2.png" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center mt-5 pt-lg-5 gy-4">
                <div class="col-lg-6 col-sm-7 col-10 mx-auto">
                    <div>
                        <img src="{{ asset('') }}assets/images/landing/features/img-3.png" alt=""
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-muted ps-lg-5">
                        <h5 class="fs-12 text-uppercase text-success">structure</h5>
                        <h4 class="mb-3">Well Documented</h4>
                        <p class="mb-4">used to describe something that is known about or known to be true
                            because there are many documents that describe it,
                            prove it, etc.</p>

                        <div class="vstack gap-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar-xs icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                            <i class="ri-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Dynamic Conetnt</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar-xs icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                            <i class="ri-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Setup plugin's information.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar-xs icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                            <i class="ri-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Themes customization information</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end features -->
    <!-- start counter -->
    <section class="py-5 position-relative bg-light">
        <div data-aos="fade-right" class="container">
            <div class="row text-center gy-4">
                <div class="col-lg-3 col-6">
                    <div>
                        <h2 class="mb-2"><span class="counter-value" data-target="100">0</span>+</h2>
                        <div class="text-muted">Projects Completed</div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-3 col-6">
                    <div>
                        <h2 class="mb-2"><span class="counter-value" data-target="24">0</span></h2>
                        <div class="text-muted">Win Awards</div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-3 col-6">
                    <div>
                        <h2 class="mb-2"><span class="counter-value" data-target="20.3">0</span>k</h2>
                        <div class="text-muted">Satisfied Clients</div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-3 col-6">
                    <div>
                        <h2 class="mb-2"><span class="counter-value" data-target="50">0</span></h2>
                        <div class="text-muted">Employees</div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end counter -->

    <!-- start Work Process -->
    <section class="section">
        <div data-aos="fade-up-left" data-aos-duration="3000" class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Our Work Process</h3>
                        <p class="text-muted mb-4">In an ideal world this website wouldn’t exist, a client
                            would
                            acknowledge the importance of having web copy before the Proin vitae ipsum vel ex
                            finibus semper design starts.</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row text-center">
                <div class="col-lg-4">
                    <div class="process-card mt-4">
                        <div class="process-arrow-img d-none d-lg-block">
                            <img src="{{ asset('') }}assets/images/landing/process-arrow-img.png" alt=""
                                class="img-fluid">
                        </div>
                        <div class="avatar-sm icon-effect mx-auto mb-4">
                            <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                <i class="ri-quill-pen-line"></i>
                            </div>
                        </div>

                        <h5>Tell us what you need</h5>
                        <p class="text-muted">The profession and the employer and your desire to make your
                            mark.</p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="process-card mt-4">
                        <div class="process-arrow-img d-none d-lg-block">
                            <img src="{{ asset('') }}assets/images/landing/process-arrow-img.png" alt=""
                                class="img-fluid">
                        </div>
                        <div class="avatar-sm icon-effect mx-auto mb-4">
                            <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                <i class="ri-user-follow-line"></i>
                            </div>
                        </div>

                        <h5>Get free quotes</h5>
                        <p class="text-muted">The most important aspect of beauty was, therefore, an inherent
                            part.</p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                    <div class="process-card mt-4">
                        <div class="avatar-sm icon-effect mx-auto mb-4">
                            <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                <i class="ri-book-mark-line"></i>
                            </div>
                        </div>

                        <h5>Deliver high quality product</h5>
                        <p class="text-muted">We quickly learn to fear and thus automatically avoid
                            potentially.</p>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end Work Process -->
    <!-- Blog Section -->
    <section class="section bg-light" id="blog">
        <div class="container">
            <div data-aos-duration="1500" data-aos="fade-right" class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Our <span class="text-danger">Blog</span></h3>
                        <div class="text-muted mb-4">
                            {!! convertRelativePathsToAbsolute($landingpage->blog) !!}
                        </div>
                        {{-- <p class="text-muted mb-4">Temukan informasi promo, event, serta kegiatan seputar MD Group</p> --}}
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div data-aos-duration="3000" data-aos="fade-left" class="row">
                @foreach ($data as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card overflow-hidden blog-grid-card">
                            <div class="position-relative overflow-hidden">
                                @if ($item->thumbnail)
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                        class="blog-img object-fit-cover">
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($item->title, 20) }}</h5>
                                <div class="text-muted mb-2">
                                    {!! Str::limit($item->body, 100) !!}
                                </div>
                                <a href="{{ route('posts.show', $item->slug) }}"
                                    class="link link-primary text-decoration-underline link-offset-1">Baca Selengkapnya..
                                    <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end Blog Section -->
    <!-- start contact -->
    <section class="section" id="contact">
        <div class="container">
            <div data-aos-duration="2000" data-aos="fade-down-left" class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Hubungi Kami</h3>
                        <div class="text-muted mb-4">
                            {!! convertRelativePathsToAbsolute($landingpage->kontak) !!}
                        </div>
                        {{-- <p class="text-muted mb-4">Kami senang mendengar informasi, pertanyaan, kritik serta saran anda.
                        </p> --}}
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div data-aos-duration="3000" data-aos="fade-up-right" class="row gy-4">
                <div class="col-lg-4">
                    <div>
                        <div class="mt-4">
                            <h5 class="fs-13 text-muted text-uppercase">Alamat</h5>
                            <div class="fw-semibold">Jl. Pemuda No.3, Kunden, Kec. Blora, Kabupaten Blora, Jawa Tengah,
                                <br />58211
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5 class="fs-13 text-muted text-uppercase">Jam Buka :</h5>
                            <div class="fw-semibold"> Setiap Hari <br> 08.30 - 21.30</div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-8">
                    <div>
                        <form onsubmit="sendToWhatsApp(event)">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="name" class="form-label fs-13">Nama</label>
                                        <input name="name" id="name" type="text"
                                            class="form-control bg-light border-light" placeholder="Nama Anda*" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="email" class="form-label fs-13">Email</label>
                                        <input name="email" id="email" type="email"
                                            class="form-control bg-light border-light" placeholder="Email Anda*" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="subject" class="form-label fs-13">Subjek</label>
                                        <input type="text" class="form-control bg-light border-light" id="subject"
                                            name="subject" placeholder="Subject Anda..." required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="comments" class="form-label fs-13">Pesan</label>
                                        <textarea name="comments" id="comments" rows="3" class="form-control bg-light border-light"
                                            placeholder="Pesan Anda..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <input type="submit" id="submit" name="send"
                                        class="submitBnt btn btn-primary" value="Kirim Pesan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <script>
            function sendToWhatsApp(event) {
                event.preventDefault();
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subject').value;
                const comments = document.getElementById('comments').value;
                const phoneNumber = "{{ $sosial->whatsapp }}"; // Ganti dengan nomor WhatsApp Anda
                const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(
                    'Name: ' + name + '\nEmail: ' + email + '\nSubject: ' + subject + '\nMessage: ' + comments
                )}`;
                window.open(whatsappURL, '_blank');
            }
        </script>
        <!-- end container -->
    </section>
    <!-- end contact -->
@endsection
