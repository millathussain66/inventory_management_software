<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Product Start
Route::prefix('product')->group(function () {
    Route::get('view', [ProductController::class, 'index'])->name('product.view');
});















