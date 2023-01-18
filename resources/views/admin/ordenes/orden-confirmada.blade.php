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
    <!-- Alpine js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>


</head>

<body class="antialiased" style="background-color:#bf2b2b;">



    <div class="container d-flex flex-column justify-content-center align-items-center">
        <img src="{{asset('images/ordenConfirmada.png')}}" alt="" class="w-50 d-block mx-auto mt-5">
        <h1 class="text-white text-center">¡¡¡ Su pedido se realizo con exito !!!</h1>
        <a href="http://ferfit16.ferozo.net/" class="btn bg-dark text-white mt-5 shadow">Ir a la tienda</a>
    </div>



    {{-- footer --}}
    {{-- <footer class="footer d-flex justify-content-center align-items-center mt-auto">
        <div class="row justify-content-center align-items-center">
            <p class="text-center text-white">| Copyright @ 2020 - </p>

            <p class="text-center text-white">TuProyectoWeb |</p>
        </div>
    </footer> --}}


</body>

</html>
