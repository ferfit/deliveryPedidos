<div class="mt-auto d-flex justify-content-center align-items-center">
    
         <input type="number" value="{{$qty}}" wire:model="qty" min="1" class="form-control w-25 mr-2">
    

    <div class="d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-danger font-bold"
        wire:click="agregarCarrito"
        
        wire:loading.attr="disabled"
        wire:target="agregarCarrito">AGREGAR</button>
    </div>
    
</div>
