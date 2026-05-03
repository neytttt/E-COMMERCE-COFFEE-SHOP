<aside class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('home') }}" class="sidebar-logo">
            <span>Grace & Ground</span>
        </a>
    </div>
    
    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <span>Products</span>
        </a>
        
        <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <span>Categories</span>
        </a>
        
        <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <span>Orders</span>
        </a>
        
        <a href="{{ route('admin.deliveries.index') }}" class="nav-link {{ request()->routeIs('admin.deliveries.*') ? 'active' : '' }}">
            <span>Deliveries</span>
        </a>
        
        <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
            <span>Messages</span>
        </a>
        
        <a href="{{ route('admin.banners.index') }}" class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
            <span>Banners</span>
        </a>
        
        <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
            <span>Customers</span>
        </a>
    </nav>
    
    <div class="sidebar-footer">
        <a href="{{ route('home') }}" class="nav-link">View Site</a>
    </div>
</aside>

<style>
.sidebar {
    width: 280px;
    background: var(--admin-bg-surface);
    border-right: 1px solid var(--admin-border);
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
}
.sidebar-header {
    padding: 1.5rem;
    border-bottom: 1px solid var(--admin-border);
}
.sidebar-logo {
    font-family: var(--font-heading);
    font-size: 20px;
    font-weight: 700;
    color: var(--admin-primary);
    text-decoration: none;
}
.sidebar-nav {
    flex: 1;
    padding: 1rem 0;
    overflow-y: auto;
}
.nav-link {
    display: block;
    padding: 12px 1.5rem;
    color: var(--admin-text-secondary);
    text-decoration: none;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}
.nav-link:hover {
    color: var(--admin-text-primary);
    background: var(--admin-bg-hover);
}
.nav-link.active {
    color: var(--admin-primary);
    background: var(--admin-bg-hover);
    border-left-color: var(--admin-primary);
}
.sidebar-footer {
    padding: 1rem;
    border-top: 1px solid var(--admin-border);
}
</style>