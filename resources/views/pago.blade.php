<div class="container d-flex justify-content-center align-items-center">

    @php 
        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia

        foreach(Cart::content() as $i){
            $item = new MercadoPago\Item();
            $item->title = $i->name;
            $item->quantity = $i->qty;
            $item->unit_price = $i->price;

             $p[] = $item;  
            
        }

        $preference->back_urls = array(
            "success" => "http://localhost:8000/pedido-aprobado",
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
        );
        $preference->auto_return = "approved";


        $preference->items = $p;
        $preference->save(); 

        
        

    @endphp


    <div class="cho-container">

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

</div>