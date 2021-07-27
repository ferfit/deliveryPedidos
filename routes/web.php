<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Carrito;
use App\Models\Orden;
use Illuminate\Http\Request;


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

/* Route::get('prueba', function () {
    \Cart::destroy();
}); */

// storage link
Route::get('/storage-link',function(){
    
    if(file_exists(public_path('storage'))){
        return 'el directorio ya existe';
    }

    app('files')->link(
        storage_path('app/public'), public_path('storage')
    );

    return 'directorio creado correctamente.';
});

//-----------------------------------------------------------------------//
//Rutas de metodos de pago
//-----------------------------------------------------------------------//
// Efectivo
Route::get('orden/{orden}', function (Orden $orden) {
    
    return view('orden', compact('orden'));

})->name('orden');

//Mercadopago
Route::get('/mercadopago/{orden}',function(Orden $orden){
    return view('pago',compact('orden'));
})->name('pago'); 

//Redirección despues de pagar con MP
Route::get('aprobado', function () {
    return view('aprobado');
})->name('aprobado');




