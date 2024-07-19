<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;


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

Route::get('/', [ProdukController::class, 'home'])->name('home');

// kategori
Route::get('/create-kategori',[KategoriController::class, 'createKategori'])->name('createKategori');
Route::post('/store-kategori',[KategoriController::class, 'storeKategori'])->name('storeKategori');
Route::get('/data-kategori',[KategoriController::class, 'indexDataKategori'])->name('dataKategori');
Route::get('/delete-kategori/{id}',[KategoriController::class, 'deleteKategori'])->name('deleteKategori');

// produk
Route::get('/produk', [ProdukController::class, 'showProduk'])->name('dataProduk');
Route::get('/create-produk', [ProdukController::class, 'createProduk'])->name('createProduk');
Route::post('/store-produk', [ProdukController::class, 'storeProduk'])->name('storeProduk');
Route::get('/edit-produk/{id}', [ProdukController::class, 'editProduk'])->name('editProduk');
Route::put('/update-produk/{id}',[ProdukController::class, 'updateProduk'])->name('updateProduk');
Route::get('/delete-produk/{id}',[ProdukController::class, 'deleteProduk'])->name('deleteProduk');