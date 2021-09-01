<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orden;

class OrdenAdmin extends Component
{
    public function render()
    {
     $ordenes = Orden::all();

       return view('livewire.orden-admin',compact('ordenes'));
    }
}
