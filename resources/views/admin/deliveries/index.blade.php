@extends('admin.layouts.master')

@section('title', 'Deliveries - Admin')

@section('page-title', 'Deliveries')

@section('content')
<div class="page-content">
    <div class="toolbar">
        <form action="{{ route('admin.deliveries.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by order number..." class="form-input" value="{{ request()->search }}">
            <select name="status" class="form-input">
                <option value="">All Status</option>
                <option value="pending" {{ request()->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="preparing" {{ request()->status === 'preparing' ? 'selected' : '' }}>Preparing</option>
                <option value="shipped" {{ request()->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="in_transit" {{ request()->status === 'in_transit' ? 'selected' : '' }}>In Transit</option>
                <option value="delivered" {{ request()->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Carrier</th>
                    <th>Tracking #</th>
                    <th>Status</th>
                    <th>Shipped</th>
                    <th>Delivered</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deliveries as $delivery)
                <tr>
                    <td>
                        <a href="{{ route('admin.orders.show', $delivery->order->id) }}">{{ $delivery->order->order_number }}</a>
                    </td>
                    <td>{{ $delivery->carrier ?? '-' }}</td>
                    <td>{{ $delivery->tracking_number ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $delivery->status === 'delivered' ? 'badge-success' : ($delivery->status === 'shipped' ? 'badge-info' : 'badge-warning') }}">
                            {{ ucfirst(str_replace('_', ' ', $delivery->status)) }}
                        </span>
                    </td>
                    <td>{{ $delivery->shipped_at ? $delivery->shipped_at->format('M d, Y') : '-' }}</td>
                    <td>{{ $delivery->delivered_at ? $delivery->delivered_at->format('M d, Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.deliveries.show', $delivery->id) }}" class="btn btn-secondary btn-sm">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination">
            {{ $deliveries->links() }}
        </div>
    </div>
</div>

<style>
.page-content { padding: 2rem; }
.toolbar { display: flex; justify-content: space-between; margin-bottom: 1.5rem; }
.search-form { display: flex; gap: 1rem; }
table a { color: var(--admin-primary); text-decoration: none; }
table a:hover { text-decoration: underline; }
</style>
@endsection