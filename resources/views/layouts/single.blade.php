<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/tecun/logo.png') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    /*campos de tipo numerico sin flechas*/
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>
<style>
    body {
        /* background: {{ config('app.bg-theme-1') }} ;
        background: linear-gradient(to right, {{ config('app.bg-theme-1') }}, {{ config('app.bg-theme-2') }}); */
    }

    nav {
        list-style: none;
    }

    ul {
        list-style: none;
    }

    li {
        list-style: none;
    }

    select option {
        background: rgb(0, 0, 0);
        color: #fff;
        text-shadow: 0 1px 0 rgb(0, 0, 0);
    }

    .transparent {
        background-color: transparent !important;
        border-right-style: none;
    }

    .form-control::placeholder {
        color: rgb(58, 54, 54);
    }

    .form-control {
        background-color: transparent !important;
        border-left-style: none;
    }

    .form-control::-webkit-input-placeholder {
        background-color: transparent !important;
        color: rgb(51, 47, 47);
    }

    /*vuelve tranparente el color de fondo del input en bootstrap 4*/
    .form-control:valid {
        background-color: transparent !important;
    }

    .bg-login {
        height: 17em;
        background: {{ config('app.bg-theme-1') }};
        background: linear-gradient(to right, {{ config('app.bg-theme-1') }}, {{ config('app.bg-theme-2') }});
    }

    .bg-botones {
        background: {{ config('app.bg-theme-1') }};
        background: linear-gradient(0deg, {{ config('app.bg-theme-1') }} 0%, {{ config('app.bg-theme-2') }} 100%, {{ config('app.bg-theme-1') }});

    }

</style>

<body>

    <div class="bg-login" style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px ;">
        <div class="row justify-content-center">
            <a href="{{ url('/') }}">
                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('img/user.png') }}" class="img-fluid"
                                style="max-height: 150px; margin-top: 3%;  margin-left: 5%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('img/tecun/logoBlanco.png') }}" class="img-fluid"
                                style="max-height: 75px; margin-left: -10%">
                        </td>
                    </tr>
                </table>
            </a>
        </div>
    </div>
    @yield('content')
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
</body>

</html>
