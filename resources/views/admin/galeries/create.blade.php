@extends('admin.layout')

@section('title', 'Add Gallery Image')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.galeries.index') }}">Gallery</a></li>
    <li class="breadcrumb-item active">Add Image</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Add New Gallery Image</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galeries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Image Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select @error('category_id') is-invalid @enderror" 
                                id="category_id" name="category_id" required>
                            <option value="">Choose Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*" data-preview="image-preview" required>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Max file size: 2MB. Supported formats: JPEG, PNG, JPG, GIF</div>
                    </div>
                    
                    <div class="mb-3">
                        <div id="image-preview" class="text-center">
                            <div class="image-placeholder" style="height: 150px;">
                                <i class="ri-image-line"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line me-2"></i>Add to Gallery
                        </button>
                        <a href="{{ route('admin.galeries.index') }}" class="btn btn-secondary">
                            <i class="ri-arrow-left-line me-2"></i>Back to Gallery
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Tips</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Use descriptive names</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Choose the right category</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Optimize image size</li>
                    <li><i class="ri-lightbulb-line text-warning me-2"></i>Use high-quality images</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Preview image
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').innerHTML = `
                    <div class="mt-3">
                        <label class="form-label">Preview:</label>
                        <div>
                            <img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                        </div>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
