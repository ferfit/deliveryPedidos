@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de administración general</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">

            {{-- Ordenes --}}
            @if ($ordenes->count())

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $ordenes->count() }}</h3>

                        <p>Ordenes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>

            @else

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Ordenes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>

            @endif

        </div>


        <!-- Categorias -->
        <div class="col-lg-3 col-6">

            @if ($categorias->count())
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $categorias->count() }}</h3>

                        <p>Categorias</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>

            @else
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Categorias</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>

            @endif


        </div>


        <!-- Productos -->
        <div class="col-lg-3 col-6">

            @if ($productos->count())
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $productos->count() }}</h3>

                        <p>Productos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            @else
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Productos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>

            @endif

        </div>



        <!-- Usuarios -->

        <div class="col-lg-3 col-6">
            @if ($usuarios->count())
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $usuarios->count() }}</h3>

                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            @else
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            @endif
        </div>
        <!-- ./col -->

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
