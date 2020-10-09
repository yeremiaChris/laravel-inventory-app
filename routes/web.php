<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusikController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\JualController;
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
Route::get('/', [MusikController::class, 'index'])->name('musik.index');
Route::get('/musik', [MusikController::class, 'index'])->name('musik.index');
Route::get('/musik/search', [MusikController::class, 'search'])->name('musik.search');

Route::get('/musik/create', [MusikController::class, 'create'])->name('musik.create');
Route::post('/musik', [MusikController::class, 'store']);

Route::get('/musik/edit/{id}',[MusikController::class,'edit'])->name('musik.edit');
Route::put('/musik/{id}',[MusikController::class,'update'])->name('musik.update');

Route::delete('/musik/{id}', [MusikController::class, 'destroy'])->name('musik.destroy');

// jual
Route::get('/jual',[JualController::class,'index'])->name('jual.index');
Route::get('/jual/search',[JualController::class,'search'])->name('jual.search');

// delete penjualan 
Route::delete('/jual/{kode}',[JualController::class,'destroy'])->name('jual.destroy');
// create penjualan
Route::get('/jual/create',[JualController::class,'create'])->name('jual.create');
// print penjualan  
Route::post('/jual',[JualController::class,'store'])->name('jual.store');
// Route::get('/jual/print',[JualController::class,'print'])->name('jual.print');


// supplier
Route::get('/supplier',[SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/search',[SupplierController::class, 'search'])->name('supplier.search');

Route::get('/supplier/create',[SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier',[SupplierController::class, 'store']);

Route::get('/supplier/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
Route::put('/supplier/{id}',[SupplierController::class,'update'])->name('supplier.update');

Route::delete('/supplier/{id}',[SupplierController::class,'destroy'])->name('supplier.destroy');
