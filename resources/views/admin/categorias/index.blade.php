@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container mt-2">
        <h1 class="tart">Listado de categorias</h1>
    </div>

    <div class="container mt-3 ">
        <a href="{{ route('admin.categorias.create' )}}" class="btn btn-success shadow">Crear categoria</a>
    </div>
    
@stop

@section('content')

    @livewire('categoria-index')
    
    

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop