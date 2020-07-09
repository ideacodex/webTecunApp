<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Tecun App') }} || App Landing Html Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('appson/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/jquery.mb.YTPlayer.min.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('appson/assets/css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('img/tecun/logo.png')}}" class="rounded-circle">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- preloader area end -->
    <!-- header area start -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="menu-area">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{asset('img/tecun/logoBlanco.png')}}"
                                    class="d-inline-block align-top ml-1" width="75%;"></a>
                        </div>
                    </div>
                    <div class="col-md-9 hidden-xs hidden-sm">
                        <div class="main-menu">
                            <nav class="nav-menu">
                                <ul>
                                    <li class="active"><a href="#home">Inicio</a></li>
                                    <li><a href="#screenshot">Galería</a></li>
                                    <li><a href="#features">Novedades</a></li>
                                    <li><a href="#pricing">Reconocimiento</a></li>
                                    <li><a href="#download">Descargar</a></li>
                                    <li><a href="#review">Opiniones</a></li>
                                    <li><a href="{{url('login')}}">Ingresar</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 visible-sm visible-xs">
                        <div class="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- slider area start -->
    <section class="slider-area background-image bg-gradiant" id="home">
        <div class="container">
            <div class="slider-content d-flex flex-center">
                <div class="col-md-8 col-sm-9 col-xs-12 d-flex flex-center">
                    <div class="slider-nner">
                        <h2>Todos somos uno <br>Grupo TECUN</h2>
                        <p>PROMOVIENDO EL DESARROLLO DE AMÉRICA CENTRAL </p>
                        <div class="btn-area">
                            <a href="{{url('login')}}" class="btn btn-light">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="slider-m-img">
                        <img src="{{asset('appson/assets/img/mobile/slider-screen.png')}}" alt="mobile image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider area end -->

    <!-- screen slider area start -->
    <section class="screen-slider-area ptb--120" id="screenshot">
        <div class="container">
            <div class="section-title text-black">
                <h2>Galería</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
            <div class="row">
                <div class="screen-slider owl-carousel">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen1.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen2.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen3.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen4.jpg')}}" alt=" mobile screen">
                </div>
            </div>
        </div>
    </section>
    <!-- screen slider area end -->

    <!-- feature area start -->
    <section class="feature-area ptb--110 bg-theme" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Novedades</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
            </div>
            <div class="row">
                <div class="feature-content">
                    <div class="col-md-4 col-sm-6 col-xs-12 text-right">
                        <div class="">
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-podcast"></i></div>
                                <h4>TECUN Podcast.</h4>
                                <p>Escúchalos desde cualquier lugar. Incluso en dispositivos móviles.</p>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-map"></i></div>
                                <h4>Ubicación de agencias</h4>
                                <p>Conoce nuestros horarios de atención y la ubicación de nuestros centros de servicio
                                </p>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                                <h4>Noticias TECUN </h4>
                                <p>Consulta las últimas noticias y novedades desde tu dispositivo móvil.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <div class="feature-mscreen">
                            <div class="smartphone mt-5">
                                <div class="content">
                                    <img src="{{asset('appson/assets/img/mobile/screen1.png')}}"
                                        style="width:100%;border:none;height:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="">
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-user"></i></div>
                                <h4>Perfil Personal.</h4>
                                <p>Gestiona tu perfil y mantente en contacto con todos.</p>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-rocket"></i></div>
                                <h4>Oportunidades de crecimiento.</h4>
                                <p>Consulta las mejores ofertas de empleo y oportunidades de crecimiento.</p>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-gamepad"></i></div>
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
    <!-- feature area end -->





    <!-- subscribe area start -->
    {{--
<div class="subscribe-area ptb--120 bg-theme">
        <div class="container">
            <div class="section-title">
                <h2>Subscribe to our Newsletter</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
            <div class="row">
                <div class="subscribe_form">
                    <form action="#">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="input">
                                <input type="text" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="input">
                                <input type="text" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="submit" name="signup" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        --}}
    <!-- subscribe area end -->
    <!-- team area start -->
    <div class="team-area ptb--120" id="pricing">
        <div class="container">
            <div class="section-title text-black">
                <h2>Reconocimiento</h2>
                <p>Empleados del mes</p>
            </div>
            <div class="row">
                <div class="member-area">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="team-item">
                            <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
                            <div class="tmember-info">
                                <h4>John Deo</h4>
                                <span>front-end developer</span>
                                <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm tempor
                                    incididunt ut labore et</p>
                                <div class="social-btns">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-tumblr"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="team-item">
                            <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
                            <div class="tmember-info">
                                <h4>John Deo</h4>
                                <span>front-end developer</span>
                                <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm tempor
                                    incididunt ut labore et</p>
                                <div class="social-btns">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-tumblr"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="team-item">
                            <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
                            <div class="tmember-info">
                                <h4>John Deo</h4>
                                <span>front-end developer</span>
                                <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm tempor
                                    incididunt ut labore et</p>
                                <div class="social-btns">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-tumblr"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="team-item">
                            <img src="{{asset('img/tecun/preview1.png')}}" alt="team image">
                            <div class="tmember-info">
                                <h4>John Deo</h4>
                                <span>front-end developer</span>
                                <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusm tempor
                                    incididunt ut labore et</p>
                                <div class="social-btns">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-tumblr"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team area end -->


    <!-- download area start -->
    <section class="download-area ptb--120 bg-theme" id="download">
        <div class="container">
            <div class="section-title">
                <h2>Descarga {{ config('app.name', 'Tecun App') }}</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
            <div class="download-btns btn-area text-center">
                <a href="#"><i class="fa fa-android"></i>android story</a>
                <a href="#"><i class="fa fa-apple"></i>android story</a>
            </div>
        </div>
    </section>
    <!-- download area end -->

    <!-- achivement area start -->
    <div class="achivement-area ptb--120 bg-theme
    text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="achive-single">
                        <div class="icon"><i class="fa fa-cloud-download"></i></div>
                        <h2>200</h2>
                        <span>Descargas</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="achive-single">
                        <div class="icon"><i class="fa fa-headphones"></i></div>
                        <h2>10</h2>
                        <span>Podcast</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="achive-single">
                        <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                        <h2>30</h2>
                        <span>Publicaciones</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="achive-single">
                        <div class="icon"><i class="fa fa-trophy"></i></div>
                        <h2>50</h2>
                        <span>Reconocimientos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- achivement area end -->
    <!-- testimonial area start -->
    <section class="testimonial-area ptb--120" id="review">
        <div class="container">
            <div class="section-title text-black">
                <h2>Opiniones</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
            <div class="row">
                <div class="testimonial-list owl-carousel">
                    <!-- single item start -->
                    <div class="testimonial-item">
                        <div class="tauthor-meta">
                            <div class="author-thumb">
                                <img src="{{asset('appson/assets/img/author/author1.jpg')}}" alt="author image">
                            </div>
                            <div class="author-info">
                                <h4>John Deo</h4>
                                <span>CEO Of iphone</span>
                                <div class="review-stasr">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="tauthor-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do smod tempor incididunt
                                ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut.</p>
                        </div>
                    </div>
                    <!-- single item end -->
                    <!-- single item start -->
                    <div class="testimonial-item">
                        <div class="tauthor-meta">
                            <div class="author-thumb">
                                <img src="{{asset('appson/assets/img/author/author2.jpg')}}" alt="author image">
                            </div>
                            <div class="author-info">
                                <h4>Maria Hedge</h4>
                                <span>CEO Of iphone</span>
                                <div class="review-stasr">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="tauthor-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do smod tempor incididunt
                                ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut.</p>
                        </div>
                    </div>
                    <!-- single item end -->
                    <!-- single item start -->
                    <div class="testimonial-item">
                        <div class="tauthor-meta">
                            <div class="author-thumb">
                                <img src="{{asset('appson/assets/img/author/author1.jpg')}}" alt="author image">
                            </div>
                            <div class="author-info">
                                <h4>John Deo</h4>
                                <span>CEO Of iphone</span>
                                <div class="review-stasr">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="tauthor-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do smod tempor incididunt
                                ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut.</p>
                        </div>
                    </div>
                    <!-- single item end -->
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end -->
    <!-- letest blog area end -->img-background
    <!-- footer area start -->
    <footer>
        <div class="footer-area bg-theme ptb--50">
            <div class="container">
                <div class="footer-inner">
                    <ul class="fsocial">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                    <p class="copy-right">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- Scripts -->
    <script src="{{asset('appson/assets/js/jquery-3.2.0.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('appson/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/raindrops.js')}}"></script>
    <script src="{{asset('appson/assets/js/theme.js')}}"></script>
</body>

</html>