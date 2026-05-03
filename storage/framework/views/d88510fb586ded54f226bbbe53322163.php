<?php $__env->startSection('title', 'Dashboard - Admin'); ?>

<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-content">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📦</div>
            <div class="stat-info">
                <span class="stat-value"><?php echo e($totalOrders); ?></span>
                <span class="stat-label">Total Orders</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">💰</div>
            <div class="stat-info">
                <span class="stat-value">₱<?php echo e(number_format($totalRevenue, 2)); ?></span>
                <span class="stat-label">Total Revenue</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">☕</div>
            <div class="stat-info">
                <span class="stat-value"><?php echo e($totalProducts); ?></span>
                <span class="stat-label">Total Products</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <span class="stat-value"><?php echo e($totalCustomers); ?></span>
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
                    <span><?php echo e($todayOrders); ?></span>
                </div>
                <div class="stat-row">
                    <span>Revenue Today</span>
                    <span>₱<?php echo e(number_format($todayRevenue, 2)); ?></span>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h3 class="card-title">This Month</h3>
            <div class="stats-mini">
                <div class="stat-row">
                    <span>Orders</span>
                    <span><?php echo e($monthOrders); ?></span>
                </div>
                <div class="stat-row">
                    <span>Revenue</span>
                    <span>₱<?php echo e(number_format($monthRevenue, 2)); ?></span>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h3 class="card-title">Order Status</h3>
            <div class="stats-mini">
                <div class="stat-row">
                    <span>Pending</span>
                    <span class="badge badge-warning"><?php echo e($pendingOrders); ?></span>
                </div>
                <div class="stat-row">
                    <span>Processing</span>
                    <span class="badge badge-info"><?php echo e($processingOrders); ?></span>
                </div>
                <div class="stat-row">
                    <span>Shipped</span>
                    <span class="badge badge-success"><?php echo e($shippedOrders); ?></span>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h3 class="card-title">Inventory</h3>
            <div class="stats-mini">
                <div class="stat-row">
                    <span>Low Stock</span>
                    <span class="badge badge-warning"><?php echo e($lowStockProducts); ?></span>
                </div>
                <div class="stat-row">
                    <span>Out of Stock</span>
                    <span class="badge badge-error"><?php echo e($outOfStockProducts); ?></span>
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
                <?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>"><?php echo e($order->order_number); ?></a>
                    </td>
                    <td><?php echo e($order->user->name); ?></td>
                    <td>₱<?php echo e(number_format($order->total, 2)); ?></td>
                    <td>
                        <span class="badge <?php echo e($order->status === 'delivered' ? 'badge-success' : ($order->status === 'cancelled' ? 'badge-error' : 'badge-warning')); ?>">
                            <?php echo e(ucfirst($order->status)); ?>

                        </span>
                    </td>
                    <td>
                        <span class="badge <?php echo e($order->payment_status === 'paid' ? 'badge-success' : 'badge-warning'); ?>">
                            <?php echo e(ucfirst($order->payment_status)); ?>

                        </span>
                    </td>
                    <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>