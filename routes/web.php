<?php

use App\Http\Controllers\Backsite\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    // Rute redirect default
    Route::redirect('/', '/backsite/dashboard', 301)->name('index');
    // dashboard
    Route::resource('dashboard', DashboardController::class);
});
