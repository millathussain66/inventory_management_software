<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Product Start
Route::prefix('product')->group(function () {
    Route::get('view', [ProductController::class, 'index'])->name('product.view');
});


// Catagory

Route::prefix('category')->group(function () {
    Route::get('view', [CategoryController::class, 'index'])->name('category.view');
});














