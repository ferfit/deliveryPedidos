<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UsuarioIndex extends Component
{
    public function render()
    {
        $usuarios = User::paginate(10);

        return view('livewire.usuario-index', compact('usuarios'));
    }
}
