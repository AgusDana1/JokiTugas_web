<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PenjokiController;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('homePage');
})->name('home');

// caraOrder
Route::get('/caraOrder', function () {
    return view('caraOrder');
})->name('caraOrder');

// blog page
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/payment', [PayController::class, 'showForm'])->name('payment.form');
Route::post('/payment', [PayController::class, 'processPay'])->name('payment.page');

// hanya untuk admin
Route::middleware(RoleMiddleware::class.':admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/orders/{id}', [AdminController::class, 'showOrder'])->name('order.show');
});

// Hanya untuk penjoki
Route::middleware(RoleMiddleware::class.':penjoki')->group(function () {
    Route::get('/penjoki/dashboard', [PenjokiController::class, 'dashboard'])->name('penjoki.dashboard');
    Route::get('/penjoki/orders/{id}', [PenjokiController::class, 'TampilkanOrder'])->name('order.tampilkan');
});

// logic route admin untuk update status pending/paid/completed
Route::middleware(RoleMiddleware::class.':admin')->prefix('admin')->group(function () {
    Route::patch('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.updateOrderStatus');
});

// Halaman Pembayaran Tf Bank
Route::get('/payment/bank-transfer/{order_id}', function ($order_id) {
    $order = Order::findOrFail($order_id);
    return view('payment.bank_transfer', compact('order')); 
})->name('payment.bank_transfer');

// Halaman Pembayaran e-wallet
Route::get('/payment/ewallet/{order_id}/{ewallet}', function ($order_id, $ewallet) {
    $order = Order::findOrFail($order_id);
    return view('payment.ewallet', compact('order', 'ewallet'));
})->name('payment.ewallet');

// Dashboard user biasa
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('homePage');
    })->name('home');
});

// callback setelah user membayar
Route::post('/payment/callback', function (Request $request) {
    $order = Order::find($request->input('order_id'));

    if (!$order) return response()->json(['error' => 'Pesanan tidak dapat ditemukan!'], 404);

    return response()->json(['message' => 'Pembayaran berhasil diproses!']);
});

// Login register 
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');