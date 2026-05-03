<?php $__env->startSection('title', 'Edit Category - Admin'); ?>

<?php $__env->startSection('page-title', 'Edit Category'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <form method="POST" action="<?php echo e(route('admin.categories.update', $category->id)); ?>" enctype="multipart/form-data" class="form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">Category Name *</label>
                <input type="text" name="name" class="form-input" value="<?php echo e(old('name', $category->name)); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Type *</label>
                <select name="type" class="form-input" required>
                    <option value="coffee" <?php echo e($category->type === 'coffee' ? 'selected' : ''); ?>>Coffee</option>
                    <option value="merchandise" <?php echo e($category->type === 'merchandise' ? 'selected' : ''); ?>>Merchandise</option>
                    <option value="bundle" <?php echo e($category->type === 'bundle' ? 'selected' : ''); ?>>Bundle</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-input" rows="3"><?php echo e(old('description', $category->description)); ?></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Image</label>
                <?php if($category->image): ?>
                <div class="current-image">
                    <img src="<?php echo e(asset('storage/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>" class="preview-image">
                </div>
                <?php endif; ?>
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>
            
            <div class="form-group">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-input" value="<?php echo e(old('sort_order', $category->sort_order ?? 0)); ?>">
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_active" value="1" <?php echo e($category->is_active ? 'checked' : ''); ?>> Active
                </label>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </div>
    </form>
</div>

<style>
.page-content {
    padding: 2rem;
}
.form-section {
    background: var(--admin-bg-card);
    border: 1px solid var(--admin-border);
    border-radius: 8px;
    padding: 1.5rem;
    max-width: 600px;
}
.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}
.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}
.current-image {
    margin-bottom: 1rem;
}
.preview-image {
    max-width: 200px;
    border-radius: 4px;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>