@extends('admin.layout')

@section('title', 'Create Post')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create New Post</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
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
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" 
                               id="thumbnail" name="thumbnail" accept="image/*">
                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Max file size: 2MB. Supported formats: JPEG, PNG, JPG, GIF</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="body" class="form-label">Content <span class="text-danger">*</span></label>
                        <div id="editor-container">
                            <textarea class="form-control @error('body') is-invalid @enderror" 
                                      id="body" name="body" style="display:none;" required>{{ old('body') }}</textarea>
                            <div id="editor" style="min-height: 400px;">{{ old('body') }}</div>
                        </div>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Use the rich text editor to format your content</div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Choose Status</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                <i class="ri-draft-line me-2"></i>Draft
                            </option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                <i class="ri-checkbox-circle-line me-2"></i>Published
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Draft posts are not visible to the public</div>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <select class="form-select @error('tags') is-invalid @enderror" 
                                id="tags" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" 
                                    {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Hold Ctrl/Cmd to select multiple tags</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line me-2"></i>Create Post
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                            <i class="ri-arrow-left-line me-2"></i>Back to Posts
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Publishing</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div class="bg-light p-2 rounded" id="status-display">
                        <i class="ri-draft-line me-2"></i>Draft
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Visibility</label>
                    <div class="bg-light p-2 rounded">
                        <i class="ri-eye-line me-2"></i>Public
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Publish</label>
                    <div class="bg-light p-2 rounded">
                        <i class="ri-calendar-line me-2"></i>Immediately
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Tips</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Use engaging titles</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Add relevant images</li>
                    <li class="mb-2"><i class="ri-lightbulb-line text-warning me-2"></i>Choose appropriate category</li>
                    <li><i class="ri-lightbulb-line text-warning me-2"></i>Preview before publishing</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    // Initialize CKEditor 5
    let editorInstance;
    
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'link', 'bulletedList', 'numberedList', '|',
                'alignment', '|',
                'blockQuote', 'insertTable', '|',
                'undo', 'redo', '|',
                'code', 'codeBlock', '|',
                'sourceEditing'
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            language: 'en'
        })
        .then(editor => {
            editorInstance = editor;
            
            // Update hidden textarea when editor content changes
            editor.model.document.on('change:data', () => {
                document.querySelector('#body').value = editor.getData();
            });
            
            // Set initial content if exists
            const initialContent = document.querySelector('#body').value;
            if (initialContent) {
                editor.setData(initialContent);
            }
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });

    // Ensure editor content is synced before form submission
    document.querySelector('form').addEventListener('submit', function(e) {
        if (editorInstance) {
            document.querySelector('#body').value = editorInstance.getData();
        }
    });

    // Preview thumbnail
    document.getElementById('thumbnail').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create preview if doesn't exist
                let preview = document.getElementById('thumbnail-preview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'thumbnail-preview';
                    preview.className = 'mt-2';
                    e.target.parentNode.appendChild(preview);
                }
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-width: 200px;">`;
            };
            reader.readAsDataURL(file);
        }
    });

    // Update status display
    document.getElementById('status').addEventListener('change', function(e) {
        const statusDisplay = document.getElementById('status-display');
        const value = e.target.value;
        
        if (value === 'draft') {
            statusDisplay.innerHTML = '<i class="ri-draft-line me-2"></i>Draft';
            statusDisplay.className = 'bg-warning bg-opacity-10 text-warning p-2 rounded';
        } else if (value === 'published') {
            statusDisplay.innerHTML = '<i class="ri-checkbox-circle-line me-2"></i>Published';
            statusDisplay.className = 'bg-success bg-opacity-10 text-success p-2 rounded';
        } else {
            statusDisplay.innerHTML = '<i class="ri-draft-line me-2"></i>Draft';
            statusDisplay.className = 'bg-light p-2 rounded';
        }
    });
</script>
@endsection
