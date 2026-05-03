@extends('admin.layouts.master')

@section('title', 'Dashboard - Admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="dashboard-content">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📦</div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalOrders }}</span>
                <span class="stat-label">Total Orders</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">💰</div>
            <div class="stat-info">
                <span class="stat-value">₱{{ number_format($totalRevenue, 2) }}</span>
                <span class="stat-label">Total Revenue</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">☕</div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalProducts }}</span>
                <span class="stat-label">Total Products</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalCustomers }}</span>
                <span class="stat-label">Customers</span>
            </div>
        </div>
    </div>
    
    <div class="dashboard-grid">
        <div class="card">
            <h3 class="card-title">Today's Stats</h3>
            <div class="stats-mini">
                <div class="stat-row">
                    <span>Orders Today</span>
                    <span>{{ $todayOrders }}</span>
                </div>
                <div class="stat-row">
                    <span>Revenue Today</span>
                    <span>₱{{ number_format($todayRevenue, 2) }}</span>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h3 class="card-title">This Month</h3>
            <div class="stats-mini">
                <div class="stat-row">
                    <span>Orders</span>
                    <span>{{ $monthOrders }}</span>
                </div>
                <div class="stat-row">
                    <span>Revenue</span>
                    <span>₱{{ number_format($monthRevenue, 2) }}</span>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h3 class="card-title">Order Status</h3>
            <div class="stats-mini">
                <div class="stat-row">
                    <span>Pending</span>
                    <span class="badge badge-warning">{{ $pendingOrders }}</span>
                </div>
                <div class="stat-row">
                    <span>Processing</span>
                    <span class="badge badge-info">{{ $processingOrders }}</span>
                </div>
                <div class="stat-row">
                    <span>Shipped</span>
                    <span class="badge badge-success">{{ $shippedOrders }}</span>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h3 class="card-title">Inventory</h3>
            <div class="stats-mini">
                <div class="stat-row">
                    <span>Low Stock</span>
                    <span class="badge badge-warning">{{ $lowStockProducts }}</span>
                </div>
                <div class="stat-row">
                    <span>Out of Stock</span>
                    <span class="badge badge-error">{{ $outOfStockProducts }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mt-4">
        <h3 class="card-title">Recent Orders</h3>
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->order_number }}</a>
                    </td>
                    <td>{{ $order->user->name }}</td>
                    <td>₱{{ number_format($order->total, 2) }}</td>
                    <td>
                        <span class="badge {{ $order->status === 'delivered' ? 'badge-success' : ($order->status === 'cancelled' ? 'badge-error' : 'badge-warning') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $order->payment_status === 'paid' ? 'badge-success' : 'badge-warning' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
.dashboard-content {
    padding: 2rem;
}
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}
.stat-card {
    background: var(--admin-bg-card);
    border: 1px solid var(--admin-border);
    border-radius: 8px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}
.stat-icon {
    font-size: 32px;
}
.stat-info {
    display: flex;
    flex-direction: column;
}
.stat-value {
    font-size: 24px;
    font-weight: 700;
    color: var(--admin-primary);
}
.stat-label {
    font-size: 14px;
    color: var(--admin-text-secondary);
}
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}
.card-title {
    margin-bottom: 1rem;
    font-size: 16px;
}
.stats-mini {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}
.stat-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--admin-border);
}
.stat-row:last-child {
    border-bottom: none;
}
table a {
    color: var(--admin-primary);
    text-decoration: none;
}
table a:hover {
    text-decoration: underline;
}

@media (max-width: 1024px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .dashboard-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection