<header class="admin-header">
    <div class="header-content">
        <h1 class="page-title"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
        
        <div class="header-actions">
            <span class="user-name"><?php echo e(auth()->user()->name); ?></span>
            <span class="user-role badge badge-warning"><?php echo e(ucfirst(auth()->user()->role)); ?></span>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
                <?php echo csrf_field(); ?>
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
</style><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/partials/header.blade.php ENDPATH**/ ?>