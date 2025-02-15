<!-- filepath: /d:/laragon/www/cms/resources/views/promosi/index.blade.php -->
@extends('app.layout')
@section('title', 'Promosi')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Promosi</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Promosi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <p class="text-muted text-xxl-end text-sm-start">PROMO</p>
                                <div class="mt-4 pt-4 border-top border-dashed border-bottom-0 border-start-0 border-end-0">

                                    <ul class="list-unstyled fw-medium text-xxl-end text-sm-start">
                                        @foreach ($kategori as $k)
                                            <li><a href="{{ route('promosi.index', ['category_id' => $k->id]) }}"
                                                    class="text-muted py-2 d-block"><i
                                                        class="mdi mdi-chevron-right me-1"></i> {{ $k->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <div class="row gx-4 ">
                            @foreach ($promosi as $item)
                                <div class="col-xxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-xxl-9 col-lg-3">
                                                <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                                                    <span class=""><i class="ri-calendar-event-line me-1"></i>
                                                        <b>Periode :
                                                            {{ \Carbon\Carbon::parse($item->start_date)->format('d F Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($item->end_date)->format('d F Y') }}</span>
                                                    </b>
                                                </div>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col-xxl-6 col-lg-6 mt-4">
                                                    @if ($item->image || $item->image2 || $item->image3 || $item->image4 || $item->image5)
                                                        <!-- With Controls -->
                                                        <div id="carouselExampleControls" class="carousel slide"
                                                            data-bs-ride="carousel">
                                                            <div class="carousel-inner" role="listbox">
                                                                @if ($item->image)
                                                                    <div class="carousel-item active">
                                                                        <a class="image-popup"
                                                                            href="{{ asset('storage/' . $item->image) }}">
                                                                            <img class="d-block img-fluid mx-auto"
                                                                                src="{{ asset('storage/' . $item->image) }}"
                                                                                alt="First slide">
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                                @if ($item->image2)
                                                                    <div class="carousel-item">
                                                                        <a class="image-popup"
                                                                            href="{{ asset('storage/' . $item->image2) }}">
                                                                            <img class="d-block img-fluid mx-auto"
                                                                                src="{{ asset('storage/' . $item->image2) }}"
                                                                                alt="Second slide">
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                                @if ($item->image3)
                                                                    <div class="carousel-item">
                                                                        <a class="image-popup"
                                                                            href="{{ asset('storage/' . $item->image3) }}">
                                                                            <img class="d-block img-fluid mx-auto"
                                                                                src="{{ asset('storage/' . $item->image3) }}"
                                                                                alt="Third slide">
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                                @if ($item->image4)
                                                                    <div class="carousel-item">
                                                                        <a class="image-popup"
                                                                            href="{{ asset('storage/' . $item->image4) }}">
                                                                            <img class="d-block img-fluid mx-auto"
                                                                                src="{{ asset('storage/' . $item->image4) }}"
                                                                                alt="Fourth slide">
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                                @if ($item->image5)
                                                                    <div class="carousel-item">
                                                                        <a class="image-popup"
                                                                            href="{{ asset('storage/' . $item->image5) }}">
                                                                            <img class="d-block img-fluid mx-auto"
                                                                                src="{{ asset('storage/' . $item->image5) }}"
                                                                                alt="Fifth slide">
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <a class="carousel-control-prev" href="#carouselExampleControls"
                                                                role="button" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon"
                                                                    aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#carouselExampleControls"
                                                                role="button" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon"
                                                                    aria-hidden="true"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div><!--end col-->

                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </div>
                            @endforeach
                        </div><!--end row-->
                        **Tunggu Toko Online Kami Coming Soon...**
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
@endsection
