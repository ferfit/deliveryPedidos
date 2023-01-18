<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Orden;

class Carrito extends Component
{
    /* public $nombre;  */

    protected $listeners=['render'];

    /* protected $rules = [
        'nombre' => 'required'
    ]; */


    public function enviarPedido(){

        /* $rules = $this->rules;

        $this->validate();


        $this->validate($rules); */


        $pedido = '';
        $total = Cart::subtotal();


        foreach(Cart::content() as $item){
            $pedido.=$item->name." Cantidad:".$item->qty." Precio: $".$item->price*$item->qty."%0A";
        }

        $pedidoFinal = $pedido."%0A"."TOTAL: $" .$total;

        //Creación de la orden

        $orden = new Orden();

        $orden->nombre = auth()->user()->name;
        $orden->listaPedido = Cart::content();
        $orden->total = Cart::subtotal();
        $orden->estado = Orden::PENDIENTE;
        $orden->user_id = auth()->user()->id;

        $orden->save();



        Cart::destroy();

        return redirect()->route('orden-confirmada');

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
