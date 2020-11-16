@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="mb-3 justify-content-center row ">
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
                    @while ((sizeof($pictures) - $countItems) >= 0)
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
                <div class="card-deck">
                    <div class="card">
                        <img src="{{ asset('img/tecun/preview2.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title" style="color:orange">Sin noticias por mostrar</h5>
                            <p class="card-text">
                            <p>Por el momento no hay ninguna noticia para mostrar</p>
                            <p>En breve uno de nuestros colaboradores posteara una noticia nueva</p><br>
                            <p>Estar atento!!!</p>
                            </p>
                        </div>
                        <div class="card-footer justify-content-around d-flex">
                            <p>Preparate para la nueva experiencia de Grupo Tecun</p>
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>
@endsection