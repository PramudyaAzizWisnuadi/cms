@extends('admin.layout')

@section('title', 'Tag: ' . $tag->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
    <li class="breadcrumb-item active">{{ $tag->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        Tag: <span class="badge bg-primary fs-6">{{ $tag->name }}</span>
                    </h5>
                    @if($tag->description)
                        <small class="text-muted">{{ $tag->description }}</small>
                    @endif
                </div>
                <div class="btn-group">
                    <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning">
                        <i class="ri-edit-line me-2"></i>Edit Tag
                    </a>
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line me-2"></i>Back to Tags
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($posts->count() > 0)
                    <h6 class="mb-3">Posts with this tag ({{ $posts->total() }} total)</h6>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="60">#</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th width="120">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($post->thumbnail)
                                                <img src="{{ asset('storage/thumbnails/' . $post->thumbnail) }}" 
                                                     alt="{{ $post->title }}" 
                                                     class="rounded" 
                                                     style="width: 40px; height: 40px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 40px; height: 40px;">
                                                    <i class="ri-image-line text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <h6 class="mb-1">{{ Str::limit($post->title, 50) }}</h6>
                                            <small class="text-muted">{{ Str::limit($post->excerpt, 80) }}</small>
                                        </td>
                                        <td>
                                            @if($post->category)
                                                <span class="badge bg-success">{{ $post->category->name }}</span>
                                            @else
                                                <span class="badge bg-secondary">Uncategorized</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.posts.edit', $post) }}" 
                                                   class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <a href="{{ route('posts.show', $post->slug) }}" 
                                                   class="btn btn-sm btn-outline-info" 
                                                   title="View" target="_blank">
                                                    <i class="ri-external-link-line"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="ri-article-line display-1 text-muted"></i>
                        <h5 class="mt-3">No Posts Found</h5>
                        <p class="text-muted">This tag hasn't been assigned to any posts yet.</p>
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-2"></i>Create Post
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Tag Statistics -->
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <i class="ri-article-line fs-2 text-primary mb-2"></i>
                <h4 class="fw-bold">{{ $tag->posts()->count() }}</h4>
                <p class="mb-0 text-muted">Total Posts</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <i class="ri-eye-line fs-2 text-success mb-2"></i>
                <h4 class="fw-bold">{{ $tag->posts()->where('is_published', true)->count() }}</h4>
                <p class="mb-0 text-muted">Published</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <i class="ri-draft-line fs-2 text-warning mb-2"></i>
                <h4 class="fw-bold">{{ $tag->posts()->where('is_published', false)->count() }}</h4>
                <p class="mb-0 text-muted">Drafts</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <i class="ri-calendar-line fs-2 text-info mb-2"></i>
                <h4 class="fw-bold">{{ $tag->created_at->format('M Y') }}</h4>
                <p class="mb-0 text-muted">Created</p>
            </div>
        </div>
    </div>
</div>
@endsection
