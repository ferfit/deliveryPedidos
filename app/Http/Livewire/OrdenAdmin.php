<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orden;
use Livewire\WithPagination;


class OrdenAdmin extends Component
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
     $ordenes = Orden::orderBy('id','desc')->paginate(10);

      return view('livewire.orden-admin', [
      'ordenes' => Orden::where('nombre', 'like', '%'.$this->search.'%')->orderBy('id','desc')->paginate(20),
      ]);
    }


    
    
}
