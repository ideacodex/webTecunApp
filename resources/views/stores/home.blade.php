@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="mb-3 justify-content-center row ">
        <div class="col-6 col-md-6 mt-3">
            <div class="d-flex justify-content-around mt-2">
                <h1 class="text-info">{{'Encontrar Agencia'}}
                </h1>
            </div>
            <form class="d-flex justify-content-around  my-lg-0">
                <div class="input-group-prepend">
                    <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                        <i class="text-primary fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" >
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                    Buscar
                </button>
            </form>
        </div>
    </div>
    <div class="mt-2 col-12 col-md-6 offset-md-3 ml-0 mr-0">
        <ul class="list-unstyled">
            @foreach ($stores as $item)
            <li class="media mt-3 mb-1">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">{{$item->name}}: </h5>
                    <span class="">
                        {{$item->address}}
                    </span>
                    <br>
                    <p>
                        {{$item->schedule}}
                        <i class="fas fa-clock text-dark"></i>
                    </p>
                    <a href="{{$item->maps}}" class="btn btn-sm btn-block btn-outline-primary">
                        Ir...
                        <i class="fab fa-waze text-dark"></i>
                    </a>
                </div>
            </li>
            @endforeach
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Guatemala: </h5>
                    <span class="">
                        3a. Calle 3-60, Zona 9,
                        Guatemala.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="btn btn-sm btn-outline-primary">
                            Ir...
                            <i class="fab fa-waze text-dark"></i>
                        </a>
                    </span>
                    <br>
                    <p>
                        Lunes a Viernes:
                        08:00 am a 06:00 pm
                        <i class="fas fa-clock text-dark"></i>
                    </p>
                </div>
            </li>
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 mb-1 text-primary h5">Santa Lucía: </h5>
                    <span class="">
                        Km 86.5 Carretera a Santa Lucía Cotzumalguapa, Escuintla.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="btn btn-sm btn-outline-primary">
                            Ir...
                            <i class="fab fa-waze text-dark"></i>
                        </a>
                    </span>
                    <br>
                    <p>
                        Lunes a Viernes:
                        08:00 am a 05:00 pm
                        <i class="fas fa-clock text-dark"></i>
                        <br>
                        Sábado: 08:00 am a 12:00 pm
                        <i class="fas fa-clock text-dark"></i>
                    </p>
                </div>
            </li>
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Petén: </h5>
                    <span class="">
                        1a. Av. Y 1a. Calle Ciudad Satélite <br> Finca Pontehill, Santa Elena, Petén
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="btn btn-sm btn-outline-primary">
                            Ir...
                            <i class="fab fa-waze text-dark"></i>
                        </a>
                    </span>
                    <br>
                    <p>
                        Lunes a Viernes:
                        08:00 am a 05:00 pm
                        <i class="fas fa-clock text-dark"></i>
                        <br>
                        Sábado: 08:00 am a 12:00 pm
                        <i class="fas fa-clock text-dark"></i>
                    </p>
                </div>
            </li>
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Petén: </h5>
                    <span class="">
                        Km 179 San Sebastián,
                        Retalhuleu.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="btn btn-sm btn-outline-primary">
                            Ir...
                            <i class="fab fa-waze text-dark"></i>
                        </a>
                    </span>
                    <br>
                    <p>
                        Lunes a Viernes:
                        08:00 am a 05:00 pm
                        <i class="fas fa-clock text-dark"></i>
                        <br>
                        Sábado: 08:00 am a 12:00 pm
                        <i class="fas fa-clock text-dark"></i>
                    </p>
                </div>
            </li>
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Quetzaltenango: </h5>
                    <span class="">
                        Diagonal 2, 33-18, zona 8, DIDEA Xela, Quetzaltenango.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="btn btn-sm btn-outline-primary">
                            Ir...
                            <i class="fab fa-waze text-dark"></i>
                        </a>
                    </span>
                    <br>
                    <p>
                        Lunes a Viernes:
                        08:00 am a 05:00 pm
                        <i class="fas fa-clock text-dark"></i>
                        <br>
                        Sábado: 08:00 am a 12:00 pm
                        <i class="fas fa-clock text-dark"></i>
                    </p>
                </div>
            </li>
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Río Hondo: </h5>
                    <span class="">
                        Km 126.5 Carretera al Atlántico, Santa Cruz, Río Hondo, Zacapa.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="btn btn-sm btn-outline-primary">
                            Ir...
                            <i class="fab fa-waze text-dark"></i>
                        </a>
                    </span>
                    <br>
                    <p>
                        Lunes a Viernes:
                        08:00 am a 05:00 pm
                        <i class="fas fa-clock text-dark"></i>
                        <br>
                        Sábado: 08:00 am a 12:00 pm
                        <i class="fas fa-clock text-dark"></i>
                    </p>
                    <div class="mb-3"></div>
                </div>
            </li>
        </ul>
    </div>
</div>


@endsection