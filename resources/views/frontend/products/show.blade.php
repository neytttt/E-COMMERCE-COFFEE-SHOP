@extends('frontend.layouts.master')

@section('title', $product->name . ' - Grace & Ground')

@section('content')
<div class="section">
    <div class="container">
        <!-- Breadcrumb -->
        <nav style="margin-bottom: 24px; font-size: 14px; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted);">Home</a> / 
            <a href="{{ route('products.index') }}" style="color: var(--text-muted);">Shop</a> / 
            <span style="color: var(--text);">{{ $product->name }}</span>
        </nav>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 64px;">
            <!-- Image -->
            <div>
                <div class="card" style="padding: 0; overflow: hidden; border-radius: 12px;">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; aspect-ratio: 1; object-fit: cover;">
                    @else
                    <div style="width: 100%; aspect-ratio: 1; background: #f5f5f5; display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                        No Image
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Info -->
            <div>
                <span style="font-size: 14px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">{{ $product->category->name }}</span>
                
                <h1 style="font-size: 36px; margin: 12px 0;">{{ $product->name }}</h1>
                
                <div style="font-size: 28px; font-weight: 700; color: var(--burgundy); margin-bottom: 16px;">
                    ₱{{ number_format($product->price, 2) }}
                    @if($product->original_price)
                    <span style="font-size: 18px; color: var(--text-muted); text-decoration: line-through; margin-left: 12px;">
                        ₱{{ number_format($product->original_price, 2) }}
                    </span>
                    @if($product->discount_percentage > 0)
                    <span class="badge badge-error" style="margin-left: 12px;">-{{ $product->discount_percentage }}% OFF</span>
                    @endif
                    @endif
                </div>
                
                @if($product->short_description)
                <p style="color: var(--text-light); font-size: 16px; margin-bottom: 24px; line-height: 1.8;">{{ $product->short_description }}</p>
                @endif
                
                <!-- Details -->
                <div class="card" style="padding: 20px; margin-bottom: 24px;">
                    @if($product->roast_level)
                    <div style="display: flex; padding: 10px 0; border-bottom: 1px solid var(--border);">
                        <span style="width: 120px; color: var(--text-muted);">Roast</span>
                        <span style="font-weight: 600;">{{ ucfirst($product->roast_level) }}</span>
                    </div>
                    @endif
                    @if($product->origin)
                    <div style="display: flex; padding: 10px 0; border-bottom: 1px solid var(--border);">
                        <span style="width: 120px; color: var(--text-muted);">Origin</span>
                        <span style="font-weight: 600;">{{ $product->origin }}</span>
                    </div>
                    @endif
                    @if($product->region)
                    <div style="display: flex; padding: 10px 0; border-bottom: 1px solid var(--border);">
                        <span style="width: 120px; color: var(--text-muted);">Region</span>
                        <span style="font-weight: 600;">{{ $product->region }}</span>
                    </div>
                    @endif
                    @if($product->weight)
                    <div style="display: flex; padding: 10px 0; border-bottom: 1px solid var(--border);">
                        <span style="width: 120px; color: var(--text-muted);">Weight</span>
                        <span style="font-weight: 600;">{{ $product->weight }}</span>
                    </div>
                    @endif
                    @if($product->flavor_notes)
                    <div style="display: flex; padding: 10px 0; border-bottom: 1px solid var(--border);">
                        <span style="width: 120px; color: var(--text-muted);">Flavor</span>
                        <span style="font-weight: 600;">{{ $product->flavor_notes }}</span>
                    </div>
                    @endif
                    <div style="display: flex; padding: 10px 0;">
                        <span style="width: 120px; color: var(--text-muted);">Availability</span>
                        <span style="font-weight: 600; color: {{ $product->stock_quantity > 0 ? 'var(--success)' : 'var(--error)'; }}">
                            {{ $product->stock_quantity > 0 ? 'In Stock (' . $product->stock_quantity . ' available)' : 'Out of Stock' }}
                        </span>
                    </div>
                </div>
                
                @if($product->stock_quantity > 0)
                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display: flex; gap: 16px; margin-bottom: 32px;">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock_quantity }}" class="form-input" style="width: 100px;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Add to Cart</button>
                </form>
                @else
                <button class="btn btn-outline" disabled style="width: 100%; opacity: 0.5;">Out of Stock</button>
                @endif
                
                <!-- Description -->
                <div style="margin-top: 32px;">
                    <h3 style="margin-bottom: 16px;">Description</h3>
                    <div style="color: var(--text-light); line-height: 1.8;">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div style="margin-top: 64px;">
            <h2 style="font-size: 28px; margin-bottom: 32px;">You May Also Like</h2>
            <div class="products-grid">
                @foreach($relatedProducts as $related)
                <div class="product-card">
                    <div class="product-image">
                        @if($related->image)
                        <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}">
                        @endif
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">
                            <a href="{{ route('products.show', $related->slug) }}">{{ $related->name }}</a>
                        </h3>
                        <div class="product-price">₱{{ number_format($related->price, 2) }}</div>
                        <form action="{{ route('cart.add', $related->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<style>
@media (max-width: 768px) {
    [style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 32px !important;
    }
}
</style>
@endsection