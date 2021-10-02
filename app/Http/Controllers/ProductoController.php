<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Imports\ProductosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //validamos los datos
        $data = request()->validate([
            'codigo'=>'required',
            'nombre'=>'required',
            'categoria'=>'required',
            'precio'=>'required'
        ]);

        //almacenamos en bbdd
        $producto = Producto::create([
            'codigo' => $data['codigo'],
            'nombre' => $data['nombre'],
            'categoria_id' => $data['categoria'],
            'precio' => $data['precio']

        ]);

        return redirect()->route('admin.productos.index');


    }

    
    public function show(Producto $producto)
    {
        //
    }

    
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();

        return view('admin.productos.edit',compact('categorias','producto'));
    }

    
    public function update(Request $request, Producto $producto)
    {
        //validamos los datos
        $data = request()->validate([
            'codigo'=>'required',
            'nombre'=>'required',
            'categoria'=>'required',
            'precio' =>'required',
            
        ]);
        //asignamos los valores
        $producto->codigo= $data['codigo'];
        $producto->nombre = $data['nombre'];
        $producto->categoria_id= $data['categoria'];
        $producto->precio= $data['precio'];
       
        //retorno
        $producto->save();

        return redirect()->route('admin.productos.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index');  
    }

    public function import() 
    {
        if(request()->file('productos')){
            
        Excel::import(new ProductosImport, request()->file('productos'));
        
        return redirect()->route('admin.productos.index');

        } else {
            return redirect()->route('admin.productos.index')->with('error', 'Debe seleccionar un archivo!');
        }

        
    } 

    public function eliminartodos()
    {

        $productos = DB::table('productos')->delete();

        return redirect()->route('admin.productos.index');
    }
}
