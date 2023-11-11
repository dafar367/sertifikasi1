<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/transaksi', [App\Http\Controllers\HomeController::class, 'transaksi'])->name('transaksi');
Route::get('/kendaraan', [App\Http\Controllers\HomeController::class, 'kendaraan'])->name('kendaraan');

Route::get('/kendaraan_fill_page', [App\Http\Controllers\KendaraanController::class, 'kendaraan_fill_page'])->name('kendaraan_fill_page');

Route::get('/detail_transaksi/{id}', [App\Http\Controllers\CustomerController::class, 'detail_transaksi'])->name('detail_transaksi');

// Route::get('/mobil', function () {
//     return view('kendaraan.fill_kendaraan');
// });


Route::post('/store_customer', [App\Http\Controllers\CustomerController::class, 'store'])->name('store_customer');
Route::post('/store_to_kendaraan_page', [App\Http\Controllers\KendaraanController::class, 'store_to_kendaraan_page'])->name('store_to_kendaraan_page');
Route::post('/store_kendaraan', [App\Http\Controllers\KendaraanController::class, 'store_kendaraan'])->name('store_kendaraan');
Route::post('/store_transaksi', [App\Http\Controllers\TransaksiController::class, 'store_transaksi'])->name('store_transaksi');

Route::put('/edit_transaksi/{id}', [App\Http\Controllers\CustomerController::class, 'edit_transaksi'])->name('edit_transaksi');
Route::put('/edit_customer/{id}', [App\Http\Controllers\CustomerController::class, 'edit_customer'])->name('edit_customer');
Route::put('/edit_kendaraan/{id}', [App\Http\Controllers\KendaraanController::class, 'edit_kendaraan'])->name('edit_kendaraan');



Route::delete('/delete_transaksi/{id}', [App\Http\Controllers\CustomerController::class, 'delete_transaksi'])->name('delete_transaksi');
Route::delete('/delete_customer/{id}', [App\Http\Controllers\CustomerController::class, 'delete_customer'])->name('delete_customer');
Route::delete('/delete_kendaraan/{id}', [App\Http\Controllers\KendaraanController::class, 'delete_kendaraan'])->name('delete_kendaraan');
Route::delete('/delete_history_transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'delete_history_transaksi'])->name('delete_history_transaksi');
