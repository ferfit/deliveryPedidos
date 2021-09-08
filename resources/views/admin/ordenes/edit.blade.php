@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    

    
    
@stop

@section('content')
<div class="container mt-5 py-3">


    <div class="col-12 col-lg-6 mx-auto bg-white shadow py-2 px-5 rounded">

        <h1 class="text-center">Edición de orden: {{$ordene->id}}</h1>

        
        <form method="POST" action="{{ route('admin.ordens.update',$ordene)}}" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" id="estado">
                    
                    

                    @switch( $ordene->estado )
                        @case(1)

                        <option value="1">
                            Pendiente
                        </option>
                        <option value="2">
                            En proceso
                        </option>
                        <option value="3">
                            Enviado
                        </option>
                        <option value="0">
                            Cancelado
                        </option>
                    
                            @break


                        @case(2)

                        <option value="2">
                            En proceso
                        </option>
                        <option value="1">
                            Pendiente
                        </option>
                        <option value="3">
                            Enviado
                        </option>
                        <option value="0">
                            Cancelado
                        </option>
                            
                            @break
                        @case(3)

                        <option value="3">
                            Enviado
                        </option>
                        <option value="1">
                            Pendiente
                        </option>
                        <option value="2">
                            En proceso
                        </option>
                        <option value="0">
                            Cancelado
                        </option>
                            
                            @break
                        @case(0)
                        <option value="4">
                            Cancelado
                        </option>
                        <option value="1">
                            Pendiente
                        </option>
                        <option value="2">
                            En proceso
                        </option>
                        <option value="3">
                            Enviado
                        </option>
                            
                            @break
                        @default
                            
                    @endswitch
                    
                </select>
                @error('estado')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                
            </div> 
            <div class="form-group ">
                <input type="submit" class="btn btn-success shadow rounded mt-2" value="Actualizar orden">
            </div>

        </form>
    </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop