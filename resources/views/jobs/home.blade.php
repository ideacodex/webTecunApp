@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid mr-6">
        <div class="mb-3 justify-content-center col-12 col-md-6  col-lg-6 offset-md-3 offset-lg-3 mb-4">
            <div class="mt-3">
                <div class=" mt-2">
                    <h1 class="text-info text-center">{{ 'Empleos' }}
                    </h1>
                </div>

                <form class="  my-lg-0">
                    <div class="input-group mb-3">
                        <input name="search" type="search" class="form-control" placeholder="Dirección o Nombre de agencia"
                            aria-label="Titulo o descipción" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-3 col-12 col-md-6 offset-md-3">
            <ul class="list-unstyled">
                @foreach ($jobs as $items)
                    <li class="media">
                        <img src="{{ asset('img/tecun/logo.png') }}" width="10%" class="mr-3 rounded-circle">
                        <div class="media-body">
                            <h5 class="mt-0 text-primary h5">{{ $items->title }}</h5>
                            <span class="">
                                {{ $items->description }}
                                <a href="{{ url('job/' . $items->id) }}" class="text-primary">
                                    Aplicar...
                                    <i class="fas fa-user-tie text-dark#"></i>
                                </a>
                                </p>
                            </span>
                            <br>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
