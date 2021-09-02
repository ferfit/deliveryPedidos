<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrdenController;

Route::get('/', [AdminController::class, 'index'])->name('home');


Route::resource('categorias', CategoriaController::class)->names('categorias'); 

Route::resource('productos', ProductoController::class)->names('productos'); 

Route::resource('usuarios', UsuarioController::class)->names('usuarios'); 

Route::resource('ordenes', OrdenController::class)->names('ordens');

Route::get('imprimir/{ordene}', [OrdenController::class, 'imprimir'])->name('imprimir');

Route::post('admin/productos/importar/', [ProductoController::class, 'import'])->name('importar');


