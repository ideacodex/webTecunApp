<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ substr(request()->getRequestUri(), 1) }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/tecun/logo.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- filtros datatables -->
    <link href="{{ asset('js/export/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- menuadmin -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

    {{-- packete de editor de texto --}}

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


    {{-- selec2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    {{-- selec2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>
<style>
    .bg-orange {
        background-color: {{ config('app.bg-theme-2') }};
    }

    .bg-input{
        background-color: {{ config('app.bg-theme-3') }};
    }

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
        right: 37px;
        bottom: 100px;
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
        background-color: {{ config('app.bg-theme-1') }};
    }

    .bg-theme-2 {
        background-color: #519e93;
    }

    .bg-theme-3 {
        background-color: {{ config('app.bg-theme-3') }};
    }

    .bg-theme-4 {
        background-color: #01d4d9;
    }

    .accordionList {
        background: #519e93;
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

    .list-group-item-action {
        width: 100%;
        color: #495057;
        text-align: inherit;
    }

    .list-group-item-action:hover,
    .list-group-item-action:focus {
        z-index: 1;
        color: #495057;
        text-decoration: none;
        background-color: #FFf7921c;
    }

    .list-group-item-action:active {
        color: #212529;
        background-color: #33f7921c;
    }


    /*buscar select */
    .select2-container .select2-selection--single {
        height: 46px !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ccc !important;
        border-radius: 0px !important;
    }

</style>

<body>
    <div id="app">
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-theme-1 text-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <img class="d-inline-block align-top ml-1 rounded-circle" src="{{ asset('img/tecun/logo.png') }}"
                        alt="{{ config('app.name', 'Pakal') }}" style="max-width: 30px" />
                    <span class="h3 text-light"> {{ config('app.name', 'Pakal') }} </span>
                </div>
                <div class="list-group list-group-flush">
                    <div class="accordion" id="accordionExample">
                        <div class="">
                            <a class="list-group-item list-group-item-action bg-theme-1 text-light collapsed"
                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne"> <span class="pr-3"><i class="fas fa-check-double"></i>
                                    PUBLICACIONES</span>
                                <span class="pl-3"><i class="fas fa-caret-down"></i></span></a>
                            <div id="collapseOne" class="collapse accordionList" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="">
                                    <a href="{{ url('adminPost') }}"
                                        class="list-group-item list-group-item-action bg-theme-1 text-light">
                                        <span class=""><i class="ml-3 fas fa-check"></i></span> NOTICIAS
                                    </a>
                                    <a href="{{ url('adminPodcast') }}"
                                        class="pl-4 list-group-item list-group-item-action bg-theme-1 text-light">
                                        <span class=""><i class="ml-3 fas fa-check"></i></span> PODCAST</a>
                                    <a href="{{ url('adminPicture') }}"
                                        class="pl-4 list-group-item list-group-item-action bg-theme-1 text-light">
                                        <span class=""><i class="ml-3 fas fa-check"></i></span> TECUENTO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('notificaciones') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light"> <span class=""><i
                                class="fas fa-check-double"></i></span> NOTIFICACIONES
                    </a>
                    <a href="{{ url('categories') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light"> <span class=""><i
                                class="fas fa-check-double"></i></span> CATEGOR??AS
                    </a>
                    <a href="{{ url('storesAdmin') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light"> <span class=""><i
                                class="fas fa-check-double"></i></span> AGENCIAS
                    </a>
                    <a href="{{ url('contactAdmin') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light"> <span class=""><i
                                class="fas fa-check-double"></i></span> LLAMA DIRECTO
                    </a>
                    <a href="{{ url('favoriteAdmin') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light"> <span class=""><i
                                class="fas fa-check-double"></i></span> N??MEROS FAVORITOS
                    </a>
                    <a href="{{ url('jobsAdmin') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light">
                        <span class=""><i class="fas fa-check-double"></i></span> EMPLEOS
                    </a>
                    <a href="{{ url('awardsAdmin') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light"> <span class=""><i
                                class="fas fa-check-double"></i></span> RECONOCIMIENTOS
                    </a>
                    <a href="{{ url('empresas') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light">
                        <span class=""><i class="fas fa-check-double"></i></span> VACACIONES
                    </a>
                    <a href="{{ url('gamesAdmin') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light">
                        <span class=""><i class="fas fa-check-double"></i></span> TRIVIAS
                    </a>
                    <a href="{{ url('adminSetting') }}"
                        class="list-group-item list-group-item-action bg-theme-1 text-light">
                        <span class=""><i class="fas fa-check-double"></i></span> AJUSTES
                    </a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <nav style="border-bottom-left-radius: 30px; border-bottom-right-radius: 30px"
                    class="navbar navbar-expand-lg navbar-dark bg-orange border-bottom">
                    <button id="menu-toggle" class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#sidebar-wrapper" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""><i class="fas fa-ellipsis-v"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                    Administrar
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('adminPost') }}"> <span><i
                                                class="fas fa-newspaper"></i></span> Publicaciones</a>
                                    <a class="dropdown-item" href="{{ url('home') }}"> <span><i
                                                class="fas fa-newspaper"></i></span> Vista Usuario</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                        <span class="nav-app-icon"><i class="fas fa-sign-out-alt"></i></span>
                                        <span class="" style="margin-top: -5px;"> Salir </span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="mb-5">
                    @yield('content')
                </main>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $('.select2').select2();

    </script>


    <!-- tableExport -->
    <script src="{{ asset('js/export/jquery.base64.js') }}" defer></script>
    <!-- tableExport -->
    <script src="{{ asset('js/export/tableExport.js') }}" defer></script>
    <!-- necesario para PDF -->
    <script src="{{ asset('js/export/jspdf/libs/sprintf.js') }}" defer></script>
    <!-- necesario para PDF -->
    <script src="{{ asset('js/export/jspdf/jspdf.js') }}" defer></script>
    <!-- necesario para PDF -->
    <script src="{{ asset('js/export/jspdf/libs/base64.js') }}" defer></script>

    <!-- filtros -->
    <script src="{{ asset('js/export/jquery.dataTables.min.js') }}" defer></script>
    <!-- filtros -->
    <script src="{{ asset('js/export/dataTables.bootstrap4.min.js') }}" defer></script>


    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");

        });

    </script>
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
