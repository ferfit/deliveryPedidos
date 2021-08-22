<?php

namespace App\Http\Livewire;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithPagination;

use Livewire\Component;

class IndexProducto extends Component
{
    use WithPagination;

    public $category_id;

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
                                    ->orderBy('id', 'desc') 
                                    ->paginate(50),
        ],compact('categorias'));
    }

    public function resetFilter(){
        $this->reset(['category_id']);
    }
}
