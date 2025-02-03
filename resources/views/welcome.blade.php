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
                                <a href="#tentangkami" class="btn btn-success">Get Started <i
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
                                    <img src="{{ asset('storage/' . $landingpage->fotodepan) }}" class="d-block w-100">
                                    {{-- <img src="{{ asset('assets/images/testetst.png') }}" class="d-block w-100"
                                        alt="..."> --}}
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
                                            <img src="{{ asset('storage/' . $l->image) }}" alt="client-img"
                                                data-bs-toggle="modal" data-bs-target="#logoModal{{ $l->id }}">
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
    <section class="section bg-light" id="tentangkami">
        <div data-aos="fade-down" data-aos-duration="1000" class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Sejarah</h3>
                        <div class="mb-3 ff-secondary fw-bold lh-base text-muted">{!! convertRelativePathsToAbsolute($landingpage->tentangkami) !!}</div>
                    </div>
                </div>
                <!-- end col -->
                <div class="timeline p-4 rounded">
                    @foreach ($timelines as $timeline)
                        <div class="timeline-item {{ $timeline->position }}">
                            <i class="icon {{ $timeline->icon }}"></i>
                            <div class="date fs-13 text-muted">{{ \Carbon\Carbon::parse($timeline->date)->format('F Y') }}
                            </div>
                            <div class="content">
                                <h5 class="fs-14">{{ $timeline->title }}</h5>
                                <p class="text-muted">{{ $timeline->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end row -->
            <div data-aos="fade-up-left" data-aos-duration="1000" class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Visi & Misi</h3>
                        <h4 class="text-muted">Visi</h4>
                        <div class="row text-center"></div>
                        <div class="col d-flex justify-content-center align-items-center">
                            <div class="mt-4">
                                <div class="avatar-sm icon-effect mx-auto mb-4">
                                    <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                        <i class="ri-focus-2-line"></i>
                                    </div>
                                </div>
                                @foreach ($visi as $item)
                                    <h5>{{ $item->content }}</h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr class="hr hr-blurry" />
                </div>
            </div>
            <!-- end row -->
            <div data-aos="fade-up-right" data-aos-duration="1000"
                class="row text-center d-flex justify-content-center align-items-center">
                <h4 class="text-muted mb-4">Misi</h4>
                @foreach ($misi as $item)
                    <div class="col-lg-4">
                        <div class="process-card mt-4">
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-checkbox-line"></i>
                                </div>
                            </div>
                            <p class="text-muted">{{ $item->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end Work Process -->
    <!-- Blog Section -->
    <section class="section bg-light-subtle" id="blog">
        <div class="container">
            <div data-aos-duration="1000" data-aos="fade-right" class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Our <span class="text-danger">Blog</span></h3>
                        <div class="text-muted mb-4">
                            {!! convertRelativePathsToAbsolute($landingpage->blog) !!}
                        </div>
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
    <section class="section bg-light" id="contact">
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
                        <div class="mt-4 ">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.341439280373!2d111.41148847499703!3d-6.968985793031613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7740e295171d81%3A0x40792cf899fa9be8!2sMD%20Mall%20Blora!5e0!3m2!1sid!2sid!4v1738570014948!5m2!1sid!2sid"
                                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                            class="form-control bg-light-subtle border-light" placeholder="Nama Anda..."
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="email" class="form-label fs-13">Email</label>
                                        <input name="email" id="email" type="email"
                                            class="form-control bg-light-subtle border-light" placeholder="Email Anda..."
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="subject" class="form-label fs-13">Subjek</label>
                                        <input type="text" class="form-control bg-light-subtle border-light"
                                            id="subject" name="subject" placeholder="Subjek Anda..." required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="comments" class="form-label fs-13">Pesan</label>
                                        <textarea name="comments" id="comments" rows="3" class="form-control bg-light-subtle border-light"
                                            placeholder="Pesan Anda..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <input type="submit" id="submit" name="send"
                                        class="submitBnt btn btn-success" value="Kirim Pesan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        @foreach ($logo as $l)
            <!-- Modal -->
            <div class="modal modal-xl fade" id="logoModal{{ $l->id }}" tabindex="-1"
                aria-labelledby="logoModalLabel{{ $l->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="avatar-md me-auto">
                                <img src="{{ asset('storage/' . $l->image) }}" alt="" class="img-fluid">
                            </div>
                            <div class="image-container">
                                <img src="{{ asset('storage/' . $l->thumbnail) }}" alt=""
                                    class="img-fluid rounded">
                            </div>
                            <div class="modal-body text-muted">
                                <div>
                                    {!! convertRelativePathsToAbsolute($l->deskripsi) !!}
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="text-sm-end mt-3 mt-sm-0 me-auto">
                                <ul class="list-inline mb-0 footer-social-link">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/people/{{ $l->facebook }}/100088871923472/"
                                            target="_blank" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-facebook-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://wa.me/{{ $l->wa }}/" target="_blank"
                                            class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-whatsapp-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.tiktok.com/{{ $l->tiktok }}/" target="_blank"
                                            class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-tiktok-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a target="_blank" href="https://www.instagram.com/{{ $l->instagram }}/"
                                            class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-instagram-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a target="_blank" href="{{ $l->maps }}" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-map-pin-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <button type="button" class="btn btn-danger mt-auto" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
