@extends('admin.layout')

@section('title', 'Edit Gallery Image')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.galeries.index') }}">Gallery</a></li>
    <li class="breadcrumb-item active">Edit Image</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Gallery Image</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galeries.update', $galery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Image Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $galery->name) }}" required>
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
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $galery->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*" data-preview="image-preview">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave empty to keep current image. Max file size: 2MB. Supported formats: JPEG, PNG, JPG, GIF</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Current Image:</label>
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $galery->image) }}" 
                                 alt="{{ $galery->name }}" 
                                 class="gallery-image" 
                                 style="max-width: 300px;">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div id="image-preview" class="text-center" style="display: none;">
                            <!-- New image preview will appear here -->
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line me-2"></i>Update Image
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
                <h6 class="mb-0">Image Details</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>Category:</strong></td>
                        <td>{{ $galery->category->name ?? 'Uncategorized' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $galery->created_at->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $galery->updated_at->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
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
    // Preview new image
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').innerHTML = `
                    <div class="mt-3">
                        <label class="form-label">New Preview:</label>
                        <div>
                            <img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                        </div>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('image-preview').innerHTML = '';
        }
    });
</script>
@endsection
