<?php $__env->startSection('title', 'Shopping Cart - Grace & Ground'); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container">
        <div class="section-header">
            <h1>Shopping Cart</h1>
        </div>
        
        <?php
        $cart = session('cart', []);
        $cartTotal = 0;
        $itemCount = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
            $itemCount += $item['quantity'];
        }
        $tax = $cartTotal * 0.12;
        $shipping = $cartTotal > 500 ? 0 : 50;
        $total = $cartTotal + $tax + $shipping;
        ?>
        
        <?php if(count($cart) > 0): ?>
        <div style="display: grid; grid-template-columns: 1fr 380px; gap: 32px;">
            <!-- Cart Items -->
            <div>
                <div class="card" style="padding: 0; overflow: hidden;">
                    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 60px; gap: 16px; padding: 16px 24px; background: var(--cream); font-weight: 600; font-size: 14px;">
                        <span>Product</span>
                        <span>Price</span>
                        <span>Quantity</span>
                        <span>Subtotal</span>
                        <span></span>
                    </div>
                    
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 60px; gap: 16px; padding: 20px 24px; align-items: center; border-bottom: 1px solid var(--border);">
                        <div style="display: flex; gap: 16px; align-items: center;">
                            <?php if(isset($item['image'])): ?>
                            <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                            <?php else: ?>
                            <div style="width: 80px; height: 80px; background: #f5f5f5; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); font-size: 12px;">No Image</div>
                            <?php endif; ?>
                            <div>
                                <h4 style="font-size: 16px; margin-bottom: 4px;"><?php echo e($item['name']); ?></h4>
                                <span style="color: var(--text-muted);">₱<?php echo e(number_format($item['price'], 2)); ?></span>
                            </div>
                        </div>
                        
                        <span>₱<?php echo e(number_format($item['price'], 2)); ?></span>
                        
                        <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" class="form-input" style="width: 70px; padding: 8px;" onchange="this.form.submit()">
                        </form>
                        
                        <span style="font-weight: 600;">₱<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></span>
                        
                        <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" style="background: none; border: none; font-size: 24px; color: var(--error); cursor: pointer;">&times;</button>
                        </form>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <form action="<?php echo e(route('cart.clear')); ?>" method="POST" class="mt-3">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-outline">Clear Cart</button>
                </form>
            </div>
            
            <!-- Summary -->
            <div>
                <div class="card" style="padding: 24px;">
                    <h3 style="margin-bottom: 20px;">Order Summary</h3>
                    
                    <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                        <span>Subtotal (<?php echo e($itemCount); ?> items)</span>
                        <span>₱<?php echo e(number_format($cartTotal, 2)); ?></span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                        <span>Tax (12%)</span>
                        <span>₱<?php echo e(number_format($tax, 2)); ?></span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);">
                        <span>Shipping</span>
                        <span>₱<?php echo e(number_format($shipping, 2)); ?></span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; padding: 16px 0; font-size: 20px; font-weight: 700;">
                        <span>Total</span>
                        <span style="color: var(--burgundy);">₱<?php echo e(number_format($total, 2)); ?></span>
                    </div>
                    
                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Proceed to Checkout</a>
                    <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Login to Checkout</a>
                    <p style="text-align: center; font-size: 14px; color: var(--text-muted); margin-top: 12px;">Please login to complete your order</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="card text-center" style="padding: 64px;">
            <p style="font-size: 20px; color: var(--text-light); margin-bottom: 24px;">Your cart is empty.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Continue Shopping</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
@media (max-width: 768px) {
    [style*="grid-template-columns: 1fr 380px"] {
        grid-template-columns: 1fr !important;
    }
    [style*="grid-template-columns: 2fr 1fr 1fr 1fr"] {
        display: none !important;
    }
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/cart/index.blade.php ENDPATH**/ ?>