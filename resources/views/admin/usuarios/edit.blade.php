@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')






@stop

@section('content')



<div class="container mt-5 py-3">


    <div class="col-12 col-lg-6 mx-auto bg-white shadow py-2 px-5 rounded">

        <h1 class="text-center">Editar usuario</h1>

        <form method="POST" action="{{ route('admin.usuarios.update', $usuario->id) }}" enctype="multipart/form-data"
            novalidate>
            @csrf
            @method('put')
            <div class="form-group my-5 mx-2 col-12">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control w-100 @error('nombre') is-invalid @enderror"
                    id="nombre" value="{{$usuario->name}}">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="razonSocial">Razon Social</label>
                <input type="text" name="razonSocial"
                    class="form-control w-100 @error('razonSocial') is-invalid @enderror" id="razonSocial" value="{{$usuario->razonSocial}}">
                @error('razon_social')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="cuit">Cuit</label>
                <input type="text" name="cuit" class="form-control w-100 @error('cuit') is-invalid @enderror" id="cuit"
                    value="{{$usuario->cuit}}">
                @error('cuit')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control w-100 @error('direccion') is-invalid @enderror"
                    id="direccion" value="{{$usuario->direccion}}">
                @error('direccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="localidad">Localidad</label>
                <input type="text" name="localidad" class="form-control w-100 @error('localidad') is-invalid @enderror"
                    id="localidad" value="{{$usuario->localidad}}">
                @error('localidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="provincia">Provincia</label>
                <input type="text" name="provincia" class="form-control w-100 @error('provincia') is-invalid @enderror"
                    id="provincia" value="{{$usuario->provincia}}">
                @error('provincia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="whatsapp">Whatsapp</label>
                <input type="number" name="whatsapp" class="form-control w-100 @error('whatsapp') is-invalid @enderror"
                    id="whatsapp" value="{{$usuario->whatsapp}}">
                @error('whatsapp')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-5 mx-2 col-12">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control w-100 @error('email') is-invalid @enderror"
                    id="email" value="{{$usuario->email}}">
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- <div class="form-group my-5 mx-2 row">

                <div class=" pr-0 col-11">
                    <label for="password">Password</label>
                    <input type="password" name="password"
                        class="form-control w-100 @error('password') is-invalid @enderror" id="password" value="{{$usuario->password}}">
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
 --}}
            <div class="form-group my-5 mx-2">
                <label for="tipo">Rol</label>
                <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" id="tipo">

                    @if ($usuario->tipo == 'franquiciado')
                        <option value="franquiciado" selected>Franquiciado</option>
                        <option value="administrador">Administrador</option>

                    @else
                    <option value="administrador" selected>Administrador</option>
                    <option value="franquiciado" >Franquiciado</option>

                    @endif





                </select>
                @error('tipo')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group ml-3">
                <input type="submit" class="btn btn-success shadow rounded mt-2" value="Actualizar usuario">
            </div>

        </form>
    </div>

</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function mostrarContrasena() {
        var tipo = document.getElementById("password");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
</script>
@stop
