<?php

use App\Http\Controllers\AdministratorApplicationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportDuesController;
use App\Http\Controllers\ExportRecapController;
use App\Http\Controllers\InternetPackageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\TransactionReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPembelianController;
use App\Http\Controllers\BerandaController;


Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('beranda');
        }
    }
    return redirect()->route('login');
});



Route::middleware(['auth', 'role:pembeli'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.pembeli');
    Route::get('/beli', [PembelianController::class, 'index'])->name('beli.index');
    Route::get('/beli/form/{id}', [PembelianController::class, 'form'])->name('beli.form');
    Route::post('/beli', [PembelianController::class, 'store'])->name('beli.store');
    Route::get('/beli/konfirmasi{id}', [PembelianController::class, 'konfirmasi'])->name('beli.konfirmasi');
    Route::get('/riwayat', [PembelianController::class, 'riwayatPembeli'])->name('riwayat.beli');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('klien', ClientController::class);
    Route::get('/admin/pembelian', [AdminPembelianController::class, 'index'])->name('admin.pembelian.index');
    Route::resource('paket-internet', InternetPackageController::class)->except(['create', 'show', 'edit']);
    Route::resource('administrator-aplikasi', AdministratorApplicationController::class)->except(['create', ' show', 'edit']);
    Route::resource('tagihan', TransactionController::class)->except(['create', 'edit', 'show']);
    Route::get('/riwayat-admin', [PembelianController::class, 'riwayatAdmin'])->name('riwayat.admin');
    Route::name('laporan.')->prefix('laporan')->group(function () {
        Route::get('rekap', [TransactionReportController::class, 'index'])->name('rekap.index');
        Route::get('/export/rekap/{year}', ExportRecapController::class)->name('export.recap');
        Route::get('/export/rekap/iuran/{year}', ExportDuesController::class)->name('export.dues');
    });
});


require __DIR__ . '/auth.php';

// If no route matched, 404 page will be returned.
Route::fallback(function () {
    abort(404);
});
