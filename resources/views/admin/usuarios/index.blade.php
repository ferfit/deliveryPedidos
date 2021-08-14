@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container my-4">
        <h1 class="tart">Listado de usuarios</h1>
    </div>

    <div class="container mt-2 ">
        <a href="{{ route('admin.usuarios.create' )}}" class="btn btn-success shadow">Crear usuarios</a>
    </div>
    
@stop

@section('content')
    @livewire('usuario-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop