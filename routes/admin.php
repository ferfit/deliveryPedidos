<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', [AdminController::class, 'index'])->name('home');


Route::resource('categorias', CategoriaController::class)->names('categorias'); 

Route::resource('productos', ProductoController::class)->names('productos'); 

Route::resource('usuarios', UsuarioController::class)->names('usuarios'); 

Route::post('admin/productos/importar/', [ProductoController::class, 'import'])->name('importar');


