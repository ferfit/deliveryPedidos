@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    

    

    
    
@stop

@section('content')



<div class="container mt-5 py-3">


    <div class="col-12 col-lg-6 mx-auto bg-white shadow py-2 px-5 rounded">

        <h1 class="text-center">Crear nuevo usuario</h1>

        <form method="POST" action="{{ route ('admin.usuarios.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-group my-5 mx-2 col-12">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control w-100 @error('nombre') is-invalid @enderror"
                    id="nombre" value="">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control w-100 @error('email') is-invalid @enderror"
                    id="email" value="">
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 row">

                <div class=" pr-0 col-11">
                    <label for="password">Password</label>
                    <input type="password" name="password"
                        class="form-control w-100 @error('password') is-invalid @enderror" id="password"
                        value="">
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-auto p-0 col-1">
                    <button class="btn btn-primary " type="button" onclick="mostrarContrasena()"><i
                            class="fas fa-eye"></i></button>
                </div>

            </div>
            
            <div class="form-group ml-3">
                <input type="submit" class="btn btn-success shadow rounded mt-2" value="Agregar usuario">
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