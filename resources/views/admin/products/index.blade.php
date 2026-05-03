@extends('admin.layouts.master')

@section('title', 'Products - Admin')

@section('page-title', 'Products')

@section('content')
<div class="page-content">
    <div class="toolbar">
        <form action="{{ route('admin.products.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search products..." class="form-input" value="{{ request()->search }}">
            <select name="category_id" class="form-input">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request()->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="table-image">
                        @else
                        <div class="no-image">-</div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $product->name }}</strong>
                        @if($product->is_featured)
                        <span class="badge badge-warning">Featured</span>
                        @endif
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <span>₱{{ number_format($product->price, 2) }}</span>
                        @if($product->original_price)
                        <span class="price-original">₱{{ number_format($product->original_price, 2) }}</span>
                        @endif
                    </td>
                    <td>
                        <span class="{{ $product->stock_quantity <= $product->low_stock_threshold ? 'text-warning' : '' }}">
                            {{ $product->stock_quantity }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $product->is_active ? 'badge-success' : 'badge-error' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.products.toggle-featured', $product->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">{{ $product->is_featured ? 'Unfeature' : 'Feature' }}</button>
                            </form>
                            <form method="POST" action="{{ route('admin.products.toggle-status', $product->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">{{ $product->is_active ? 'Disable' : 'Enable' }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination">
            {{ $products->links() }}
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
.text-warning {
    color: var(--admin-warning);
}
.price-original {
    text-decoration: line-through;
    font-size: 12px;
    color: var(--admin-text-muted);
    margin-left: 0.5rem;
}
</style>
@endsection