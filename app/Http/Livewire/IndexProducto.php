<?php

namespace App\Http\Livewire;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

use Livewire\Component;

class IndexProducto extends Component
{
    use WithPagination;

    public $category_id;

    public $qty = "1";

    public $options =[];


    protected $paginationTheme = "bootstrap";

    public $tamaño;

    public $search;


    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    

    public function render()
    {
        $categorias = Categoria::all();

        /* $productos = Producto::
                    category($this->category_id)
                    ->orderBy('id', 'desc')
                    ->paginate(100)
                    ; */

        //return view('livewire.producto-index', compact('categorias','productos'));

        return view('livewire.index-producto', [
            'productos' => Producto::where('nombre', 'like', '%'.$this->search.'%')
                                    ->category($this->category_id)
                                    ->orderBy('nombre', 'asc')
                                    ->paginate(50),
        ],compact('categorias'));

        $this->emitTo('dropdown-cart','render');

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

    
}
