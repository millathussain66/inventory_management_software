<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// For Register 
Route::middleware(['unauth.user'])->group(function () {
    Route::get('register', [UserController::class, 'register_view'])->name('user.register');
    Route::post('register', [UserController::class, 'register_submit'])->name('user.register');
    Route::get('login', function () {
        return view('login_register.login');
    })->name('user.login');
});

Route::middleware(['auth.user'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('logout', [UserController::class, 'log_out'])->name('user.logout');
    // Product Start



    Route::prefix('profile')->group(function () {
        Route::get('view', [UserController::class, 'profile'])->name('profile.view');
        Route::post('update', [UserController::class, 'update_profile'])->name('profile.update');


    });



    Route::prefix('product')->group(function () {
        Route::get('view', [ProductController::class, 'index'])->name('product.view');
    });
    // Catagory
    Route::prefix('category')->group(function () {
        Route::get('view', [CategoryController::class, 'index'])->name('category.view');
    });
});
