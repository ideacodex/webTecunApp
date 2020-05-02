@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="mb-3 justify-content-center row ">
        <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <img src="{{asset('img/tecun/puesto.png')}}" class=" mx-auto d-block img-fluid" width="100%">
                        <div class="carousel-caption d-none">
                            <h5>
                                <span class="nav-app-icon text-light">
                                    <i class="fas fa-medal"></i>
                                </span>
                                Javier Estrada
                                <span class="nav-app-icon text-light">
                                    <i class="fas fa-medal"></i>
                                </span>
                            </h5>
                            <p>Nuevo director Ejecutivo.</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img src="{{asset('img/tecun/puesto.png')}}" class=" mx-auto d-block img-fluid" width="100%">
                        <div class="carousel-caption d-none">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img src="{{asset('img/tecun/puesto.png')}}" class=" mx-auto d-block img-fluid" width="100%">
                        <div class="carousel-caption d-none">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
            <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions1" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions1" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <img src="{{asset('img/tecun/creciendo.png')}}" class=" mx-auto d-block img-fluid" width="100%">
                        <div class="carousel-caption d-none">
                            <h5>
                                <span class="nav-app-icon text-light">
                                    <i class="fas fa-medal"></i>
                                </span>
                                🎊 Bienvenido 🎊
                                <span class="nav-app-icon text-light">
                                    <i class="fas fa-medal"></i>
                                </span>
                            </h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img src="{{asset('img/tecun/creciendo.png')}}" class=" mx-auto d-block img-fluid" width="100%">
                        <div class="carousel-caption d-none">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img src="{{asset('img/tecun/creciendo.png')}}" class=" mx-auto d-block img-fluid" width="100%">
                        <div class="carousel-caption d-none">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection