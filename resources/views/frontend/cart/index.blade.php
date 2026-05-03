@extends('frontend.layouts.master')

@section('title', 'Shopping Cart - Grace & Ground')

@section('content')
<div class="section">
    <div class="container">
        <div class="section-header">
            <h1>Shopping Cart</h1>
        </div>
        
        @php
        $cart = session('cart', []);
        $cartTotal = 0;
        $itemCount = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
            $itemCount += $item['quantity'];
        }
        $tax = $cartTotal * 0.12;
        $shipping = $cartTotal > 500 ? 0 : 50;
        $total = $cartTotal + $tax + $shipping;
        @endphp
        
        @if(count($cart) > 0)
        <div style="display: grid; grid-template-columns: 1fr 380px; gap: 32px;">
            <!-- Cart Items -->
            <div>
                <div class="card" style="padding: 0; overflow: hidden;">
                    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 60px; gap: 16px; padding: 16px 24px; background: var(--cream); font-weight: 600; font-size: 14px;">
                        <span>Product</span>
                        <span>Price</span>
                        <span>Quantity</span>
                        <span>Subtotal</span>
                        <span></span>
                    </div>
                    
                    @foreach($cart as $id => $item)
                    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 60px; gap: 16px; padding: 20px 24px; align-items: center; border-bottom: 1px solid var(--border);">
                        <div style="display: flex; gap: 16px; align-items: center;">
                            @if(isset($item['image']))
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                            @else
                            <div style="width: 80px; height: 80px; background: #f5f5f5; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); font-size: 12px;">No Image</div>
                            @endif
                            <div>
                                <h4 style="font-size: 16px; margin-bottom: 4px;">{{ $item['name'] }}</h4>
                                <span style="color: var(--text-muted);">₱{{ number_format($item['price'], 2) }}</span>
                            </div>
                        </div>
                        
                        <span>₱{{ number_format($item['price'], 2) }}</span>
                        
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-input" style="width: 70px; padding: 8px;" onchange="this.form.submit()">
                        </form>
                        
                        <span style="font-weight: 600;">₱{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; font-size: 24px; color: var(--error); cursor: pointer;">&times;</button>
                        </form>
                    </div>
                    @endforeach
                </div>
                
                <form action="{{ route('cart.clear') }}" method="POST" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline">Clear Cart</button>
                </form>
            </div>
            
            <!-- Summary -->
            <div>
                <div class="card" style="padding: 24px;">
                    <h3 style="margin-bottom: 20px;">Order Summary</h3>
                    
                    <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                        <span>Subtotal ({{ $itemCount }} items)</span>
                        <span>₱{{ number_format($cartTotal, 2) }}</span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                        <span>Tax (12%)</span>
                        <span>₱{{ number_format($tax, 2) }}</span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                        <span>Shipping</span>
                        <span>₱{{ number_format($shipping, 2) }}</span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; padding: 16px 0; font-size: 20px; font-weight: 700;">
                        <span>Total</span>
                        <span style="color: var(--burgundy);">₱{{ number_format($total, 2) }}</span>
                    </div>
                    
                    @auth
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Proceed to Checkout</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Login to Checkout</a>
                    <p style="text-align: center; font-size: 14px; color: var(--text-muted); margin-top: 12px;">Please login to complete your order</p>
                    @endauth
                </div>
            </div>
        </div>
        @else
        <div class="card text-center" style="padding: 64px;">
            <p style="font-size: 20px; color: var(--text-light); margin-bottom: 24px;">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>

<style>
@media (max-width: 768px) {
    [style*="grid-template-columns: 1fr 380px"] {
        grid-template-columns: 1fr !important;
    }
    [style*="grid-template-columns: 2fr 1fr 1fr 1fr"] {
        display: none !important;
    }
}
</style>
@endsection