<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Grace & Ground Admin Panel">
    <title><?php echo $__env->yieldContent('title', 'Admin - Grace & Ground'); ?></title>
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --admin-bg-primary: #0D0D0D;
            --admin-bg-secondary: #141414;
            --admin-bg-surface: #1A1A1A;
            --admin-bg-card: #1F1F1F;
            --admin-bg-hover: #262626;
            --admin-bg-active: #2D2D2D;
            --admin-primary: #C9A962;
            --admin-primary-light: #D4BC7D;
            --admin-primary-dark: #B8963F;
            --admin-text-primary: #F5F5F5;
            --admin-text-secondary: #B0B0B0;
            --admin-text-muted: #707070;
            --admin-border: #2D2D2D;
            --admin-border-light: #3D3D3D;
            --admin-success: #4CAF50;
            --admin-error: #EF5350;
            --admin-warning: #FFB74D;
            --admin-info: #42A5F5;
            
            --font-heading: 'Playfair Display', Georgia, serif;
            --font-body: 'Lato', -apple-system, sans-serif;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: var(--font-body);
            background-color: var(--admin-bg-primary);
            color: var(--admin-text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            font-weight: 600;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-family: var(--font-body);
            font-weight: 600;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 14px;
        }
        
        .btn-primary {
            background: var(--admin-primary);
            color: var(--admin-bg-primary);
        }
        
        .btn-primary:hover {
            background: var(--admin-primary-dark);
        }
        
        .btn-secondary {
            background: transparent;
            color: var(--admin-text-primary);
            border: 1px solid var(--admin-border-light);
        }
        
        .btn-secondary:hover {
            background: var(--admin-bg-hover);
            border-color: var(--admin-primary);
        }
        
        .btn-danger {
            background: var(--admin-error);
            color: #fff;
        }
        
        .btn-danger:hover {
            background: #d32f2f;
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        .card {
            background: var(--admin-bg-card);
            border: 1px solid var(--admin-border);
            border-radius: 8px;
            padding: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--admin-text-primary);
        }
        
        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-family: var(--font-body);
            font-size: 14px;
            border: 1px solid var(--admin-border-light);
            border-radius: 4px;
            background: var(--admin-bg-secondary);
            color: var(--admin-text-primary);
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--admin-primary);
        }
        
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23B0B0B0' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }
        
        textarea.form-input {
            resize: vertical;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--admin-border);
        }
        
        th {
            background: var(--admin-bg-secondary);
            font-weight: 600;
            color: var(--admin-text-secondary);
            font-size: 12px;
            text-transform: uppercase;
        }
        
        tr:hover {
            background: var(--admin-bg-hover);
        }
        
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 4px;
        }
        
        .badge-success {
            background: rgba(76, 175, 80, 0.2);
            color: var(--admin-success);
        }
        
        .badge-warning {
            background: rgba(255, 183, 77, 0.2);
            color: var(--admin-warning);
        }
        
        .badge-error {
            background: rgba(239, 83, 80, 0.2);
            color: var(--admin-error);
        }
        
        .badge-info {
            background: rgba(66, 165, 245, 0.2);
            color: var(--admin-info);
        }
        
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        
        .alert-success {
            background: rgba(76, 175, 80, 0.2);
            color: var(--admin-success);
            border: 1px solid var(--admin-success);
        }
        
        .alert-error {
            background: rgba(239, 83, 80, 0.2);
            color: var(--admin-error);
            border: 1px solid var(--admin-error);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }
        
        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid var(--admin-border);
            border-radius: 4px;
            color: var(--admin-text-secondary);
            text-decoration: none;
        }
        
        .pagination .active {
            background: var(--admin-primary);
            color: var(--admin-bg-primary);
            border-color: var(--admin-primary);
        }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 2rem; }
        
        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mt-4 { margin-top: 2rem; }
        
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        
        .admin-main {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
        }
        
        .admin-content {
            flex: 1;
            padding: 2rem;
        }
        
        .flex { display: flex; }
        .flex-wrap { flex-wrap: wrap; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .justify-center { justify-content: center; }
        .gap-1 { gap: 0.5rem; }
        .gap-2 { gap: 1rem; }
        .gap-3 { gap: 1.5rem; }
        .gap-4 { gap: 2rem; }
    </style>
</head>
<body>
    <div class="admin-layout">
        <?php echo $__env->make('admin.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        
        <div class="admin-main">
            <?php echo $__env->make('admin.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            
            <main class="admin-content">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>