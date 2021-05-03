@php
$namesUser = explode(' ', Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <style>
        .contenedor {
            display: flex;
            justify-content: center;
        }

    </style>
    <div>
        <div class="bg-theme-1 d-lg-none d-sm-inline"
            style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px">
            <div class="bg-theme-1 row justify-content-around d-lg-none d-sm-inline">
                <img src="{{ asset('img/app/bcontacto.png') }}" class="d-lg-none d-sm-inline img-fluid"
                    style="max-height: 100%; margin-top: 3%">
            </div>
        </div>
        <div class="panel-group ml-4 mr-4 mt-2 border-0">
            <div class="col-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3 panel border border-primary"
                style="border-radius: 40px">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" class="ml-5 text-center" href="#collapse1">
                            <style>
                                img,
                                h5 {
                                    display: block;
                                }

                            </style>
                            <img src="{{ asset('img/app/agenda.png') }}" class="mx-auto d-block img-fluid ml-5">
                            <h5 class="mt-2">NÚMEROS
                                IMPORTANTES</h5>
                        </a>{{-- <img src="{{ asset('img/app/agenda.png') }}" class="mx-auto d-block img-fluid ml-5"> --}}
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="row contenedor">
                        <div class="col-sm-4 col-8">
                            <div class="card border-0" style="border-radius: 50px">
                                <div class="card-body border-0" style="border-radius: 50px">
                                    <div style="width: 15em" class="border-0 btn-group btn-group-justified mt-2">
                                        <a href="{{ url('/favoritos/pbx') }}"
                                            style="border-top-left-radius: 20%; border-bottom-left-radius: 20%"
                                            class="btn btn-lg bg-theme-1 mr-3">
                                            <img src="{{ asset('img/app/TELEFONO_ESTE_SI.gif') }}" alt="">
                                        </a>
                                        <a class="bg-theme-1 btn btn-lg"
                                            style="border-top-right-radius: 20%; border-bottom-right-radius: 20%;"
                                            href="{{ url('/favoritos/whatsapp') }}">
                                            <img src="{{ asset('img/app/EsteSiFInal.gif') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-around mt-5">
            <h1 style="color: #030d4f"><b>BUSCAR</b></h1>
        </div>
        <div class="row justify-content-around mt-5">
            <form method="POST" action="{{ url('contact/home') }}">
                @csrf

                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent border-0" style="background-color: transparent"
                            id="inputGroup-sizing-sm">
                            <i class="text-primary far fa-user"></i>
                        </span>
                    </div>
                    <input placeholder="Nombres" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class="border-top-0 border-right-0 border-left-0 form-control text-primary @error('searchNombre') is-invalid @enderror"
                        name="searchNombre" value="{{ old('searchNombre') }}">

                    @error('searchNombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent border-0" style="background-color: transparent"
                            id="inputGroup-sizing-sm">
                            <i class="text-primary far fa-user"></i>
                        </span>
                    </div>
                    <input placeholder="Apellidos" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class="border-top-0 border-right-0 border-left-0 form-control text-primary @error('searchApellido') is-invalid @enderror"
                        name="searchApellido" value="{{ old('searchApellido') }}">

                    @error('searchApellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent border-0" style="background-color: transparent"
                            id="inputGroup-sizing-sm">
                            <i class="text-primary text-primary fas fa-users"></i>
                        </span>
                    </div>
                    <input placeholder="Departamento o área" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class="border-top-0 border-right-0 border-left-0 form-control text-primary @error('searchDepartamento') is-invalid @enderror"
                        name="searchDepartamento" value="{{ old('searchDepartamento') }}">

                    @error('searchDepartamento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent border-0" style="background-color: transparent"
                            id="inputGroup-sizing-sm">
                            <i class="text-primary far fa-flag"></i>
                        </span>
                    </div>
                    <input placeholder="País" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class="border-top-0 border-right-0 border-left-0 form-control text-primary @error('searchPais') is-invalid @enderror"
                        name="searchPais" value="{{ old('searchPais') }}">

                    @error('searchPais')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent border-0" style="background-color: transparent"
                            id="inputGroup-sizing-sm">
                            <i class="text-primary far fa-envelope"></i>
                        </span>
                    </div>
                    <input placeholder="Plaza o Puesto" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class="border-top-0 border-right-0 border-left-0 form-control text-primary @error('searchPuesto') is-invalid @enderror"
                        name="searchPuesto" value="{{ old('searchPuesto') }}">

                    @error('searchPuesto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row mt-3 justify-content-around ">
                    <div class="">
                        <button type="submit" style="border-radius: 10px"
                            class="text-light btn btn-lg btn-block bg-theme-2">
                            {{ __('BUSCAR') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
        <div class="accordion" id="accordionExample">
            @if ($contact)
                @foreach ($contact as $item)
                    <div class="card d-flex border-0 justify-content-around ">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block btn-link text-left collapsed" type="button"
                                    data-toggle="collapse" style="color: #030d4f" data-target="#id{{ $item->id }}"
                                    aria-expanded="false" aria-controls="id{{ $item->id }}">
                                    {{ $item->nombre }}
                                </button>
                            </h2>
                        </div>
                        <div id="id{{ $item->id }}" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>
                                    <h2 style="color: #030d4f" class="media-heading">{{ $item->nombre }}</h2>
                                    <div class="job">{{ $item->subDepartamento }} | {{ $item->puesto }}</div>
                                    @if ($item->correo != 'nulo')
                                        <div class="mail"><a href="{{ $item->correo }}">{{ $item->correo }}</a> </div>
                                    @endif
                                    <div class="text-dark"><a
                                            href="tel:{{ $item->numeroDirecto }}">{{ $item->numeroDirecto }}</a>
                                    </div>
                                    @if ($item->celular != 'nulo')
                                        <div class="text-dark"><a
                                                href="tel:{{ $item->celular }}">{{ $item->celular }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </div>


@endsection
