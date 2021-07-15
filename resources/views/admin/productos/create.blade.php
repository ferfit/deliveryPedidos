@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    

    

    
    
@stop

@section('content')



<div class="container mt-5 py-3">


    <div class="col-12 col-lg-6 mx-auto bg-white shadow py-2 px-5 rounded">

        <h1 class="text-center">Crear nuevo producto</h1>

        <form method="POST" action="{{ route ('admin.productos.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-group my-5 mx-2">
                <label for="titulo">Nombre</label>
                <input type="text" 
                name="nombre" 
                class="form-control w-100 @error('nombre') is-invalid @enderror" id="nombre"
                    value="">
                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">
                    <option value="">Seleccione</option>
                    @foreach ($categorias as $categoria)
                        <option value=" {{ $categoria ->id}}">
                            {{ $categoria ->nombre}}
                        </option>
                    @endforeach 

                </select>
                @error('categoria')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 

            <div class="form-group">
                <label for="descripcion">Descripción</label><br>
                <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="w-100 form-control"></textarea>
                @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group my-5 mx-2">
                <label for="precio">Precio</label>
                <input type="number" 
                name="precio" 
                class="form-control @error('precio') is-invalid @enderror" id="precio"
                    value="">
                @error('precio')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        

            <div class="form-group">
                <label for="imagen">Elige una imagén</label>
                <input type="file" id="imagen" name="imagen" class="form-control overflow-hidden @error('imagen') is-invalid @enderror">
                @error('imagen')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group ">
                <input type="submit" class="btn btn-success shadow rounded mt-2" value="Agregar producto">
            </div>

        </form>
    </div>

</div>
    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop