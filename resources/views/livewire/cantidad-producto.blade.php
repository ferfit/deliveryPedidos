<div class="mt-auto">
    <div class="d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn__cantidad d-block"
        x-bind:disabled="$wire.qty <= 1"
        wire:click="decrement"> <i class='bx bxs-minus-square' ></i></button>
        {{-- <span class="mx-2">{{$qty}}</span> --}}
        <input type="number" value="{{$qty}}">
        <button type="button" class="btn btn__cantidad"
        wire:click="increment"> <i class='bx bxs-plus-square'></i></button>
        
    </div>

    <div class="d-flex justify-content-center align-items-center mt-2">
        <button type="button" class="btn btn-danger font-bold"
        wire:click="agregarCarrito"
        
        wire:loading.attr="disabled"
        wire:target="agregarCarrito">AGREGAR</button>
    </div>
    
</div>
