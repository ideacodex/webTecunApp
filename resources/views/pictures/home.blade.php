@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="mb-3 justify-content-center row ">
            <div class="bg-theme-1 col-12 mt-1">

                <ul class="nav nav-pills nav-fill nav-justified">
                    <li class="nav-item animate__animated animate__pulse">
                        <a class="nav-link" href="{{ url('news') }}"><span
                                class="text-light font-weight-bold ">Noticias</span></a>
                    </li>
                    <li class="nav-item animate__animated animate__pulse">
                        <a class="nav-link" href="{{ url('podcasts') }}"><span
                                class="text-light font-weight-bold">Podcast</span></a>
                    </li>
                    <li class="nav-item animate__animated animate__pulse">
                        <a class="nav-link" href="{{ url('/artes') }}"><span
                                class="text-light font-weight-bold">Artes</span></a>
                    </li>
                </ul>
            </div>
            @if (sizeof($pictures) >= 1)
                @if ($pictures->count() <= 3)
                    <div class="card-deck">
                        @foreach ($pictures as $item)
                            <div class="card">
                                <img src="{{ asset('/storage/podcast/' . $item->featured_image) }}" width="100%"
                                    style="max-height: 200px">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:orange">{{ $item->title }}</h5>
                                    <p class="card-text">
                                        {{ $item->description }}
                                        <a href="{{ url('podcastRead/' . $item->id) }}" class="">
                                            <span class="text-primary">
                                                Leer más
                                                <i class="fas fa-book-reader"></i>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                                <div class="card-footer justify-content-around d-flex">
                                    <span> {{ $item->created_at->format('d-m-Y') }} </span>
                                    <span class="text-muted">
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    @php
                    $countItems=3;
                    $j=0;
                    @endphp
                    @while (sizeof($pictures) - $countItems >= 0)
                        <div class="card-deck mt-3">
                            @for ($i = 3; $i > 0; $i--)
                                <div class="card">
                                    <img src="{{ asset('/storage/pictures/' . $pictures[$countItems - $i]->featured_image) }}"
                                        width="100%" style="max-height: 200px">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color:orange">{{ $pictures[$countItems - $i]->title }}
                                        </h5>
                                        <p class="card-text">
                                        </p>
                                    </div>
                                    <div class="card-footer justify-content-around d-flex">
                                        <span> {{ $pictures[$countItems - $i]->created_at->format('d-m-Y') }} </span>
                                        <span class="text-muted">
                                        </span>
                                    </div>
                                </div>
                            @endfor
                            @php
                            $countItems=$countItems+3;
                            @endphp
                        </div>
                    @endwhile
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
                        <p class="h5 text-primary">Aun no hay publicaciones</p>
                    </div>
                    <div class="row justify-content-center mt-1">
                        <span class="text-primary"> ...</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
