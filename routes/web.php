<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\PembelianController;
use App\Http\Controllers\Customer\CartController;

/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('obat', ObatController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('penjualan', PenjualanController::class)
    ->except(['edit', 'update']);

});

/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard Customer
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
        ->name('customer.dashboard');

    // Katalog
    Route::get('/katalog', [PembelianController::class, 'katalog'])
        ->name('katalog.index');

    // Detail Obat
    Route::get('/detail-obat/{obat}', [PembelianController::class, 'detail'])
        ->name('customer.detail');

    // Pembelian Langsung
    Route::get('/beli/{obat}', [PembelianController::class, 'create'])
        ->name('customer.beli');

    Route::post('/beli', [PembelianController::class, 'store'])
        ->name('customer.store');

    // Riwayat Pembelian
    Route::get('/riwayat', [PembelianController::class, 'riwayat'])
        ->name('customer.riwayat');

    /*
    |--------------------------------------------------------------------------
    | Keranjang Belanja
    |--------------------------------------------------------------------------
    */

    Route::get('/cart', [CartController::class, 'index'])
        ->name('customer.cart');

    Route::post('/cart/add/{id}', [CartController::class, 'add'])
        ->name('customer.cart.add');

    Route::post('/cart/update/{id}', [CartController::class, 'update'])
        ->name('customer.cart.update');

    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('customer.cart.remove');

    Route::post('/cart/checkout', [CartController::class, 'checkout'])
        ->name('customer.checkout');

});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';