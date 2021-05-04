@php
$namesUser = explode(' ', Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    @if (session('message'))
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="bg-theme-1 d-lg-none d-sm-inline"
            style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px">
            <div class="bg-theme-1 row justify-content-around d-lg-none d-sm-inline">
                <img src="{{ asset('img/app/bsolicitudes.png') }}" class="d-lg-none d-sm-inline img-fluid"
                    style="max-height: 100%; margin-top: 3%">
            </div>
        </div>
        <div class="mb-3 justify-content-center row">
            <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">
                <div class="tr-gallery">
                    <div class="row col-md-10 offset-md-1 ml-1 col-lg-10 offset-lg-1">
                        <div class="col-sm-4 col-md-4 col-6 mb-1 mt-5" id="box-search">
                            <a href="{{ route('proccessRRHH') }}">
                                <div class="card border-top-0 teamsombra">
                                    <img src="{{ asset('img/piscina2.png') }}" class="mx-auto" width="65%"
                                        style="border-radius: 10%" alt="...">
                                    <div class="card-body">
                                        <h5 class="text-center"><b>CONSULTAR VACACIONES</b></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-md-4 col-6 mb-1 mt-5" id="box-search">
                            <a href="{{ url('procesos/constancia') }}">
                                <div class="card border-top-0 teamsombra">
                                    <img src="{{ asset('img/certificado.png') }}" class="mx-auto" width="65%"
                                        style="border-radius: 10%" alt="...">
                                    <div class="card-body">
                                        <h5 class="text-center"><b>CONSTANCIA LABORAL</b></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-md-4 col-6 mb-1 mt-5" id="box-search">
                            <a href="{{ asset('files/formularioIrtra.doc') }}">
                                <div class="card border-top-0 teamsombra">
                                    <img src="{{ asset('img/logo-irtra.org_2.png') }}" class="mx-auto" width="65%"
                                        style="border-radius: 10%" alt="...">
                                    <div class="card-body">
                                        <h5 class="text-center"><b>DESCARGAR FORMULARIO</b></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-md-4 col-6 mb-1 mt-5" id="box-search">
                            <a href="{{ url('procesos/constancia') }}">
                                <div class="card border-top-0 teamsombra">
                                    <img src="{{ asset('img/asotecsa.png') }}" class="mx-auto" width="65%"
                                        style="border-radius: 10%" alt="...">
                                    <div class="card-body">
                                        <h5 class="text-center"><b>ASOTECSA</b></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
