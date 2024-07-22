<?php

use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\ServiceController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Frontsite\HomeController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class);

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    // Rute redirect default
    Route::redirect('/', '/backsite/dashboard', 301)->name('index');
    // dashboard
    Route::resource('dashboard', DashboardController::class);
    // user
    Route::resource('user', UserController::class);
    // service
    Route::resource('layanan', ServiceController::class);
});
