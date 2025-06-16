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

                                        <div class="row gallery-wrapper">
                                            @foreach ($galery as $item)
                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 category-{{ $item->category_id }}"
                                                    data-category="category-{{ $item->category_id }}">
                                                    <div class="gallery-box card">
                                                        <div class="gallery-container">
                                                            <a class="image-popup"
                                                                href="{{ asset('storage/' . $item->image) }}"
                                                                title="{{ $item->title }}">
                                                                <img class="gallery-img img-fluid mx-auto"
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
                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $galery->links() }}
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
@endsection
