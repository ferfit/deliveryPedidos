<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class CantidadProducto extends Component
{
    public $producto;

   /*  public $qty = "1"; */
    public $qty = "1";

    public $options =[];

    public function mount(Producto $producto){
        $this->producto = $producto;
        $this->options['imagen'] = Storage::url($this->producto->imagen);
    }

    
    public function decrement(){
        $this->qty--;
    }
    
    public function increment(){
        $this->qty++;
    }

    //Agregar item al carrito
    public function agregarCarrito(){
        Cart::add([
            'id' => $this->producto->id, 
            'name' => $this->producto->nombre, 
            'qty' => $this->qty , 
            'price' => $this->producto->precio , 
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->emitTo('dropdown-cart','render');
        $this->reset('qty');

        

    }

    public function render()
    {
        return view('livewire.cantidad-producto');
    }
}
