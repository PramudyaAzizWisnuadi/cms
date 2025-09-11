@extends('admin.layout')

@section('title', 'Gallery')

@section('breadcrumb')
    <li class="breadcrumb-item active">Gallery</li>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Gallery Management</h4>
    <a href="{{ route('admin.galeries.create') }}" class="btn btn-primary">
        <i class="ri-add-line me-2"></i>Add New Image
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            @forelse($galeries as $galery)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 gallery-card">
                        <div class="position-relative">
                            @if($galery->image)
                                <img src="{{ asset('storage/' . $galery->image) }}" alt="{{ $galery->name }}" class="gallery-image">
                            @else
                                <div class="image-placeholder" style="height: 200px;">
                                    <i class="ri-image-line"></i>
                                </div>
                            @endif
                            
                            @if($galery->category)
                                <span class="position-absolute top-0 start-0 m-2">
                                    <span class="badge bg-primary">{{ $galery->category->name }}</span>
                                </span>
                            @endif
                        </div>
                        
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1 small">{{ Str::limit($galery->name, 25) }}</h6>
                            <small class="text-muted">{{ $galery->created_at->format('M d, Y') }}</small>
                        </div>
                        
                        <div class="card-footer bg-transparent p-2">
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('admin.galeries.edit', $galery) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <form action="{{ route('admin.galeries.destroy', $galery) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="ri-gallery-line fs-1 text-muted d-block mb-3"></i>
                        <h5 class="text-muted">No gallery items found</h5>
                        <p class="text-muted">Start by adding your first image to the gallery.</p>
                        <a href="{{ route('admin.galeries.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-2"></i>Add First Image
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
        
        @if($galeries->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $galeries->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
