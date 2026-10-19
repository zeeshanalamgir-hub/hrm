<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::controller(SettingsController::class)->prefix('settings')->name('settings.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::put('profile', 'updateProfile')->name('profile.update');
        Route::delete('avatar', 'destroyAvatar')->name('avatar.destroy');
        Route::put('password', 'updatePassword')->name('password.update');
    });
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
