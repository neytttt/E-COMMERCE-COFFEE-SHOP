<?php $__env->startSection('title', 'Delivery Details - Grace & Ground'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <a href="<?php echo e(route('admin.deliveries.index')); ?>" style="color: var(--admin-primary); text-decoration: none; font-size: 14px;">← Back to Deliveries</a>
            <h2 style="margin: 10px 0 0; color: var(--admin-text-primary);">Delivery #<?php echo e($delivery->id); ?></h2>
        </div>
        <div style="display: flex; gap: 10px;">
            <?php if($delivery->status !== 'delivered'): ?>
            <form action="<?php echo e(route('admin.deliveries.mark-delivered', $delivery->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" style="background: #22c55e; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer;">Mark Delivered</button>
            </form>
            <?php endif; ?>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div style="background: var(--admin-bg-card); border-radius: 10px; padding: 25px; border: 1px solid var(--admin-border);">
            <h4 style="margin-bottom: 20px; color: var(--admin-text-primary);">Order Information</h4>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Order:</strong> #<?php echo e($delivery->order->order_number); ?></p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Status:</strong> 
                <span style="display: inline-block; padding: 4px 12px; border-radius: 15px; font-size: 12px; font-weight: 600;
                    <?php if($delivery->status === 'delivered'): ?> background: #22c55e; color: white;
                    <?php elseif($delivery->status === 'pending'): ?> background: #f59e0b; color: white;
                    <?php else: ?> background: #3b82f6; color: white; <?php endif; ?>">
                    <?php echo e(str_replace('_', ' ', ucfirst($delivery->status))); ?>

                </span>
            </p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Customer:</strong> <?php echo e($delivery->order->user->name); ?></p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Phone:</strong> <?php echo e($delivery->phone); ?></p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Address:</strong> <?php echo e($delivery->address); ?></p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Notes:</strong> <?php echo e($delivery->notes ?? 'None'); ?></p>
        </div>

        <div style="background: var(--admin-bg-card); border-radius: 10px; padding: 25px; border: 1px solid var(--admin-border);">
            <h4 style="margin-bottom: 20px; color: var(--admin-text-primary);">Items</h4>
            <?php $__currentLoopData = $delivery->order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--admin-border);">
                <span style="color: var(--admin-text-secondary);"><?php echo e($item->product_name); ?> x<?php echo e($item->quantity); ?></span>
                <span style="color: var(--admin-text-primary);">₱<?php echo e(number_format($item->price, 0)); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div style="display: flex; justify-content: space-between; padding-top: 10px; font-weight: 600;">
                <span style="color: var(--admin-text-primary);">Total</span>
                <span style="color: var(--admin-primary);">₱<?php echo e(number_format($delivery->order->total, 0)); ?></span>
            </div>
        </div>
    </div>

    <div style="background: var(--admin-bg-card); border-radius: 10px; padding: 25px; border: 1px solid var(--admin-border); margin-top: 30px;">
        <h4 style="margin-bottom: 20px; color: var(--admin-text-primary);">Update Status</h4>
        <form action="<?php echo e(route('admin.deliveries.update', $delivery->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 500; color: var(--admin-text-secondary);">Status</label>
                    <select name="status" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 6px; background: var(--admin-bg-surface); color: var(--admin-text-primary);">
                        <option value="pending" <?php echo e($delivery->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="preparing" <?php echo e($delivery->status === 'preparing' ? 'selected' : ''); ?>>Preparing</option>
                        <option value="shipped" <?php echo e($delivery->status === 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                        <option value="in_transit" <?php echo e($delivery->status === 'in_transit' ? 'selected' : ''); ?>>In Transit</option>
                        <option value="out_for_delivery" <?php echo e($delivery->status === 'out_for_delivery' ? 'selected' : ''); ?>>Out for Delivery</option>
                        <option value="delivered" <?php echo e($delivery->status === 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 500; color: var(--admin-text-secondary);">Carrier</label>
                    <input type="text" name="carrier" value="<?php echo e($delivery->carrier); ?>" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 6px; background: var(--admin-bg-surface); color: var(--admin-text-primary);">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 500; color: var(--admin-text-secondary);">Tracking #</label>
                    <input type="text" name="tracking_number" value="<?php echo e($delivery->tracking_number); ?>" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 6px; background: var(--admin-bg-surface); color: var(--admin-text-primary);">
                </div>
                <div style="display: flex; align-items: flex-end;">
                    <button type="submit" style="background: var(--admin-primary); color: var(--admin-bg-primary); border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; width: 100%; font-weight: 600;">Update</button>
                </div>
            </div>
        </form>
    </div>

    <?php if($delivery->history && count($delivery->history) > 0): ?>
    <div style="background: var(--admin-bg-card); border-radius: 10px; padding: 25px; border: 1px solid var(--admin-border); margin-top: 30px;">
        <h4 style="margin-bottom: 20px; color: var(--admin-text-primary);">History</h4>
        <table style="width: 100%;">
            <thead>
                <tr style="border-bottom: 2px solid var(--admin-border);">
                    <th style="text-align: left; padding: 10px; color: var(--admin-text-secondary);">Date</th>
                    <th style="text-align: left; padding: 10px; color: var(--admin-text-secondary);">Status</th>
                    <th style="text-align: left; padding: 10px; color: var(--admin-text-secondary);">Note</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $delivery->history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="border-bottom: 1px solid var(--admin-border);">
                    <td style="padding: 10px; color: var(--admin-text-secondary);"><?php echo e($entry['timestamp'] ?? ''); ?></td>
                    <td style="padding: 10px; color: var(--admin-text-primary);"><?php echo e(str_replace('_', ' ', ucfirst($entry['status']))); ?></td>
                    <td style="padding: 10px; color: var(--admin-text-secondary);"><?php echo e($entry['note']); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/deliveries/show.blade.php ENDPATH**/ ?>