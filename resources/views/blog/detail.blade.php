@extends('app.layout')
@section('title', $posts->title)
@section('description', Str::limit(strip_tags($posts->body), 160))
@section('keywords', collect($posts->tags)->pluck('name')->implode(', ') . ', ' . $posts->category->name . ', MD Group')
@section('image', $posts->thumbnail ? asset('storage/' . $posts->thumbnail) : asset('assets/images/logo-md-group.jpg'))
@section('og_type', 'article')

@push('meta')
    {{-- Article specific meta tags --}}
    <meta property="article:published_time" content="{{ $posts->created_at->toISOString() }}">
    <meta property="article:modified_time" content="{{ $posts->updated_at->toISOString() }}">
    <meta property="article:author" content="{{ $posts->author->name }}">
    <meta property="article:section" content="{{ $posts->category->name }}">
    @foreach ($posts->tags as $tag)
        <meta property="article:tag" content="{{ $tag->name }}">
    @endforeach
@endpush
@section('konten')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"><a href="{{ route('post.list') }}"><i
                                        class="ri-arrow-left-line"></i>Kembali</a></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blogs</a></li>
                                    <li class="breadcrumb-item active">{{ $posts->title }}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row justify-content-center">
                    <div class="col-xxl-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <p class="text-success text-uppercase mb-2">{{ $posts->category->name }}</p>
                                    <h4 class="mb-2">{{ $posts->title }}</h4>
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                        @foreach ($posts->tags as $tag)
                                            <span class="badge bg-primary-subtle text-primary">{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($posts->thumbnail)
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ asset('storage/' . $posts->thumbnail) }}" alt="{{ $posts->title }}"
                                            class="img-thumbnail">
                                    </div>
                                @endif
                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <h6 class="pb-1">Contributor By:</h6>
                                        <div class="d-flex gap-2 mb-3">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/images/logo.png') }}" alt=""
                                                    class="avatar-sm rounded">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1"><a href="#!">{{ $posts->author->name }}</a></h5>
                                                <p class="text-muted mb-0">{{ $posts->created_at->format('d F Y') }}</< /p>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-9">
                                        <div class="text-muted mb-3">
                                            {!! convertRelativePathsToAbsolute($posts->body) !!}
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- container-fluid -->
        </div>

        <!-- End Page-content -->
    </div>
    <!-- end main content-->

    {{-- Enhanced Structured Data --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "{{ $posts->title }}",
        "description": "{{ Str::limit(strip_tags($posts->body), 160) }}",
        "image": {
            "@type": "ImageObject",
            "url": "{{ $posts->thumbnail ? asset('storage/' . $posts->thumbnail) : asset('assets/images/logo-md-group.jpg') }}",
            "width": 800,
            "height": 600
        },
        "author": {
            "@type": "Person",
            "name": "{{ $posts->author->name }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "MD Group",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('assets/images/logo-md-group.jpg') }}",
                "width": 200,
                "height": 200
            }
        },
        "datePublished": "{{ $posts->created_at->toISOString() }}",
        "dateModified": "{{ $posts->updated_at->toISOString() }}",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url()->current() }}"
        },
        "articleSection": "{{ $posts->category->name }}",
        "keywords": [
            @foreach($posts->tags as $index => $tag)
                "{{ $tag->name }}"{{ $loop->last ? '' : ',' }}
            @endforeach
        ]
    }
    </script>

    {{-- Breadcrumb Schema --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ url('/') }}"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Blog",
                "item": "{{ route('post.list') }}"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "{{ $posts->title }}",
                "item": "{{ url()->current() }}"
            }
        ]
    }
    </script>
@endsection
