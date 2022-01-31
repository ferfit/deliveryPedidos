<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class InicioController extends Controller
{


    public function index(Categoria $categoria = null)
    {
        $categorias = Categoria::all();

        if($categoria == null){
            return view('welcome', compact('categorias'));
        } else {
            return view('welcome', compact('categorias','categoria'));
        }

    }

    public function carrito()
    {
        return view('carrito');
    }
}
