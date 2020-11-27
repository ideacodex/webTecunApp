@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="mb-3 justify-content-center col-12 col-md-6  col-lg-6 offset-md-3 offset-lg-3 mb-4">
            <div class="mt-3">
                <div class=" mt-2">
                    <h1 class="text-info text-center">{{ 'Agencias' }}
                    </h1>
                </div>

                <form class="  my-lg-0">
                    <div class="input-group mb-3">
                        <input name="search" type="search" class="form-control" placeholder="Dirección o Nombre de agencia"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-6  col-lg-6 offset-md-3 offset-lg-3  mt-5">
            <ul class="list-unstyled">
                @foreach ($stores as $item)
                    <li class="media mt-3 mb-1">
                        <img src="{{ asset('img/tecun/logo.png') }}" width="10%" class="mr-3 rounded-circle">
                        <div class="media-body">
                            <h5 class="mt-0 text-primary h5">{{ $item->name }}: </h5>
                            <span class="">
                                {{ $item->address }}
                            </span>
                            <br>
                            <p>
                                {{ $item->schedule }}
                                <i class="fas fa-clock text-dark"></i>
                            </p>
                            @if($item->number)
                                <p>
                                    <a href="tel:{{ $item->number }}">{{ $item->number }}</a>
                                    <i class="fas fa-phone-volume text-dark"></i>
                                </p>
                            @endif
                            <a href="{{ $item->maps }}" class="btn btn-sm btn-block btn-outline-primary">
                                Ir...
                                <i class="fab fa-waze text-dark"></i>
                            </a>
                        </div>
                    </li> <br>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
