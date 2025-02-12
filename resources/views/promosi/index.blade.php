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
                                            <div class="col-xxl-9 col-lg-7">
                                                <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                                                    <span class=""><i class="ri-calendar-event-line me-1"></i>
                                                        {{ \Carbon\Carbon::parse($item->start_date)->format('d F Y') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($item->end_date)->format('d F Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col-xxl-3 col-lg-5">
                                                    <a href="{{ asset('storage/' . $item->image) }}" class="image-popup">
                                                        @if ($item->image)
                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                alt="{{ $item->name }}"
                                                                class="img-fluid rounded w-100 img-thumbnail">
                                                        @endif
                                                    </a </div><!--end col-->

                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div>
                                    </div>
                            @endforeach
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
@endsection
