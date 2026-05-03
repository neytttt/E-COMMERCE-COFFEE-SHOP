<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/products', [FrontendProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [FrontendProductController::class, 'show'])->name('products.show');
Route::get('/category/{slug}', [FrontendProductController::class, 'category'])->name('products.category');
Route::get('/featured', [FrontendProductController::class, 'featured'])->name('products.featured');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// User must be logged in to view cart and checkout
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

// Admin Routes
Route::prefix('admin')->middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('admin.dashboard.stats');
    
    Route::resource('products', AdminProductController::class)->names('admin.products');
    Route::post('/products/{product}/toggle-featured', [AdminProductController::class, 'toggleFeatured'])->name('admin.products.toggle-featured');
    Route::post('/products/{product}/toggle-status', [AdminProductController::class, 'toggleStatus'])->name('admin.products.toggle-status');
    
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::post('/categories/{category}/toggle', [CategoryController::class, 'toggle'])->name('admin.categories.toggle');
    
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::put('/orders/{order}/payment-status', [AdminOrderController::class, 'updatePaymentStatus'])->name('admin.orders.updatePaymentStatus');
    Route::post('/orders/{order}/cancel', [AdminOrderController::class, 'cancel'])->name('admin.orders.cancel');
    
    Route::get('/deliveries', [DeliveryController::class, 'index'])->name('admin.deliveries.index');
    Route::get('/deliveries/{delivery}', [DeliveryController::class, 'show'])->name('admin.deliveries.show');
    Route::patch('/deliveries/{delivery}', [DeliveryController::class, 'update'])->name('admin.deliveries.update');
    Route::post('/deliveries/{delivery}', [DeliveryController::class, 'update'])->name('admin.deliveries.update');
    Route::post('/deliveries/{delivery}/ship', [DeliveryController::class, 'markShipped'])->name('admin.deliveries.mark-shipped');
    Route::post('/deliveries/{delivery}/deliver', [DeliveryController::class, 'markDelivered'])->name('admin.deliveries.mark-delivered');
    
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::post('/contacts/{contact}/mark-read', [AdminContactController::class, 'markRead'])->name('admin.contacts.markRead');
    
    Route::resource('banners', BannerController::class)->names('admin.banners');
    Route::post('/banners/{banner}/toggle', [BannerController::class, 'toggle'])->name('admin.banners.toggle');
    
    Route::resource('customers', CustomerController::class)->names('admin.customers')->except(['create', 'store']);
    Route::post('/customers/{customer}/toggle-status', [CustomerController::class, 'toggleStatus'])->name('admin.customers.toggle-status');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/gcash/{id}', [CheckoutController::class, 'gcash'])->name('checkout.gcash');
    Route::post('/checkout/gcash/webhook', [CheckoutController::class, 'gcashWebhook'])->name('payment.gcash.webhook');
    Route::post('/checkout/gcash/{id}/cod', [CheckoutController::class, 'gcashCod'])->name('checkout.gcash.cod');

    Route::get('/orders', [FrontendOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [FrontendOrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/cancel', [FrontendOrderController::class, 'cancel'])->name('orders.cancel');
});

require __DIR__.'/auth.php';