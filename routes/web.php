<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============================================================
// PUBLIC PAGES (dapat diakses semua orang)
// ============================================================

// Home – menampilkan produk unggulan & daftar produk
Route::get('/', function () {
    try {
        $response = Http::withoutVerifying()->get('https://fakestoreapi.com/products?limit=4');
        $products = $response->successful()
            ? collect($response->json())->map(fn($item) => (object) [
                'id'       => $item['id'],
                'name'     => $item['title'],
                'price'    => (int) round($item['price'] * 15000),
                'image'    => $item['image'],
                'category' => $item['category'],
            ])
            : collect();
    } catch (\Exception $e) {
        $products = collect();
    }

    $product = $products->first() ?: (object) [
        'id'       => 0,
        'name'     => 'Featured Product',
        'price'    => 0,
        'image'    => 'https://via.placeholder.com/500x500?text=No+Image',
        'category' => 'uncategorized',
    ];

    return view('home', compact('products', 'product'));
})->name('home');

// About – halaman informasi brand
Route::view('/about', 'about')->name('about');

// Store – halaman alamat toko fisik (TAMBAHKAN)
Route::view('/store', 'store')->name('store');

// ============================================================
// PRODUCT ROUTES (public)
// ============================================================
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{id}', 'show')->name('products.show');
});

// ============================================================
// ACCOUNT – bisa diakses guest (akan muncul banner login)
// ============================================================
Route::get('/account', [AccountController::class, 'index'])->name('account');

// ============================================================
// DASHBOARD – hanya untuk user login & terverifikasi
// ============================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ============================================================
// AUTHENTICATED ROUTES (hanya untuk user yang sudah login)
// ============================================================
Route::middleware('auth')->group(function () {

    // ---- Profile (edit profil, ganti password, hapus akun) ----
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
        Route::put('/password', 'updatePassword')->name('password.update');
    });

    // ---- Cart (keranjang belanja) ----
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/add', 'add')->name('cart.add');
        Route::patch('/cart/{key}', 'update')->name('cart.update');
        Route::delete('/cart/{key}', 'remove')->name('cart.remove');
    });

    // ---- Checkout & Orders ----
    Route::controller(OrderController::class)->group(function () {
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/checkout', 'store')->name('checkout.store');
        Route::get('/orders/{order}', 'show')->name('orders.show');
    });

    // ---- Payment (Midtrans) ----
    Route::controller(PaymentController::class)->group(function () {
        Route::get('/orders/{order}/snap-token', 'getSnapToken')->name('payment.snap-token');
        Route::get('/orders/{order}/simulate-success', 'simulateSuccess')->name('payment.simulate-success');
    });

    // ---- Admin Panel (hanya admin) ----
    Route::middleware('admin')->controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.dashboard');
        Route::post('/admin/products', 'storeProduct')->name('admin.products.store');
        Route::delete('/admin/products/{id}', 'deleteProduct')->name('admin.products.destroy');
        Route::post('/admin/upload', 'uploadImage')->name('admin.upload');
        Route::post('/admin/upload/delete', 'deleteImage')->name('admin.upload.destroy');
    });
});

// ============================================================
// AUTH ROUTES (Laravel Breeze / Jetstream) – jangan diubah
// ============================================================
require __DIR__ . '/auth.php';