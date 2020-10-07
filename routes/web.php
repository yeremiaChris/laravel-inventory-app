<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusikController;
use App\Http\Controllers\SupplierController;
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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/musik', [MusikController::class, 'index'])->name('musik.index');

Route::get('/musik/create', [MusikController::class, 'create'])->name('musik.create');
Route::post('/musik', [MusikController::class, 'store']);

Route::get('/musik/edit/{id}',[MusikController::class,'edit'])->name('musik.edit');
Route::put('/musik/{id}',[MusikController::class,'update'])->name('musik.update');

Route::delete('/musik/{id}', [MusikController::class, 'destroy'])->name('musik.destroy');
// supplier
Route::get('/supplier',[SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create',[SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier',[SupplierController::class, 'store']);
Route::delete('/supplier/{id}',[SupplierController::class,'destroy'])->name('supplier.destroy');