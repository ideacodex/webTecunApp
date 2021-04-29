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

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/tecun/logo.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- filtros datatables -->
    <link href="{{ asset('js/export/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- menuadmin -->
    <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">


    {{-- selec2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.min.css') }}" />

</head>
<style>
    .bg-theme-1 {
        background-color: {{ config('app.bg-theme-1') }};
    }

    .bg-opacity {
        background-color: {{ config('app.bg-theme-1') }};
    }

    .bg-orange {
        background-color: #fa5e0a;
    }

</style>

<body>
    <div id="app" class="container-fluid pl-0 pr-0 ml-0 mr-0">
        <section class="fixed-top bg-theme-1 bg-opacity">
            <!--Navbar -->
            <nav id="navigation" class="bg-theme-1 pt-3 pb-2 navbar navbar-expand-lg fixed-top">
                <a class="ml-5 navbar-brand" href="{{ url('/') }}"><img
                        src="{{ asset('img/tecun/logoBlanco.png') }}" class="d-inline-block align-top ml-1"
                        height="35px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-light fas fa-bars"></i>
                </button>
                <div class="bg-theme-1 collapse navbar-collapse" id="navbarSupportedContent-333">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="bg-theme-1 navbar-nav ml-auto nav-flex-icons mr-5">
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#home"><strong>INICIO</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#screenshot"><strong>GALERÍA</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#features"><strong>NOVEDADES</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#pricing"><strong>RECONOCIMIENTOS</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#download"><strong>DESCARGAR</strong></a></li>
                        <li class="nav-item"><a style="border-radius: 20px"
                                class="h4 btn bg-orange nav-link waves-effect waves-light text-light"
                                href="{{ url('ingresar') }}">INICIAR SESIÓN</a></li>
                    </ul>
                </div>
            </nav>
            <!--/.Navbar -->
        </section>

        <div class="d-block d-sm-none bg-theme-1" style="height: 80px"></div>
        <section id="home">
            <div class="bg-theme-1 bg-gradiant">
                <div class="">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/bg/bg-1.jpg') }}" style="max-height: 700px"
                                    class="d-block w-100">
                                <div class="carousel-caption mb-2 mb-md-5">
                                    <p class="h1 mb-2 mb-md-5">Vehículo de concepto autónomo</p>
                                    <p class="h5 mt-2 mt-md-5 d-none d-md-block">El Vehículo Conceptual Autónomo Case IH
                                        tiene
                                        el potencial de revolucionar la agricultura</p>
                                    <a href="{{ url('home') }}"
                                        class="btn btn-lg bg-theme-1 mb-2 mb-md-5 mt-2 mt-md-5 text-light ">
                                        Ir <i class="fas fa-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/bg/bg-2.jpg') }}" style="max-height: 700px"
                                    class="d-block w-100">
                                <div class="carousel-caption mb-2 mb-md-5">
                                    <p class="h1 mb-2 mb-md-5">50 años investigando accidentes</p>
                                    <p class="h5 mt-2 mt-md-5 d-none d-md-block">El Vehículo Conceptual Autónomo Case IH
                                        tiene
                                        el potencial de revolucionar la agricultura</p>
                                    <a href="{{ url('home') }}"
                                        class="btn btn-lg bg-theme-1 mb-2 mb-md-5 mt-2 mt-md-5 text-light ">
                                        Ir <i class="fas fa-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/bg/bg-3.jpg') }}" style="max-height: 700px"
                                    class="d-block w-100">
                                <div class="carousel-caption mb-2 mb-md-5">
                                    <p class="h1 mb-2 mb-md-5">Manipulación de materiales para puertos</p>
                                    <p class="h5 mt-2 mt-md-5 d-none d-md-block">El Vehículo Conceptual Autónomo Case IH
                                        tiene
                                        el potencial de revolucionar la agricultura</p>
                                    <a href="{{ url('home') }}"
                                        class="btn btn-lg bg-theme-1 mb-2 mb-md-5 mt-2 mt-md-5 text-light ">
                                        Ir <i class="fas fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-5" id="screenshot">
            <div class="container ">
                <div class="pt-5 pb-5 justify-content-center text-center">
                    <p class="h3 text-dark">Galería</p>
                </div>
                <div class="responsive">
                    <div class="justify-content-center ml-1 mr-1">
                        <img style="border-radius: 20px"
                            src="{{ asset('appson/assets/img/mobile/screen-slider/wp.jpeg') }}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img style="border-radius: 20px"
                            src="{{ asset('appson/assets/img/mobile/screen-slider/empresas.jpeg') }}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img style="border-radius: 20px"
                            src="{{ asset('appson/assets/img/mobile/screen-slider/rh.jpeg') }}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img style="border-radius: 20px"
                            src="{{ asset('appson/assets/img/mobile/screen-slider/llamad.jpeg') }}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    {{-- <div class="justify-content-center ml-1 mr-1">
                        <img src="{{ asset('appson/assets/img/mobile/screen-slider/juegos.jpg') }}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img src="{{ asset('appson/assets/img/mobile/screen-slider/screen1.jpg') }}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img src="{{ asset('appson/assets/img/mobile/screen-slider/screen2.jpg') }}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div> --}}
                </div>
            </div>
        </section>
        <section id="features" class="bg-theme-1 text-light justify-content-center pt-5 pb-5">
            <div class="container">
                <div class="justify-content-center text-center ">
                    <h2>Novedades</h2>
                </div>
                <div class="row pl-0 pr-0">
                    <div class="row pl-0 pr-0">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="d-flex flex-column text-center text-sm-center text-md-center text-lg-right">
                                <div class="align-items-start mt-5 mb-5">
                                    <div><img src="{{ asset('appson/assets/img/mobile/podcast.png') }}" alt=""></div>
                                    <h4>TECUN Podcast.</h4>
                                    <p>Escúchalos desde cualquier lugar. Incluso en dispositivos móviles.</p>
                                </div>
                                <div class="align-items-center ">
                                    <div class=""><i class="icon fa fa-map"></i></div>
                                    <h4>Ubicación de agencias</h4>
                                    <p>Conoce nuestros horarios de atención y la ubicación de nuestros centros de
                                        servicio
                                    </p>
                                </div>
                                <div class="align-items-end ">
                                    <div class="mt-5"><i class="icon fa fa-newspaper"></i></div>
                                    <h4>Noticias TECUN </h4>
                                    <p>Consulta las últimas noticias y novedades desde tu dispositivo móvil.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-none d-lg-block d-xl-block">
                            <div class="feature-mscreen">
                                <div class="smartphone">
                                    <div class="content">
                                        <img src="{{ asset('appson/assets/img/mobile/ubi.png') }}"
                                            style="width:100%;border:none;height:100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="d-flex flex-column text-center text-sm-center text-md-center text-lg-left">
                                <div class="align-items-start mt-5 mb-5">
                                    <div><img src="{{ asset('appson/assets/img/mobile/user.png') }}" alt=""></div>
                                    <h4>Perfil Personal.</h4>
                                    <p>Gestiona tu perfil y mantente en contacto con todos.</p>
                                </div>
                                <div class="align-items-center ">
                                    <div><i class="icon fa fa-rocket"></i></div>
                                    <h4>Oportunidades de crecimiento.</h4>
                                    <p>Consulta las mejores ofertas de empleo y oportunidades de crecimiento.</p>
                                </div>
                                <div class="align-items-end">
                                    <div class="mt-5"><i class="icon fa fa-gamepad"></i></div>
                                    <h4>juegos TECUN.</h4>
                                    <p>El increíble juego de preguntas y respuestas, que te permitirá poner a prueba tus
                                        conocimientos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- team area start -->
        <section>
            <div class="" id="pricing">
                <div class="container pt-5 pb-5">
                    <div class="text-dark text-center  pt-5 pb-3">
                        <h2>Reconocimiento</h2>
                        <p>Empleados del mes</p>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="team-item">
                                    <img src="{{ asset('img/tecun/preview1.png') }}" alt="team image">
                                    <div class="tmember-info">
                                        <h4>John Deo</h4>
                                        <span>front-end developer</span>
                                        <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm
                                            tempor
                                            incididunt ut labore et</p>
                                        <div class="social-btns">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-tumblr"></i></a>
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="team-item">
                                    <img src="{{ asset('img/tecun/preview1.png') }}" alt="team image">
                                    <div class="tmember-info">
                                        <h4>John Deo</h4>
                                        <span>front-end developer</span>
                                        <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm
                                            tempor
                                            incididunt ut labore et</p>
                                        <div class="social-btns">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-tumblr"></i></a>
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="team-item">
                                    <img src="{{ asset('img/tecun/preview1.png') }}" alt="team image">
                                    <div class="tmember-info">
                                        <h4>John Deo</h4>
                                        <span>front-end developer</span>
                                        <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm
                                            tempor
                                            incididunt ut labore et</p>
                                        <div class="social-btns">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-tumblr"></i></a>
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="team-item">
                                    <img src="{{ asset('img/tecun/preview1.png') }}" alt="team image">
                                    <div class="tmember-info">
                                        <h4>John Deo</h4>
                                        <span>front-end developer</span>
                                        <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm
                                            tempor
                                            incididunt ut labore et</p>
                                        <div class="social-btns">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-tumblr"></i></a>
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team area end -->

        <section class="bg-theme-1 text-light text-center pt-5 pb-2">
            <!-- download area start -->
            <section class="justify-content-center" id="download">
                <div class="container">
                    <div class="section-title">
                        <h2>Descarga {{ config('app.name', 'Tecun App') }}</h2>
                    </div>
                    <div class="d-flex justify-content-center text-center pt-3 pb-3">
                        <a href="#" class="ml-3 mr-3 btn btn-outline-light"> <i class="fab fa-android"></i> android
                            story</a>
                        <a href="#" class="ml-3 mr-3 btn btn-outline-light"> <i class="fab fa-apple"></i> Apple
                            story</a>
                    </div>
                </div>
            </section>
            <!-- download area end -->

            <!-- achivement area start -->
            <div class="mt-5 mb-5  text-center">
                <div class="container pb-5">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="achive-single">
                                <div><i class="fa fa-download"></i></div>
                                <h2>200</h2>
                            </div>
                            <span>Descargas</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="achive-single">
                                <div><i class="fa fa-headphones"></i></div>
                                <h2>10</h2>
                            </div>
                            <span>Podcast</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="achive-single">
                                <div><i class="fa fa-newspaper"></i></div>
                                <h2>30</h2>
                            </div>
                            <span>Publicaciones</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="achive-single">
                                <div><i class="fa fa-trophy"></i></div>
                                <h2>15</h2>
                            </div>
                            <span>Reconocimientos</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- achivement area end -->

            <div class="mt-5 pb-1">
                <div class="" role="group" aria-label="Basic example">
                    <a href="#" type="button" class="btn btn-lg waves-effect waves-light btn-outline-light ml-3 mr-3"
                        style="border-radius: 50%;"> <i class="fab fa-facebook"></i> </a>
                    <a href="#" type="button" class="btn btn-lg waves-effect waves-light btn-outline-light ml-3 mr-3"
                        style="border-radius: 50%;"> <i class="fab fa-instagram"></i> </a>
                    <a href="#" type="button" class="btn btn-lg waves-effect waves-light btn-outline-light ml-3 mr-3"
                        style="border-radius: 50%;"> <i class="fab fa-linkedin"></i> </a>
                    <a href="#" type="button" class="btn btn-lg waves-effect waves-light btn-outline-light ml-3 mr-3"
                        style="border-radius: 50%;"> <i class="fab fa-twitter"></i> </a>
                </div>
                <p class="mt-2">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                        href="http://norellanac.website/" class="text-light" target="_blank">Norellanac</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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

    <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>

    <script>
        $(function() {
            $(document).scroll(function() {
                var $nav = $(".fixed-top");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });

    </script>
    <script>
        $('.responsive').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

    </script>

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
