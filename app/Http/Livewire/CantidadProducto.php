<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class CantidadProducto extends Component
{
    public $producto;

    public $qty = "1";

    public $options =[];

    public function mount(Producto $producto){
        $this->producto = $producto;
        $this->options['codigo'] = $producto->codigo;
    }

    
    public function decrement(){
        $this->qty--;
    }
    
    public function increment(){
        $this->qty++;
    }

    //Agregar item al carrito
    public function agregarCarrito(){
        if($this->qty < 1 ){
            $this->emit('toastr-error');
        } else {
            Cart::add([
                'id' => $this->producto->id, 
                'name' => $this->producto->nombre, 
                'qty' => $this->qty , 
                'price' => $this->producto->precio, 
                'weight' =>550,
                'options' =>  $this->options
            ]);
     
            $this->emitTo('dropdown-cart','render');
            $this->emit('toastr');
            $this->reset('qty');
        }
        
        
        

        

    }

    public function render()
    {
        return view('livewire.cantidad-producto');
    }
}
