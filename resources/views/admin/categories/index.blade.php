@extends('admin.layouts.master')

@section('title', 'Categories - Admin')

@section('page-title', 'Categories')

@section('content')
<div class="page-content">
    <div class="toolbar">
        <form action="{{ route('admin.categories.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search categories..." class="form-input" value="{{ request()->search }}">
            <select name="type" class="form-input">
                <option value="">All Types</option>
                <option value="coffee" {{ request()->type === 'coffee' ? 'selected' : '' }}>Coffee</option>
                <option value="merchandise" {{ request()->type === 'merchandise' ? 'selected' : '' }}>Merchandise</option>
                <option value="bundle" {{ request()->type === 'bundle' ? 'selected' : '' }}>Bundle</option>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Products</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="table-image">
                        @else
                        <div class="no-image">-</div>
                        @endif
                    </td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>
                        <span class="badge badge-info">{{ ucfirst($category->type) }}</span>
                    </td>
                    <td>{{ $category->products()->count() }}</td>
                    <td>
                        <span class="badge {{ $category->is_active ? 'badge-success' : 'badge-error' }}">
                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.categories.toggle', $category->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">{{ $category->is_active ? 'Disable' : 'Enable' }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination">
            {{ $categories->links() }}
        </div>
    </div>
</div>

<style>
.page-content {
    padding: 2rem;
}
.toolbar {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}
.search-form {
    display: flex;
    gap: 1rem;
}
.search-form .form-input {
    width: 200px;
}
.table-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
}
.no-image {
    width: 50px;
    height: 50px;
    background: var(--admin-bg-hover);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
}
.actions {
    display: flex;
    gap: 0.5rem;
}
</style>
@endsection