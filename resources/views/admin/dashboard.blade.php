@extends('admin.layout')

@section('title', 'Dashboard')
@section('subtitle', 'Welcome back! Here\'s what\'s happening with your content.')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Stats Overview -->
    <div class="row g-4 mb-5">
        <div class="col-md-6 col-xl-3">
            <div class="card stats-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="rounded-3 p-3" style="background: rgba(255,255,255,0.2);">
                            <i class="ri-article-line fs-2"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h3 class="fw-bold mb-1">{{ number_format($stats['posts']) }}</h3>
                        <p class="mb-0 opacity-90">Total Posts</p>
                        <small class="opacity-75">
                            <i class="ri-arrow-up-line"></i> Active content
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card h-100" style="background: linear-gradient(135deg, var(--accent-color) 0%, #059669 100%); color: white; position: relative; overflow: hidden;">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="rounded-3 p-3" style="background: rgba(255,255,255,0.2);">
                            <i class="ri-gallery-line fs-2"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h3 class="fw-bold mb-1">{{ number_format($stats['galleries']) }}</h3>
                        <p class="mb-0 opacity-90">Gallery Items</p>
                        <small class="opacity-75">
                            <i class="ri-image-line"></i> Media files
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card h-100" style="background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%); color: white; position: relative; overflow: hidden;">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="rounded-3 p-3" style="background: rgba(255,255,255,0.2);">
                            <i class="ri-image-2-line fs-2"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h3 class="fw-bold mb-1">{{ number_format($stats['logos']) }}</h3>
                        <p class="mb-0 opacity-90">Logos</p>
                        <small class="opacity-75">
                            <i class="ri-branding-line"></i> Brand assets
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); color: white; position: relative; overflow: hidden;">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="rounded-3 p-3" style="background: rgba(255,255,255,0.2);">
                            <i class="ri-price-tag-3-line fs-2"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h3 class="fw-bold mb-1">{{ number_format($stats['tags']) }}</h3>
                        <p class="mb-0 opacity-90">Tags</p>
                        <small class="opacity-75">
                            <i class="ri-hashtag"></i> Categories
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Content Overview -->
    <div class="row g-4">
        <!-- Recent Posts -->
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Recent Posts</h5>
                            <p class="text-muted mb-0 small">Latest articles and updates</p>
                        </div>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary btn-sm">
                            <i class="ri-eye-line me-1"></i>View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @forelse($stats['recent_posts'] as $post)
                        <div class="d-flex align-items-center p-3 rounded-3 mb-3" style="background: var(--bg-light); border: 1px solid var(--border-color); transition: all 0.3s ease;">
                            @if ($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="rounded-3 me-3" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--border-color);">
                            @else
                                <div class="rounded-3 me-3 d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); color: white;">
                                    <i class="ri-article-line fs-5"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-semibold">{{ Str::limit($post->title, 50) }}</h6>
                                <div class="d-flex align-items-center gap-3">
                                    <small class="text-muted">
                                        <i class="ri-time-line me-1"></i>{{ $post->created_at->diffForHumans() }}
                                    </small>
                                    @if($post->status)
                                        <span class="badge {{ $post->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($post->status) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-outline-primary btn-sm">
                                <i class="ri-edit-line"></i>
                            </a>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="ri-article-line"></i>
                            <h3>No posts yet</h3>
                            <p>Start creating amazing content for your website.</p>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                <i class="ri-add-line me-1"></i>Create First Post
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Gallery & Quick Actions -->
        <div class="col-lg-4">
            <!-- Recent Gallery -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Recent Gallery</h5>
                            <p class="text-muted mb-0 small">Latest media uploads</p>
                        </div>
                        <a href="{{ route('admin.galeries.index') }}" class="btn btn-success btn-sm">
                            <i class="ri-image-line me-1"></i>View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @forelse($stats['recent_galleries'] as $gallery)
                        <div class="d-flex align-items-center p-2 rounded-3 mb-3" style="background: var(--bg-light); border: 1px solid var(--border-color);">
                            @if ($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->name }}"
                                    class="rounded-3 me-3" style="width: 45px; height: 45px; object-fit: cover; border: 2px solid var(--border-color);">
                            @else
                                <div class="rounded-3 me-3 d-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px; background: linear-gradient(135deg, var(--accent-color) 0%, #059669 100%); color: white;">
                                    <i class="ri-image-line"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1 small fw-semibold">{{ Str::limit($gallery->name, 25) }}</h6>
                                <small class="text-muted">
                                    <i class="ri-time-line me-1"></i>{{ $gallery->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-3">
                            <i class="ri-image-line fs-2 text-muted mb-2"></i>
                            <p class="text-muted mb-2 small">No gallery items yet.</p>
                            <a href="{{ route('admin.galeries.create') }}" class="btn btn-success btn-sm">
                                <i class="ri-add-line me-1"></i>Add Images
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-1">Quick Actions</h5>
                    <p class="text-muted mb-0 small">Frequently used tasks</p>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-2"></i>New Post
                        </a>
                        <a href="{{ route('admin.galeries.create') }}" class="btn btn-success">
                            <i class="ri-image-add-line me-2"></i>Upload Media
                        </a>
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-warning">
                            <i class="ri-price-tag-3-line me-2"></i>Add Tag
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
                            <i class="ri-external-link-line me-2"></i>View Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
