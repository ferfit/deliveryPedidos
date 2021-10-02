@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container my-4">
    <h1 class="tart">Listado de productos</h1>
</div>

<div class="container mt-2 ">
    <div class="row">
        <div class="mr-4 border-right p-3">
            <a href="{{ route('admin.productos.create') }}" class="btn btn-success shadow">Crear producto</a>
        </div>
        <div class="p-3">
            <form method="POST" action="{{ route('admin.importar') }}" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="row">
                    <div class="form-group mr-2 ">
                        <input type="submit" class="btn btn-success shadow rounded " value="Importación masiva">  
                    </div>
                    <div>
                        <input type="file" name="productos" id="" class="form-control ">
                    </div>
                </div>
                
                

            </form>
        </div>
        <div class="p-3 mr-3">
            <a href="{{ route('admin.eliminar-todos') }}" class="btn btn-danger shadow">Elimitar productos</a>
        </div>
    </div>

    

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
