<?php

use App\Http\Controllers\ParameterSetupController;
use Illuminate\Support\Facades\Route;

// parameter Start
Route::prefix('parameter')->group(function () {
    Route::get('view', [ParameterSetupController::class, 'index'])->name('parameter.view');
    Route::get('duplicate_check', [ParameterSetupController::class, 'duplicate_check'])->name('parameter.duplicate_check');
    Route::post('add', [ParameterSetupController::class, 'store'])->name('parameter.add');
    Route::get('grid', [ParameterSetupController::class, 'grid'])->name('parameter.grid');
    Route::post('delete', [ParameterSetupController::class, 'destroy'])->name('parameter.delete');
});