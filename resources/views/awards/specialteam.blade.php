@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="mb-3 justify-content-center row ">
            @if ($awards->first())
                @if ($awards->where('type_id', 0)->first())
                    <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($awards->where('type_id', 0) as $item)
                                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $item->type_id }}"
                                        class=" @if ($item->id == $awards->where('type_id',
                                        0)->first()->id && $item->type_id == 0) active @endif"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($awards->where('type_id', 0) as $item)
                                    <div class="carousel-item @if ($item->id ==
                                        $awards->where('type_id', 0)->first()->id && $item->type_id == 0) active @endif">
                                        <img class="mx-auto d-block"
                                            src="{{ asset('/storage/awards/' . $item->url_image) }}" alt="imagen de perfil"
                                            width="100%" style="max-height: 300px; min-height: 300px" />
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                @endif
                @if ($awards->where('type_id', 1)->first())
                    <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
                        <div id="carousel2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($awards->where('type_id', 1) as $item)
                                    <li data-target="#carousel2" data-slide-to="{{ $item->type_id }}"
                                        class=" @if ($item->id == $awards->first()->id)
                                        active @endif"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($awards->where('type_id', 1) as $item)
                                    <div class="carousel-item @if ($item->id ==
                                        $awards->where('type_id', 1)->first()->id) active @endif">
                                        <img class="mx-auto d-block"
                                            src="{{ asset('/storage/awards/' . $item->url_image) }}" alt="imagen de perfil"
                                            width="100%" style="max-height: 300px; min-height: 300px" />
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                @endif
            @else
                <div class="container">
                    <div class="row justify-content-around mt-5" style="margin-top:15em">
                        <img src="{{ asset('img/not-found.png') }}" class="img-fluid" style="max-height: 300px;">
                    </div>

                    <div class="row justify-content-around mt-5">
                        <p class="h1 text-primary">Vaya</p>
                    </div>
                    <div class="row justify-content-around mt-1">
                        <p class="h5 text-primary">No hay publicaciones</p>
                    </div>
                    <div class="row justify-content-center mt-1">
                        <span class="text-primary"> ...</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
