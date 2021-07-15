<div class="">

    <!-- @php 
        // SDK de Mercado Pago
        require base_path ('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Mi producto';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        $preference->items = array($item);
        $preference->save();
    @endphp -->

        {{--------------------- Pedido -------------------------
        
        ------------------------------------------------------}}
        
        <section class="mt-3 pt-3">
            <h2 class="text-center">Pedido</h2>
            <div class="container">
                
    
                <table class="table w-100">
                    <thead>
                        <tr>  
                              
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
    
                    <tbody id="items">
                        @foreach (Cart::content() as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>${{$item->price}} </td>
                            <td>
                                @livewire('carrito-cantidad',['rowId' => $item->rowId ], key($item->rowId))
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    ${{$item->price*$item->qty}}
                                    <a class="btn_eliminar-producto" wire:click="delete('{{$item->rowId}}')"><i class='bx bxs-trash ml-2 text-danger'></i></a> 
                                </div>
                                 </td>
                            
                        </tr>
                           
                        @endforeach
    
                    </tbody>

                </table>

                <div class="d-flex justify-content-center align-items-center">
                    <h3 class=" bg-white rounded px-3 py-2 shadow">TOTAL: ${{Cart::subtotal()}}</h3>
                </div>

                <div class="mt-3">
                    <a type="button" href="" class="btn btn-danger carrito__ver-carrito mx-auto font-bold d-block w-50 mt-2 shadow rounded"
                    >BORRAR CARRITO</a>
                    <a type="button" href="{{ route('inicio')}}" class="btn carrito__ver-carrito mx-auto font-bold d-block w-50 mt-2 shadow rounded"
                    >VOLVER</a>                    
                </div>

                {{--------------------- Nombre -------------------------
        
        ------------------------------------------------------}}

        <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
            <h2 id="ingresaNombre" class="text-center">Ingresa tu nombre</h2>
            <input wire:model="nombre" name="nombre" type="text" class="nombre mt-2 form-control w-50" id="valor" value="">
            @error('nombre')       
            <span class="invalid-feedback d-flex flex-column justify-content-center align-items-center" role="alert">
                {{ $message }}
            </span>     
            @enderror
        </div>
        
        

        {{-- Metodo de envio --}}
        <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
            <h2 id="ingresaNombre" class="text-center">Método de envio</h2>
            <select wire:model="metodoEnvio" name="metodoEnvio" class="my-1 opcional shadow selector w-50"  id="metodoDeEnvio" required>
                <option value="">Elija una opción</option>
                <option value="Envio a domicilio">Envio a domicilio</option>
                <option value="Retiro por sucursal">Retiro por sucursal</option>
            </select>

            @error('metodoEnvio')       
            <span class="invalid-feedback d-flex flex-column justify-content-center align-items-center" role="alert">
                {{ $message }}
            </span>     
            @enderror

            
            
            @if ($metodoEnvio == 'Envio a domicilio')
                <input wire:model="direccion" type="text" name="direccion" class="direccion mb-4 w-50 mt-3 form-control" placeholder="Escribe tu dirección" id="direccion">
            @endif

            @error('direccion')       
            <span class="invalid-feedback d-flex flex-column justify-content-center align-items-center" role="alert">
                {{ $message }}
            </span>     
            @enderror
            
        </div>

        {{-- metodo de pago --}}
    
        <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
            <h2 class="text-center">Método de pago</h2>
            <select wire:model="metodoPago" name="metodoPago" class="my-1 opcional shadow selector w-50" id="metodoDePago" required>
                <option value="">Elija una opción</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Mercado pago">Mercado pago</option>
            </select>

            @error('metodoPago')       
            <span class="invalid-feedback d-flex flex-column justify-content-center align-items-center" role="alert">
                {{ $message }}
            </span>     
            @enderror

            @if ($metodoPago == 'Efectivo')
                <input wire:model="abono" type="text" name="abono" class="direccion mb-4 w-50 mt-3 form-control" placeholder="Abono con $..." id="abono">
            @endif

            @error('abono')       
            <span class="invalid-feedback d-flex flex-column justify-content-center align-items-center" role="alert">
                {{ $message }}
            </span>     
            @enderror
            
        </div>

        
            {{-- boton whatsapp --}}
            <div class="container cont-enviar d-flex justify-content-center align-items-center mt-3">
                
                <button wire:click="enviarPedido" class="boton__whatsapp text-center shadow rounded">ENVIAR PEDIDO</button> 
            </div> 
        

        {{-- @if ($metodoPago == 'Mercado pago')
            

            <a href="/pago">CONTINUAR</a>
            
        @endif --}}
      
           

        
    
        {{-- footer --}}
        <footer class="footer d-flex justify-content-center align-items-center mt-5">
            <div class="row justify-content-center align-items-center">
              <p class="text-center">| Copyright @ 2020 - </p>
              
              <p class="text-center">TuProyectoWeb |</p>
            </div>
        </footer>

        
        <!-- <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.token')}}", {
                locale: 'es-AR'
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: '{{ $preference->id}}'
            },
            render: {
                    container: '.cho-container', // Indica dónde se mostrará el botón de pago
                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
            }
        });
        </script> -->


</div>