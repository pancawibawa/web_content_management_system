<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('user.login');
});

Route::get('/produk', function () {
    return view('user.produk.index');
});



Route::get('/login', [LoginController::class, 'showForm'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->name('login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/produk', [ProdukController::class,'index'])->name('produk.index')->middleware('auth');
Route::get('/produk/create', [ProdukController::class,'create'])->name('produk.create')->middleware('auth');
Route::post('/produk/store', [ProdukController::class,'store'])->name('produk.store')->middleware('auth');
Route::get('/produk/edit/{id}', [ProdukController::class,'edit'])->name('produk.edit')->middleware('auth');
Route::put('/produk/update/{id}', [ProdukController::class,'update'])->name('produk.update')->middleware('auth');
Route::delete('/produk/{id}', [ProdukController::class,'destroy'])->name('produk.destroy')->middleware('auth');


Route::get('/profil', [ProfilController::class,'index'])->name('profil.index')->middleware('auth');
Route::get('/profil/edit/{id}', [ProfilController::class,'edit'])->name('profil.edit')->middleware('auth');
Route::put('/profil/update/{id}', [ProfilController::class,'update'])->name('profil.update')->middleware('auth');

Route::get('/produk/export', [ProdukController::class, 'export'])->name('produk.export');