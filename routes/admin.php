<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrdenController;

Route::get('/', [AdminController::class, 'index'])->name('home')->middleware('soloadmin');


Route::resource('categorias', CategoriaController::class)->names('categorias')->middleware('soloadmin'); 

Route::resource('productos', ProductoController::class)->names('productos')->middleware('soloadmin'); 

Route::resource('usuarios', UsuarioController::class)->names('usuarios')->middleware('soloadmin'); 

Route::resource('ordenes', OrdenController::class)->names('ordens')->middleware('soloadmin');

Route::get('imprimir/{ordene}', [OrdenController::class, 'imprimir'])->name('imprimir')->middleware('soloadmin');

Route::post('admin/productos/importar/', [ProductoController::class, 'import'])->name('importar')->middleware('soloadmin');


