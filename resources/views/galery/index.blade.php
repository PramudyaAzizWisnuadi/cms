<!-- filepath: /d:/laragon/www/cms/resources/views/galery/index.blade.php -->
@extends('app.layout')
@section('title', 'Galery')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-white rounded-3 p-4 shadow-sm">
                            <div>
                                <h3 class="mb-1 fw-bold text-dark">
                                    <i class="ri-gallery-line me-2 text-primary"></i>Gallery
                                </h3>
                                <p class="text-muted mb-0">Koleksi foto dan dokumentasi kegiatan</p>
                            </div>
                            <div class="page-title-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb bg-light rounded-pill px-3 py-2 mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="javascript: void(0);" class="text-primary">
                                                <i class="ri-home-line me-1"></i>Home
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item active text-dark">Gallery</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <!-- Filter Categories -->
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <div class="mb-3">
                                                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                                    <i class="ri-filter-line me-1"></i>Filter Kategori
                                                </span>
                                            </div>
                                            <div class="category-filter-wrapper">
                                                <ul class="list-inline categories-filter mb-0" id="filter">
                                                    <li class="list-inline-item">
                                                        <a class="categories btn {{ is_null($category_id) ? 'btn-primary' : 'btn-outline-primary' }}"
                                                           href="{{ route('galery.index') }}">
                                                            <i class="ri-gallery-line me-1"></i>Semua
                                                        </a>
                                                    </li>
                                                    @foreach ($galerycategory as $item)
                                                        <li class="list-inline-item">
                                                            <a class="categories btn {{ $category_id == $item->id ? 'btn-primary' : 'btn-outline-primary' }}"
                                                               href="{{ route('galery.index', ['category_id' => $item->id]) }}">
                                                                {{ $item->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Gallery Grid -->
                                <div class="modern-gallery-grid">
                                    @forelse ($galery as $item)
                                        <div class="gallery-item category-{{ $item->category_id }}"
                                             data-category="category-{{ $item->category_id }}">
                                            <div class="gallery-box card h-100 border-0 shadow-sm">
                                                <div class="gallery-container position-relative">
                                                    <a class="image-popup"
                                                       href="{{ asset('storage/' . $item->image) }}"
                                                       title="{{ $item->title }}">
                                                        <img class="gallery-img img-fluid"
                                                             src="{{ asset('storage/' . $item->image) }}"
                                                             alt="{{ $item->name }}" 
                                                             loading="lazy" />
                                                        <div class="gallery-overlay">
                                                            <div class="overlay-content">
                                                                <div class="d-flex justify-content-between align-items-end w-100">
                                                                    <div>
                                                                        <h5 class="overlay-caption">{{ $item->name }}</h5>
                                                                        <div class="overlay-icons">
                                                                            <i class="ri-zoom-in-line"></i>
                                                                            <span class="ms-1">Zoom</span>
                                                                        </div>
                                                                    </div>
                                                                    @if($item->category)
                                                                        <span class="badge bg-primary text-white small rounded-pill">
                                                                            {{ Str::limit($item->category->name, 10) }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="box-content">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1 fw-semibold text-dark">{{ Str::limit($item->name, 20) }}</h6>
                                                            <small class="text-muted">
                                                                <i class="ri-camera-line me-1"></i>
                                                                <span class="text-primary fw-medium">MD Group</span>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="text-center py-5">
                                                <div class="mb-3">
                                                    <i class="ri-image-line display-1 text-muted"></i>
                                                </div>
                                                <h5 class="text-muted">Belum ada foto di galeri</h5>
                                                <p class="text-muted">Silakan kembali lagi nanti untuk melihat update terbaru</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                                <!-- end row -->
                                <!-- Pagination -->
                                @if($galery->hasPages())
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="pagination-wrapper text-center">
                                                <div class="d-flex justify-content-between align-items-center bg-light rounded-3 p-3">
                                                    <div class="pagination-info">
                                                        <small class="text-muted">
                                                            Menampilkan {{ $galery->firstItem() ?? 0 }} - {{ $galery->lastItem() ?? 0 }} 
                                                            dari {{ $galery->total() }} foto
                                                        </small>
                                                    </div>
                                                    <div class="pagination-links">
                                                        {{ $galery->appends(request()->query())->links('pagination::bootstrap-4') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->

    <style>
        /* Modern Gallery Styles */
        .page-title-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #007bff;
        }

        .category-filter-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        .categories {
            margin: 0.25rem;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .categories:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .gallery-wrapper {
            min-height: 400px;
        }

        .gallery-box {
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #fff;
            height: auto;
        }

        .gallery-box:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        /* Modern CSS Grid Gallery */
        .modern-gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            min-height: 400px;
        }

        /* Force exactly 4 columns on large screens */
        @media (min-width: 1200px) {
            .modern-gallery-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 1.25rem;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .modern-gallery-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 1rem;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .modern-gallery-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 1rem;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            .modern-gallery-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }
        }

        @media (max-width: 575px) {
            .modern-gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
            }
        }

        .gallery-item {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .gallery-wrapper {
            min-height: 400px;
        }

        .gallery-box {
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #fff;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .gallery-box:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .gallery-container {
            position: relative;
            overflow: hidden;
            height: 220px;
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
            border-radius: 0.375rem 0.375rem 0 0;
            flex-shrink: 0;
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-box:hover .gallery-img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 0.1) 50%,
                rgba(0, 0, 0, 0.8) 100%
            );
            color: white;
            display: flex;
            align-items: flex-end;
            padding: 0.75rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-container:hover .gallery-overlay {
            opacity: 1;
        }

        .overlay-content {
            width: 100%;
        }

        .overlay-caption {
            margin: 0 0 0.25rem 0;
            font-size: 0.9rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .overlay-icons {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .box-content {
            padding: 1rem;
            background: #fff;
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .box-content h6 {
            color: #2c3e50;
            line-height: 1.3;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .box-content small {
            font-size: 0.8rem;
        }

        .badge.small {
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
        }

        /* Badge in overlay styling */
        .gallery-overlay .badge {
            font-size: 0.65rem;
            padding: 0.25rem 0.5rem;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .overlay-content {
            width: 100%;
        }

        /* Responsive adjustments for grid items */
        @media (min-width: 1200px) {
            .gallery-container {
                height: 220px;
            }
            
            .overlay-caption {
                font-size: 0.9rem;
            }

            .box-content {
                padding: 1rem;
            }

            .box-content h6 {
                font-size: 0.9rem;
            }

            .box-content small {
                font-size: 0.8rem;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .gallery-container {
                height: 200px;
            }
            
            .overlay-caption {
                font-size: 0.85rem;
            }

            .box-content {
                padding: 0.9rem;
            }

            .box-content h6 {
                font-size: 0.85rem;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .gallery-container {
                height: 160px;
            }

            .overlay-caption {
                font-size: 0.85rem;
            }

            .box-content {
                padding: 0.75rem;
            }

            .box-content h6 {
                font-size: 0.8rem;
            }

            .box-content small {
                font-size: 0.7rem;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            .gallery-container {
                height: 140px;
            }

            .categories {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
                margin: 0.2rem;
            }

            .overlay-caption {
                font-size: 0.8rem;
            }

            .box-content h6 {
                font-size: 0.75rem;
            }

            .gallery-box:hover {
                transform: translateY(-3px);
            }
        }

        @media (max-width: 575px) {
            .gallery-container {
                height: 120px;
            }

            .overlay-caption {
                font-size: 0.75rem;
            }

            .overlay-icons {
                font-size: 0.65rem;
            }

            .box-content {
                padding: 0.5rem;
            }

            .box-content h6 {
                font-size: 0.7rem;
            }

            .box-content small {
                font-size: 0.6rem;
            }

            .page-title-box h3 {
                font-size: 1.5rem;
            }

            .gallery-box:hover {
                transform: translateY(-2px);
            }
        }

        /* Animation for empty state */
        .empty-gallery {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Pagination styling */
        .pagination-wrapper .pagination {
            margin: 0;
        }

        .pagination-wrapper .page-link {
            border-radius: 8px;
            border: none;
            margin: 0 2px;
            font-weight: 500;
        }

        .pagination-wrapper .page-item.active .page-link {
            background: #007bff;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
        }

        /* Loading placeholder */
        .gallery-img[src=""] {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
@endsection
