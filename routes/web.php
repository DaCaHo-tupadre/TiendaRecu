<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Log\LogAuth;
use App\Http\Controllers\Log\RegisterAuth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('login');
});
Route::view('/log','login')->name('verLog');
Route::post('/log/logged', [LogAuth::class, 'login'])->name('logged');
Route::get('/log/logout', [LogAuth::class, 'logout'])->name('logout');


Route::view('/reg','register')->name('verReg');
Route::post('/reg/register', [RegisterAuth::class, 'register'])->name('register');

Route::view('/home','home')->name('verHome');


Route::view('/productos','Productos.productos');
Route::get('/productos',[ProductoController::class, 'index'])->name('verProductos');
Route::get('/productos/{id}',[ProductoController::class, 'edit'])->name('editarProducto')->middleware('rol');
Route::post('/productos/storeProducto',[ProductoController::class, 'store'])->name('storeProducto')->middleware('rol');
Route::delete('/productos',[ProductoController::class, 'destroy'])->name('destroyProducto')->middleware('rol');
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('editProducto')->middleware('rol');
Route::post('/productos/update', [ProductoController::class, 'update'])->name('updateProducto')->middleware('rol');

Route::view('/usuarios','Usuarios.usuarios');
Route::get('/usuarios',[UserController::class, 'index'])->name('verUsuarios');
Route::get('/usuarios/{id}',[UserController::class, 'edit'])->name('editarUsuario')->middleware('rol');
Route::post('/usuarios/storeUsuario',[UserController::class, 'store'])->name('storeUsuario')->middleware('rol');
Route::delete('/usuarios',[UserController::class, 'destroy'])->name('destroyUsuario')->middleware('rol');
Route::get('/usuarios/edit/{id}', [UserController::class, 'edit'])->name('editUsuario')->middleware('rol');
Route::post('/usuarios/update', [UserController::class, 'update'])->name('updateUsuario')->middleware('rol');

Route::view('/categorias','Categorias.categorias');
Route::get('/categorias',[CategoriaController::class, 'index'])->name('verCategorias');
Route::get('/categorias/{id}',[CategoriaController::class, 'edit'])->name('editarCategoria')->middleware('rol');
Route::post('/categorias/storeCategoria',[CategoriaController::class, 'store'])->name('storeCategoria')->middleware('rol');
Route::delete('/categorias',[CategoriaController::class, 'destroy'])->name('destroyCategoria')->middleware('rol');
Route::get('/categorias/edit/{id}', [CategoriaController::class, 'edit'])->name('editCategoria')->middleware('rol');
Route::post('/categorias/update', [CategoriaController::class, 'update'])->name('updateCategoria')->middleware('rol');

