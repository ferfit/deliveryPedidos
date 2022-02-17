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
                <label for="codigo">Codigo</label>
                <input type="text"
                name="codigo"
                class="form-control w-100 @error('codigo') is-invalid @enderror" id="codigo"
                    value="{{old('codigo')}}">
                @error('codigo')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group my-5 mx-2">
                <label for="nombre">Nombre</label>
                <input type="text"
                name="nombre"
                class="form-control w-100 @error('nombre') is-invalid @enderror" id="nombre"
                    value="{{old('nombre')}}">
                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group my-5 mx-2">

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


            <div class="form-group my-5 mx-2">
                <label for="precio">Precio</label>
                <input type="number"
                name="precio"
                class="form-control @error('precio') is-invalid @enderror" id="precio"
                    value="{{old('precio')}}">
                @error('precio')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group my-5 mx-2">
                <label for="minimo">Mínimo</label>
                <input type="text"
                name="minimo"
                class="form-control w-100 @error('minimo') is-invalid @enderror" id="minimo"
                    value="{{old('minimo')}}">
                @error('minimo')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>



            <div class="form-group mt-2">
                <input type="submit" class="btn btn-success shadow rounded " value="Agregar producto">
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
