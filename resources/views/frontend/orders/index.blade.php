@extends('frontend.layouts.master')

@section('title', 'My Orders - Grace & Ground')

@section('content')
<div class="section">
    <div class="container">
        <div class="section-header">
            <h1>My Orders</h1>
        </div>
        
        @if($orders->count() > 0)
        <div style="display: grid; gap: 24px;">
            @foreach($orders as $order)
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border);">
                    <div>
                        <h3 style="font-size: 18px; margin-bottom: 4px;">Order #{{ $order->order_number }}</h3>
                        <span style="color: var(--text-muted); font-size: 14px;">{{ $order->created_at->format('F d, Y') }}</span>
                    </div>
                    <span class="badge {{ $order->status === 'delivered' ? 'badge-success' : ($order->status === 'cancelled' ? 'badge-error' : 'badge-warning') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                
                <div style="margin-bottom: 16px;">
                    @foreach($order->items as $item)
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; font-size: 14px;">
                        <span>{{ $item->product_name }} x{{ $item->quantity }}</span>
                        <span>₱{{ number_format($item->subtotal, 2) }}</span>
                    </div>
                    @endforeach
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 16px; border-top: 1px solid var(--border);">
                    <div style="font-size: 18px; font-weight: 600;">
                        Total: <span style="color: var(--burgundy);">₱{{ number_format($order->total, 2) }}</span>
                    </div>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4">
            {{ $orders->links() }}
        </div>
        @else
        <div class="card text-center" style="padding: 64px;">
            <p style="font-size: 18px; color: var(--text-light); margin-bottom: 24px;">You haven't placed any orders yet.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Start Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection