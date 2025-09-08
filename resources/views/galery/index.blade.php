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
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Gallery</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Gallery</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <ul class="list-inline categories-filter animation-nav" id="filter">
                                                <li class="list-inline-item"><a
                                                        class="categories {{ is_null($category_id) ? 'active' : '' }}"
                                                        href="{{ route('galery.index') }}">All</a></li>
                                                @foreach ($galerycategory as $item)
                                                    <li class="list-inline-item"><a
                                                            class="categories {{ $category_id == $item->id ? 'active' : '' }}"
                                                            href="{{ route('galery.index', ['category_id' => $item->id]) }}">{{ $item->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="row gallery-wrapper g-3">
                                            @foreach ($galery as $item)
                                                <div class="element-item col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 category-{{ $item->category_id }}"
                                                    data-category="category-{{ $item->category_id }}">
                                                    <div class="gallery-box card h-100">
                                                        <div class="gallery-container">
                                                            <a class="image-popup"
                                                                href="{{ asset('storage/' . $item->image) }}"
                                                                title="{{ $item->title }}">
                                                                <img class="gallery-img img-fluid"
                                                                    src="{{ asset('storage/' . $item->image) }}"
                                                                    alt="{{ $item->name }}" loading="lazy" />
                                                                <div class="gallery-overlay">
                                                                    <h5 class="overlay-caption">{{ $item->name }}</h5>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="box-content">
                                                            <div class="d-flex align-items-center mt-1">
                                                                <div class="flex-grow-1 text-muted">by <a href="#"
                                                                        class="text-body text-truncate"><span
                                                                            class="text-danger">MD</span><span
                                                                            class="text-success">Group </span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- end row -->
                                        <!-- Tambahkan navigasi paginasi -->
                                        <div class="d-flex justify-content-end mt-4">
                                            {{ $galery->appends(request()->query())->links() }}
                                        </div>
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
        /* Gallery Mobile Responsive Styles */
        .gallery-wrapper {
            margin: 0 -8px;
        }
        
        .gallery-box {
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .gallery-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }
        
        .gallery-container {
            position: relative;
            overflow: hidden;
            border-radius: 8px 8px 0 0;
        }
        
        .gallery-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .gallery-box:hover .gallery-img {
            transform: scale(1.05);
        }
        
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .gallery-container:hover .gallery-overlay {
            transform: translateY(0);
        }
        
        .overlay-caption {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
        }
        
        .box-content {
            padding: 12px 15px;
        }

        /* Mobile Specific Styles */
        @media (max-width: 576px) {
            .gallery-wrapper {
                margin: 0 -4px;
            }
            
            .gallery-img {
                height: 150px;
            }
            
            .overlay-caption {
                font-size: 12px;
            }
            
            .gallery-overlay {
                padding: 10px;
            }
            
            .box-content {
                padding: 8px 10px;
                font-size: 12px;
            }
        }

        /* Very Small Mobile */
        @media (max-width: 400px) {
            .gallery-img {
                height: 120px;
            }
        }

        /* Filter Categories Mobile */
        @media (max-width: 768px) {
            .categories-filter {
                text-align: center;
                margin-bottom: 20px;
            }
            
            .categories-filter .list-inline-item {
                margin: 5px 8px;
            }
            
            .categories {
                font-size: 14px;
                padding: 8px 16px;
                border-radius: 20px;
                text-decoration: none;
                display: inline-block;
                border: 1px solid #ddd;
                transition: all 0.3s ease;
            }
            
            .categories.active {
                background-color: #007bff;
                color: white;
                border-color: #007bff;
            }
        }
    </style>
@endsection
