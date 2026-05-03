@extends('frontend.layouts.master')

@section('title', 'Shop - Grace & Ground Coffee Shop')

@section('content')
<div class="section">
    <div class="container">
        <div class="section-header">
            <h1>Our Coffee Collection</h1>
            <p>{{ $products->total() }} products available</p>
        </div>
        
        <div style="display: grid; grid-template-columns: 240px 1fr; gap: 32px;">
            <!-- Sidebar -->
            <aside>
                <div class="card" style="padding: 24px;">
                    <h4 style="margin-bottom: 16px; font-size: 16px;">Categories</h4>
                    <ul style="list-style: none;">
                        <li style="margin-bottom: 12px;">
                            <a href="{{ route('products.index') }}" style="{{ !request()->category ? 'color: var(--burgundy); font-weight: 600;' : '' }}">All Products</a>
                        </li>
                        @foreach($categories as $cat)
                        <li style="margin-bottom: 12px;">
                            <a href="{{ route('products.category', $cat->slug) }}" style="{{ request()->category === $cat->slug ? 'color: var(--burgundy); font-weight: 600;' : '' }}">{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    
                    <h4 style="margin: 24px 0 16px; font-size: 16px;">Sort By</h4>
                    <form action="{{ route('products.index') }}" method="GET">
                        @if(request()->category)
                        <input type="hidden" name="category" value="{{ request()->category }}">
                        @endif
                        <select name="sort" class="form-input" onchange="this.form.submit()" style="padding: 10px;">
                            <option value="newest" {{ request()->sort === 'newest' ? 'selected' : '' }}>Newest First</option>
                            <option value="price_asc" {{ request()->sort === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request()->sort === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </form>
                </div>
            </aside>
            
            <!-- Products -->
            <div>
                @if($products->count() > 0)
                <div class="products-grid">
                    @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                            <span>No Image</span>
                            @endif
                            @if($product->is_featured)
                            <span class="product-badge">Featured</span>
                            @endif
                            @if($product->stock_quantity <= 0)
                            <span class="product-badge" style="background: var(--error);">Out of Stock</span>
                            @endif
                        </div>
                        <div class="product-info">
                            <span class="product-category">{{ $product->category->name }}</span>
                            <h3 class="product-name">
                                <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            @if($product->short_description)
                            <p style="color: var(--text-light); font-size: 14px; margin: 8px 0;">{{ Str::limit($product->short_description, 60) }}</p>
                            @endif
                            <div class="product-price">
                                ₱{{ number_format($product->price, 2) }}
                                @if($product->original_price)
                                <span class="original">₱{{ number_format($product->original_price, 2) }}</span>
                                @endif
                            </div>
                            @if($product->stock_quantity > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                            @else
                            <button class="btn btn-outline" disabled style="opacity: 0.5;">Out of Stock</button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-4">
                    {{ $products->links() }}
                </div>
                @else
                <div class="card text-center" style="padding: 64px;">
                    <p style="font-size: 18px; color: var(--text-light); margin-bottom: 24px;">No products found.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Clear Filters</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    [style*="grid-template-columns: 240px"] {
        grid-template-columns: 1fr !important;
    }
    aside {
        display: none;
    }
}
</style>
@endsection