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
    Route::post('login', [UserController::class, 'login_submit'])->name('user.login');
});


Route::get('check_activity', [UserController::class, 'check_activity'])->name('user.check_activity');

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
        Route::post('call_ajax_submit', [ProductController::class, 'call_ajax_submit'])->name('product.call_ajax_submit');

        Route::get('sub_categories/{categoryId}', [ProductController::class, 'getSubCategories'])->name('product.getSubCategories');
        Route::get('sub_sub_categories/{subCategoryId}', [ProductController::class, 'getSubSubCategories'])->name('product.getSubSubCategories');
  


    });
    // Catagory
    Route::prefix('category')->group(function () {
        Route::get('view', [CategoryController::class, 'index'])->name('category.view');
    });
});


Route::group(['middleware' => ['role:super-admin|admin']], function() {
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);
    
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

});