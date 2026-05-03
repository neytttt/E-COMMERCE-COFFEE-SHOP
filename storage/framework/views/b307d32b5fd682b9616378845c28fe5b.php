<?php $__env->startSection('title', 'Shop - Grace & Ground Coffee Shop'); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container">
        <div class="section-header">
            <h1>Our Coffee Collection</h1>
            <p><?php echo e($products->total()); ?> products available</p>
        </div>
        
        <div style="display: grid; grid-template-columns: 240px 1fr; gap: 32px;">
            <!-- Sidebar -->
            <aside>
                <div class="card" style="padding: 24px;">
                    <h4 style="margin-bottom: 16px; font-size: 16px;">Categories</h4>
                    <ul style="list-style: none;">
                        <li style="margin-bottom: 12px;">
                            <a href="<?php echo e(route('products.index')); ?>" style="<?php echo e(!request()->category ? 'color: var(--burgundy); font-weight: 600;' : ''); ?>">All Products</a>
                        </li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li style="margin-bottom: 12px;">
                            <a href="<?php echo e(route('products.category', $cat->slug)); ?>" style="<?php echo e(request()->category === $cat->slug ? 'color: var(--burgundy); font-weight: 600;' : ''); ?>"><?php echo e($cat->name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    
                    <h4 style="margin: 24px 0 16px; font-size: 16px;">Sort By</h4>
                    <form action="<?php echo e(route('products.index')); ?>" method="GET">
                        <?php if(request()->category): ?>
                        <input type="hidden" name="category" value="<?php echo e(request()->category); ?>">
                        <?php endif; ?>
                        <select name="sort" class="form-input" onchange="this.form.submit()" style="padding: 10px;">
                            <option value="newest" <?php echo e(request()->sort === 'newest' ? 'selected' : ''); ?>>Newest First</option>
                            <option value="price_asc" <?php echo e(request()->sort === 'price_asc' ? 'selected' : ''); ?>>Price: Low to High</option>
                            <option value="price_desc" <?php echo e(request()->sort === 'price_desc' ? 'selected' : ''); ?>>Price: High to Low</option>
                        </select>
                    </form>
                </div>
            </aside>
            
            <!-- Products -->
            <div>
                <?php if($products->count() > 0): ?>
                <div class="products-grid">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php if($product->image): ?>
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
                            <?php else: ?>
                            <span>No Image</span>
                            <?php endif; ?>
                            <?php if($product->is_featured): ?>
                            <span class="product-badge">Featured</span>
                            <?php endif; ?>
                            <?php if($product->stock_quantity <= 0): ?>
                            <span class="product-badge" style="background: var(--error);">Out of Stock</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <span class="product-category"><?php echo e($product->category->name); ?></span>
                            <h3 class="product-name">
                                <a href="<?php echo e(route('products.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                            </h3>
                            <?php if($product->short_description): ?>
                            <p style="color: var(--text-light); font-size: 14px; margin: 8px 0;"><?php echo e(Str::limit($product->short_description, 60)); ?></p>
                            <?php endif; ?>
                            <div class="product-price">
                                ₱<?php echo e(number_format($product->price, 2)); ?>

                                <?php if($product->original_price): ?>
                                <span class="original">₱<?php echo e(number_format($product->original_price, 2)); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if($product->stock_quantity > 0): ?>
                            <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                            <?php else: ?>
                            <button class="btn btn-outline" disabled style="opacity: 0.5;">Out of Stock</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="text-center mt-4">
                    <?php echo e($products->links()); ?>

                </div>
                <?php else: ?>
                <div class="card text-center" style="padding: 64px;">
                    <p style="font-size: 18px; color: var(--text-light); margin-bottom: 24px;">No products found.</p>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Clear Filters</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    [style*="grid-template-columns: 240px"] {
        grid-template-columns: 1fr !important;
    }
    aside {
        display: none;
    }
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/products/index.blade.php ENDPATH**/ ?>