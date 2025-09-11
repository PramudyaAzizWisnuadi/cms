@extends('admin.layout')

@section('title', 'Posts')

@section('breadcrumb')
    <li class="breadcrumb-item active">Posts</li>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Posts Management</h4>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
            <i class="ri-add-line me-2"></i>Add New Post
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                            class="thumbnail-small">
                                    @else
                                        <div class="image-placeholder thumbnail-small">
                                            <i class="ri-image-line"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <h6 class="mb-1">{{ $post->title }}</h6>
                                    <small class="text-muted">{{ Str::limit(strip_tags($post->body), 50) }}</small>
                                </td>
                                <td>
                                    @if ($post->category)
                                        <span class="badge bg-primary">{{ $post->category->name }}</span>
                                    @else
                                        <span class="badge bg-secondary">No Category</span>
                                    @endif
                                </td>
                                <td>
                                    @if($post->tags->count() > 0)
                                        @foreach($post->tags as $tag)
                                            <span class="badge bg-info me-1 mb-1">{{ $tag->name }}</span>
                                        @endforeach
                                    @else
                                        <small class="text-muted">No tags</small>
                                    @endif
                                </td>
                                <td>
                                    @if($post->status == 'published')
                                        <span class="badge bg-success">
                                            <i class="ri-checkbox-circle-line me-1"></i>Published
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="ri-draft-line me-1"></i>Draft
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <small>{{ $post->created_at->format('M d, Y') }}</small><br>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                            class="btn btn-sm btn-outline-primary btn-action">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-action">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="ri-article-line fs-2 d-block mb-2"></i>
                                        No posts found. <a href="{{ route('admin.posts.create') }}">Create your first
                                            post</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($posts->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
