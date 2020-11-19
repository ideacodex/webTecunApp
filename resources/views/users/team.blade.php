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
                            <img src="{{ asset('img/tecun/puesto.png') }}" class=" mx-auto d-block img-fluid" width="100%" style="max-height: 300px">
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
                            <img src="{{ asset('img/tecun/puesto.png') }}" class=" mx-auto d-block img-fluid" width="100%" style="max-height: 300px">
                            <div class="carousel-caption d-none">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <img src="{{ asset('img/tecun/puesto.png') }}" class=" mx-auto d-block img-fluid" width="100%" style="max-height: 300px">
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



        </div>

        <div class="mb-3 justify-content-center row ">
            <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">
                <a type="button" href="{{ url('jobs') }}" class="btn btn-lg btn-block btn-light d-flex">
                    <span class="h3"><i class="fas fa-rocket mr-3  text-success justify-content-start"></i></span>
                    <span class="mr-3  justify-content-center h3">Oportunidades de crecimiento</span>
                    <span class="badge  badge-primary text-light  justify-content-end">{{ Auth::user()->id * 25 }}
                    </span>
                </a>
                <a type="button" href="{{ url('stores') }}" class="btn btn-lg btn-block btn-light d-flex">
                    <span class="h3"><i class="fas fa-map-marked-alt mr-3 text-dark justify-content-start"></i></span>
                    <span class="mr-3  justify-content-center h3">Ubicación de agencias</span>
                    <span class="badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id * 20 }}
                    </span>
                </a>
                <a type="button" class="btn btn-lg btn-block btn-light d-flex" href="{{ url('specialTeam') }}">
                    <span class="h3"><i class="fas fa-medal mr-3  justify-content-start text-danger"></i></span>
                    <span class="mr-3  justify-content-center h3">Colaboradores Destacados</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>
                <a type="button" class="btn btn-lg btn-block btn-light d-flex" href="{{ url('contact/home') }}">
                    <span class="h3"><i class="fas fa-phone mr-3  justify-content-start text-info"></i></span>
                    <span class="mr-3  justify-content-center h3">LLama Directo</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>

                <a type="button" class="btn btn-lg btn-block btn-light d-flex" href="{{ url('contact/home') }}">
                    <span class="h3"><i class="fas fa-mail-bulk mr-3  justify-content-start text-dark"></i></span>
                    <span class="mr-3  justify-content-center h3">Gestiones RRHH</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>
            </div>
        </div>
    </div>

@endsection
