<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Grace & Ground Coffee Shop - Premium Coffee & Delicious Bites">
    <title><?php echo $__env->yieldContent('title', 'Grace & Ground'); ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        :root {
            --royal-gold: #C9A962;
            --royal-gold-dark: #B8963F;
            --royal-gold-light: #D4BC7D;
            --dark-bg: #0D0D0D;
            --dark-surface: #141414;
            --dark-card: #1A1A1A;
            --dark-hover: #222222;
            --dark-border: #2D2D2D;
            --white: #F5F5F5;
            --white-muted: #B0B0B0;
            --success: #4CAF50;
            --error: #EF5350;
            
            --font-heading: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Montserrat', -apple-system, sans-serif;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: var(--font-body);
            background-color: var(--dark-bg);
            color: var(--white);
            line-height: 1.7;
            font-size: 16px;
            font-weight: 400;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            font-weight: 600;
            color: var(--white);
            line-height: 1.2;
        }
        
        a {
            color: var(--royal-gold);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        a:hover {
            color: var(--royal-gold-light);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        
        /* Header */
        .header {
            background: rgba(13, 13, 13, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--dark-border);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        
        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
        }
        
        .logo {
            font-family: var(--font-heading);
            font-size: 32px;
            font-weight: 700;
            color: var(--white);
            letter-spacing: 1px;
        }
        
        .logo span {
            color: var(--royal-gold);
        }
        
        .nav {
            display: flex;
            gap: 40px;
        }
        
        .nav a {
            color: var(--white-muted);
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 8px 0;
            position: relative;
        }
        
        .nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--royal-gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav a:hover,
        .nav a.active {
            color: var(--royal-gold);
        }
        
        .nav a:hover::after,
        .nav a.active::after {
            width: 100%;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .cart-link {
            position: relative;
            color: var(--white-muted);
            padding: 8px;
        }
        
        .cart-link:hover {
            color: var(--royal-gold);
        }
        
        .cart-count {
            position: absolute;
            top: -2px;
            right: -2px;
            background: var(--royal-gold);
            color: var(--dark-bg);
            font-size: 10px;
            font-weight: 600;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 32px;
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-decoration: none;
            border-radius: 0;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background: var(--royal-gold);
            color: var(--dark-bg);
        }
        
        .btn-primary:hover {
            background: var(--royal-gold-light);
            color: var(--dark-bg);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(201, 169, 98, 0.3);
        }
        
        .btn-outline {
            background: transparent;
            color: var(--royal-gold);
            border: 1px solid var(--royal-gold);
        }
        
        .btn-outline:hover {
            background: var(--royal-gold);
            color: var(--dark-bg);
        }
        
        .btn-gold {
            background: linear-gradient(135deg, var(--royal-gold) 0%, var(--royal-gold-dark) 100%);
            color: var(--dark-bg);
        }
        
        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(201, 169, 98, 0.4);
        }
        
        /* Main */
        main {
            min-height: 100vh;
            padding-top: 80px;
        }
        
        /* Hero */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(ellipse at 20% 80%, rgba(201, 169, 98, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(201, 169, 98, 0.1) 0%, transparent 50%),
                linear-gradient(180deg, var(--dark-bg) 0%, #141414 100%);
        }
        
        .hero > .container {
            position: relative;
            z-index: 1;
        }
        
        .hero h1 {
            font-size: 72px;
            color: var(--white);
            margin-bottom: 24px;
            letter-spacing: -1px;
        }
        
        .hero h1 span {
            color: var(--royal-gold);
        }
        
        .hero p {
            font-size: 18px;
            color: var(--white-muted);
            max-width: 500px;
            margin: 0 auto 40px;
            letter-spacing: 0.5px;
        }
        
        .hero .btn {
            margin: 0 10px;
        }
        
        /* Sections */
        .section {
            padding: 100px 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header span {
            display: inline-block;
            color: var(--royal-gold);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 15px;
        }
        
        .section-header h2 {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .section-header p {
            color: var(--white-muted);
            font-size: 18px;
            max-width: 500px;
            margin: 0 auto;
        }
        
        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }
        
        .product-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            overflow: hidden;
            transition: all 0.4s ease;
        }
        
        .product-card:hover {
            border-color: var(--royal-gold);
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }
        
        .product-image {
            height: 280px;
            background: var(--dark-surface);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.1);
        }
        
        .product-image span {
            color: var(--white-muted);
            font-size: 48px;
        }
        
        .product-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--royal-gold);
            color: var(--dark-bg);
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 6px 14px;
        }
        
        .product-info {
            padding: 24px;
        }
        
        .product-category {
            color: var(--royal-gold);
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .product-name {
            font-size: 22px;
            margin: 10px 0 15px;
        }
        
        .product-name a {
            color: var(--white);
        }
        
        .product-name a:hover {
            color: var(--royal-gold);
        }
        
        .product-price {
            font-size: 24px;
            font-weight: 600;
            color: var(--white);
        }
        
        .original {
            text-decoration: line-through;
            color: var(--white-muted);
            font-size: 16px;
            margin-left: 10px;
        }
        
        /* Forms */
        .form-input {
            width: 100%;
            padding: 16px 20px;
            background: var(--dark-surface);
            border: 1px solid var(--dark-border);
            color: var(--white);
            font-family: var(--font-body);
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--royal-gold);
        }
        
        .form-input::placeholder {
            color: var(--white-muted);
        }
        
        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            text-align: left;
            padding: 16px;
            background: var(--dark-surface);
            color: var(--white-muted);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid var(--dark-border);
        }
        
        td {
            padding: 16px;
            border-bottom: 1px solid var(--dark-border);
        }
        
        /* Footer */
        .footer {
            background: var(--dark-surface);
            border-top: 1px solid var(--dark-border);
            padding: 80px 0 40px;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }
        
        .footer h4 {
            color: var(--royal-gold);
            font-size: 18px;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .footer a {
            display: block;
            color: var(--white-muted);
            padding: 8px 0;
            font-size: 14px;
        }
        
        .footer a:hover {
            color: var(--royal-gold);
            padding-left: 10px;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            border-top: 1px solid var(--dark-border);
            color: var(--white-muted);
            font-size: 14px;
        }
        
        /* Utility */
        .text-center { text-align: center; }
        .mb-1 { margin-bottom: 8px; }
        .mb-2 { margin-bottom: 16px; }
        .mb-3 { margin-bottom: 24px; }
        .mb-4 { margin-bottom: 32px; }
        .mt-2 { margin-top: 16px; }
        .mt-3 { margin-top: 24px; }
        .mt-4 { margin-top: 32px; }
        
        /* Mobile Nav */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 24px;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .nav {
                display: none;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .header-actions {
                display: none;
            }
            
            .hero h1 {
                font-size: 36px;
                line-height: 1.2;
            }
            
            .hero p {
                font-size: 16px;
            }
            
            .section-header h2 {
                font-size: 28px;
            }
            
            .section-header p {
                font-size: 16px;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .btn {
                padding: 12px 20px;
                font-size: 14px;
            }
            
            .form-input {
                padding: 12px 14px;
                font-size: 14px;
            }
            
            .cart-item {
                flex-direction: column;
                text-align: center;
            }
            
            .cart-item img {
                width: 100%;
                height: 150px;
                object-fit: cover;
            }
            
            .checkout-grid {
                grid-template-columns: 1fr;
            }
            
            .products-show-grid {
                grid-template-columns: 1fr;
            }
            
            .hero {
                padding: 40px 0;
            }
            
            .section {
                padding: 40px 0;
            }
            
            .card, .product-card, .banner-card {
                padding: 20px;
            }
            
            .header-actions {
                display: flex;
            }
            
            .header-actions .btn {
                padding: 8px 12px;
                font-size: 12px;
            }
        }
        
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 28px;
            }
            
            .section-header h2 {
                font-size: 24px;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
            
            .header-inner {
                flex-wrap: wrap;
            }
            
            .header-actions {
                gap: 10px;
            }
            
            .logo {
                font-size: 24px;
            }
            
            .product-info {
                padding: 16px;
            }
            
            .product-name {
                font-size: 18px;
            }
            
            .product-price {
                font-size: 20px;
            }
            
            .checkout-form, .cart-summary {
                padding: 20px;
            }
            
            .contact-grid {
                grid-template-columns: 1fr;
            }
            
            .contact-form {
                order: -1;
            }
        }
        
        /* Mobile Menu */
        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            background: var(--dark-bg);
            border-bottom: 1px solid var(--dark-border);
            padding: 20px;
            z-index: 999;
        }
        
        .mobile-menu.show {
            display: block;
        }
        
        .mobile-menu a {
            display: block;
            color: var(--white-muted);
            padding: 15px 0;
            border-bottom: 1px solid var(--dark-border);
            font-size: 16px;
        }
        
        .mobile-menu a:hover {
            color: var(--royal-gold);
        }
    </style>
</head>
<body>
    <?php echo $__env->make('frontend.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('frontend.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script>
        <?php if(session('success')): ?>
            Swal.fire({icon: 'success', title: 'Success', text: '<?php echo e(session('success')); ?>', timer: 3000});
        <?php endif; ?>
        <?php if(session('error')): ?>
            Swal.fire({icon: 'error', title: 'Error', text: '<?php echo e(session('error')); ?>', timer: 3000});
        <?php endif; ?>
    </script>
</body>
</html><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>