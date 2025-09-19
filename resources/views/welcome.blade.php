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
                                alt="Pattern" loading="lazy" decoding="async">
                        </div>
                        <div class="demo-img-patten-bottom d-none d-sm-block">
                            <img src="{{ asset('assets/images/landing/img-pattern.png') }}" class="d-block img-fluid"
                                alt="Pattern" loading="lazy" decoding="async">
                        </div>
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner p-2 rounded">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <img src="{{ asset('storage/' . $landingpage->fotodepan) }}" class="d-block w-100"
                                        alt="MD Group Hero Image" loading="eager" decoding="async" fetchpriority="high">
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
                                    <!-- Debug carousel: ID={{ $l->id }}, Target=#logoModal{{ $l->id }} -->
                                    <div class="swiper-slide">
                                        <div class="logo-kami">
                                            <img src="{{ asset('storage/' . $l->image) }}"
                                                alt="Logo {{ $l->name ?? 'MD Group Partner' }}" loading="lazy"
                                                decoding="async" data-bs-toggle="modal"
                                                data-bs-target="#logoModal{{ $l->id }}"
                                                style="cursor: pointer; max-height: 60px; object-fit: contain;">
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
        <div class="bg-overlay-pattern"></div>
        <div data-aos="fade-down" data-aos-duration="1000" class="container">
            <div class="row justify-content-center content">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 fw-bold">Sejarah</h3>
                        <div class="mb-3 ff-secondary fw-bold lh-base">{!! convertRelativePathsToAbsolute($landingpage->tentangkami) !!}</div>
                    </div>
                </div>
                <!-- end col -->
                <div class="timeline p-4 rounded">
                    @foreach ($timelines as $timeline)
                        <div class="timeline-item {{ $timeline->position }}">
                            <i class="icon {{ $timeline->icon }}"></i>
                            <div class="date fs-13">Tahun
                                {{ \Carbon\Carbon::parse($timeline->date)->format('Y') }}
                            </div>
                            <div class="content text-justify">
                                <h5 class="fs-14">{{ $timeline->title }}</h5>
                                <p class="text-justify fs-11">{{ $timeline->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end row -->

        </div>
    </section>
    <section class="section bg-light">
        <div data-aos="fade-down" data-aos-duration="1000" class="container">
            <div class="row justify-content-center content">
                <div class="">
                    <div data-aos="fade-up-left" data-aos-duration="1000" class="row justify-content-center content">
                        <div class="col-lg-8">
                            <div class="text-center my-5">
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
                        class="row text-center d-flex justify-content-center align-items-center content">
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
                </div>
            </div>
        </div>
    </section>
    <!-- end Work Process -->
    <!-- Blog Section -->
    <section class="section bg-light-subtle" id="blog">
        <div class="container">
            <div data-aos-duration="1000" data-aos="fade-up" class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <div class="mb-3">
                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                <i class="ri-article-line me-1"></i>Latest Articles
                            </span>
                        </div>
                        <h2 class="mb-3 fw-bold display-6">Our <span class="text-primary">Blog</span></h2>
                        <div class="text-muted mb-4 fs-5">
                            {!! convertRelativePathsToAbsolute($landingpage->blog) !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div data-aos-duration="1000" data-aos="fade-left" class="row g-4">
                @forelse ($data as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="card h-100 overflow-hidden blog-grid-card shadow-sm border-0">
                            <div class="position-relative overflow-hidden blog-img-container">
                                @if ($item->thumbnail)
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                        class="blog-img w-100" loading="lazy" decoding="async">
                                @else
                                    <div class="blog-img-placeholder d-flex align-items-center justify-content-center">
                                        <i class="ri-image-line fs-1 text-muted"></i>
                                    </div>
                                @endif
                                <div class="blog-overlay">
                                    <a href="{{ route('posts.show', $item->slug) }}" class="btn btn-primary btn-sm">
                                        <i class="ri-eye-line me-1"></i>Baca
                                    </a>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="blog-meta mb-2">
                                    <small class="text-muted">
                                        <i class="ri-calendar-line me-1"></i>{{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                                <h5 class="card-title fw-bold mb-3" title="{{ $item->title }}">
                                    {{ Str::limit($item->title, 50) }}
                                </h5>
                                <div class="text-muted mb-3 flex-grow-1">
                                    {{ Str::limit(strip_tags($item->body), 80) }}
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('posts.show', $item->slug) }}"
                                        class="btn btn-outline-primary btn-sm w-100">
                                        Baca Selengkapnya
                                        <i class="ri-arrow-right-line ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="ri-article-line display-1 text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada artikel terbaru</h5>
                            <p class="text-muted">Artikel akan segera tersedia</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <div class="d-inline-flex align-items-center">
                    <div class="me-3">
                        <small class="text-muted">Lihat artikel lainnya</small>
                    </div>
                    <a href="{{ route('post.list') }}" class="btn btn-primary btn-lg px-4 py-2 rounded-pill">
                        <i class="ri-article-line me-2"></i>Semua Blog
                        <i class="ri-arrow-right-line ms-2"></i>
                    </a>
                </div>
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
                        <h3 class="mb-3 fw-bold">Kontak</h3>
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
                            <h5 class="fs-13 text-muted text-uppercase">Email :</h5>
                            <div class="fw-semibold">{{ $sosial->email }}</div>
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
                                        <textarea name="comments" id="comments" rows="7" class="form-control bg-light-subtle border-light"
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

        <!-- Logo Modals -->
        @foreach ($logo as $l)
            <!-- Modal -->
            <div class="modal modal-xl fade" id="logoModal{{ $l->id }}" tabindex="-1"
                aria-labelledby="logoModalLabel{{ $l->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header border-0 pb-2">
                            <h4 class="modal-title fw-bold text-primary" id="logoModalLabel{{ $l->id }}">
                                <i class="ri-building-2-line me-2"></i>{{ $l->name ?? 'Partner MD Group' }}
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                <!-- Logo & Company Info -->
                                <div class="col-md-4">
                                    <div class="text-center">
                                        @if ($l->image)
                                            <div class="company-logo mb-3">
                                                <a href="{{ asset('storage/' . $l->image) }}" target="_blank"
                                                    title="Klik untuk melihat gambar lebih besar" class="d-block"
                                                    style="text-decoration: none; border: 2px dashed #007bff; padding: 5px; border-radius: 8px;">
                                                    <img src="{{ asset('storage/' . $l->image) }}"
                                                        alt="{{ $l->name ?? 'Logo' }}"
                                                        class="img-fluid rounded shadow-sm"
                                                        style="max-height: 120px; object-fit: contain; background: #f8f9fa; padding: 10px; width: 100%;">
                                                    <small class="text-center d-block mt-2 text-primary">
                                                        <i class="ri-zoom-in-line"></i> Klik untuk melihat detail
                                                    </small>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="company-info">
                                            <h5 class="fw-bold mb-1">{{ $l->name ?? 'Partner MD Group' }}</h5>
                                            <p class="text-muted small mb-0">Bagian dari MD Group</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content & Details -->
                                <div class="col-md-8">
                                    <!-- Thumbnail Image -->
                                    @if ($l->thumbnail)
                                        <div class="company-thumbnail mb-3">
                                            <a href="{{ asset('storage/' . $l->thumbnail) }}" target="_blank"
                                                title="Klik untuk melihat gambar lebih besar" class="d-block"
                                                style="text-decoration: none; border: 2px dashed #007bff; padding: 5px; border-radius: 8px;">
                                                <img src="{{ asset('storage/' . $l->thumbnail) }}"
                                                    alt="{{ $l->name ?? 'Thumbnail' }}"
                                                    class="img-fluid rounded shadow-sm"
                                                    style="height: 200px; width: 100%; object-fit: cover;">
                                                <small class="text-center d-block mt-2 text-primary">
                                                    <i class="ri-zoom-in-line"></i> Klik untuk melihat detail
                                                </small>
                                            </a>
                                        </div>
                                    @endif

                                    <!-- Company Description -->
                                    <div class="company-description">
                                        @if ($l->deskripsi)
                                            <h6 class="fw-semibold mb-2">
                                                <i class="ri-information-line me-1 text-info"></i>Tentang
                                                {{ $l->name }}
                                            </h6>
                                            <div class="description-content">
                                                {!! convertRelativePathsToAbsolute($l->deskripsi) !!}
                                            </div>
                                        @else
                                            <div class="text-center py-4">
                                                <i class="ri-information-line fs-2 text-muted mb-2"></i>
                                                <p class="text-muted mb-0">
                                                    Informasi detail tentang {{ $l->name ?? 'partner ini' }} akan segera
                                                    tersedia.
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer border-0 pt-2">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <!-- Social Media Links -->
                                <div class="social-links">
                                    @if ($l->facebook || $l->instagram || $l->tiktok || $l->wa || $l->maps)
                                        <h6 class="small text-muted mb-2">Hubungi Kami:</h6>
                                        <div class="d-flex gap-2 flex-wrap">
                                            @if ($l->facebook)
                                                <a href="https://www.facebook.com/{{ $l->facebook }}" target="_blank"
                                                    class="btn btn-outline-primary btn-sm">
                                                    <i class="ri-facebook-fill me-1"></i>Facebook
                                                </a>
                                            @endif

                                            @if ($l->instagram)
                                                <a href="https://www.instagram.com/{{ $l->instagram }}" target="_blank"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <i class="ri-instagram-line me-1"></i>Instagram
                                                </a>
                                            @endif

                                            @if ($l->tiktok)
                                                <a href="https://www.tiktok.com/{{ $l->tiktok }}" target="_blank"
                                                    class="btn btn-outline-dark btn-sm">
                                                    <i class="ri-tiktok-line me-1"></i>TikTok
                                                </a>
                                            @endif

                                            @if ($l->wa)
                                                <a href="https://wa.me/{{ $l->wa }}" target="_blank"
                                                    class="btn btn-outline-success btn-sm">
                                                    <i class="ri-whatsapp-line me-1"></i>WhatsApp
                                                </a>
                                            @endif

                                            @if ($l->maps)
                                                <a href="{{ $l->maps }}" target="_blank"
                                                    class="btn btn-outline-info btn-sm">
                                                    <i class="ri-map-pin-line me-1"></i>Lokasi
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <!-- Close Button -->
                                <div class="close-button ms-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="ri-close-line me-1"></i>Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Lightbox Modal for Full Screen Images -->
        <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content bg-dark">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-white" id="lightboxTitle">Image Preview</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center p-3">
                        <div class="text-center">
                            <img id="lightboxImage" src="" alt="" class="img-fluid"
                                style="max-height: 80vh; max-width: 100%; object-fit: contain;">
                            <div class="mt-3">
                                <button type="button" class="btn btn-outline-light btn-sm me-2"
                                    onclick="downloadImage()">
                                    <i class="ri-download-line me-1"></i>Download
                                </button>
                                <button type="button" class="btn btn-outline-light btn-sm" onclick="zoomImage()">
                                    <i class="ri-zoom-in-line me-1" id="zoomIcon"></i>
                                    <span id="zoomText">Zoom In</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Global variables for lightbox
            let isZoomed = false;
            let currentImageSrc = '';

            function sendToWhatsApp(event) {
                event.preventDefault();
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subject').value;
                const comments = document.getElementById('comments').value;
                const phoneNumber = "{{ $sosial->whatsapp }}";
                const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(
                    'Name: ' + name + '\nEmail: ' + email + '\nSubject: ' + subject + '\nMessage: ' + comments
                )}`;
                window.open(whatsappURL, '_blank');
            }

            // Solusi sederhana untuk melihat gambar detail
            function viewImageDetail(imageSrc, imageTitle) {
                // Buka gambar di tab baru dengan ukuran yang optimal
                const popup = window.open('', '_blank', 'width=900,height=700,resizable=yes,scrollbars=yes,status=yes');
                popup.document.write(`
                    <html>
                        <head>
                            <title>${imageTitle}</title>
                            <style>
                                body {
                                    margin: 0;
                                    padding: 20px;
                                    background: #000;
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    justify-content: center;
                                    min-height: 100vh;
                                    font-family: Arial, sans-serif;
                                }
                                img {
                                    max-width: 100%;
                                    max-height: 90vh;
                                    object-fit: contain;
                                    border-radius: 8px;
                                    box-shadow: 0 4px 20px rgba(255,255,255,0.1);
                                }
                                .title {
                                    color: white;
                                    text-align: center;
                                    margin-bottom: 20px;
                                    font-size: 18px;
                                }
                                .controls {
                                    margin-top: 20px;
                                    text-align: center;
                                }
                                .btn {
                                    background: #007bff;
                                    color: white;
                                    border: none;
                                    padding: 10px 20px;
                                    margin: 0 10px;
                                    border-radius: 5px;
                                    cursor: pointer;
                                    text-decoration: none;
                                    display: inline-block;
                                }
                                .btn:hover {
                                    background: #0056b3;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="title">${imageTitle}</div>
                            <img src="${imageSrc}" alt="${imageTitle}" id="mainImage">
                            <div class="controls">
                                <button class="btn" onclick="document.getElementById('mainImage').style.transform = document.getElementById('mainImage').style.transform === 'scale(1.5)' ? 'scale(1)' : 'scale(1.5)'">Zoom</button>
                                <a class="btn" href="${imageSrc}" download>Download</a>
                                <button class="btn" onclick="window.close()">Tutup</button>
                            </div>
                        </body>
                    </html>
                `);
                popup.document.close();
            } // Debug modal functionality
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM loaded, setting up image click handlers');

                // Setup global click handler for all clickable images
                function setupImageClickHandlers() {
                    const clickableImages = document.querySelectorAll('.clickable-image');
                    console.log('Found clickable images:', clickableImages.length);

                    clickableImages.forEach((img, index) => {
                        console.log(`Setting up image ${index + 1}:`, img.src);

                        // Make sure it has the right attributes
                        img.style.cursor = 'pointer';
                        img.title = 'Klik untuk melihat detail';

                        // Remove any existing click handlers
                        img.removeEventListener('click', img._clickHandler);

                        // Create new click handler
                        img._clickHandler = function(e) {
                            e.preventDefault();
                            e.stopPropagation();

                            console.log('Image clicked!', this);

                            const imageSrc = this.getAttribute('data-image-src') || this.src;
                            const imageTitle = this.getAttribute('data-image-title') || this.alt ||
                                'Company Image';

                            console.log('Opening lightbox with:', {
                                imageSrc,
                                imageTitle
                            });

                            openLightbox(imageSrc, imageTitle);
                        };

                        // Add click event
                        img.addEventListener('click', img._clickHandler);
                    });
                }

                // Setup initial handlers
                setupImageClickHandlers();

                // Re-setup handlers when modals are shown
                document.addEventListener('click', function(e) {
                    if (e.target.matches('.logo-kami img')) {
                        setTimeout(() => {
                            setupImageClickHandlers();
                        }, 500);
                    }
                });

                // Check if Bootstrap is available
                const hasBootstrap = typeof bootstrap !== 'undefined';
                console.log('Bootstrap available:', hasBootstrap);

                // Add click listeners to logo images
                const logoImages = document.querySelectorAll('.logo-kami img');
                console.log('Found logo images:', logoImages.length);

                logoImages.forEach((img, index) => {
                    const modalTarget = img.getAttribute('data-bs-target');
                    console.log(`Logo ${index + 1} targets modal: ${modalTarget}`);

                    // Verify modal exists
                    const modal = document.querySelector(modalTarget);
                    if (modal) {
                        console.log(`Modal ${modalTarget} found`);

                        // Remove default Bootstrap behavior to handle manually
                        img.removeAttribute('data-bs-toggle');
                        img.removeAttribute('data-bs-target');

                        // Add manual click handler
                        img.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            console.log(`Logo clicked, showing modal: ${modalTarget}`);

                            if (hasBootstrap) {
                                try {
                                    const bsModal = new bootstrap.Modal(modal, {
                                        backdrop: true,
                                        keyboard: true,
                                        focus: true
                                    });
                                    bsModal.show();
                                    console.log('Bootstrap modal shown successfully');

                                    // Add lightbox functionality immediately
                                    addLightboxListeners(modal);

                                    // Also add after modal is fully shown
                                    modal.addEventListener('shown.bs.modal', function() {
                                        addLightboxListeners(modal);
                                    }, {
                                        once: true
                                    });
                                } catch (error) {
                                    console.error('Bootstrap modal error:', error);
                                    showModalManually(modal);
                                }
                            } else {
                                console.log('Using manual modal fallback');
                                showModalManually(modal);
                            }
                        });
                    } else {
                        console.error(`Modal ${modalTarget} NOT found`);
                    }
                });

                // Function to manually show modal
                function showModalManually(modal) {
                    console.log('Showing modal manually:', modal.id);

                    // Clear any existing modal state
                    clearModalState();

                    modal.style.display = 'block';
                    modal.classList.add('show');
                    modal.setAttribute('aria-hidden', 'false');
                    document.body.classList.add('modal-open');

                    // Create backdrop
                    const backdrop = document.createElement('div');
                    backdrop.className = 'modal-backdrop fade show';
                    backdrop.id = 'custom-backdrop';
                    document.body.appendChild(backdrop);

                    // Add lightbox functionality to the manually shown modal
                    addLightboxListeners(modal);

                    // Close function
                    const closeModal = function(e) {
                        if (e) {
                            e.preventDefault();
                            e.stopPropagation();
                        }
                        console.log('Closing modal manually');
                        clearModalState();
                    };

                    // Add event listeners for closing
                    const closeBtn = modal.querySelector('.btn-close');
                    if (closeBtn) {
                        closeBtn.onclick = closeModal;
                    }

                    const closeBtnFooter = modal.querySelector('button[data-bs-dismiss="modal"]');
                    if (closeBtnFooter) {
                        closeBtnFooter.onclick = closeModal;
                    }

                    // Backdrop click
                    backdrop.onclick = closeModal;

                    // Modal background click (outside content)
                    modal.onclick = function(e) {
                        if (e.target === modal) {
                            closeModal(e);
                        }
                    };

                    // Escape key
                    const escapeHandler = function(e) {
                        if (e.key === 'Escape') {
                            closeModal();
                            document.removeEventListener('keydown', escapeHandler);
                        }
                    };
                    document.addEventListener('keydown', escapeHandler);

                    // Store escape handler for cleanup
                    modal._escapeHandler = escapeHandler;
                }

                // Function to add lightbox listeners to clickable images in modal
                function addLightboxListeners(modal) {
                    console.log('Adding lightbox listeners to modal:', modal.id);
                    const clickableImages = modal.querySelectorAll('.clickable-image');
                    console.log('Found clickable images:', clickableImages.length);

                    clickableImages.forEach((img, index) => {
                        console.log(`Setting up listener for image ${index + 1}:`, img.src);

                        // Remove existing listeners to prevent duplicates
                        img.removeEventListener('click', img._lightboxHandler);

                        // Create new handler
                        img._lightboxHandler = function(e) {
                            e.preventDefault();
                            e.stopPropagation();

                            console.log('Image clicked!', this);

                            const imageSrc = this.getAttribute('data-image-src') || this.src;
                            const imageTitle = this.getAttribute('data-image-title') || this.alt ||
                                'Company Image';

                            console.log('Opening lightbox with:', {
                                imageSrc,
                                imageTitle
                            });

                            if (imageSrc) {
                                openLightbox(imageSrc, imageTitle);
                            } else {
                                console.error('No image source found');
                            }
                        };

                        // Add event listener
                        img.addEventListener('click', img._lightboxHandler);

                        // Add visual feedback
                        img.style.cursor = 'pointer';
                        img.title = 'Klik untuk melihat detail';
                    });
                }

                // Function to clear modal state
                function clearModalState() {
                    // Hide all modals
                    const allModals = document.querySelectorAll('.modal');
                    allModals.forEach(modal => {
                        modal.style.display = 'none';
                        modal.classList.remove('show');
                        modal.setAttribute('aria-hidden', 'true');

                        // Remove escape listener if exists
                        if (modal._escapeHandler) {
                            document.removeEventListener('keydown', modal._escapeHandler);
                            delete modal._escapeHandler;
                        }
                    });

                    // Remove backdrop
                    const backdrop = document.getElementById('custom-backdrop');
                    if (backdrop) {
                        document.body.removeChild(backdrop);
                    }

                    // Remove modal-open class
                    document.body.classList.remove('modal-open');
                }
            });
        </script>
        <!-- end container -->
    </section>
    <!-- end contact -->

    <style>
        /* Blog Grid Styling - Improved */
        .blog-grid-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            background: #fff;
        }

        .blog-grid-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .blog-img-container {
            height: 200px;
            background: #f8f9fa;
            position: relative;
        }

        .blog-img {
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog-img-placeholder {
            height: 100%;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .blog-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .blog-grid-card:hover .blog-overlay {
            opacity: 1;
        }

        .blog-grid-card:hover .blog-img {
            transform: scale(1.05);
        }

        .blog-meta {
            font-size: 0.85rem;
        }

        .card-title {
            line-height: 1.4;
            color: #2c3e50;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .blog-img-container {
                height: 180px;
            }

            .card-title {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .blog-img-container {
                height: 160px;
            }
        }

        /* Modal Styling */
        .modal-xl .modal-dialog {
            max-width: 1000px;
        }

        .modal-content {
            border: none;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        /* Clickable Image Styling */
        .clickable-image {
            position: relative;
            transition: all 0.3s ease;
        }

        .clickable-image:hover {
            transform: scale(1.02);
            filter: brightness(1.1);
        }

        .company-logo,
        .company-thumbnail {
            position: relative;
            overflow: hidden;
        }

        .company-logo a,
        .company-thumbnail a {
            display: block;
            text-decoration: none;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 10px;
            z-index: 10;
            pointer-events: none;
            /* Penting: biarkan klik menembus overlay */
        }

        .company-thumbnail a:hover .image-overlay,
        .company-logo a:hover .image-overlay {
            opacity: 1;
        }

        .image-overlay i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .image-overlay p {
            font-size: 0.9rem;
            text-align: center;
            margin: 0;
        }

        /* Make images more obvious when hoverable */
        .company-logo a,
        .company-thumbnail a {
            display: block;
            text-decoration: none;
            transition: transform 0.2s ease;
            cursor: pointer;
        }

        .company-logo a:hover,
        .company-thumbnail a:hover {
            transform: scale(1.02);
        }

        .company-logo img,
        .company-thumbnail img {
            transition: filter 0.3s ease, box-shadow 0.3s ease;
        }

        .company-logo a:hover img,
        .company-thumbnail a:hover img {
            filter: brightness(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Lightbox Modal Styling */
        .modal-fullscreen .modal-content {
            border-radius: 0;
        }

        #lightboxImage {
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }

        #lightboxImage.zoomed {
            cursor: zoom-out;
        }

        .modal-header .modal-title {
            color: white !important;
            font-size: 1.4rem;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }

        .modal-header .btn-close:hover {
            opacity: 1;
        }

        .modal-body {
            padding: 2rem;
            background: #fff;
        }

        .company-logo img {
            border: 3px solid #f8f9fa;
            transition: transform 0.3s ease;
        }

        .company-logo img:hover {
            transform: scale(1.05);
        }

        .company-info h5 {
            color: #495057;
        }

        .company-thumbnail img {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .company-thumbnail img:hover {
            transform: scale(1.02);
        }

        .company-description h6 {
            color: #495057;
            border-left: 4px solid #667eea;
            padding-left: 10px;
        }

        .description-content {
            text-align: justify;
            line-height: 1.6;
            color: #6c757d;
        }

        .modal-footer {
            background: #f8f9fa;
            border-radius: 0 0 15px 15px;
            padding: 1.5rem 2rem;
        }

        .social-links .btn {
            border-radius: 20px;
            font-size: 0.85rem;
            padding: 0.375rem 0.75rem;
            transition: all 0.3s ease;
        }

        .social-links .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .close-button .btn {
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
        }

        /* Disable animations on mobile devices for better performance */
        @media (max-width: 768px) {

            /* Disable all AOS animations */
            [data-aos] {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
                animation: none !important;
            }

            /* Disable blog card animations */
            .blog-grid-card {
                transition: none !important;
                transform: none !important;
            }

            .blog-grid-card:hover {
                transform: none !important;
                box-shadow: none !important;
            }

            .blog-img {
                height: 150px;
                transition: none !important;
            }

            .blog-grid-card:hover .blog-img {
                transform: none !important;
            }

            /* Disable carousel animations */
            .carousel {
                transition: none !important;
            }

            .carousel-item {
                transition: none !important;
            }

            /* Disable modal animations */
            .modal.fade {
                transition: none !important;
            }

            .modal.fade .modal-dialog {
                transition: none !important;
                transform: none !important;
            }

            /* Disable swiper animations */
            .swiper-wrapper {
                transition: none !important;
            }

            /* Disable button hover effects */
            .btn {
                transition: none !important;
            }

            .btn:hover {
                transform: none !important;
            }

            /* Disable blog card animations on mobile */
            .blog-grid-card {
                transition: none !important;
            }

            .blog-grid-card:hover {
                transform: none !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            }

            .blog-img {
                transition: none !important;
            }

            .blog-grid-card:hover .blog-img {
                transform: none !important;
            }

            .blog-overlay {
                opacity: 1 !important;
                /* Always show on mobile */
                background: rgba(0, 0, 0, 0.3) !important;
            }
        }

        /* Optimize logo carousel */
        .logo-kami img {
            width: 100%;
            height: auto;
            max-height: 60px;
            object-fit: contain;
        }

        /* Modal fixes */
        .modal {
            z-index: 1055;
        }

        .modal-backdrop {
            z-index: 1050;
        }

        .modal.show {
            display: block !important;
        }

        /* Ensure modal close buttons work */
        .modal .btn-close {
            cursor: pointer;
        }

        .modal button[data-bs-dismiss="modal"] {
            cursor: pointer;
        }

        /* Reduce animation complexity for users who prefer reduced motion */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }

            [data-aos] {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
                animation: none !important;
            }
        }
    </style>

    <!-- Performance Optimization Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Detect mobile devices
            const isMobile = window.innerWidth <= 768 ||
                /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

            // Disable AOS animations on mobile devices
            if (isMobile) {
                // Disable AOS if it's loaded
                if (typeof AOS !== 'undefined') {
                    AOS.init({
                        disable: true
                    });
                }

                // Remove data-aos attributes from all elements
                const aosElements = document.querySelectorAll('[data-aos]');
                aosElements.forEach(element => {
                    element.removeAttribute('data-aos');
                    element.removeAttribute('data-aos-duration');
                    element.removeAttribute('data-aos-delay');
                    element.removeAttribute('data-aos-offset');
                    element.style.opacity = '1';
                    element.style.transform = 'none';
                    element.style.transition = 'none';
                });

                // Disable Bootstrap carousel transitions
                const carousels = document.querySelectorAll('.carousel');
                carousels.forEach(carousel => {
                    carousel.setAttribute('data-bs-interval', 'false');
                    carousel.classList.remove('slide');
                    carousel.classList.remove('carousel-fade');
                });

                // Disable modal fade animations but keep functionality
                const modals = document.querySelectorAll('.modal.fade');
                modals.forEach(modal => {
                    // Don't remove fade class, just disable transition via CSS
                    modal.style.transition = 'none';
                    const modalDialog = modal.querySelector('.modal-dialog');
                    if (modalDialog) {
                        modalDialog.style.transition = 'none';
                        modalDialog.style.transform = 'none';
                    }
                });
            }

            // Preload next page content on hover (desktop only)
            if (!isMobile) {
                const nextPageLinks = document.querySelectorAll('a[href*="/list-post"]');
                nextPageLinks.forEach(link => {
                    link.addEventListener('mouseenter', function() {
                        const linkElement = document.createElement('link');
                        linkElement.rel = 'prefetch';
                        linkElement.href = this.href;
                        document.head.appendChild(linkElement);
                    }, {
                        once: true
                    });
                });
            }

            // Optimize carousel for better performance (desktop only)
            if (!isMobile) {
                const carouselItems = document.querySelectorAll('.carousel-item img');
                carouselItems.forEach(img => {
                    img.style.willChange = 'transform';
                });
            }
        });
    </script>

@endsection
