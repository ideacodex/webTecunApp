<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ substr(request()->getRequestUri(),1 )}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('img/tecun/logo.png')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- filtros datatables -->
    <link href="{{ asset('js/export/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- menuadmin -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

    {{-- packete de editor de texto --}}
    @trixassets


    {{-- selec2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

</head>
<style>
    /* The device with borders */
    .smartphone {
        position: relative;
        width: 360px;
        height: 680px;
        margin: auto;
        border: 16px #F1DDC8 solid;
        border-top-width: 60px;
        border-bottom-width: 60px;
        border-radius: 36px;
    }

    /* The horizontal line on the top of the device */
    .smartphone:before {
        content: '';
        display: block;
        width: 60px;
        height: 5px;
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #333;
        border-radius: 10px;
    }

    /* The circle on the bottom of the device */
    .smartphone:after {
        content: '';
        display: block;
        width: 35px;
        height: 35px;
        position: absolute;
        left: 50%;
        bottom: -65px;
        transform: translate(-50%, -50%);
        background: silver;
        border-radius: 50%;
    }

    /* The screen (or content) of the device */
    .smartphone .content {
        width: 330px;
        height: 560px;
        background: white;
    }
</style>
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
        background-color: #f7921c;
    }

    .bg-gradient {
        background-image: linear-gradient(to right, #f7921c, #ce8416);
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

    .icon {
        font-size: 1em;
        color: #f7921c;
        background-color: white;
        border-radius: 50%;
        padding: 25px
    }

    /*===========================
2.9 Team Area
===========================*/

    .team-area {}

    .member-area {}

    .team-item {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }

    .team-item img {
        max-width: 100%;
    }

    .tmember-info {
        position: absolute;
        left: 0;
        bottom: -100%;
        background: #ff6818;
        padding: 13px 20px 22px;
        opacity: 0;
        transition: all 0.3s ease 0s;
    }

    .team-item:hover .tmember-info {
        opacity: 1;
        bottom: 0;
    }

    .tmember-info h4 {
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0;
        color: #fff;
    }

    .tmember-info span {
        display: block;
        font-size: 10px;
        color: #fff;
        letter-spacing: 0;
        text-transform: capitalize;
        line-height: 16px;
    }

    .tmember-info p {
        font-size: 12px;
        color: #fff;
        line-height: 18px;
        margin: 14px 0px 16px;
    }

    .social-btns {}

    .social-btns a {
        height: 30px;
        width: 30px;
        border: 1px solid #fff;
        display: inline-block;
        text-align: center;
        line-height: 28px;
        border-radius: 50%;
        color: #fff;
        font-size: 13px;
        margin-right: 3px;
    }

    /*===========================
END Team Area
===========================*/

    .achive-single {
        font-size: 3em;
    }

    }
</style>

<style>
    .fixed-top.scrolled {
        padding-top: 10px;
        background-color: #f7921c !important;
    }

    .fixed-top.scrolled .nav-link {
        color: #555;
    }
</style>



<body>
    <div id="app">
        <section class="fixed-top">
            <!--Navbar -->
            <nav id="navigation" class="pt-3 pb-2 navbar  navbar-expand-lg fixed-top">
                <a class="ml-5 navbar-brand" href="{{url('/')}}"><img src="{{asset('img/tecun/logoBlanco.png')}}"
                        class="d-inline-block align-top ml-1" height="35px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-light fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons mr-5">
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#home"><strong>Inicio</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#screenshot"><strong>Galería</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#features"><strong>Novedades</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#pricing"><strong>Reconocimiento</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#download"><strong>Descargar</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="#review"><strong>Opiniones</strong></a></li>
                        <li class="nav-item"><a class="nav-link waves-effect waves-light text-light"
                                href="{{url('login')}}"><strong>Ingresar</strong></a></li>
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
                                <img src="https://img.freepik.com/free-photo/agriculture-thailand-tractor-plowing-soil-field_35954-68.jpg?size=626&ext=jpg"
                                    style="max-height: 700px" class="d-block w-100">
                                <div class="carousel-caption mt-n5 mb-5">
                                    <p class="h1">First slide label</p>
                                    <p class="h5">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                    <a href="" class="btn btn-sm btn-dark"> Enlace </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://image.freepik.com/free-photo/tractor-sun-into-shovel-bucket_157744-73.jpg"
                                    style="max-height: 700px" class="d-block w-100">
                                <div class="carousel-caption mt-n5 mb-5">
                                    <p class="h1">Second slide label</p>
                                    <p class="h5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a href="" class="btn btn-sm btn-dark"> Enlace </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://image.freepik.com/free-photo/man-driving-tractor-through-field_140725-1574.jpg"
                                    style="max-height: 700px" class="d-block w-100">
                                <div class="carousel-caption mt-n5 mb-5">
                                    <p class="h1">Third slide label</p>
                                    <p class="h5">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                    <a href="" class="btn btn-sm btn-dark"> Enlace </a>
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
                        <img src="{{asset('appson/assets/img/mobile/screen-slider/screen1.jpg')}}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img src="{{asset('appson/assets/img/mobile/screen-slider/screen2.jpg')}}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img src="{{asset('appson/assets/img/mobile/screen-slider/screen3.jpg')}}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img src="{{asset('appson/assets/img/mobile/screen-slider/screen4.jpg')}}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img src="{{asset('appson/assets/img/mobile/screen-slider/screen1.jpg')}}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                    <div class="justify-content-center ml-1 mr-1">
                        <img src="{{asset('appson/assets/img/mobile/screen-slider/screen2.jpg')}}"
                            class="img-fluid mx-auto d-block" width="75%" style="max-height: 600px">
                    </div>
                </div>
            </div>
        </section>
        <section id="features" class="bg-theme-1 text-light justify-content-center pt-5 pb-5">
            <div class="container">
                <div class="justify-content-center text-center ">
                    <h2>Novedades</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                </div>
                <div class="row pl-0 pr-0">
                    <div class="row pl-0 pr-0">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="d-flex flex-column text-center text-sm-center text-md-center text-lg-right">
                                <div class="align-items-start mt-5 mb-5">
                                    <div><i class="icon fa fa-podcast"></i></div>
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
                                        <img src="{{asset('appson/assets/img/mobile/screen1.png')}}"
                                            style="width:100%;border:none;height:100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="d-flex flex-column text-center text-sm-center text-md-center text-lg-left">
                                <div class="align-items-start mt-5 mb-5">
                                    <div><i class="icon fa fa-user"></i></div>
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
                                    <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
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
                                    <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
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
                                    <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
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
                                    <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
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
                    </script> All rights reserved | Made with <i class="fa fa-heart"
                        aria-hidden="true"></i> by <a href="http://norellanac.website/" class="text-light" target="_blank">Norellanac</a>
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

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(function () {
  $(document).scroll(function () {
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
      responsive: [
        {
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
            enviando= true;
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