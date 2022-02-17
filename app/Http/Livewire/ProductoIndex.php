<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithPagination;


class ProductoIndex extends Component
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

        return view('livewire.producto-index', [
            'productos' => Producto::where('nombre', 'like', '%'.$this->search.'%')
                                    ->category($this->category_id)
                                    ->orderBy('id', 'desc')
                                    ->paginate(50),
        ],compact('categorias'));




    }

    public function resetFilter(){
        $this->reset(['category_id']);
        $this->reset(['search']);
    }
}
