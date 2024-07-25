<?php

use App\Http\Controllers\ParameterSetupController;
use Illuminate\Support\Facades\Route;

// parameter Start
Route::prefix('parameter')->group(function () {
    Route::get('/view', [ParameterSetupController::class, 'index'])->name('parameter.view');
    Route::get('/duplicate_check', [ParameterSetupController::class, 'duplicate_check'])->name('parameter.duplicate_check');
    Route::post('/add', [ParameterSetupController::class, 'store'])->name('parameter.add');
    Route::get('/grid', [ParameterSetupController::class, 'grid'])->name('parameter.grid');
    Route::get('/delete/{tablename}', [ParameterSetupController::class, 'destroy'])->name('parameter.delete');
    Route::get('/get_edit_data', [ParameterSetupController::class, 'get_edit_data'])->name('parameter.get_edit_data');
    Route::get('/table_attributes', [ParameterSetupController::class, 'table_attributes'])->name('parameter.table_attributes');
    Route::post('/add_all', [ParameterSetupController::class, 'store_all'])->name('parameter.add_all');
});