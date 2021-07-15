<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CarritoCantidad extends Component
{

    public $rowId, $qty;



    public function mount(){
        //Traemos el producto segun el rowId con el metodo get del paquete
        $item = Cart::get($this->rowId);
        //Traemos y almacenamos la cantidad del producto
        $this->qty = $item->qty;
    }


    public function decrement(){
        $this->qty--;
        Cart::update($this->rowId,$this->qty);

        $this->emit('render');
        
    }
    
    public function increment(){
        $this->qty++;
        Cart::update($this->rowId,$this->qty);

        $this->emit('render');
        
    }



    public function render()
    {
        return view('livewire.carrito-cantidad');
    }
}
