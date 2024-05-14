<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RiwayatTransaksiController;

Route::get('/', [ReservasiController::class, 'index'])->name('home');
Route::get('/search/{kota}', [ReservasiController::class, 'search'])->name('search');
Route::get('/order/{kota}', [ReservasiController::class, 'order'])->name('order');

// Route::get('/dashboard', function () {
//     return view('layouts.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard/transaction', function () {
    return view('dashboard.transaction');
})->name('dashboard.transaction');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/transaction', [RiwayatTransaksiController::class, 'index'])->name('riwayat.index');
    Route::get('/transaction/{id}', [RiwayatTransaksiController::class, 'show'])->name('riwayat.show');
});

require __DIR__.'/auth.php';
