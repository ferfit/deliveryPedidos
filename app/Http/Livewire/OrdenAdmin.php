<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orden;
use Livewire\WithPagination;


class OrdenAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
     $ordenes = Orden::orderBy('id','desc')->paginate(10);

       return view('livewire.orden-admin',compact('ordenes'));
    }
}
