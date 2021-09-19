<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;

class AdminController extends Controller
{
    // tablero principal
    public function index(){
        $ordenes = Orden::all();
        $productos = Producto::all();
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('admin.index',compact('ordenes','productos','categorias','usuarios'));
    }
}
