<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;





// For Register 
Route::get('register',[UserController::class,'register_view'])->name('user.register');
Route::post('register',[UserController::class,'register_submit'])->name('user.register');



Route::get('/login', function () {
    return view('login_register.login');
});

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Product Start
Route::prefix('product')->group(function () {
    Route::get('view', [ProductController::class, 'index'])->name('product.view');
});


// Catagory

Route::prefix('category')->group(function () {
    Route::get('view', [CategoryController::class, 'index'])->name('category.view');
});














