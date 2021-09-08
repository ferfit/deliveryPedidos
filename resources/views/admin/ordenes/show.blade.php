@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container my-4">    
</div>


<div class="container mt-2 ">
    <div class="container mx-auto">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Información del pedido Nro {{$ordene->id}}
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <dl>
                <dt>Cliente</dt>
                <dd>{{$ordene->nombre}}</dd>
                <dt>Total a pagar</dt>
                <dd>${{$ordene->total}}</dd>
                <dt>Estado</dt>
                @switch( $ordene->estado )
                                @case(1)
                                    <small class="badge badge-warning"> Pendiente</small>
                                    @break
                                @case(2)
                                    <small class="badge badge-primary"> En proceso</small>
                                    @break
                                @case(3)
                                    <small class="badge badge-success"> Enviado</small>
                                    @break
                                @case(0)
                                    <small class="badge badge-danger"> Cancelado</small>
                                    @break
                                @default
                                    
                @endswitch
              </dl>
            </div>
            <!-- /.card-body -->
        </div>

        <table class="table  table bg-white shadow mt-2">
            
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->weight }}</td>
                    <td>{{ $producto->name }}</td>
                    <td>{{ $producto->qty }}</td>
                    <td>${{ $producto->price }}</td>
                </tr>  
                @endforeach
                
            </tbody>
        </table>

        
        <div class="mx-auto">
            <div class="row mx-auto mt-3">
                 <a href="{{ route('admin.imprimir',$ordene)}}" class="btn btn-success mr-2">  <i class="fas fa-file-export mr-1"></i> Excel </a>
                 <a href="{{ route('admin.ordens.index' )}}" class="btn btn-secondary mr-2">Volver</a>
            </div>
        </div>
    </div>
    
    
</div>

@stop

@section('content')


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@stop
