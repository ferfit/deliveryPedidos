<?php

namespace App\Http\Livewire;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use Livewire\Component;

class IndexProducto extends Component
{
    use WithPagination;

    public $category_id;

    public $qty = "1";

    public $options =[];

    public $cantidad = "1";


    protected $paginationTheme = "bootstrap";

    public $tamaño;

    public $search;

    public $producto;


    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
        $this->reset(['category_id']);
        $this->emitTo('cantidad-producto','render');

    }
    public function updatingCategoryId()
    {
        $this->reset(['search']);
        $this->render();
    }



    public function render()
    {
        $categorias = Categoria::orderBy('nombre','asc')->get();



        return view('livewire.index-producto', [
            'productos' => Producto::where('nombre', 'like', '%'.$this->search.'%')
                                    ->category($this->category_id)
                                    ->orderBy('nombre', 'asc')
                                    //->take(200)
                                    //->get(),
                                    ->paginate(50),



        ],compact('categorias'));


        $this->emitTo('cantidad-producto','render');

        //$this->emitTo('dropdown-cart','render');
        //$this->emitTo('cantidad-producto','render');

    }

    //Agregar item al carrito
    /* public function agregarCarrito(Producto $producto){


        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'qty' => $this->qty ,
            'price' => $producto->precio,
            'weight' =>550,
            'options' => [ 'codigo' => $producto->precio ]
        ]);

        $this->emitTo('dropdown-cart','render');
        $this->emit('toastr');
        $this->reset('qty');



    }
 */
    /* public function decrement(){
        $this->qty--;
    }

    public function increment(){
        $this->qty++;
    } */

    public function resetFilter(){
        $this->reset(['search']);
        $this->resetPage();
        $this->reset(['category_id']);
        $this->emitTo('cantidad-producto','render');

    }

    public function search(){
        $productos = Producto::where('nombre', 'like', '%'.$this->search.'%')
        ->get();

        //return $productos;
        //die();
        view('livewire.index-producto',compact('productos'));

    }

    //Agregar item al carrito opcion 2
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

    public function sumarAlCarrito(Request $request, Producto $producto){

        $data = request();

        $this->options['codigo'] = $producto->codigo;

        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'qty' => $this->cantidad,
            'price' => $producto->precio,
            'weight' =>550,
            'options' =>  $this->options
        ]);

        $this->emitTo('dropdown-cart','render');
        $this->emit('toastr');
        $this->reset('cantidad');
    }


}
