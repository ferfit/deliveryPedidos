<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Carrito extends Component
{
    public $nombre,$metodoEnvio,$direccion,$metodoPago,$abono; 

    protected $listeners=['render'];

    protected $rules = [
        'nombre' => 'required',
        'metodoEnvio' => 'required',
        'metodoPago' => 'required'
        
        
    ];


    public function enviarPedido(){

        $rules = $this->rules;

        $this->validate();

        if($this->metodoEnvio == "Envio a domicilio"){
            $rules['direccion'] = 'required';
        }
        if($this->metodoPago == "Efectivo"){
            $rules['abono'] = 'required';
        }

        $this->validate($rules);


        $pedido = '';
        $total = "TOTAL: $" .Cart::subtotal();

        foreach(Cart::content() as $item){
            $pedido.=$item->name." Cantidad:".$item->qty." Precio: $".$item->price*$item->qty."%0A";
        }

        $pedidoFinal = $pedido."%0A".$total;

        if($this->direccion){
            $this->metodoEnvio= $this->metodoEnvio.'%20'.'%0A'.'Direccion: '.$this->direccion;
        }
        if($this->abono){
            $this->metodoPago= $this->metodoPago.'%20'.'%0A'.'Abona con: '.$this->abono;
        }




        redirect('https://api.whatsapp.com/send?phone=5491141774133&text=|----Pedido----|%0A%0A'
                .'Nombre: '.$this->nombre.'%0A'
                .'Metodo de envio: '.$this->metodoEnvio.'%0A'
                .'Metodo de pago: '.$this->metodoPago.'%0A%0A'
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
