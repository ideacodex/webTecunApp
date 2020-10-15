@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="mb-3 justify-content-center row ">
        <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($awards->where('type_id', 0) as $item)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$item->id}}"
                        class="@if($item->id == $awards->first()->id) active @endif"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($awards->where('type_id',1) as $item)
                    <div class="carousel-item @if($item->id == $awards->first()->id) active @endif">
                        <img class="mx-auto d-block" src="{{asset('/storage/awards/' . $item->url_image)}}"
                            alt="imagen de perfil" width="100%" style="max-height: 300px; min-height: 300px">
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
        <div class="col col-12 col-md-6 mt-1" style="padding-right:2px; padding-left:2px;">
            <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($awards as $item)
                    <li data-target="#carouselExampleCaptions1" data-slide-to="{{$item->id}}"
                        class="@if($item->id == $awards->first()->id) active @endif"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($awards as $item)
                    <div class="carousel-item @if($item->id == $awards->first()->id) active @endif">
                        <img class="mx-auto d-block" src="{{asset('/storage/awards/' . $item->url_image)}}"
                            alt="imagen de perfil" width="100%" style="max-height: 300px; min-height: 300px">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection