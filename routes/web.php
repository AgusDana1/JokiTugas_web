<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('homePage');
})->name('home');

// caraOrder
Route::get('/caraOrder', function () {
    return view('caraOrder');
})->name('caraOrder');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

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

Route::middleware(RoleMiddleware::class.':admin')->prefix('admin')->group(function () {
    Route::patch('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.updateOrderStatus');
});

// Hanya untuk penjoki
Route::middleware(RoleMiddleware::class.':penjoki')->group(function () {
    Route::get('/penjoki/dashboard', function () {
        return view('penjoki.dashboard');
    })->name('penjoki.dashboard');
});

// Dashboard user biasa
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('homePage');
    })->name('home');
});

// Login register 
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');