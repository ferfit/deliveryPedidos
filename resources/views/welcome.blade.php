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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    @livewireStyles

    <style>
        .toastr-success {
            bottom: 10px !important;
        }

    </style>



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

    <div class="container-fluid p-0 m-0 cabecera rounded ">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block ml-2">
                @auth
                    @if (Auth::user()->tipo == 'franquiciado')
                        
                            <a class="text-sm text-gray-700 underline bg-danger p-1 rounded text-light text-decoration-none" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        
                    @else
                        <a href="{{ url('/admin') }}"
                            class="text-sm text-gray-700 underline bg-danger p-1 rounded text-light text-decoration-none">Dashboard</a>
                            
                            <a class="text-sm text-gray-700 underline bg-danger p-1 rounded text-light text-decoration-none" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    @endif

                @else
                    <a href="{{ route('login') }}"
                        class="text-sm text-gray-700 underline bg-danger p-1 rounded text-light text-decoration-none">Login</a>


                @endauth
            </div>

        @endif
        <div class="d-flex justify-content-center align-items-center" style="margin-top: 170px">
            <img src="img/logo.webp" alt="">
        </div>

    </div>

    {{-- Carrito --}}
    <div id="carrito-icono" class="carrito container shadow rounded p-2 bg-white">
        {{-- componente livewire del carrito --}}
        @livewire('dropdown-cart')
    </div>
    {{-- Cierre --}}


    {{-- ------------ listado de productos por categoria ------------------
            
        ---------------------------------------------------- --}}
    <div class="container" id="cont-producto">
        {{-- componente livewire productos --}}
        @livewire('index-producto')


    </div>



    {{-- footer --}}
    <footer class="footer d-flex justify-content-center align-items-center mt-5">
        <div class="row justify-content-center align-items-center">
            <p class="text-center">| Copyright @ 2020 - </p>

            <p class="text-center">TuProyectoWeb |</p>
        </div>
    </footer>

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        Livewire.on('toastr', () => {
            toastr.options = {
                "positionClass": "toast-bottom-right"
            }
            toastr.success('Producto agregado  al carrito exitosamente !!! ')
        })

        Livewire.on('toastr-error', () => {
            toastr.options = {
                "positionClass": "toast-bottom-right"
            }
            toastr.danger('Debe seleccionar una cantidad mayor a 0 !!! ')
        })
    </script>

</body>

</html>
