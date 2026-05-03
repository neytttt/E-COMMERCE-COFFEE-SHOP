@extends('admin.layouts.master')

@section('title', 'Customer Details - Admin')

@section('page-title', 'Customer Details')

@section('content')
<div class="page-content">
    <div class="customer-header">
        <h2>{{ $customer->name }}</h2>
        <span class="badge {{ $customer->is_active ? 'badge-success' : 'badge-error' }}">
            {{ $customer->is_active ? 'Active' : 'Inactive' }}
        </span>
    </div>
    
    <div class="customer-details">
        <div class="detail-card">
            <h3>Contact Information</h3>
            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span>{{ $customer->email }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Phone:</span>
                <span>{{ $customer->phone ?? 'Not provided' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Address:</span>
                <span>{{ $customer->address ?? 'Not provided' }}</span>
            </div>
        </div>
        
        <div class="detail-card">
            <h3>Account Information</h3>
            <div class="detail-row">
                <span class="detail-label">Member Since:</span>
                <span>{{ $customer->created_at->format('F d, Y') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Orders:</span>
                <span>{{ $customer->orders()->count() }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Spent:</span>
                <span>₱{{ number_format($customer->orders()->where('status', 'completed')->sum('total'), 2) }}</span>
            </div>
        </div>
        
        <div class="detail-card">
            <h3>Recent Orders</h3>
            @if($customer->orders()->count() > 0)
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer->orders()->latest()->take(5)->get() as $order)
                    <tr>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->order_number }}</a>
                        </td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="badge badge-info">{{ ucfirst($order->status) }}</span>
                        </td>
                        <td>₱{{ number_format($order->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-orders">No orders yet.</p>
            @endif
        </div>
    </div>
    
    <div class="form-actions">
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back to Customers</a>
        <form method="POST" action="{{ route('admin.customers.toggle-status', $customer->id) }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ $customer->is_active ? 'Deactivate' : 'Activate' }}
            </button>
        </form>
    </div>
</div>

<style>
.page-content { padding: 2rem; }
.customer-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}
.customer-header h2 { margin: 0; }
.customer-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}
.detail-card {
    background: var(--admin-bg-card);
    border: 1px solid var(--admin-border);
    border-radius: 8px;
    padding: 1.5rem;
}
.detail-card h3 {
    margin: 0 0 1rem;
    font-size: 1.1rem;
    color: var(--admin-primary);
}
.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--admin-border);
}
.detail-label {
    color: var(--admin-text-secondary);
}
.orders-table {
    width: 100%;
    border-collapse: collapse;
}
.orders-table th,
.orders-table td {
    padding: 0.5rem;
    text-align: left;
    border-bottom: 1px solid var(--admin-border);
}
.orders-table a {
    color: var(--admin-primary);
    text-decoration: none;
}
.no-orders {
    color: var(--admin-text-secondary);
    font-style: italic;
}
.form-actions {
    display: flex;
    gap: 1rem;
}
</style>
@endsection