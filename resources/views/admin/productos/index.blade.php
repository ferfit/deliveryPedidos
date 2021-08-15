@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container my-4">
    <h1 class="tart">Listado de productos</h1>
</div>

<div class="container mt-2 ">
    <a href="{{ route('admin.productos.create') }}" class="btn btn-success shadow">Crear producto</a>
    <br><br>
    <hr>
    <form method="POST" action="{{ route('admin.importar') }}" enctype="multipart/form-data" novalidate>
        @csrf


        <input type="file" name="productos" id="">

        <div class="form-group ">
            <input type="submit" class="btn btn-success shadow rounded mt-2" value="Importación masiva">
        </div>

    </form>
</div>

@stop

@section('content')
@livewire('producto-index')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




@if (session('error'))
    <script>
        toastr.error('{{ session('error') }}')
    </script>
@endif

@stop
