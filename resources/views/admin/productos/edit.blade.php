@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    

    
    
@stop

@section('content')
<div class="container mt-5 py-3">


    <div class="col-12 col-lg-6 mx-auto bg-white shadow py-2 px-5 rounded">

        <h1 class="text-center">Edición del producto: {{$producto->titulo}}</h1>

    
        <form method="POST" action="{{ route ('admin.productos.update',$producto) }}" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            <div class="form-group my-5 mx-2">
                <label for="codigo">Codigo</label>
                <input type="text" 
                name="codigo" 
                class="form-control w-100 @error('codigo') is-invalid @enderror" id="codigo"
                    value="{{$producto->codigo}}">
                @error('codigo')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2">
                <label for="titulo">Nombre</label>
                <input type="text" 
                name="nombre" 
                class="form-control w-100 @error('nombre') is-invalid @enderror" id="nombre"
                    value="{{$producto->nombre}}">
                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">
                    <option value="{{$producto->categoria_id}}">{{$producto->categoria->nombre}}</option>
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

            <div class="form-group my-5 mx-2">
                <label for="precio">Precio</label>
                <input type="number" 
                name="precio" 
                class="form-control @error('precio') is-invalid @enderror" id="precio"
                    value="{{$producto->precio}}">
                @error('precio')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            <div class="form-group mt-2 ">
                <input type="submit" class="btn btn-success shadow rounded " value="Actualizar producto">
                <a href="{{ route('admin.productos.index' )}}" class="btn btn-secondary mr-2">Volver</a>
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