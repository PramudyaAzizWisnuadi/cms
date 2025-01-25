@extends('app.layout')
@section('title', 'List Post')
@section('konten')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Post</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blogs</a></li>
                                    <li class="breadcrumb-item active">List Post</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xxl-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <form action="{{ route('posts.search') }}" method="GET" class="mb-4">
                                    <div class="input-group">
                                        <input type="text" name="query" class="form-control"
                                            placeholder="Search posts..." value="{{ request()->input('query') }}">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="mdi mdi-magnify search-icon"></i></button>
                                    </div>
                                </form>

                                <div class="mt-4 pt-4 border-top border-dashed border-bottom-0 border-start-0 border-end-0">
                                    <p class="text-muted">Kategori</p>

                                    <ul class="list-unstyled fw-medium">
                                        @foreach ($categories as $kategori)
                                            <li><a href="{{ route('post.list', ['category' => $kategori->id]) }}"
                                                    class="text-muted py-2 d-block"><i
                                                        class="mdi mdi-chevron-right me-1"></i> {{ $kategori->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- <div class="mt-4 pt-4 border-top border-dashed border-bottom-0 border-start-0 border-end-0">
                                    <p class="text-muted">Archive</p>

                                    <ul class="list-unstyled fw-medium">
                                        <li><a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                                    class="mdi mdi-chevron-right me-1"></i> 2024 <span
                                                    class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">03</span></a>
                                        </li>
                                        <li><a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                                    class="mdi mdi-chevron-right me-1"></i> 2023 <span
                                                    class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">06</span></a>
                                        </li>
                                        <li><a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                                    class="mdi mdi-chevron-right me-1"></i> 2022 <span
                                                    class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">05</span></a>
                                        </li>
                                        <li><a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                                    class="mdi mdi-chevron-right me-1"></i> 2021 <span
                                                    class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">05</span></a>
                                        </li>
                                        <li><a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                                    class="mdi mdi-chevron-right me-1"></i> 2020 <span
                                                    class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">05</span></a>
                                        </li>
                                    </ul>
                                </div> --}}

                                {{-- <div class="mt-4 pt-4 border-top border-dashed border-bottom-0 border-start-0 border-end-0">
                                    <p class="text-muted mb-2">Popular Posts</p>

                                    <div class="list-group list-group-flush">

                                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img src="assets/images/small/img-7.jpg" alt=""
                                                        class="avatar-md h-auto d-block rounded">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 text-truncate">Beautiful Day with Friends</h5>
                                                    <p class="mb-0 text-truncate">10 Apr, 2024</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img src="assets/images/small/img-4.jpg" alt=""
                                                        class="avatar-md h-auto d-block rounded">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 text-truncate">Drawing a sketch</h5>
                                                    <p class="mb-0 text-truncate">24 Mar, 2024</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img src="assets/images/small/img-6.jpg" alt=""
                                                        class="avatar-md h-auto d-block rounded">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 text-truncate">Project discussion with team</h5>
                                                    <p class="mb-0 text-truncate">11 Mar, 2024</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}

                                {{-- <div class="mt-4 pt-4 border-top border-dashed border-bottom-0 border-start-0 border-end-0">
                                    <p class="text-muted">Tags</p>

                                    <div class="d-flex flex-wrap gap-2 widget-tag">
                                        <div><a href="javascript: void(0);"
                                                class="badge bg-light text-muted font-size-12">Design</a></div>
                                        <div><a href="javascript: void(0);"
                                                class="badge bg-light text-muted font-size-12">Development</a></div>
                                        <div><a href="javascript: void(0);"
                                                class="badge bg-light text-muted font-size-12">Business</a></div>
                                        <div><a href="javascript: void(0);"
                                                class="badge bg-light text-muted font-size-12">Project</a></div>
                                        <div><a href="javascript: void(0);"
                                                class="badge bg-light text-muted font-size-12">Travel</a></div>
                                        <div><a href="javascript: void(0);"
                                                class="badge bg-light text-muted font-size-12">Lifestyle</a></div>
                                        <div><a href="javascript: void(0);"
                                                class="badge bg-light text-muted font-size-12">Photography</a></div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9">
                        <div class="row gx-4">
                            @foreach ($posts as $item)
                                <div class="col-xxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row g-4">
                                                <div class="col-xxl-3 col-lg-5">
                                                    @if ($item->thumbnail)
                                                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                                            alt="{{ $item->title }}"
                                                            class="img-fluid rounded w-100 object-fit-cover ">
                                                    @endif
                                                </div><!--end col-->
                                                <div class="col-xxl-9 col-lg-7">
                                                    <p class="mb-2 text-primary text-uppercase">{{ $item->category->name }}
                                                    </p>
                                                    <a href="{{ route('posts.show', $item->slug) }}">
                                                        <h5 class="fs-15 fw-semibold">{{ $item->title }}
                                                        </h5>
                                                    </a>
                                                    <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                                                        <span class="text-muted"><i class="ri-calendar-event-line me-1"></i>
                                                            {{ $item->created_at->format('d F Y') }}</< /span><span
                                                                class="text-muted"> | <a href="pages-profile.html"><i
                                                                        class="ri-user-3-line me-1"></i>
                                                                    {{ $item->author->name }}</a>
                                                    </div>
                                                    <p class="text-muted mb-2">{!! Str::limit($item->body, 200) !!}...</p>
                                                    <a href="{{ route('posts.show', $item->slug) }}"
                                                        class="text-decoration-underline">Baca Selengkapnya<i
                                                            class="ri-arrow-right-line"></i></a>

                                                    <div class="d-flex align-items-center gap-2 mt-3 flex-wrap">
                                                        @foreach ($item->tags as $tag)
                                                            <a href="#"
                                                                class="badge text-success bg-success-subtle">#{{ $tag->name }}</a>
                                                        @endforeach
                                                    </div>

                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div>
                                    </div>
                                </div><!--end col-->
                            @endforeach

                        </div><!--end row-->
                        <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                            {{ $posts->links() }}
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->


            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
@endsection
