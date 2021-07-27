{{-- {{$orden}} --}}
@extends('layouts.app')
<div class="container d-flex justify-content-center align-items-center mt-3">
@php 
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia

    $items = json_decode($orden->listaPedido);

    foreach($items as $i){
        $item = new MercadoPago\Item();
        $item->title = $i->name;
        $item->quantity = $i->qty;
        $item->unit_price = $i->price;

        $p[] = $item;  
        
    } 

    $preference->back_urls = array(
        "success" => route('aprobado')
    );
    $preference->auto_return = "approved";


    $preference->items = $p;
    $preference->save(); 

        



    @endphp


    <div class="container flex-column shadow p-0 gracias" style="" >
        <div class="gracias_cont-logo d-flex justify-content-center align-items-center" style="" >
            <img src="{{ asset('img/mercadopago.png') }}" class="gracias__logo" >
        </div>
        <div class="gracias__textos d-flex flex-column justify-content-center align-items-center mt-5" >
            <h1 class="gracias__titulo mt-5 font-weight-bold text-center" style=" ">ESTAS A UN PASO DE FINALIZAR TU COMPRA</h1><br>            
        </div>

        {{-- Boton pago mercadopago  --}}
        <div class="cho-container d-flex justify-content-center align-items-center">

        </div>

    </div>

    
    
</div>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
// Agrega credenciales de SDK
const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
        locale: 'es-AR'
});

// Inicializa el checkout
mp.checkout({
    preference: {
        id: '{{ $preference->id }}'
    },
    render: {
            container: '.cho-container', // Indica dónde se mostrará el botón de pago
            label: 'Pagar', // Cambia el texto del botón de pago (opcional)
    }
});
</script>