@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid mr-6">
        <div class="mb-3 justify-content-center row ">
            <div class="col-6 col-md-6 mt-3">
                <div class="d-flex justify-content-around mt-2">
                    <h1 class="text-info">{{ 'Buscar contacto' }}</h1>
                </div>
                <form class="d-flex justify-content-around  my-lg-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="fas fa-briefcase text-primary"></i>
                        </span>
                    </div>
                    <input name="searchDepartamento" class="form-control mr-sm-2" type="search" 
                        placeholder="Por departamento" 
                        aria-label="Search">
                    <input name="searchNombre" class="form-control mr-sm-2" type="search" 
                        placeholder="Por nombre" 
                        aria-label="Search">
                    <input name="searchPais" class="form-control mr-sm-2" type="search" 
                        placeholder="Por pais" 
                        aria-label="Search">
                    <input name="searchPuesto" class="form-control mr-sm-2" type="search" 
                        placeholder="Por puesto" 
                        aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        Buscar
                    </button>
                </form> 
            </div>
        </div>
        <div class="mt-3 col-12 col-md-6 offset-md-3 ml-0 mr-0">
            <ul class="list-unstyled">
                {{ $contacts->links() }}
                @foreach ($contacts as $items)
                    <li class="media">
                            <img src="{{ asset('storage/userComment.jpg') }}" width="10%" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5 class="mt-0 text-primary h5">{{ $items->departamento }}</h5>
                                <span class="">
                                    <p>{{ $items->nombre }}</p>
                                    <p>{{ $items->subDepartamento }}</p>
                                    <p>{{ $items->puesto }}</p>
                                    <p>{{ $items->numeroDirecto }}</p>
                                    <p>{{ $items->extension }}</p>
                                    <p>{{ $items->celular }}</p>
                                    <p>{{ $items->correo }}</p>
                                    <p>{{ $items->asistente }}</p>
                                    <p>{{ $items->extensionAsistente }}</p>
                                    <p>{{ $items->pais }}</p>
                                    <p>{{ $items->empresa }}</p>
                                    <p>{{ $items->comentarios }}</p>
                                    <p>{{ $items->mailGeneral }}</p>
                                </span>
                                <br>
                            </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
