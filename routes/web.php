<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusikController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\PembelianController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// musik
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MusikController::class, 'index'])->name('musik.index')->middleware('auth');
Route::get('/musik', [MusikController::class, 'index'])->name('musik.index')->middleware('auth');
Route::get('/musik/search', [MusikController::class, 'search'])->name('musik.search')->middleware('auth');

Route::get('/musik/create', [MusikController::class, 'create'])->name('musik.create')->middleware('auth');
Route::post('/musik', [MusikController::class, 'store'])->middleware('auth');

Route::get('/musik/edit/{id}',[MusikController::class,'edit'])->name('musik.edit')->middleware('auth');
Route::put('/musik/{id}',[MusikController::class,'update'])->name('musik.update')->middleware('auth');

Route::delete('/musik/{id}', [MusikController::class, 'destroy'])->name('musik.destroy')->middleware('auth');

// jual
Route::get('/jual',[JualController::class,'index'])->name('jual.index')->middleware('auth');
Route::get('/jual/search',[JualController::class,'search'])->name('jual.search')->middleware('auth');
Route::get('/jual/print',[JualController::class,'print'])->name('jual.print')->middleware('auth');

// delete penjualan 
Route::delete('/jual/{kode}',[JualController::class,'destroy'])->name('jual.destroy')->middleware('auth');
// create penjualan
Route::get('/jual/create',[JualController::class,'create'])->name('jual.create')->middleware('auth');
// print penjualan  
Route::post('/jual',[JualController::class,'store'])->name('jual.store')->middleware('auth');
// Route::get('/jual/print',[JualController::class,'print'])->name('jual.print');


// supplier
Route::get('/supplier',[SupplierController::class, 'index'])->name('supplier.index')->middleware('auth');
Route::get('/supplier/search',[SupplierController::class, 'search'])->name('supplier.search')->middleware('auth');

Route::get('/supplier/create',[SupplierController::class, 'create'])->name('supplier.create')->middleware('auth');
Route::post('/supplier',[SupplierController::class, 'store'])->middleware('auth');

Route::get('/supplier/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit')->middleware('auth');
Route::put('/supplier/{id}',[SupplierController::class,'update'])->name('supplier.update')->middleware('auth');


Route::delete('/supplier/{id}',[SupplierController::class,'destroy'])->name('supplier.destroy')->middleware('auth');

// pembelian
Route::get('/beli',[PembelianController::class, 'index'])->name('pembelian.index')->middleware('auth');
Route::get('/beli/create',[PembelianController::class, 'create'])->name('pembelian.create')->middleware('auth');
Route::post('/beli',[PembelianController::class, 'store'])->name('pembelian.store')->middleware('auth');



// auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
