@extends('frontend.layouts.master')

@section('title', 'Order Confirmed - Grace & Ground')

@section('content')
<div class="section">
    <div class="container">
        <div class="card text-center" style="padding: 64px; max-width: 600px; margin: 0 auto;">
            <div style="width: 80px; height: 80px; background: var(--success); color: white; font-size: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">✓</div>
            
            <h1 style="font-size: 32px; margin-bottom: 12px;">Thank You!</h1>
            <p style="font-size: 18px; color: var(--text-light); margin-bottom: 32px;">Your order has been placed successfully.</p>
            
            <div class="card" style="padding: 24px; text-align: left; margin-bottom: 32px;">
                <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                    <span>Order Number</span>
                    <strong>{{ $order->order_number }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                    <span>Total</span>
                    <strong>₱{{ number_format($order->total, 2) }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                    <span>Status</span>
                    <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
                </div>
            </div>
            
            <p style="color: var(--text-muted); margin-bottom: 32px;">A confirmation email has been sent to your email address.</p>
            
            <div style="display: flex; gap: 16px; justify-content: center;">
                <a href="{{ route('orders.index') }}" class="btn btn-primary">View Orders</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
@endsection