@extends('admin.layout')

@section('title', 'Edit Tag')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
    <li class="breadcrumb-item active">Edit Tag</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Tag</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Tag Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $tag->name) }}" required 
                               placeholder="Enter tag name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Use short, descriptive words. Example: "Laravel", "Web Development", "Tutorial"</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description (Optional)</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3"
                                  placeholder="Brief description of this tag...">{{ old('description', $tag->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Provide a brief explanation of what this tag represents.</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line me-2"></i>Update Tag
                        </button>
                        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
                            <i class="ri-arrow-left-line me-2"></i>Back to Tags
                        </a>
                        <a href="{{ route('admin.tags.show', $tag) }}" class="btn btn-info">
                            <i class="ri-eye-line me-2"></i>View Posts
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Tag Information</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>Current Name:</strong></td>
                        <td><span class="badge bg-primary">{{ $tag->name }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Posts Count:</strong></td>
                        <td><span class="badge bg-info">{{ $tag->posts()->count() }} posts</span></td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $tag->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $tag->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Tag Guidelines</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Keep names short and descriptive</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Use consistent naming convention</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Avoid duplicate or similar tags</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Consider impact on existing posts</li>
                    <li><i class="ri-lightbulb-line text-warning me-2"></i>Think about how users will search</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
