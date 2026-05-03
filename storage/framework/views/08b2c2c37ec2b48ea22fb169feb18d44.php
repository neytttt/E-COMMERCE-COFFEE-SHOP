<?php $__env->startSection('title', 'Grace & Ground Coffee Shop'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="hero" style="padding: 0;">
    <div class="container">
        <span style="display: inline-block; background: var(--royal-gold); color: var(--dark-bg); padding: 10px 24px; border-radius: 30px; font-size: 12px; font-weight: 600; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 30px;">Welcome to Grace & Ground</span>
        <h1 style="font-size: 72px; line-height: 1.1; margin-bottom: 25px;">Premium Coffee<br><span style="color: var(--royal-gold);">& Delicious Bites</span></h1>
        <p style="font-size: 18px; color: var(--white-muted); max-width: 500px; margin-bottom: 40px;">Freshly brewed coffee, specialty drinks, and tasty treats.<br>Your perfect cup awaits.</p>
        <div style="display: flex; gap: 16px; flex-wrap: wrap; justify-content: center;">
            <a href="#menu" class="btn btn-gold">View Menu</a>
            <a href="#location" class="btn btn-outline" style="border-color: var(--royal-gold); color: var(--royal-gold);">Visit Us</a>
        </div>
    </div>
</section>

<!-- Our Menu -->
<section class="section" id="menu">
    <div class="container">
        <div class="section-header">
            <span>Our Menu</span>
            <h2>What We Serve</h2>
            <p>From handcrafted coffee to refreshing matcha and tasty eats</p>
        </div>
        
        <!-- Coffee Series -->
        <div style="margin-bottom: 70px;">
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid var(--dark-border);">
                <div style="width: 60px; height: 60px; background: var(--royal-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--dark-bg)" viewBox="0 0 24 24"><path d="M2,21H20V19H2M20,8H18V5H20M20,3H4V13A4,4 0 0,0 8,17H14A4,4 0 0,0 18,13V5H20A2,2 0 0,0 22,3V10L20,13M10,13A2,2 0 0,1 12,11A2,2 0 0,1 14,13A2,2 0 0,1 12,15A2,2 0 0,1 10,14Z"/></svg>
                </div>
                <div>
                    <h3 style="font-size: 28px; color: var(--white); margin: 0;">Coffee Series</h3>
                    <p style="color: var(--white-muted); margin: 5px 0 0;">Handcrafted espresso drinks</p>
                </div>
            </div>
            
            <div class="products-grid">
                <?php $__currentLoopData = $categories->whereIn('slug', ['burnt-sugar', 'spanish-latte', 'mocha-latte']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <div style="padding: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <h4 style="font-size: 20px; color: var(--white); margin: 0;"><?php echo e($category->name); ?></h4>
                            <span style="color: var(--royal-gold); font-weight: 600;">from ₱140</span>
                        </div>
                        <a href="<?php echo e(route('products.category', $category->slug)); ?>" style="color: var(--royal-gold); font-size: 14px; text-decoration: none;">View drinks →</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
        <!-- Matcha & Chocolate -->
        <div style="margin-bottom: 70px;">
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid var(--dark-border);">
                <div style="width: 60px; height: 60px; background: var(--royal-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--dark-bg)" viewBox="0 0 24 24"><path d="M2,21H20V19H2M20,8H18V5H20M20,3H4V13A4,4 0 0,0 8,17H14A4,4 0 0,0 18,13V5H20A2,2 0 0,0 22,3V10L20,13M10,13A2,2 0 0,1 12,11A2,2 0 0,1 14,13A2,2 0 0,1 12,15A2,2 0 0,1 10,14Z"/></svg>
                </div>
                <div>
                    <h3 style="font-size: 28px; color: var(--white); margin: 0;">Matcha & Chocolate</h3>
                    <p style="color: var(--white-muted); margin: 5px 0 0;">Creamy matcha & rich chocolate</p>
                </div>
            </div>
            
            <div class="products-grid">
                <?php $__currentLoopData = $categories->whereIn('slug', ['strawberry-matcha', 'matcha-cloud', 'choco-heaven']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <div style="padding: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <h4 style="font-size: 20px; color: var(--white); margin: 0;"><?php echo e($category->name); ?></h4>
                            <span style="color: var(--royal-gold); font-weight: 600;">from ₱165</span>
                        </div>
                        <a href="<?php echo e(route('products.category', $category->slug)); ?>" style="color: var(--royal-gold); font-size: 14px; text-decoration: none;">View drinks →</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
        <!-- Soda Series -->
        <div style="margin-bottom: 70px;">
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid var(--dark-border);">
                <div style="width: 60px; height: 60px; background: var(--royal-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--dark-bg)" viewBox="0 0 24 24"><path d="M2,21H20V19H2M20,8H18V5H20M20,3H4V13A4,4 0 0,0 8,17H14A4,4 0 0,0 18,13V5H20A2,2 0 0,0 22,3V10L20,13M10,13A2,2 0 0,1 12,11A2,2 0 0,1 14,13A2,2 0 0,1 12,15A2,2 0 0,1 10,14Z"/></svg>
                </div>
                <div>
                    <h3 style="font-size: 28px; color: var(--white); margin: 0;">Soda Series</h3>
                    <p style="color: var(--white-muted); margin: 5px 0 0;">Refreshing fruit sodas</p>
                </div>
            </div>
            
            <div class="products-grid">
                <?php $__currentLoopData = $categories->whereIn('slug', ['lychee-soda', 'strawberry-soda', 'blueberry-soda']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <div style="padding: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <h4 style="font-size: 20px; color: var(--white); margin: 0;"><?php echo e($category->name); ?></h4>
                            <span style="color: var(--royal-gold); font-weight: 600;">from ₱140</span>
                        </div>
                        <a href="<?php echo e(route('products.category', $category->slug)); ?>" style="color: var(--royal-gold); font-size: 14px; text-decoration: none;">View drinks →</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
        <!-- Foods -->
        <div>
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid var(--dark-border);">
                <div style="width: 60px; height: 60px; background: var(--royal-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="var(--dark-bg)" viewBox="0 0 24 24"><path d="M2,21H20V19H2M20,8H18V5H20M20,3H4V13A4,4 0 0,0 8,17H14A4,4 0 0,0 18,13V5H20A2,2 0 0,0 22,3V10L20,13M10,13A2,2 0 0,1 12,11A2,2 0 0,1 14,13A2,2 0 0,1 12,15A2,2 0 0,1 10,14Z"/></svg>
                </div>
                <div>
                    <h3 style="font-size: 28px; color: var(--white); margin: 0;">Foods</h3>
                    <p style="color: var(--white-muted); margin: 5px 0 0;">Perfect companions to your drink</p>
                </div>
            </div>
            
            <div class="products-grid">
                <?php $__currentLoopData = $categories->whereIn('slug', ['fries-overload', 'nachos', 'burger']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card" style="opacity: <?php echo e($category->is_active ? 1 : 0.5); ?>;">
                    <div style="padding: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <h4 style="font-size: 20px; color: var(--white); margin: 0;"><?php echo e($category->name); ?></h4>
                            <span style="color: var(--royal-gold); font-weight: 600;"><?php echo e($category->is_active ? 'from ₱120' : 'Coming Soon'); ?></span>
                        </div>
                        <?php if($category->is_active): ?>
                        <a href="<?php echo e(route('products.category', $category->slug)); ?>" style="color: var(--royal-gold); font-size: 14px; text-decoration: none;">View →</a>
                        <?php else: ?>
                        <span style="color: #666; font-size: 14px;">Coming Soon</span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="section" style="background: var(--dark-card);">
    <div class="container">
        <div class="section-header">
            <span>Popular</span>
            <h2>Customer Favorites</h2>
            <p>Try our most popular drinks</p>
        </div>
        
        <div class="products-grid">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card">
                <div style="height: 220px; background: var(--dark-surface); display: flex; align-items: center; justify-content: center;">
                    <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                    <span style="color: var(--white-muted); font-size: 48px;">☕</span>
                    <?php endif; ?>
                </div>
                <div style="padding: 20px;">
                    <span style="color: var(--royal-gold); font-size: 12px; font-weight: 600; text-transform: uppercase;"><?php echo e($product->category?->name ?? 'Coffee'); ?></span>
                    <h4 style="font-size: 20px; color: var(--white); margin: 8px 0;"><?php echo e($product->name); ?></h4>
                    <p style="color: var(--white-muted); font-size: 14px; margin-bottom: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo e($product->description); ?></p>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 22px; color: var(--white); font-weight: 600;">₱<?php echo e(number_format($product->price, 0)); ?></span>
                        <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size: 12px;">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section style="background: linear-gradient(135deg, var(--royal-gold) 0%, var(--royal-gold-dark) 100%); padding: 80px 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; text-align: center;">
            <div>
                <div style="width: 80px; height: 80px; background: var(--dark-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="var(--royal-gold)" viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,16.5L6.5,12L7.91,10.59L11,13.67L16.59,8.09L18,9.5L11,16.5Z"/></svg>
                </div>
                <h4 style="font-size: 20px; color: var(--dark-bg); margin-bottom: 10px;">Freshly Brewed</h4>
                <p style="color: rgba(0,0,0,0.7);">Every cup is made fresh to order</p>
            </div>
            <div>
                <div style="width: 80px; height: 80px; background: var(--dark-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="var(--royal-gold)" viewBox="0 0 24 24"><path d="M12,3L2,12H5V20H11V14H13V20H19V12H22L12,3M12,8.75A2.25,2.25 0 0,1 14.25,11A2.25,2.25 0 0,1 12,13.25A2.25,2.25 0 0,1 9.75,11A2.25,2.25 0 0,1 12,8.75Z"/></svg>
                </div>
                <h4 style="font-size: 20px; color: var(--dark-bg); margin-bottom: 10px;">Premium Beans</h4>
                <p style="color: rgba(0,0,0,0.7);">Sourced from the best farms</p>
            </div>
            <div>
                <div style="width: 80px; height: 80px; background: var(--dark-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="var(--royal-gold)" viewBox="0 0 24 24"><path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M7.5,11C7.5,10.18 8.39,9.5 9.5,9.5H14.5C15.61,9.5 16.5,10.18 16.5,11C16.5,11.82 15.61,12.5 14.5,12.5H9.5C8.39,12.5 7.5,11.82 7.5,11Z"/></svg>
                </div>
                <h4 style="font-size: 20px; color: var(--dark-bg); margin-bottom: 10px;">Great Atmosphere</h4>
                <p style="color: rgba(0,0,0,0.7);">Perfect place to relax</p>
            </div>
            <div>
                <div style="width: 80px; height: 80px; background: var(--dark-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="var(--royal-gold)" viewBox="0 0 24 24"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"/></svg>
                </div>
                <h4 style="font-size: 20px; color: var(--dark-bg); margin-bottom: 10px;">Quality First</h4>
                <p style="color: rgba(0,0,0,0.7);">We never compromise</p>
            </div>
        </div>
    </div>
</section>

<!-- Location -->
<section id="location" class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div>
                <span style="color: var(--royal-gold); font-size: 14px; font-weight: 600; letter-spacing: 2px; text-transform: uppercase;">Visit Us</span>
                <h2 style="font-size: 42px; color: var(--white); margin: 15px 0 25px;">Come Say Hello</h2>
                <p style="color: var(--white-muted); font-size: 18px; margin-bottom: 30px;">
                    We'd love to serve you a great cup of coffee. Stop by and experience the Grace & Ground difference.
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--dark-card); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--royal-gold)" viewBox="0 0 24 24"><path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/></svg>
                        </div>
                        <div>
                            <h5 style="color: var(--white); margin: 0 0 5px;">Location</h5>
                            <p style="color: var(--white-muted); margin: 0;">San Isidro, Concepcion, Tarlac</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--dark-card); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--royal-gold)" viewBox="0 0 24 24"><path d="M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,12.5A1.5,1.5 0 0,1 10.5,11A1.5,1.5 0 0,1 12,9.5A1.5,1.5 0 0,1 13.5,11A1.5,1.5 0 0,1 12,12.5Z"/></svg>
                        </div>
                        <div>
                            <h5 style="color: var(--white); margin: 0 0 5px;">Opening Hours</h5>
                            <p style="color: var(--white-muted); margin: 0;">Mon-Sun: 5PM - 12AM</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="background: var(--dark-card); border-radius: 20px; padding: 40px; text-align: center;">
                <span style="font-size: 80px;">☕</span>
                <h3 style="color: var(--white); font-size: 28px; margin: 20px 0 10px;">Ready for a great cup?</h3>
                <p style="color: var(--white-muted); margin-bottom: 30px;">Order now and taste the difference</p>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-gold" style="display: inline-block; padding: 15px 40px; border-radius: 30px; text-decoration: none;">Order Now</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/home.blade.php ENDPATH**/ ?>