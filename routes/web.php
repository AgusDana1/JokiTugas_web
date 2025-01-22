<?php

use App\Http\Controllers\PayController;
use Illuminate\Support\Facades\Route;

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
Route::post('/payment', [PayController::class, 'processPay'])->name('payment.process');