<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Carrito;

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


Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('carrito', [App\Http\Controllers\InicioController::class, 'carrito'] )->name('carrito');


Route::get('/storage-link',function(){
    
    if(file_exists(public_path('storage'))){
        return 'el directorio ya existe';
    }

    app('files')->link(
        storage_path('app/public'), public_path('storage')
    );

    return 'directorio creado correctamente.';
});
