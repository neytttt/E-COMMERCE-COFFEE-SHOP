@extends('admin.layouts.master')

@section('title', 'Orders - Admin')

@section('page-title', 'Orders')

@section('content')
<div class="page-content">
    <div class="toolbar">
        <form action="{{ route('admin.orders.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by order number..." class="form-input" value="{{ request()->search }}">
            <select name="status" class="form-input">
                <option value="">All Status</option>
                <option value="pending" {{ request()->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request()->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="processing" {{ request()->status === 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ request()->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ request()->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ request()->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Items</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->order_number }}</a>
                    </td>
                    <td>{{ $order->user->name }}</td>
                    <td>₱{{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->total_quantity }}</td>
                    <td>
                        <span class="badge {{ $order->status === 'delivered' ? 'badge-success' : ($order->status === 'cancelled' ? 'badge-error' : ($order->status === 'shipped' ? 'badge-info' : 'badge-warning')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $order->payment_status === 'paid' ? 'badge-success' : 'badge-warning' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-secondary btn-sm">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination">
            {{ $orders->links() }}
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
table a {
    color: var(--admin-primary);
    text-decoration: none;
}
table a:hover {
    text-decoration: underline;
}
</style>
@endsection