<?php $__env->startSection('title', 'My Orders - Grace & Ground'); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container">
        <div class="section-header">
            <h1>My Orders</h1>
        </div>
        
        <?php if($orders->count() > 0): ?>
        <div style="display: grid; gap: 24px;">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border);">
                    <div>
                        <h3 style="font-size: 18px; margin-bottom: 4px;">Order #<?php echo e($order->order_number); ?></h3>
                        <span style="color: var(--text-muted); font-size: 14px;"><?php echo e($order->created_at->format('F d, Y')); ?></span>
                    </div>
                    <span class="badge <?php echo e($order->status === 'delivered' ? 'badge-success' : ($order->status === 'cancelled' ? 'badge-error' : 'badge-warning')); ?>">
                        <?php echo e(ucfirst($order->status)); ?>

                    </span>
                </div>
                
                <div style="margin-bottom: 16px;">
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="display: flex; justify-content: space-between; padding: 8px 0; font-size: 14px;">
                        <span><?php echo e($item->product_name); ?> x<?php echo e($item->quantity); ?></span>
                        <span>₱<?php echo e(number_format($item->subtotal, 2)); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 16px; border-top: 1px solid var(--border);">
                    <div style="font-size: 18px; font-weight: 600;">
                        Total: <span style="color: var(--burgundy);">₱<?php echo e(number_format($order->total, 2)); ?></span>
                    </div>
                    <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="text-center mt-4">
            <?php echo e($orders->links()); ?>

        </div>
        <?php else: ?>
        <div class="card text-center" style="padding: 64px;">
            <p style="font-size: 18px; color: var(--text-light); margin-bottom: 24px;">You haven't placed any orders yet.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Start Shopping</a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/orders/index.blade.php ENDPATH**/ ?>