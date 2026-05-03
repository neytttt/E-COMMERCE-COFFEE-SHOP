<?php $__env->startSection('title', 'Orders - Admin'); ?>

<?php $__env->startSection('page-title', 'Orders'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="toolbar">
        <form action="<?php echo e(route('admin.orders.index')); ?>" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by order number..." class="form-input" value="<?php echo e(request()->search); ?>">
            <select name="status" class="form-input">
                <option value="">All Status</option>
                <option value="pending" <?php echo e(request()->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="confirmed" <?php echo e(request()->status === 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                <option value="processing" <?php echo e(request()->status === 'processing' ? 'selected' : ''); ?>>Processing</option>
                <option value="shipped" <?php echo e(request()->status === 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                <option value="delivered" <?php echo e(request()->status === 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                <option value="cancelled" <?php echo e(request()->status === 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
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
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>"><?php echo e($order->order_number); ?></a>
                    </td>
                    <td><?php echo e($order->user->name); ?></td>
                    <td>₱<?php echo e(number_format($order->total, 2)); ?></td>
                    <td><?php echo e($order->total_quantity); ?></td>
                    <td>
                        <span class="badge <?php echo e($order->status === 'delivered' ? 'badge-success' : ($order->status === 'cancelled' ? 'badge-error' : ($order->status === 'shipped' ? 'badge-info' : 'badge-warning'))); ?>">
                            <?php echo e(ucfirst($order->status)); ?>

                        </span>
                    </td>
                    <td>
                        <span class="badge <?php echo e($order->payment_status === 'paid' ? 'badge-success' : 'badge-warning'); ?>">
                            <?php echo e(ucfirst($order->payment_status)); ?>

                        </span>
                    </td>
                    <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-secondary btn-sm">View</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <div class="pagination">
            <?php echo e($orders->links()); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>