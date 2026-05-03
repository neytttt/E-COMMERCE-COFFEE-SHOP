<header class="admin-header">
    <div class="header-content">
        <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
        
        <div class="header-actions">
            <span class="user-name">{{ auth()->user()->name }}</span>
            <span class="user-role badge badge-warning">{{ ucfirst(auth()->user()->role) }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
            </form>
        </div>
    </div>
</header>

<style>
.admin-header {
    background: var(--admin-bg-surface);
    border-bottom: 1px solid var(--admin-border);
    padding: 1rem 2rem;
    margin-left: 280px;
}
.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.page-title {
    font-size: 24px;
    margin: 0;
}
.header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.user-name {
    color: var(--admin-text-secondary);
}
.user-role {
    text-transform: capitalize;
}
</style>