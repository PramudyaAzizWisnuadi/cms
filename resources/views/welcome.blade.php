@extends('app.layout')
@section('title', 'Home')
@section('konten')
    <!-- start hero section -->
    <section class="section pb-0 hero-section" id="hero">
        <div class="bg-overlay bg-overlay-pattern"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10">
                    <div class="text-center mt-lg-5 pt-5">
                        <div data-aos="zoom-in" data-aos-duration="1000" class="display-6 fw-bold mb-3 lh-base">
                            {!! convertRelativePathsToAbsolute($landingpage->home) !!}
                        </div>
                        <div data-aos="zoom-in-up"data-aos-duration="1500">
                            <div class="d-flex gap-2 justify-content-center mt-4">
                                <a href="#tentangkami" class="btn btn-primary">Get Started <i
                                        class="ri-arrow-right-line align-middle ms-1"></i></a>
                            </div>
                        </div>

                    </div>

                    <div data-aos="fade-up" data-aos-duration="1000" class="mt-4 mt-sm-5 pt-sm-5 demo-carousel">
                        <div class="demo-img-patten-top d-none d-sm-block">
                            <img src="{{ asset('assets/images/landing/img-pattern.png') }}" class="d-block img-fluid"
                                alt="...">
                        </div>
                        <div class="demo-img-patten-bottom d-none d-sm-block">
                            <img src="{{ asset('assets/images/landing/img-pattern.png') }}" class="d-block img-fluid"
                                alt="...">
                        </div>
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner p-2 rounded">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <img src="{{ asset('assets/images/testetst.png') }}" class="d-block w-100"
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
        <!-- start shape -->
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
                        <h5 class="fs-20">Bagian dari <span class="text-danger">
                                MD </span> <span class="text-success">Group</span>:</h5>

                        <!-- Swiper -->
                        <div class="swiper trusted-client-slider mt-sm-5 mt-4 mb-sm-5 mb-4" dir="ltr">
                            <div class="swiper-wrapper">
                                @foreach ($logo as $l)
                                    <div class="swiper-slide">
                                        <div class="logo-kami">
                                            <img src="{{ asset('storage/' . $l->image) }}" alt="client-img">
                                        </div>
                                    </div>
                                @endforeach

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
        <div data-aos="fade-down" data-aos-duration="1000" class="container">
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
        </div>
        <!-- end container -->
    </section>
    <!-- end Tentang Kami -->

    <!-- start features -->
    <section class="section">
        <div class="container">
            <div data-aos="fade-up-right" data-aos-duration="1000" class="row align-items-center gy-4">
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
            <div data-aos="fade-up-left" data-aos-duration="1000" class="row align-items-center mt-5 pt-lg-5 gy-4">
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
        <div data-aos="fade-up-left" data-aos-duration="1000" class="container">
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
            <div data-aos-duration="1000" data-aos="fade-right" class="row justify-content-center">
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
            <div data-aos-duration="1000" data-aos="fade-left" class="row">
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
                                    {!! Str::limit($item->body, 75) !!}
                                </div>
                                <a href="{{ route('posts.show', $item->slug) }}"
                                    class="link link-primary text-decoration-underline link-offset-1">Baca Selengkapnya...
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
            <div data-aos-duration="1000" data-aos="fade-down-left" class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Hubungi Kami</h3>
                        <div class="text-muted mb-4">
                            {!! convertRelativePathsToAbsolute($landingpage->kontak) !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div data-aos-duration="1000" data-aos="fade-up-right" class="row gy-4">
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
                                            class="form-control bg-light border-light" placeholder="Nama Anda..."
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="email" class="form-label fs-13">Email</label>
                                        <input name="email" id="email" type="email"
                                            class="form-control bg-light border-light" placeholder="Email Anda..."
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="subject" class="form-label fs-13">Subjek</label>
                                        <input type="text" class="form-control bg-light border-light" id="subject"
                                            name="subject" placeholder="Subjek Anda..." required />
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
