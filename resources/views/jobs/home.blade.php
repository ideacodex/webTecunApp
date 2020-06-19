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
            @foreach ($jobs as $item)
            <li class="media">
                <img src="{{asset('img/tecun/logo.png')}}" width="10%" class="mr-3 rounded-circle">
                <div class="media-body">
                    <h5 class="mt-0 text-primary h5">{{$item->title}}: </h5>
                    <span class="">
                        {{$item->description}}
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
            @endforeach
        </ul>
    </div>
</div>


@endsection