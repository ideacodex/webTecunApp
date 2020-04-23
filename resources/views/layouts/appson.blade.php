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
    <link rel="shortcut icon" type="image/png" href="{{asset('img/tecun/logo.png')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

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
                            <a href="index.html"><img src="{{asset('img/tecun/logoBlanco.png')}}"
                                    class="d-inline-block align-top ml-1" width="75%;"></a>
                        </div>
                    </div>
                    <div class="col-md-9 hidden-xs hidden-sm">
                        <div class="main-menu">
                            <nav class="nav-menu">
                                <ul>
                                    <li class="active"><a href="#home">Inicio</a></li>
                                    <li><a href="#about">Tecun App</a></li>
                                    <li><a href="#features">Novedades</a></li>
                                    <li><a href="#screenshot">Screenshot</a></li>
                                    <li><a href="#download">Descargar</a></li>
                                    <li><a href="#pricing">Reconocimiento</a></li>
                                    <li><a href="#review">Opiniones</a></li>
                                    <li><a href="#contact">Contacto</a></li>
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
                        <p>The Best Template For Your Mobile App To Showcase And Acquire New Customers All Around The
                            World.The Best Template That You Can Find Anywhere!</p>
                        <div class="btn-area">
                            <a href="{{url('login')}}">Ingresar</a>
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
    <!-- about area start -->
    <section class="about-area ptb--110" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-5 hidden-sm hidden-xs">
                    <div class="about-left-thumb">
                        <img src="{{asset('appson/assets/img/mobile/about-m-screen.png')}}" alt="mobile screen">
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="about-content">
                        <span>Conoce {{ config('app.name', 'Tecun App') }}.</span>
                        <h2>Work the way you live</h2>
                        <p>Lorem ipsum dolor sit amet, consectetr adipisicing elit, sed do eiusmod tempor incididunt
                            labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                        <div class="about-ft">
                            <div class="ft-single">
                                <div class="icon"><i class="fa fa-desktop"></i></div>
                                <div class="ft-info">
                                    <h4>Fully Responsive Design.</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do enim ad minim
                                        veniam,</p>
                                </div>
                            </div>
                            <div class="ft-single">
                                <div class="icon"><i class="fa fa-android"></i></div>
                                <div class="ft-info">
                                    <h4>Android Platform.</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do enim ad minim
                                        veniam,</p>
                                </div>
                            </div>
                            <div class="ft-single">
                                <div class="icon"><i class="fa fa-file"></i></div>
                                <div class="ft-info">
                                    <h4>Gestiones OnLine.</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do enim ad minim
                                        veniam,</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->
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
                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-users"></i></div>
                                <h4>Eres importante</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et</p>
                            </div>
                            <div class="feature-item invisible">
                                <div class="icon"><i class="fa fa-cloud"></i></div>
                                <h4>.Cloud Storage</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et</p>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                                <h4>TECUN News </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <div class="feature-mscreen">
                            <img src="{{asset('appson/assets/img/mobile/feature-screen.png')}}" alt="mobile screen">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-list feature-list-right">
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-android"></i></div>
                                <h4>Android Platform.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et</p>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-file"></i></div>
                                <h4>Gestiones OnLine.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et</p>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="fa fa-headphones"></i></div>
                                <h4>TECUN Podcast.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature area end -->
    <!-- screen slider area start -->
    <section class="screen-slider-area ptb--120" id="screenshot">
        <div class="container">
            <div class="section-title text-black">
                <h2>Screenshots</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
            <div class="row">
                <div class="screen-slider owl-carousel">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen1.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen2.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen3.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen4.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen1.jpg')}}" alt=" mobile screen">
                    <img src="{{asset('appson/assets/img/mobile/screen-slider/screen3.jpg')}}" alt=" mobile screen">
                </div>
            </div>
        </div>
    </section>
    <!-- screen slider area end -->
    <!-- download area start -->
    <section class="download-area ptb--120 bg-theme" id="download">
        <div class="container">
            <div class="section-title">
                <h2>Download {{ config('app.name', 'Tecun App') }}</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
            <div class="download-btns btn-area text-center">
                <a href="#"><i class="fa fa-android"></i>android story</a>
                <a href="#"><i class="fa fa-apple"></i>android story</a>
                <a href="#"><i class="fa fa-windows"></i>Windows story</a>
            </div>
        </div>
    </section>
    <!-- download area end -->
    <!-- pricing area start -->
    <section class="pricing-area ptb--120" id="pricing">
        <div class="container">
            <div class="section-title text-black">
                <h2>Reconocimientos</h2>
                <p>Premios obtenidos por empleados/deptos. top Departamentos premiados</p>
            </div>
            <div class="row">
                <div class="pricing-list">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="pricing-item text-center">
                            <div class="prc-head bg-theme">
                                <span>Departamento</span>
                                <h4>Auditoría</h4>
                            </div>
                            <ul class="prc-list">
                                <li>10 User</li>
                                <li>50 Email Accounts</li>
                                <li>100 MB Disk Space</li>
                                <li>2 Subdomains</li>
                                <li>Free Updates</li>
                                <li>Support 24/7</li>
                            </ul>
                            <div class="btn-area">
                                <a href="#">purchase</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="pricing-item text-center">
                            <div class="prc-head bg-theme">
                                <span>Departamento</span>
                                <h4>Finanzas</h4>
                            </div>
                            <ul class="prc-list">
                                <li>10 User</li>
                                <li>50 Email Accounts</li>
                                <li>100 MB Disk Space</li>
                                <li>2 Subdomains</li>
                                <li>Free Updates</li>
                                <li>Support 24/7</li>
                            </ul>
                            <div class="btn-area">
                                <a href="#">purchase</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="pricing-item text-center">
                            <div class="prc-head bg-theme">
                                <span>Departamento</span>
                                <h4>Automotores</h4>
                            </div>
                            <ul class="prc-list">
                                <li>10 User</li>
                                <li>50 Email Accounts</li>
                                <li>100 MB Disk Space</li>
                                <li>2 Subdomains</li>
                                <li>Free Updates</li>
                                <li>Support 24/7</li>
                            </ul>
                            <div class="btn-area">
                                <a href="#">purchase</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing area end -->
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
    <div class="team-area ptb--120">
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
                        <h2>100</h2>
                        <span>Podcast</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="achive-single">
                        <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                        <h2>300</h2>
                        <span>Publicaciones</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="achive-single">
                        <div class="icon"><i class="fa fa-trophy"></i></div>
                        <h2>500</h2>
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
                <h2>Testimonial</h2>
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
    <!-- letest blog area start -->
    <div class="letest-blog pb--120">
        <div class="container">
            <div class="section-title text-black">
                <h2>Nuevas Publicaciones</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
            </div>
            <div class="row">
                <div class="blog-list">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-item">
                            <div class="blog-thumbnail">
                                <a href="blog-details.html"><img
                                        src="{{asset('img/tecun/preview2.png')}}"
                                        alt="blog thumbnail"></a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">Vehículo de concepto autónomo</a></h2>
                            <div class="blog-meta">
                                <ul>
                                    <li><i class="fa fa-calendar"></i>12 Feb 2017</li>
                                    <li><i class="fa fa-comment"></i>Comments</li>
                                </ul>
                            </div>
                            <div class="blog-summery">
                                <p>En Case estamos repensando la productividad. El Vehículo Conceptual Autónomo Case IH tiene el potencial de revolucionar la agricultura.</p>
                            </div>
                            <a href="blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-item">
                            <div class="blog-thumbnail">
                                <a href="blog-details.html"><img
                                        src="{{asset('img/tecun/preview3.png')}}"
                                        alt="blog thumbnail"></a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">50 años investigando accidentes para mejorar la seguridad vial</a></h2>
                            <div class="blog-meta">
                                <ul>
                                    <li><i class="fa fa-calendar"></i>12 Feb 2017</li>
                                    <li><i class="fa fa-comment"></i>Comments</li>
                                </ul>
                            </div>
                            <div class="blog-summery">
                                <p>Este año se cumple el 50º aniversario desde que el Equipo de Investigación de Accidentes de Volvo Trucks comenzó a recopilar y analizar </p>
                            </div>
                            <a href="blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-item">
                            <div class="blog-thumbnail">
                                <a href="blog-details.html"><img
                                        src="{{asset('img/tecun/preview4.png')}}"
                                        alt="blog thumbnail"></a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">Solución de manipulación de materiales para puertos</a></h2>
                            <div class="blog-meta">
                                <ul>
                                    <li><i class="fa fa-calendar"></i>12 Feb 2017</li>
                                    <li><i class="fa fa-comment"></i>Comments</li>
                                </ul>
                            </div>
                            <div class="blog-summery">
                                <p>Mantsinen saca al mercado una nueva máquina de manipulación de materiales: Mantsinen 140. Se trata de la primera máquina</p>
                            </div>
                            <a href="blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- letest blog area end -->
    <!-- map area start -->
    <div id="map"></div>
    <!-- map area end -->
    <!-- contact area start -->
    <div class="contact-area bg-theme">
        <div class="container">
            <section class="contact-inner" id="contact">
                <div class="section-title text-black">
                    <h2>Contact US</h2>
                </div>
                <div class="contact-flex-container">
                    <div class="contact-address">
                        <h4 class="contact-title">Address</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et </p>
                        <ul>
                            <li class="h-addres"><i class="fa fa-home"></i>300 Kutubkhallpoint <br>New York,United
                                States</li>
                            <li><i class="fa fa-phone"></i>+0044 545 989 626</li>
                            <li><i class="fa fa-envelope"></i>Example@gmail.com</li>
                        </ul>
                    </div>
                    <div class="contact-form">
                        <h4 class="contact-title">Get In Touch</h4>
                        <form action="#">
                            <input type="text" class="input" name="name" placeholder="Your Name *">
                            <input type="email" class="input" name="email" placeholder="Your Email address*">
                            <input type="text" class="input" name="subject" placeholder="Your Subject*">
                            <input type="text" class="input" name="name" placeholder="Your Message*">
                            <textarea name="msg" class="input" id="msg" placeholder="Your Message*"></textarea>
                            <input type="submit" id="send" value="Send">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- contact area end -->
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

    <!-- google map activation start-->
    <script>
        function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.674, lng: -73.945},
          zoom: 12,
          styles: [
              {
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#f5f5f5"
                  }
                ]
              },
              {
                "elementType": "labels",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "elementType": "labels.icon",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#616161"
                  }
                ]
              },
              {
                "elementType": "labels.text.stroke",
                "stylers": [
                  {
                    "color": "#f5f5f5"
                  }
                ]
              },
              {
                "featureType": "administrative.land_parcel",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "administrative.land_parcel",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#bdbdbd"
                  }
                ]
              },
              {
                "featureType": "administrative.neighborhood",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#eeeeee"
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#757575"
                  }
                ]
              },
              {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#e5e5e5"
                  }
                ]
              },
              {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#9e9e9e"
                  }
                ]
              },
              {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#ffffff"
                  }
                ]
              },
              {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#757575"
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#dadada"
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#616161"
                  }
                ]
              },
              {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#9e9e9e"
                  }
                ]
              },
              {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#e5e5e5"
                  }
                ]
              },
              {
                "featureType": "transit.station",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#eeeeee"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#c9c9c9"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#9e9e9e"
                  }
                ]
              }
            ]
        });
      }
    </script>
    <!-- google map activation end -->
    <!-- Scripts -->
    <script src="{{asset('appson/assets/js/jquery-3.2.0.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('appson/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <script src="{{asset('appson/assets/js/raindrops.js')}}"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO_5h890WNShs_YLGivCBfs2U89qXR-7Y&callback=initMap">
    </script>
    <script src="{{asset('appson/assets/js/theme.js')}}"></script>
</body>

</html>