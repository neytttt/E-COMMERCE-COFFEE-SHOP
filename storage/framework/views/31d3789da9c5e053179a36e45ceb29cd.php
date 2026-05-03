<?php $__env->startSection('title', 'Customers - Admin'); ?>

<?php $__env->startSection('page-title', 'Customers'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="toolbar">
        <form action="<?php echo e(route('admin.customers.index')); ?>" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search customers..." class="form-input" value="<?php echo e(request()->search); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Orders</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><strong><?php echo e($customer->name); ?></strong></td>
                    <td><?php echo e($customer->email); ?></td>
                    <td><?php echo e($customer->phone ?? '-'); ?></td>
                    <td><?php echo e($customer->orders()->count()); ?></td>
                    <td>
                        <span class="badge <?php echo e($customer->is_active ? 'badge-success' : 'badge-error'); ?>">
                            <?php echo e($customer->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td><?php echo e($customer->created_at->format('M d, Y')); ?></td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('admin.customers.show', $customer->id)); ?>" class="btn btn-secondary btn-sm">View</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <div class="pagination">
            <?php echo e($customers->links()); ?>

        </div>
    </div>
</div>

<style>
.page-content { padding: 2rem; }
.toolbar { display: flex; justify-content: space-between; margin-bottom: 1.5rem; }
.search-form { display: flex; gap: 1rem; }
.search-form .form-input { width: 300px; }
.actions { display: flex; gap: 0.5rem; }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/customers/index.blade.php ENDPATH**/ ?>