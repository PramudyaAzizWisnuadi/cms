@extends('admin.layout')

@section('title', 'Create Tag')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
    <li class="breadcrumb-item active">Create Tag</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create New Tag</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Tag Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required 
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
                                  placeholder="Brief description of this tag...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Provide a brief explanation of what this tag represents.</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line me-2"></i>Create Tag
                        </button>
                        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
                            <i class="ri-arrow-left-line me-2"></i>Back to Tags
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Tag Guidelines</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Keep names short and descriptive</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Use consistent naming convention</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Avoid duplicate or similar tags</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Consider using existing tags first</li>
                    <li><i class="ri-lightbulb-line text-warning me-2"></i>Think about how users will search</li>
                </ul>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Examples</h6>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-primary">Laravel</span>
                    <span class="badge bg-success">PHP</span>
                    <span class="badge bg-info">Tutorial</span>
                    <span class="badge bg-warning">Web Dev</span>
                    <span class="badge bg-danger">News</span>
                    <span class="badge bg-dark">Tips</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
