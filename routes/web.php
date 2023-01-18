<?php

use App\Http\Controllers\OrdenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Carrito;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;



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


Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('carrito', [App\Http\Controllers\InicioController::class, 'carrito'] )->name('carrito');
//Route::post('/carrito/{producto}', [App\Http\Controllers\ProductoController::class, 'carrito'] )->name('sumar');


Route::get('/storage-link',function(){

    if(file_exists(public_path('storage'))){
        return 'el directorio ya existe';
    }

    app('files')->link(
        storage_path('app/public'), public_path('storage')
    );

    return 'directorio creado correctamente.';
});


Route::get('orden-confirmada',[OrdenController::class, 'ordenConfirmada'])->middleware('soloadmin')->name('orden-confirmada');



