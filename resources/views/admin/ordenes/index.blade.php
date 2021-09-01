@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container my-4">
    <h1 class="tart">Listado de ordenes</h1>
</div>

<div class="container mt-2 ">

    
</div>

@stop

@section('content')

@livewire('orden-admin')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




{{-- @if (session('error'))
    <script>
        toastr.error('{{ session('error') }}')
    </script>
@endif
 --}}
@stop
