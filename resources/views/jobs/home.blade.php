@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid mr-6">
        <div class="mb-3 justify-content-center row ">
            <div class="col-6 col-md-6 mt-3">
                <div class="d-flex justify-content-around mt-2">
                    <h1 class="text-info">{{ 'Encontrar Empleos' }}</h1>
                </div>
                <form class="d-flex justify-content-around  my-lg-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="fas fa-briefcase text-primary"></i>
                        </span>
                    </div>
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" >
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        Buscar
                    </button>
                </form> 
            </div>
        </div>
        <div class="mt-3 col-12 col-md-6 offset-md-3 ml-0 mr-0">
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
