@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        @if ($awards->first())
        <div class="mb-3 justify-content-center row ">
            <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($awards as $item)
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{$item->type_id}}"
                            class="@if($item->id == $awards->first()->id && $item->type_id == 0) active @endif"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($awards as $item)
                        <div class="carousel-item @if($item->id == $awards->first()->id && $item->type_id == 0) active @endif">
                            <img class="mx-auto d-block" src="{{asset('/storage/awards/' . $item->url_image)}}"
                            alt="imagen de perfil" width="100%" style="max-height: 300px; min-height: 300px" />
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        @endif

        <div class="mb-3 justify-content-center row ">
            <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">
                <a type="button" href="{{ url('jobs') }}" class="btn btn-lg btn-block btn-light d-flex">
                    <span class="h3"><i class="fas fa-rocket mr-3  text-success justify-content-start"></i></span>
                    <span class="ml-3 mr-3  justify-content-center h3">Oportunidades de crecimiento</span>
                    <span class="d-none badge  badge-primary text-light  justify-content-end">{{ Auth::user()->id * 25 }}
                    </span>
                </a>
                <a type="button" href="{{ url('stores') }}" class="btn btn-lg btn-block btn-light d-flex">
                    <span class="h3"><i class="fas fa-map-marked-alt mr-3 text-dark justify-content-start"></i></span>
                    <span class="ml-3 mr-3  justify-content-center h3">Ubicación de agencias</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id * 20 }}
                    </span>
                </a>
                <a type="button" class="btn btn-lg btn-block btn-light d-flex" href="{{ url('specialTeam') }}">
                    <span class="h3"><i class="fas fa-medal mr-3  justify-content-start text-danger"></i></span>
                    <span class="ml-3 mr-3  justify-content-center h3">Colaboradores Destacados</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>
                <a type="button" class="btn btn-lg btn-block btn-light d-flex" href="{{ url('contact/home') }}">
                    <span class="h3"><i class="fas fa-phone mr-3  justify-content-start text-info"></i></span>
                    <span class="ml-3 mr-3  justify-content-center h3">LLama Directo</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>

                <a type="button" class="btn btn-lg btn-block btn-light d-flex" href="{{ url('procesos') }}">
                    <span class="h3"><i class="fas fa-mail-bulk mr-3  justify-content-start text-dark"></i></span>
                    <span class="ml-3 mr-3  justify-content-center h3">Gestiones RRHH</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>
            </div>
        </div>
    </div>

@endsection
