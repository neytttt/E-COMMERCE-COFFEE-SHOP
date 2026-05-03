@extends('admin.layouts.master')

@section('title', 'Banners - Admin')

@section('page-title', 'Banners')

@section('content')
<div class="page-content">
    <div class="toolbar">
        <form action="{{ route('admin.banners.index') }}" method="GET" class="search-form">
            <select name="position" class="form-input">
                <option value="">All Positions</option>
                <option value="hero" {{ request()->position === 'hero' ? 'selected' : '' }}>Hero</option>
                <option value="banner" {{ request()->position === 'banner' ? 'selected' : '' }}>Banner</option>
                <option value="featured" {{ request()->position === 'featured' ? 'selected' : '' }}>Featured</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add Banner</a>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                <tr>
                    <td>
                        @if($banner->image)
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="table-image">
                        @else
                        <div class="no-image">-</div>
                        @endif
                    </td>
                    <td><strong>{{ $banner->title }}</strong></td>
                    <td>
                        <span class="badge badge-info">{{ ucfirst($banner->position) }}</span>
                    </td>
                    <td>
                        <span class="badge {{ $banner->is_active ? 'badge-success' : 'badge-error' }}">
                            {{ $banner->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.banners.toggle', $banner->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">{{ $banner->is_active ? 'Disable' : 'Enable' }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination">
            {{ $banners->links() }}
        </div>
    </div>
</div>

<style>
.page-content { padding: 2rem; }
.toolbar { display: flex; justify-content: space-between; margin-bottom: 1.5rem; }
.search-form { display: flex; gap: 1rem; }
.search-form .form-input { width: 200px; }
.table-image { width: 100px; height: 60px; object-fit: cover; border-radius: 4px; }
.no-image { width: 100px; height: 60px; background: var(--admin-bg-hover); display: flex; align-items: center; justify-content: center; border-radius: 4px; }
.actions { display: flex; gap: 0.5rem; }
</style>
@endsection