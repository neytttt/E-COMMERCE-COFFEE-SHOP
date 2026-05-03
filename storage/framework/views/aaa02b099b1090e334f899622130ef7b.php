<?php $__env->startSection('title', 'Deliveries - Admin'); ?>

<?php $__env->startSection('page-title', 'Deliveries'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="toolbar">
        <form action="<?php echo e(route('admin.deliveries.index')); ?>" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by order number..." class="form-input" value="<?php echo e(request()->search); ?>">
            <select name="status" class="form-input">
                <option value="">All Status</option>
                <option value="pending" <?php echo e(request()->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="preparing" <?php echo e(request()->status === 'preparing' ? 'selected' : ''); ?>>Preparing</option>
                <option value="shipped" <?php echo e(request()->status === 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                <option value="in_transit" <?php echo e(request()->status === 'in_transit' ? 'selected' : ''); ?>>In Transit</option>
                <option value="delivered" <?php echo e(request()->status === 'delivered' ? 'selected' : ''); ?>>Delivered</option>
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
                <?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <a href="<?php echo e(route('admin.orders.show', $delivery->order->id)); ?>"><?php echo e($delivery->order->order_number); ?></a>
                    </td>
                    <td><?php echo e($delivery->carrier ?? '-'); ?></td>
                    <td><?php echo e($delivery->tracking_number ?? '-'); ?></td>
                    <td>
                        <span class="badge <?php echo e($delivery->status === 'delivered' ? 'badge-success' : ($delivery->status === 'shipped' ? 'badge-info' : 'badge-warning')); ?>">
                            <?php echo e(ucfirst(str_replace('_', ' ', $delivery->status))); ?>

                        </span>
                    </td>
                    <td><?php echo e($delivery->shipped_at ? $delivery->shipped_at->format('M d, Y') : '-'); ?></td>
                    <td><?php echo e($delivery->delivered_at ? $delivery->delivered_at->format('M d, Y') : '-'); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.deliveries.show', $delivery->id)); ?>" class="btn btn-secondary btn-sm">View</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <div class="pagination">
            <?php echo e($deliveries->links()); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/deliveries/index.blade.php ENDPATH**/ ?>