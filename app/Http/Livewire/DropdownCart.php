<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class DropdownCart extends Component
{
    protected $listeners=['render'];
    
    public function render()
    {
        return view('livewire.dropdown-cart');
    }

    public function delete($rowId){
        Cart::remove($rowId);

        $this->emitTo('dropdown-cart','render');
    }
}
