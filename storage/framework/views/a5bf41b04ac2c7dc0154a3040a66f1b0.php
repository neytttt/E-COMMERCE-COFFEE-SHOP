<?php $__env->startSection('title', 'Products - Admin'); ?>

<?php $__env->startSection('page-title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="toolbar">
        <form action="<?php echo e(route('admin.products.index')); ?>" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search products..." class="form-input" value="<?php echo e(request()->search); ?>">
            <select name="category_id" class="form-input">
                <option value="">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>" <?php echo e(request()->category_id == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">Add Product</a>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php if($product->image): ?>
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="table-image">
                        <?php else: ?>
                        <div class="no-image">-</div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <strong><?php echo e($product->name); ?></strong>
                        <?php if($product->is_featured): ?>
                        <span class="badge badge-warning">Featured</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($product->category->name); ?></td>
                    <td>
                        <span>₱<?php echo e(number_format($product->price, 2)); ?></span>
                        <?php if($product->original_price): ?>
                        <span class="price-original">₱<?php echo e(number_format($product->original_price, 2)); ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="<?php echo e($product->stock_quantity <= $product->low_stock_threshold ? 'text-warning' : ''); ?>">
                            <?php echo e($product->stock_quantity); ?>

                        </span>
                    </td>
                    <td>
                        <span class="badge <?php echo e($product->is_active ? 'badge-success' : 'badge-error'); ?>">
                            <?php echo e($product->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.products.toggle-featured', $product->id)); ?>" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo e($product->is_featured ? 'Unfeature' : 'Feature'); ?></button>
                            </form>
                            <form method="POST" action="<?php echo e(route('admin.products.toggle-status', $product->id)); ?>" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo e($product->is_active ? 'Disable' : 'Enable'); ?></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <div class="pagination">
            <?php echo e($products->links()); ?>

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
.text-warning {
    color: var(--admin-warning);
}
.price-original {
    text-decoration: line-through;
    font-size: 12px;
    color: var(--admin-text-muted);
    margin-left: 0.5rem;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/products/index.blade.php ENDPATH**/ ?>