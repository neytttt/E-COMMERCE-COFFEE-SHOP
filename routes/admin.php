<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::prefix('admin')->middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('admin.dashboard.stats');

    Route::resource('products', ProductController::class)->names('admin.products');
    Route::post('/products/{product}/toggle-featured', [ProductController::class, 'toggleFeatured'])->name('products.toggle-featured');
    Route::post('/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggle-status');

    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::post('/categories/{category}/toggle', [CategoryController::class, 'toggle'])->name('categories.toggle');

    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::put('/orders/{order}/payment-status', [OrderController::class, 'updatePaymentStatus'])->name('orders.updatePaymentStatus');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    Route::get('/deliveries', [DeliveryController::class, 'index'])->name('admin.deliveries.index');
    Route::get('/deliveries/{delivery}', [DeliveryController::class, 'show'])->name('admin.deliveries.show');
    Route::post('/deliveries/{delivery}/ship', [DeliveryController::class, 'markShipped'])->name('admin.deliveries.mark-shipped');
    Route::post('/deliveries/{delivery}/deliver', [DeliveryController::class, 'markDelivered'])->name('admin.deliveries.mark-delivered');

    Route::resource('banners', BannerController::class)->names('admin.banners');
    Route::post('/banners/{banner}/toggle', [BannerController::class, 'toggle'])->name('banners.toggle');

    Route::resource('customers', CustomerController::class)->names('admin.customers')->except(['create', 'store']);
    Route::post('/customers/{customer}/toggle-status', [CustomerController::class, 'toggleStatus'])->name('customers.toggle-status');
});