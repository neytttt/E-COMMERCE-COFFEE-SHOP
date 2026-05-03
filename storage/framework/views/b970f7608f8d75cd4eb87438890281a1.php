<?php $__env->startSection('title', 'Edit Banner - Admin'); ?>

<?php $__env->startSection('page-title', 'Edit Banner'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <form method="POST" action="<?php echo e(route('admin.banners.update', $banner->id)); ?>" enctype="multipart/form-data" class="form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-input" value="<?php echo e(old('title', $banner->title)); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Subtitle</label>
                <textarea name="subtitle" class="form-input" rows="2"><?php echo e(old('subtitle', $banner->subtitle)); ?></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Position *</label>
                <select name="position" class="form-input" required>
                    <option value="hero" <?php echo e($banner->position === 'hero' ? 'selected' : ''); ?>>Hero</option>
                    <option value="banner" <?php echo e($banner->position === 'banner' ? 'selected' : ''); ?>>Banner</option>
                    <option value="featured" <?php echo e($banner->position === 'featured' ? 'selected' : ''); ?>>Featured</option>
                    <option value="popup" <?php echo e($banner->position === 'popup' ? 'selected' : ''); ?>>Popup</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Image</label>
                <?php if($banner->image): ?>
                <div class="current-image">
                    <img src="<?php echo e(asset('storage/' . $banner->image)); ?>" alt="<?php echo e($banner->title); ?>" class="preview-image">
                </div>
                <?php endif; ?>
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>
            
            <div class="form-group">
                <label class="form-label">Link URL</label>
                <input type="url" name="link" class="form-input" placeholder="https://" value="<?php echo e(old('link', $banner->link)); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Button Text</label>
                <input type="text" name="button_text" class="form-input" placeholder="Shop Now" value="<?php echo e(old('button_text', $banner->button_text)); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-input" value="<?php echo e(old('sort_order', $banner->sort_order ?? 0)); ?>">
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_active" value="1" <?php echo e($banner->is_active ? 'checked' : ''); ?>> Active
                </label>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="<?php echo e(route('admin.banners.index')); ?>" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Banner</button>
        </div>
    </form>
</div>

<style>
.page-content { padding: 2rem; }
.form-section { background: var(--admin-bg-card); border: 1px solid var(--admin-border); border-radius: 8px; padding: 1.5rem; max-width: 600px; }
.form-actions { display: flex; gap: 1rem; margin-top: 1.5rem; }
.checkbox-label { display: flex; align-items: center; gap: 0.5rem; cursor: pointer; }
.current-image { margin-bottom: 1rem; }
.preview-image { max-width: 200px; border-radius: 4px; }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/banners/edit.blade.php ENDPATH**/ ?>