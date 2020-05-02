@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="mb-3 justify-content-center row ">
        <div class="col-12 col-md-6 offset-md-3 mt-3">
            <div class="d-flex justify-content-around mt-2">
                <h1 class="text-info">{{'Encontrar Empleos'}}
                </h1>
            </div>
            <form class="d-flex justify-content-around  my-lg-0" method="POST" action="{{ url('url') }}"
                onsubmit="return checkSubmit();">
                @csrf
                <input id="trip" name="key" type="hidden" value="{{''}}">
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-briefcase"></i>
                        </span>
                    </div>
                    <input aria-label=" Sizing example input" aria-describedby="inputGroup-sizing-sm" id="cityData"
                        name="search" class="text-primary form-control{{ $errors->has('search') ? ' is-invalid' : '' }}"
                        autofocus required>
                    @if ($errors->has('search'))
                    <span class="invalid-feedback" role="alert">
                        <strong><i class="fas fa-waze"></i>{{ $errors->first('search') }}</strong>
                    </span>
                    @endif
                    <button class="btn btn-primary" type="submit">
                        <i class="text-light fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-2 col-12 col-md-6 offset-md-3 ml-0 mr-0">
        <ul class="list-unstyled">
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Vendedor de Repuestos Automotriz: </h5>
                    <span class="">
                        OBJETIVO: Comercializar repuestos y accesorios correspondientes a nuestras marcas, brindando
                        servicio excepcional con nuestros clientes, asesorando de la mejor manera para que se ejecuten
                        ventas efectivas y con un índice alto de satisfacción.
                    </span>
                    <br>
                    <p>
                        ESTUDIOS: 1er año de Ingeniería Industrial, Mecánica o Licenciatura en Administración de
                        Empresas.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="text-primary">
                            Aplicar...
                            <i class="fas fa-user-tie text-dark#"></i>
                        </a>
                    </p>
                </div>
            </li>
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Vendedor de Repuestos Automotriz: </h5>
                    <span class="">
                        OBJETIVO: Comercializar repuestos y accesorios correspondientes a nuestras marcas, brindando
                        servicio excepcional con nuestros clientes, asesorando de la mejor manera para que se ejecuten
                        ventas efectivas y con un índice alto de satisfacción.
                    </span>
                    <br>
                    <p>
                        ESTUDIOS: 1er año de Ingeniería Industrial, Mecánica o Licenciatura en Administración de
                        Empresas.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="text-primary">
                            Aplicar...
                            <i class="fas fa-user-tie text-dark#"></i>
                        </a>
                    </p>
                </div>
            </li>
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">Vendedor de Repuestos Automotriz: </h5>
                    <span class="">
                        OBJETIVO: Comercializar repuestos y accesorios correspondientes a nuestras marcas, brindando
                        servicio excepcional con nuestros clientes, asesorando de la mejor manera para que se ejecuten
                        ventas efectivas y con un índice alto de satisfacción.
                    </span>
                    <br>
                    <p>
                        ESTUDIOS: 1er año de Ingeniería Industrial, Mecánica o Licenciatura en Administración de
                        Empresas.
                        <a href="https://www.waze.com/ul?q=grupotecunGuatemala" class="text-primary">
                            Aplicar...
                            <i class="fas fa-user-tie text-dark#"></i>
                        </a>
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
                </div>
            </li>
        </ul>
    </div>
</div>


@endsection