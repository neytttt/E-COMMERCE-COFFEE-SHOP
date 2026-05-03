<?php $__env->startSection('title', 'Customer Details - Admin'); ?>

<?php $__env->startSection('page-title', 'Customer Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="customer-header">
        <h2><?php echo e($customer->name); ?></h2>
        <span class="badge <?php echo e($customer->is_active ? 'badge-success' : 'badge-error'); ?>">
            <?php echo e($customer->is_active ? 'Active' : 'Inactive'); ?>

        </span>
    </div>
    
    <div class="customer-details">
        <div class="detail-card">
            <h3>Contact Information</h3>
            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span><?php echo e($customer->email); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Phone:</span>
                <span><?php echo e($customer->phone ?? 'Not provided'); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Address:</span>
                <span><?php echo e($customer->address ?? 'Not provided'); ?></span>
            </div>
        </div>
        
        <div class="detail-card">
            <h3>Account Information</h3>
            <div class="detail-row">
                <span class="detail-label">Member Since:</span>
                <span><?php echo e($customer->created_at->format('F d, Y')); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Orders:</span>
                <span><?php echo e($customer->orders()->count()); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Spent:</span>
                <span>₱<?php echo e(number_format($customer->orders()->where('status', 'completed')->sum('total'), 2)); ?></span>
            </div>
        </div>
        
        <div class="detail-card">
            <h3>Recent Orders</h3>
            <?php if($customer->orders()->count() > 0): ?>
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
                    <?php $__currentLoopData = $customer->orders()->latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>"><?php echo e($order->order_number); ?></a>
                        </td>
                        <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                        <td>
                            <span class="badge badge-info"><?php echo e(ucfirst($order->status)); ?></span>
                        </td>
                        <td>₱<?php echo e(number_format($order->total, 2)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <p class="no-orders">No orders yet.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="form-actions">
        <a href="<?php echo e(route('admin.customers.index')); ?>" class="btn btn-secondary">Back to Customers</a>
        <form method="POST" action="<?php echo e(route('admin.customers.toggle-status', $customer->id)); ?>" style="display: inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-primary">
                <?php echo e($customer->is_active ? 'Deactivate' : 'Activate'); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/customers/show.blade.php ENDPATH**/ ?>