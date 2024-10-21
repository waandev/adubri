<?php

use App\Http\Controllers\Backsite\ChangePasswordController;
use App\Http\Controllers\Backsite\ComplaintController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\ProfileController;
use App\Http\Controllers\Backsite\ServiceController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Frontsite\HomeController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class);
Route::get('/get-services', [HomeController::class, 'getServicesByCategory'])->name('getServicesByCategory');


Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    // Rute redirect default
    Route::redirect('/', '/backsite/dashboard', 301)->name('index');
    // dashboard
    Route::resource('dashboard', DashboardController::class);
    Route::get('/get-complaint-data', [DashboardController::class, 'getComplaintData']);

    // complaint
    Route::resource('aduan', ComplaintController::class);
    Route::post('/aduan/{id}/feedback', [ComplaintController::class, 'sendFeedback'])
        ->name('aduan.sendFeedback');
    // user
    Route::resource('user', UserController::class);
    // service
    Route::resource('layanan', ServiceController::class);
    // konfigurasi - profil
    Route::resource('profil', ProfileController::class);
    // konfigurasi - ganti password
    Route::resource('ganti-password', ChangePasswordController::class);
});
