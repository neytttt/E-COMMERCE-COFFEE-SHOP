<?php $__env->startSection('title', 'Order Details - Grace & Ground'); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <a href="<?php echo e(route('orders.index')); ?>" style="color: var(--royal-gold); text-decoration: none; font-size: 14px;">← Back to Orders</a>
                <h2 style="color: var(--white); margin: 10px 0 0;">Order #<?php echo e($order->order_number); ?></h2>
            </div>
            <div style="text-align: right;">
                <span style="display: inline-block; padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600;
                    <?php if($order->status === 'completed'): ?> background: #22c55e; color: white;
                    <?php elseif($order->status === 'pending'): ?> background: var(--royal-gold); color: var(--dark-bg);
                    <?php elseif($order->status === 'cancelled'): ?> background: #ef4444; color: white;
                    <?php else: ?> background: var(--dark-card); color: var(--white); <?php endif; ?>">
                    <?php echo e(ucfirst($order->status)); ?>

                </span>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
            <div style="background: var(--dark-card); border-radius: 15px; padding: 25px;">
                <h4 style="color: var(--white); margin-bottom: 20px; font-size: 18px;">Order Items</h4>
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid var(--dark-border);">
                    <div>
                        <p style="color: var(--white); margin: 0; font-size: 16px;"><?php echo e($item->product_name); ?></p>
                        <p style="color: var(--white-muted); margin: 5px 0 0; font-size: 14px;">Qty: <?php echo e($item->quantity); ?></p>
                    </div>
                    <span style="color: var(--white); font-weight: 600;">₱<?php echo e(number_format($item->price, 0)); ?></span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div style="padding-top: 15px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="color: var(--white-muted);">Subtotal</span>
                        <span style="color: var(--white);">₱<?php echo e(number_format($order->subtotal, 0)); ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="color: var(--white-muted);">Delivery Fee</span>
                        <span style="color: var(--white);">₱<?php echo e(number_format($order->delivery_fee, 0)); ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding-top: 10px; border-top: 1px solid var(--dark-border);">
                        <span style="color: var(--white); font-weight: 600;">Total</span>
                        <span style="color: var(--royal-gold); font-weight: 600; font-size: 20px;">₱<?php echo e(number_format($order->total, 0)); ?></span>
                    </div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 30px;">
                <div style="background: var(--dark-card); border-radius: 15px; padding: 25px;">
                    <h4 style="color: var(--white); margin-bottom: 20px; font-size: 18px;">Delivery Details</h4>
                    <?php if($order->delivery): ?>
                    <p style="color: var(--white); margin: 0 0 10px;"><strong>Address:</strong> <?php echo e($order->delivery->address); ?></p>
                    <p style="color: var(--white); margin: 0 0 10px;"><strong>Phone:</strong> <?php echo e($order->delivery->phone); ?></p>
                    <p style="color: var(--white); margin: 0 0 10px;"><strong>Instructions:</strong> <?php echo e($order->delivery->notes ?? 'None'); ?></p>
                    <?php else: ?>
                    <p style="color: var(--white-muted);">Pickup order - no delivery</p>
                    <?php endif; ?>
                </div>

                <div style="background: var(--dark-card); border-radius: 15px; padding: 25px;">
                    <h4 style="color: var(--white); margin-bottom: 20px; font-size: 18px;">Payment</h4>
                    <p style="color: var(--white); margin: 0 0 10px;"><strong>Method:</strong> <?php echo e(ucfirst($order->payment_method)); ?></p>
                    <p style="color: var(--white); margin: 0 0 10px;"><strong>Status:</strong> <?php echo e(ucfirst($order->payment_status)); ?></p>
                    <?php if($order->gcash_reference): ?>
                    <p style="color: var(--white-muted); font-size: 14px;">Reference: <?php echo e($order->gcash_reference); ?></p>
                    <?php endif; ?>
                </div>

                <div style="background: var(--dark-card); border-radius: 15px; padding: 25px;">
                    <h4 style="color: var(--white); margin-bottom: 20px; font-size: 18px;">Order Info</h4>
                    <p style="color: var(--white); margin: 0 0 10px;"><strong>Date:</strong> <?php echo e($order->created_at->format('M j, Y g:i A')); ?></p>
                    <?php if($order->canCancel() && $order->status === 'pending'): ?>
                    <form action="<?php echo e(route('orders.cancel', $order->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="background: #ef4444; color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 600;">Cancel Order</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/orders/show.blade.php ENDPATH**/ ?>