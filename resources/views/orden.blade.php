{{-- {{$orden}} --}}
@extends('layouts.app')

{{-- #BF2B2B --}}
@section('content') 

    <div class="container flex-column shadow p-0 gracias" style="">
        <div class="gracias_cont-logo d-flex justify-content-center align-items-center" style="" >
            <img src="{{ asset('img/carrito-gracias.png') }}" class="gracias__logo" >
        </div>
        <div class="gracias__textos d-flex flex-column justify-content-center align-items-center" >
            <h1 class="gracias__titulo mt-5 font-weight-bold" style=" ">GRACIAS</h1><br>
            <h2>POR TU COMPRA</h2>
            <p class="w-50 text-center">Nos comunicaremos a la brevedad cuando el pedido este en camino, ante cualquier duda o sugerencia haz "click" en el siguiente botón</p>

            <a href="" class="btn bg-danger d-block mx-auto text-white font-weight-bold mt-3 shadow">WHATSAPP</a>
        </div>
        
    </div>
    
@endsection