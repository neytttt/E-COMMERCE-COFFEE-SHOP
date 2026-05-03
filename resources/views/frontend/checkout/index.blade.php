@extends('frontend.layouts.master')

@section('title', 'Checkout - Grace & Ground')

@section('content')
<div class="section">
    <div class="container">
        <div class="section-header">
            <h1>Checkout</h1>
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
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 400px; gap: 32px;">
                <!-- Form -->
                <div>
                    <!-- Shipping -->
                    <div class="card mb-4">
                        <h3 style="margin-bottom: 20px;">Shipping Information</h3>
                        
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="shipping_name" class="form-input" value="{{ auth()->user()->name ?? '' }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="text" name="shipping_phone" class="form-input" value="{{ auth()->user()->phone ?? '' }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Shipping Address *</label>
                            <textarea name="shipping_address" class="form-input" rows="3" required>{{ auth()->user()->address ?? '' }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Order Notes</label>
                            <textarea name="notes" class="form-input" rows="2" placeholder="Special instructions..."></textarea>
                        </div>
                    </div>
                    
                    <!-- Payment -->
                    <div class="card">
                        <h3 style="margin-bottom: 20px;">Payment Method</h3>
                        
                        <label style="display: flex; align-items: center; gap: 16px; padding: 16px; border: 2px solid var(--border); border-radius: 8px; margin-bottom: 12px; cursor: pointer;">
                            <input type="radio" name="payment_method" value="gcash" required>
                            <div>
                                <span style="font-weight: 600;">GCash</span>
                                <span style="display: block; font-size: 14px; color: var(--text-muted);">Pay via GCash app</span>
                            </div>
                        </label>
                        
                        <label style="display: flex; align-items: center; gap: 16px; padding: 16px; border: 2px solid var(--border); border-radius: 8px; margin-bottom: 12px; cursor: pointer;">
                            <input type="radio" name="payment_method" value="cod">
                            <div>
                                <span style="font-weight: 600;">Cash on Delivery</span>
                                <span style="display: block; font-size: 14px; color: var(--text-muted);">Pay when you receive</span>
                            </div>
                        </label>
                        
                        <label style="display: flex; align-items: center; gap: 16px; padding: 16px; border: 2px solid var(--border); border-radius: 8px; cursor: pointer;">
                            <input type="radio" name="payment_method" value="bank_transfer">
                            <div>
                                <span style="font-weight: 600;">Bank Transfer</span>
                                <span style="display: block; font-size: 14px; color: var(--text-muted);">Transfer to our bank account</span>
                            </div>
                        </label>
                    </div>
                </div>
                
                <!-- Summary -->
                <div>
                    <div class="card" style="padding: 24px;">
                        <h3 style="margin-bottom: 20px;">Order Summary</h3>
                        
                        @foreach($cart as $id => $item)
                        <div style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--border); font-size: 14px;">
                            <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                            <span>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                        @endforeach
                        
                        <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                            <span>Subtotal</span>
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
                        
                        <div style="display: flex; justify-content: space-between; padding: 16px 0; font-size: 22px; font-weight: 700;">
                            <span>Total</span>
                            <span style="color: var(--burgundy);">₱{{ number_format($total, 2) }}</span>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
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
    [style*="grid-template-columns: 1fr 400px"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endsection