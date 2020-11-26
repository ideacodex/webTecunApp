<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ substr(request()->getRequestUri(), 1) }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/tecun/logo.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="{{ asset('appson/assets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('appson/assets/css/responsive.css') }}" rel="stylesheet">




</head>
<style>
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

    .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 25px;
    }

    .btn-circle.btn-xl {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        font-size: 24px;
        line-height: 1.33;
        border-radius: 35px;
    }

    .btn-float {
        position: fixed;
        right: 5px;
        bottom: 70px;
    }

</style>
<style>
    .nav-app-icon {
        font-size: 18px;
    }

    .badge-notify {
        position: absolute;
        top: 1em;
        margin-right: 1em;
    }

    .bg-theme-1 {
        background-color: #f7921c;
    }

    .bg-theme-2 {
        background-color: #519e93;
    }

    .bg-theme-3 {
        background-color: #015e88;
    }

    .bg-theme-4 {
        background-color: #01d4d9;
    }

    .bg-theme-5 {
        background-color: #bcbcbc;
    }

    .bg-theme-6 {
        background-color: #ffffff;
    }

    .bg-theme-7 {
        background-color: #55c684;
    }

    .bg-theme-8 {
        background-color: #87ab10;
    }

    .bg-theme-9 {
        background-color: #bf2833;
    }

</style>

<body>
    <div id="app">
        <!-- example 1 - using absolute position for center -->
        <nav class="navbar navbar-expand-md navbar-dark bg-theme-1">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapsingNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">
                                <span class="nav-app-icon text-light">
                                    <i class="fas fa-home"> </i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    @guest
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">
                                    <span class="nav-app-icon text-light">
                                        <i class="fas fa-sign-in-alt"> </i>
                                    </span>
                                    {{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('register') }}"> <span
                                        class="nav-app-icon text-light"><i class="fas fa-user-plus"> </i> </span>
                                    {{ __('Register') }}</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('#') }}" data-target="#myModal" data-toggle="modal"><span
                                        class="nav-app-icon text-light"><i class="fas fa-user"></i></span>
                                    <span class="text-light" style="margin-top: -5px;"> {{ Auth::user()->name }} </span></a>
                            </li>
                            @role('User')
                            <li class="nav-item" style="margin-right: 1em;">
                                <a class="nav-link"
                                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                    <span class="nav-app-icon"><i class="fas fa-sign-out-alt"></i></span>
                                    <span class="" style="margin-top: -5px;"> Salir </span></a>
                            </li>
                        @else
                            <li class="nav-item active dropdown" style="margin-right: 1em;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                    Administrar
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('adminPost') }}"> <span><i
                                                class="fas fa-newspaper"></i></span> Publicaciones</a>
                                    <a class="dropdown-item" href="{{ url('users') }}"> <span><i
                                                class="fas fa-users"></i></span> Usuarios</a>
                                    <a class="dropdown-item" href="{{ url('home') }}"> <span><i
                                                class="fas fa-newspaper"></i></span> Vista usuario</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                        <span class="nav-app-icon"><i class="fas fa-sign-out-alt"></i></span>
                                        <span class="" style="margin-top: -5px;"> Salir </span></a>
                                </div>
                            </li>
                            @endrole
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="mb-5">
            @yield('content')
        </main>
        <span class="mb-5"> .</span>

    </div>
    
    <nav class="fixed-bottom bg-theme-1 mt-5" style="padding-bottom: 0;">
        @guest
            <ul class="nav justify-content-around" style="margin-bottom: -1em;">
                <li class="nav-item text-center">
                    <a class="nav-link" href="{{ url('/home') }}">
                        <span class="nav-app-icon text-light"><i class="fas fa-home"></i></span>
                        <p class="text-light" style="margin-top: -5px;"> Home</p>
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="{{ url('/login') }}">
                        <span class="nav-app-icon text-light"><i class="fas fa-sign-in-alt"></i></span>
                        <p class="text-light" style="margin-top: -5px;"> Ingresar</p>
                    </a>
                </li>
                <li class="align-self-end nav-item text-center">
                    <a class="nav-link" href="{{ url('/register') }}">
                        <span class="nav-app-icon text-light"><i class="fas fa-user-plus"></i></span>
                        <p class="text-light" style="margin-top: -5px;"> Registrarse</p>
                    </a>
                </li>
            </ul>
        @else
            <ul class="nav justify-content-around" style="margin-bottom: -1em;">
                <li class="nav-item text-center">
                    <a class="nav-link" href="{{ url('/home') }}">
                        <span class="nav-app-icon text-light"><i class="fas fa-newspaper"></i></span>
                        <p class="text-light" style="margin-top: -5px;"> Noticias</p>
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="{{ url('/team') }}">
                        <span class="nav-app-icon text-light"><i class="fas fa-hard-hat"></i></span>
                        <p class="text-light" style="margin-top: -5px;"> Tecun</p>
                    </a>
                </li>
                <li class="align-self-end nav-item text-center">
                    <a class="nav-link" href="{{ url('/trivia') }}">
                        <span class="nav-app-icon text-light"><i class="fas fa-gamepad"></i></span>
                        <p class="text-light" style="margin-top: -5px;"> Juegos</p>
                    </a>
                </li>
            </ul>
        @endguest
    </nav>
    <!--buttons-->
    <div class="btn-float">
        <a href="{{ url('denounce') }}" class="btn btn-light btn-circle btn-sm bg-danger btn-lg text-light"><i
                class="fas fa-bell"></i></a>
    </div>
    <!--fin buttons -->
    <script>
        //Bloquear doble envio de formulario******
        enviando = false; //Obligaremos a entrar el if en el primer submit
        function checkSubmit() {
            if (!enviando) {
                enviando = true;
                return true;
            } else {
                //Si llega hasta aca significa que pulsaron 2 veces el boton submit
                alert("El formulario ya se esta enviando");
                return false;
            }
        }

    </script>
    @yield('js')
</body>

</html>
