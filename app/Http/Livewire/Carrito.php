<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Orden;

class Carrito extends Component
{
    public $nombre; 

    protected $listeners=['render'];

    protected $rules = [
        'nombre' => 'required'        
    ];


    public function enviarPedido(){

        $rules = $this->rules;

        $this->validate();


        $this->validate($rules);


        $pedido = '';
        $total = Cart::subtotal();
         

        foreach(Cart::content() as $item){
            $pedido.=$item->name." Cantidad:".$item->qty." Precio: $".$item->price*$item->qty."%0A";
        }

        $pedidoFinal = $pedido."%0A"."TOTAL: $" .$total;

        //Creación de la orden
        
        $orden = new Orden();

        $orden->nombre = $this->nombre;
        $orden->listaPedido = Cart::content();
        $orden->total = Cart::subtotal();
        $orden->estado = Orden::PENDIENTE;

        $orden->save();




        redirect('https://api.whatsapp.com/send?phone=5491141774133&text=|----Pedido----|%0A%0A'
                .'Nombre: '.$this->nombre.'%0A'
                .'Detalle del pedido:'.'%0A'.$pedidoFinal);
        //return dd($pedidoFinal);

        Cart::destroy(); 
    }

    public function delete($rowId){
        Cart::remove($rowId);

        $this->emitTo('dropdown-cart','render');
    }

    public function destroy(){
        Cart::destroy();
    }
    
    public function render()
    {
        return view('livewire.carrito');
    }
}
