@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">USUARIOS</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Actualizar contraseña de <strong>{{$usuario->name}}</strong> </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{route('admin.updatePassword', $usuario)}}" novalidate>
                @csrf
                @method('PUT')

                {{-- Contraseña --}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="password">Contraseña nueva*</label>
                        <input type="password" autofocus password="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Ingrese un nombre" value="">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="far fa-check-square mr-1"></i>Actualizar</button>
                    <a href="{{ route('admin.usuarios.index') }}" class="ml-1 btn btn-secondary"> <i
                            class="fas fa-undo-alt mr-1"></i>Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
