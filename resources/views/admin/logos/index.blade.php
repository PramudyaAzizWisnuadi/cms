@extends('admin.layout')

@section('title', 'Manage Logos')

@section('breadcrumb')
    <li class="breadcrumb-item active">Logos</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Manage Logos</h5>
                    <a href="{{ route('admin.logos.create') }}" class="btn btn-primary">
                        <i class="ri-add-line me-2"></i>Add Logo
                    </a>
                </div>
                <div class="card-body">
                    @if ($logos->count() > 0)
                        <div class="row">
                            @foreach ($logos as $logo)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100 logo-card">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $logo->image) }}" alt="{{ $logo->name }}"
                                                class="logo-image">

                                            <div class="position-absolute top-0 end-0 p-2">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-light" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ri-more-2-fill"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.logos.edit', $logo->id) }}">
                                                                <i class="ri-edit-line me-2"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.logos.destroy', $logo->id) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Are you sure you want to delete this logo?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="ri-delete-bin-line me-2"></i>Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body p-2">
                                            <h6 class="card-title mb-1 small">{{ Str::limit($logo->name, 20) }}</h6>

                                            @if($logo->deskripsi)
                                                <p class="card-text small text-muted mb-1">
                                                    {!! Str::limit(strip_tags($logo->deskripsi), 50) !!}
                                                </p>
                                            @endif

                                            <small class="text-muted">
                                                {{ $logo->created_at->format('M d, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $logos->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="ri-image-line display-1 text-muted"></i>
                            <h5 class="mt-3">No Logos Found</h5>
                            <p class="text-muted">Start by adding your first logo.</p>
                            <a href="{{ route('admin.logos.create') }}" class="btn btn-primary">
                                <i class="ri-add-line me-2"></i>Add Logo
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
