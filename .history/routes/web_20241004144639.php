<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OtorisasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/faq', function () {
    return view('admin.faq');
})->name('faq');

Route::get('/contact', function () {
    return view('admin.contact');
})->name('contact');

Route::post('/contact', [AdminController::class, 'submit'])->name('contact.submit');

// Authenticated and Verified Users Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/dashboard/save-integrity', [DashboardController::class, 'saveIntegrity'])->name('dashboard.saveIntegrity');

    // Dashboard management routes
    Route::get('/dashboard/view/{id}', [DashboardController::class, 'view'])->name('dashboard.view');
    Route::get('/dashboard/delete/{id}', [DashboardController::class, 'delete'])->name('dashboard.delete');
    Route::get('/dashboard/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');

    // Profile-related routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User management routes
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete'); // DELETE instead of GET
    Route::get('/user/reset-password/{id}', [UserController::class, 'resetPassword'])->name('user.reset-password');

    Route::get('/otorisasi/create', [OtorisasiController::class, 'create'])->name('otorisasi.create');
    Route::post('/otorisasi/store', [OtorisasiController::class, 'store'])->name('otorisasi.store');

    Route::get('/dashboard/{id_dashboard}', [DashboardController::class, 'show'])->name('dashboard.show');

});

// Admin-Specific Routes (Authenticated and Admin Role)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/otorisasi', [AdminController::class, 'otorisasi'])->name('admin.otorisasi');
});

// Include Breeze's authentication routes
require __DIR__.'/auth.php';
