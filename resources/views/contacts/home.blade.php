@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div>
        <div class="d-flex justify-content-around mt-2">
            <h1 class="text-info">Numeros Frecuentes</h1>
        </div>
        <div class="row mt-3">
            <div class="mt-3 col-12 col-md-2 col-lg-2 offset-md-4 offset-lg-4">
                <a class="" href="{{ url('/favoritos/pbx') }}">
                    <img src="{{ asset('img/telephone.png') }}"
                        class="mx-auto d-block img-fluid" width="20%">
                </a>
            </div>
            <div class="mt-3 col-12 col-md-2 col-lg-2">
                <a class="" href="{{ url('/favoritos/whatsapp') }}">
                    <img src="{{ asset('img/whatsapp.png') }}"
                        class="mx-auto d-block img-fluid" width="20%">
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-around mt-5">
            <h1 class="text-info">{{ 'Buscar contacto' }}</h1>
        </div>
        <div class="row justify-content-around mt-5">
            <form method="POST" action="{{ url('contact/home') }}">
                @csrf
                
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-light fas fa-user"></i>
                        </span>
                    </div>
                    <input placeholder="Nombres" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class=" form-control text-primary @error('searchNombre') is-invalid @enderror" name="searchNombre"
                        value="{{ old('searchNombre') }}">

                    @error('searchNombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-light fas fa-user"></i>
                        </span>
                    </div>
                    <input placeholder="Apellidos" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class=" form-control text-primary @error('searchApellido') is-invalid @enderror" name="searchApellido"
                        value="{{ old('searchApellido') }}">

                    @error('searchApellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-light fas fa-users"></i>
                        </span>
                    </div>
                    <input placeholder="Departamento o Area" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class=" form-control text-primary @error('searchDepartamento') is-invalid @enderror"
                        name="searchDepartamento" value="{{ old('searchDepartamento') }}">

                    @error('searchDepartamento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-light fas fa-at"></i>
                        </span>
                    </div>
                    <input placeholder="País" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class=" form-control text-primary @error('searchPais') is-invalid @enderror" name="searchPais"
                        value="{{ old('searchPais') }}">

                    @error('searchPais')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-light fas fa-at"></i>
                        </span>
                    </div>
                    <input placeholder="Plaza o Puesto" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class=" form-control text-primary @error('searchPuesto') is-invalid @enderror" name="searchPuesto"
                        value="{{ old('searchPuesto') }}">

                    @error('searchPuesto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row mt-3 justify-content-around ">
                    <div class="">
                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                            {{ __('Buscar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
        <div class="accordion" id="accordionExample">
            @if ($contacts)
                @foreach ($contacts as $item)
                    <div class="card d-flex justify-content-around ">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#id{{ $item->id }}" aria-expanded="false"
                                    aria-controls="id{{ $item->id }}">
                                    {{ $item->nombre }}
                                </button>
                            </h2>
                        </div>
                        <div id="id{{ $item->id }}" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>
                                    <h2 class="media-heading">{{ $item->nombre }}</h2>
                                    <div class="job">{{ $item->subDepartamento }} | {{ $item->puesto }}</div>
                                    @if($item->correo != 'nulo')
                                        <div class="mail"><a href="{{ $item->correo }}">{{ $item->correo }}</a> </div>
                                    @endif
                                    <div class="mail"><a
                                            href="tel:{{ $item->numeroDirecto }}">{{ $item->numeroDirecto }}</a>
                                    </div>
                                    @if($item->celular != 'nulo')
                                        <div class="mail"><a href="tel:{{ $item->celular }}">{{ $item->celular }}</a> </div>
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
