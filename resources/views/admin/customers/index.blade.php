@extends('admin.layouts.master')

@section('title', 'Customers - Admin')

@section('page-title', 'Customers')

@section('content')
<div class="page-content">
    <div class="toolbar">
        <form action="{{ route('admin.customers.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search customers..." class="form-input" value="{{ request()->search }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Orders</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td><strong>{{ $customer->name }}</strong></td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone ?? '-' }}</td>
                    <td>{{ $customer->orders()->count() }}</td>
                    <td>
                        <span class="badge {{ $customer->is_active ? 'badge-success' : 'badge-error' }}">
                            {{ $customer->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>{{ $customer->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-secondary btn-sm">View</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination">
            {{ $customers->links() }}
        </div>
    </div>
</div>

<style>
.page-content { padding: 2rem; }
.toolbar { display: flex; justify-content: space-between; margin-bottom: 1.5rem; }
.search-form { display: flex; gap: 1rem; }
.search-form .form-input { width: 300px; }
.actions { display: flex; gap: 0.5rem; }
</style>
@endsection