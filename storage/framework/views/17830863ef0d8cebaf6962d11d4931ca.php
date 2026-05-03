<?php $__env->startSection('title', 'Edit Product - Admin'); ?>

<?php $__env->startSection('page-title', 'Edit Product'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <form method="POST" action="<?php echo e(route('admin.products.update', $product->id)); ?>" enctype="multipart/form-data" class="form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="form-grid">
            <div class="form-section">
                <h3 class="section-title">Basic Information</h3>
                
                <div class="form-group">
                    <label class="form-label">Product Name *</label>
                    <input type="text" name="name" class="form-input" value="<?php echo e($product->name); ?>" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Category *</label>
                    <select name="category_id" class="form-input" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>" <?php echo e($product->category_id == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Price *</label>
                        <input type="number" name="price" step="0.01" class="form-input" value="<?php echo e($product->price); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Original Price</label>
                        <input type="number" name="original_price" step="0.01" class="form-input" value="<?php echo e($product->original_price); ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-input" rows="2"><?php echo e($product->short_description); ?></textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-input" rows="5" required><?php echo e($product->description); ?></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h3 class="section-title">Product Details</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Roast Level</label>
                        <select name="roast_level" class="form-input">
                            <option value="">Select</option>
                            <option value="light" <?php echo e($product->roast_level == 'light' ? 'selected' : ''); ?>>Light</option>
                            <option value="medium" <?php echo e($product->roast_level == 'medium' ? 'selected' : ''); ?>>Medium</option>
                            <option value="medium-dark" <?php echo e($product->roast_level == 'medium-dark' ? 'selected' : ''); ?>>Medium-Dark</option>
                            <option value="dark" <?php echo e($product->roast_level == 'dark' ? 'selected' : ''); ?>>Dark</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" class="form-input" value="<?php echo e($product->origin); ?>">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Region</label>
                        <input type="text" name="region" class="form-input" value="<?php echo e($product->region); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Weight</label>
                        <input type="text" name="weight" class="form-input" value="<?php echo e($product->weight); ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Flavor Notes</label>
                    <input type="text" name="flavor_notes" class="form-input" value="<?php echo e($product->flavor_notes); ?>">
                </div>
                
                <h3 class="section-title mt-4">Inventory</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Stock Quantity *</label>
                        <input type="number" name="stock_quantity" class="form-input" value="<?php echo e($product->stock_quantity); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Low Stock Threshold</label>
                        <input type="number" name="low_stock_threshold" class="form-input" value="<?php echo e($product->low_stock_threshold); ?>">
                    </div>
                </div>
                
                <h3 class="section-title mt-4">Image</h3>
                
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <?php if($product->image): ?>
                    <div style="margin-bottom: 10px;">
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" style="max-width: 200px; border-radius: 8px;">
                    </div>
                    <?php endif; ?>
                    <input type="file" name="image" class="form-input" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_featured" value="1" <?php echo e($product->is_featured ? 'checked' : ''); ?>> Featured Product
                    </label>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_active" value="1" <?php echo e($product->is_active ? 'checked' : ''); ?>> Active
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>

<style>
.page-content { padding: 2rem; }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
.form-section { background: var(--admin-bg-card); border: 1px solid var(--admin-border); border-radius: 8px; padding: 1.5rem; }
.section-title { margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--admin-border); }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.form-actions { display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.5rem; }
.checkbox-label { display: flex; align-items: center; gap: 0.5rem; cursor: pointer; }
.mt-4 { margin-top: 1.5rem; }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>