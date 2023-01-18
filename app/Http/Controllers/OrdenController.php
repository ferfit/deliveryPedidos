<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Orden;
use Illuminate\Http\Request;
use App\Exports\OrdensExport;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ordenes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $ordene)
    {
        $productos = json_decode($ordene->listaPedido,true);

        $productos = collect($productos)->sortBy('name');

        $productos = json_decode($productos);


        return view('admin.ordenes.show', compact('ordene', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $ordene)
    {
        return view('admin.ordenes.edit', compact('ordene'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $ordene)
    {
        //validamos los datos
        $data = request()->validate([
            'estado' => 'required',
        ]);
        //asignamos los valores
        $ordene->estado = $data['estado'];

        //guarda el cambio
        $ordene->save();

        //retorno
        return back()->with('estado', 'Actualización exitosamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }
    public function imprimir(Orden $ordene)
    {
        /* return $ordene;
        die(); */
        $productos = json_decode($ordene->listaPedido);
        $productos = collect($productos)->sortBy('name');
        $productos = json_decode($productos);

        return Excel::download(new OrdensExport($ordene, $productos), 'orden.xlsx');
    }

    public function ordenConfirmada(){
        return view('admin.ordenes.orden-confirmada');
    }
}
