<?php $__env->startSection('title', 'Order Confirmed - Grace & Ground'); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container">
        <div class="card text-center" style="padding: 64px; max-width: 600px; margin: 0 auto;">
            <div style="width: 80px; height: 80px; background: var(--success); color: white; font-size: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">✓</div>
            
            <h1 style="font-size: 32px; margin-bottom: 12px;">Thank You!</h1>
            <p style="font-size: 18px; color: var(--text-light); margin-bottom: 32px;">Your order has been placed successfully.</p>
            
            <div class="card" style="padding: 24px; text-align: left; margin-bottom: 32px;">
                <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                    <span>Order Number</span>
                    <strong><?php echo e($order->order_number); ?></strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                    <span>Total</span>
                    <strong>₱<?php echo e(number_format($order->total, 2)); ?></strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                    <span>Status</span>
                    <span class="badge badge-success"><?php echo e(ucfirst($order->status)); ?></span>
                </div>
            </div>
            
            <p style="color: var(--text-muted); margin-bottom: 32px;">A confirmation email has been sent to your email address.</p>
            
            <div style="display: flex; gap: 16px; justify-content: center;">
                <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-primary">View Orders</a>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/checkout/success.blade.php ENDPATH**/ ?>