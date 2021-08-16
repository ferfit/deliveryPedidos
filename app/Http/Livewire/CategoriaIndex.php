<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class CategoriaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    
    public $search;
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        
        return view('livewire.categoria-index', [
            'categorias' => Categoria::where('nombre', 'like', '%'.$this->search.'%')->paginate(20),
        ]);
    }

}
