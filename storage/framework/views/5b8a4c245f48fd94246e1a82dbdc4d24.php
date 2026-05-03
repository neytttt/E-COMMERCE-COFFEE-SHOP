<?php $__env->startSection('title', 'Categories - Admin'); ?>

<?php $__env->startSection('page-title', 'Categories'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="toolbar">
        <form action="<?php echo e(route('admin.categories.index')); ?>" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search categories..." class="form-input" value="<?php echo e(request()->search); ?>">
            <select name="type" class="form-input">
                <option value="">All Types</option>
                <option value="coffee" <?php echo e(request()->type === 'coffee' ? 'selected' : ''); ?>>Coffee</option>
                <option value="merchandise" <?php echo e(request()->type === 'merchandise' ? 'selected' : ''); ?>>Merchandise</option>
                <option value="bundle" <?php echo e(request()->type === 'bundle' ? 'selected' : ''); ?>>Bundle</option>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary">Add Category</a>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Products</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php if($category->image): ?>
                        <img src="<?php echo e(asset('storage/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>" class="table-image">
                        <?php else: ?>
                        <div class="no-image">-</div>
                        <?php endif; ?>
                    </td>
                    <td><strong><?php echo e($category->name); ?></strong></td>
                    <td>
                        <span class="badge badge-info"><?php echo e(ucfirst($category->type)); ?></span>
                    </td>
                    <td><?php echo e($category->products()->count()); ?></td>
                    <td>
                        <span class="badge <?php echo e($category->is_active ? 'badge-success' : 'badge-error'); ?>">
                            <?php echo e($category->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.categories.toggle', $category->id)); ?>" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo e($category->is_active ? 'Disable' : 'Enable'); ?></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <div class="pagination">
            <?php echo e($categories->links()); ?>

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
.table-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
}
.no-image {
    width: 50px;
    height: 50px;
    background: var(--admin-bg-hover);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
}
.actions {
    display: flex;
    gap: 0.5rem;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>