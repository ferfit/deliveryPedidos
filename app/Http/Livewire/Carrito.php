<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Orden;

class Carrito extends Component
{
    //variables
    public $nombre,$metodoEnvio,$direccion,$metodoPago,$abono; 
    //oyentes
    protected $listeners=['render'];
    //reglas
    protected $rules = [
        'nombre' => 'required',
        'metodoEnvio' => 'required',
        'metodoPago' => 'required'
    ];


    //Función que se ejecuta al hacer click en "enviar pedido"
    public function enviarPedido(){
        //Variables
        $ruta = 'orden';

        //Reglas de validación
        $rules = $this->rules;
        
        
        $this->validate();

        if($this->metodoEnvio == "Envio a domicilio"){
            $rules['direccion'] = 'required';
        }
        if($this->metodoPago == "Efectivo"){
            $rules['abono'] = 'required';
        }

        $this->validate($rules);


        //Configuración del direccionamiento segun metodo de pago
        if ($this->metodoPago == "Mercado pago") {
            $ruta = 'pago';
        }

        //Creación de la orden
        $orden = new Orden();

        $orden->nombre = $this->nombre;
        $orden->metodoEnvio = $this->metodoEnvio;
        $orden->direccion = $this->direccion;
        $orden->metodoPago = $this->metodoPago;
        $orden->abono = $this->abono;
        $orden->estado = Orden::PENDIENTE;
        $orden->listaPedido = Cart::content();
        $orden->total = 500;

        $orden->save();

        //Eliminación del carrito
        Cart::destroy(); 

        //Redirección
        return redirect()->route($ruta,$orden);
 
    }

    public function delete($rowId){
        Cart::remove($rowId);

        $this->emitTo('dropdown-cart','render');
    }
    
    public function render()
    {
        return view('livewire.carrito');
    }
}
