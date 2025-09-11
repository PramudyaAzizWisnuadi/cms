@extends('admin.layout')

@section('title', 'Manage Tags')

@section('breadcrumb')
    <li class="breadcrumb-item active">Tags</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Manage Tags</h5>
                <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
                    <i class="ri-add-line me-2"></i>Add Tag
                </a>
            </div>
            <div class="card-body">
                @if($tags->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="60">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Posts Count</th>
                                    <th>Created</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ $tag->name }}</span>
                                        </td>
                                        <td>
                                            @if($tag->description)
                                                {{ Str::limit($tag->description, 50) }}
                                            @else
                                                <span class="text-muted">No description</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $tag->posts_count }} posts</span>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $tag->created_at->format('M d, Y') }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.tags.show', $tag) }}" 
                                                   class="btn btn-sm btn-outline-info" title="View Posts">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{ route('admin.tags.edit', $tag) }}" 
                                                   class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <form action="{{ route('admin.tags.destroy', $tag) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure? This will remove the tag from all posts.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $tags->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="ri-price-tag-3-line display-1 text-muted"></i>
                        <h5 class="mt-3">No Tags Found</h5>
                        <p class="text-muted">Start by creating your first tag to organize your posts.</p>
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-2"></i>Create Tag
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
