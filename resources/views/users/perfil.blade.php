@php
$namesUser = explode(' ', Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="bg-theme-1 d-lg-none d-sm-inline"
            style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px">
            <div class="bg-theme-1 row justify-content-around d-lg-none d-sm-inline">
                <img src="{{ asset('img/app/puesto.png') }}" class="d-lg-none d-sm-inline img-fluid"
                    style="max-height: 100%; margin-top: 3%">
            </div>
        </div>
        <div class="mb-3 justify-content-center row ">
            <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
                <div>
                    <img class="mx-auto d-block" src="{{ asset('img/'. $userAuth->url_image) }}"
                        alt="imagen de perfil" width="100%" style="max-height: 300px; min-height: 300px" />
                </div>
            </div>
        </div>

        <div class="mb-3 justify-content-center row ">
            <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">
                <div class="tr-gallery">
                    <div class="row col-md-10 offset-md-1 ml-1 col-lg-10 offset-lg-1">

                        <div class="col-sm-4 col-md-4 col-6 mb-1 mt-5" id="box-search">
                            <a href="{{ url('jobs') }}">
                                <div class="card border-top-0 teamsombra">
                                    <img src="{{ asset('img/sugerencia.png') }}" class="mx-auto" width="65%"
                                        style="border-radius: 10%" alt="...">
                                    <div class="card-body">
                                        <h5 class="text-center"><b>SUGERENCIAS</b></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-md-4 col-6 mb-1 mt-5" id="box-search">
                            <a href="{{ url('stores') }}">
                                <div class="card border-top-0 teamsombra">
                                    <img src="{{ asset('img/update.png') }}" width="65%" style="border-radius: 10%"
                                        class="mx-auto" alt="...">
                                    <div class="card-body">
                                        <h5 class="text-center"><b>ACTUALIZAR</b></h5>
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
