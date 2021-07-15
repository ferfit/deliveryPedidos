<div>
    {{--------------------- Nombre -------------------------
        
        ------------------------------------------------------}}

        <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
            <h2 id="ingresaNombre" class="text-center">Ingresa tu nombre</h2>
            <input wire:model="nombre" type="text" class="nombre mt-2 form-control w-50" id="valor">
          </div>
        

        {{-- Metodo de envio --}}
        <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
            <h2 id="ingresaNombre" class="text-center">Método de envio</h2>
            <select wire:model="metodoEnvio" class="my-1 opcional shadow selector w-50"  id="metodoDeEnvio" required>
                <option value="">Elija una opción</option>
                <option value="Envio a domicilio">Envio a domicilio</option>
                <option value="Retiro por sucursal">Retiro por sucursal</option>
            </select>
            
            @if ($metodoEnvio == 'Envio a domicilio')
                <input wire:model="direccion" type="text" class="direccion mb-4 w-50 mt-3 form-control" placeholder="Escribe tu dirección" id="direccion">
            @endif
            
        </div>

        {{-- metodo de pago --}}
    
        <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
            <h2 class="text-center">Método de pago</h2>
            <select wire:model="metodoPago" class="my-1 opcional shadow selector w-50" id="metodoDePago" required>
                <option value="">Elija una opción</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Mercado pago">Mercado pago</option>
            </select>
            @if ($metodoPago == 'Efectivo')
                <input wire:model="abono" type="text" class="direccion mb-4 w-50 mt-3 form-control" placeholder="Abono con $..." id="abono">
            @endif
            
        </div>
      
        {{-- boton whatsapp --}}
        <div class="container cont-enviar d-flex justify-content-center align-items-center mt-3">
            
            <button wire:click="enviarPedido" class="boton__whatsapp text-center shadow rounded-pill">ENVIAR PEDIDO</button> 
        </div>    
</div>
