<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsuarioIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";


    public function render()
    {
        $usuarios = User::orderBy('id','desc')->paginate(10);

        return view('livewire.usuario-index', compact('usuarios'));
    }
}
