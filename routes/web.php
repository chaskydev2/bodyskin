<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;

// Rutas públicas
Route::view('/', 'welcome')->name('home');

// Rutas de autenticación de usuarios normales
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// Rutas de autenticación de administradores
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])
        ->middleware('guest:admin')
        ->name('admin.login');

    Route::post('/login', [AdminAuthenticatedSessionController::class, 'store'])
        ->middleware('guest:admin');

    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:admin')
        ->name('admin.logout');
});

// Rutas protegidas de administradores
Route::middleware(['auth:admin', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rutas de usuarios normales
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [UserDetailController::class, 'index'])->name('dashboard');
    Route::post('user_details', [UserDetailController::class, 'store'])->name('user_details.store');
    Route::put('user_details/{id}', [UserDetailController::class, 'update'])->name('user_details.update');
});

// Rutas del perfil
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rutas de autenticación
require __DIR__.'/auth.php';
