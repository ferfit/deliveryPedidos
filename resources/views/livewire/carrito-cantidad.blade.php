<div>
    <div class="d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn__cantidad d-block p-0"
        x-bind:disabled="$wire.qty <= 1"
        wire:click="decrement"> <i class='bx bxs-minus-square' ></i></button>
        <span class="mx-2">{{$qty}}</span>
        <button type="button" class="btn btn__cantidad p-0"
        wire:click="increment"> <i class='bx bxs-plus-square'></i></button>
    </div>
</div>
