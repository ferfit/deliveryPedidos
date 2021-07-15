<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        @livewireStyles


        
    </head>
    <body class="antialiased">

    

        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> --}}

        <div class="container-fluid p-0 m-0 cabecera">
            
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block ml-2">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline bg-danger p-1 rounded text-light text-decoration-none">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline bg-danger p-1 rounded text-light text-decoration-none">Login</a>

                        
                    @endauth
                </div>
                
            @endif
            <div class="d-flex justify-content-center align-items-center">
                <img src="img/logo.png" alt="">
            </div>
            
        </div>

        {{-- Carrito--}}
            <div id="carrito-icono" class="carrito container shadow rounded p-2 bg-white">
                {{-- componente livewire del carrito --}}
                @livewire('dropdown-cart')
            </div>
        {{-- Cierre --}}


        {{-------------- listado de productos por categoria ------------------
            
        ------------------------------------------------------}}
        <div class="container"  id="cont-producto">
            @foreach($categorias as $categoria)
                <h2 class=" text-center text-danger mt-5">{{$categoria->nombre}}</h2>
                <br>
                
                <div class="row justify-content-center">
                @foreach ($categoria->productos as $producto)      
                    {{-- Contenedor Producto --}}
                    <div   class="col-5 col-md-2 bg-white menu-item mx-1 mx-md-2 my-3 shadow p-3 rounded d-flex flex-column justify-content-center align-items-center">
                        <img src="/storage/{{ $producto->imagen}}" alt="" class="w-75 rounded-circle d-block mx-auto ">
                        <h3 class="nombre_producto mt-2 text-center" data_titulo="{{$producto->titulo}}" >{{$producto->nombre}}</h3>
                        <p class="descripcion_producto m-0 text-center">{{ Str::limit ( strip_tags ( $producto->descripcion ), 100 ) }}</p>
                        <p class="text-center mt-2"><strong>$ <span class="text-center mx-auto">{{$producto->precio}}</span></strong></p>


                        @livewire('cantidad-producto',['producto' => $producto], key($producto->id))
                    </div>
                @endforeach
                </div>
            @endforeach

           
        </div>

        {{-- footer --}}
        <footer class="footer d-flex justify-content-center align-items-center mt-5">
            <div class="row justify-content-center align-items-center">
              <p class="text-center">| Copyright @ 2020 - </p>
              
              <p class="text-center">TuProyectoWeb |</p>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
