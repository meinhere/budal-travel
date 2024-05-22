<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\DashboardBusController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardWisataController;
use App\Http\Controllers\RiwayatTransaksiController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// ----- HOME ROUTE -----
Route::get('/', [ReservasiController::class, 'index'])->name('home');
Route::post('/  ', [ReservasiController::class, 'search'])->name('search');
Route::get('/search/{kota:kode_kota}', [ReservasiController::class, 'show'])->name('show');

// ----- DASHBOARD ROUTE -----
Route::middleware('karyawan')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/transaction', [DashboardController::class, 'transaction'])->name('dashboard.transaction');
    Route::get('/dashboard/transaction/{id}', [DashboardController::class, 'show'])->name('dashboard.show');

    Route::resource('/dashboard/bus', DashboardBusController::class)->names(['index' => 'dashboard.bus', 'create' => 'dashboard.bus.create', 'edit' => 'dashboard.bus.edit', 'destroy' => 'dashboard.bus.destroy'])->parameters(['bus' => 'bus:kode_bus'])->except(['show']);
    Route::resource('/dashboard/wisata', DashboardWisataController::class)->names(['index' => 'dashboard.wisata', 'create' => 'dashboard.wisata.create', 'edit' => 'dashboard.wisata.edit', 'destroy' => 'dashboard.wisata.destroy'])->parameters(['wisata' => 'wisata:kode_wisata'])->except(['show']);
    Route::resource('/dashboard/user', DashboardUserController::class)->names(['index' => 'dashboard.user', 'create' => 'dashboard.user.create', 'edit' => 'dashboard.user.edit', 'destroy' => 'dashboard.user.destroy'])->parameters(['user' => 'user:kode_user'])->except(['show']);
});

// ----- AUTH ROUTE -----
Route::middleware('auth')->group(function () {
    // RESERVASI
    Route::get('/order/{kota}/bus/{bus}', [ReservasiController::class, 'order'])->name('order');
    Route::post('/order', [ReservasiController::class, 'store'])->name('store');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // RIWAYAT TRANSAKSI
    Route::get('/transaction', [RiwayatTransaksiController::class, 'index'])->name('riwayat');
    Route::get('/transaction/{id}', [RiwayatTransaksiController::class, 'show'])->name('riwayat.show');
    
    // FEEDBACK
    Route::get('/feedback/{id}', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

require __DIR__.'/auth.php';