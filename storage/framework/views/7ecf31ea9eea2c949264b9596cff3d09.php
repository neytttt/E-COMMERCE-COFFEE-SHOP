<header class="header">
    <div class="container">
        <div class="header-inner">
            <a href="<?php echo e(route('home')); ?>" class="logo">Grace <span>&</span> Ground</a>
            
            <button class="mobile-toggle" onclick="toggleMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/></svg>
            </button>
            
            <nav class="nav">
                <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a>
                <a href="<?php echo e(route('products.index')); ?>" class="<?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>">Shop</a>
                <a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">About</a>
                <a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">Contact</a>
            </nav>
            
            <div class="header-actions">
                <a href="<?php echo e(route('cart.index')); ?>" class="cart-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="cart-count"><?php echo e(session('cart') ? array_sum(array_column(session('cart', []), 'quantity')) : 0); ?></span>
                </a>
                
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-outline btn-sm">My Orders</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline btn-sm">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-outline">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<div class="mobile-menu" id="mobileMenu">
    <a href="<?php echo e(route('home')); ?>" onclick="toggleMenu()">Home</a>
    <a href="<?php echo e(route('products.index')); ?>" onclick="toggleMenu()">Shop</a>
    <a href="<?php echo e(route('about')); ?>" onclick="toggleMenu()">About</a>
    <a href="<?php echo e(route('contact')); ?>" onclick="toggleMenu()">Contact</a>
    <?php if(auth()->guard()->check()): ?>
    <a href="<?php echo e(route('orders.index')); ?>" onclick="toggleMenu()">My Orders</a>
    <?php else: ?>
    <a href="<?php echo e(route('login')); ?>" onclick="toggleMenu()">Login</a>
    <a href="<?php echo e(route('register')); ?>" onclick="toggleMenu()">Register</a>
    <?php endif; ?>
</div>

<script>
function toggleMenu() {
    document.getElementById('mobileMenu').classList.toggle('show');
}
</script><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>