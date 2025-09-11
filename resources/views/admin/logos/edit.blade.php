@extends('admin.layout')

@section('title', 'Edit Logo')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.logos.index') }}">Logos</a></li>
    <li class="breadcrumb-item active">Edit Logo</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Logo</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.logos.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Logo Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $logo->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi (Optional)</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $logo->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Main Logo</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Leave empty to keep current logo. Max file size: 2MB.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Current Main Logo:</label>
                            <div class="border p-3 bg-light text-center">
                                <img src="{{ asset('storage/' . $logo->image) }}" alt="{{ $logo->name }}"
                                    style="max-width: 300px; max-height: 150px; object-fit: contain;">
                            </div>
                        </div>

                        <div id="image-preview"></div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                id="thumbnail" name="thumbnail" accept="image/*">
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Leave empty to keep current thumbnail. Max file size: 2MB.</div>
                        </div>

                        @if ($logo->thumbnail)
                            <div class="mb-3">
                                <label class="form-label">Current Thumbnail:</label>
                                <div class="border p-3 bg-light text-center">
                                    <img src="{{ asset('storage/' . $logo->thumbnail) }}" alt="Thumbnail"
                                        style="max-width: 150px; max-height: 75px; object-fit: contain;">
                                </div>
                            </div>
                        @else
                            <div class="mb-3">
                                <div class="alert alert-info">
                                    <i class="ri-information-line me-2"></i>No thumbnail currently set. Upload one to add a
                                    thumbnail.
                                </div>
                            </div>
                        @endif

                        <div id="thumbnail-preview"></div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line me-2"></i>Update Logo
                            </button>
                            <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-left-line me-2"></i>Back to Logos
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Logo Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td>{{ $logo->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Created:</strong></td>
                            <td>{{ $logo->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Updated:</strong></td>
                            <td>{{ $logo->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Has Thumbnail:</strong></td>
                            <td>
                                @if ($logo->thumbnail)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">Logo Guidelines</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Use PNG format for
                            transparency</li>
                        <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Recommended size: 300x100px
                        </li>
                        <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Keep file size under 1MB</li>
                        <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Use high contrast colors</li>
                        <li><i class="ri-lightbulb-line text-warning me-2"></i>Ensure scalability</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        // Initialize CKEditor for deskripsi
        ClassicEditor
            .create(document.querySelector('#deskripsi'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo', '|',
                        'link', 'insertTable', 'blockQuote', '|',
                        'alignment:left', 'alignment:center', 'alignment:right', 'alignment:justify'
                    ]
                },
                language: 'en',
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });

        // Preview new main logo
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').innerHTML = `
                    <div class="mt-3">
                        <label class="form-label">New Main Logo Preview:</label>
                        <div class="border p-3 bg-light text-center">
                            <img src="${e.target.result}" alt="Preview" style="max-width: 300px; max-height: 150px; object-fit: contain;">
                        </div>
                    </div>
                `;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('image-preview').innerHTML = '';
            }
        });

        // Preview new thumbnail
        document.getElementById('thumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('thumbnail-preview').innerHTML = `
                    <div class="mt-3">
                        <label class="form-label">New Thumbnail Preview:</label>
                        <div class="border p-3 bg-light text-center">
                            <img src="${e.target.result}" alt="Thumbnail Preview" style="max-width: 150px; max-height: 75px; object-fit: contain;">
                        </div>
                    </div>
                `;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('thumbnail-preview').innerHTML = '';
            }
        });
    </script>
@endsection
