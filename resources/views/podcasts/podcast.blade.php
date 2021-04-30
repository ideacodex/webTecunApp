@extends('layouts.user')

@section('content')
    <style>
        .dropdown-toggle::after {}

        .firefox.dropdown-toggle::after {
            text-align: right;
            float: right;
            /*Firefox fix*/
            margin-top: -12px;
        }

        .chrome.dropdown-toggle::after {
            text-align: right;
            float: right;
            /*Chrome IE fix*/
            margin-top: 8px;
        }

    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">

            @if ($categories->first())
                <div class="col-12 col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <form>
                        <select name="area" onChange="location = form.area.options[form.area.selectedIndex].value;"
                            class="selectCategoria">
                            <option value="{{ url('home') }}">Seleccione una Categoría</option>
                            @foreach ($categories as $item)
                                <option value="{{ url('category/podcast/' . $item->id) }}" title="{{ $item->name }}">
                                    ⚙️ {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            @endif

            @if (sizeof($podcasts) >= 1)
                @if ($podcasts->count() <= 3)
                    <div class="container-fluid">
                        <div class="row mt-2 justify-content-center">
                            @foreach ($podcasts as $item)
                                <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-2">
                                    <div class="card contornoNew">
                                        {{-- imagen --}}
                                        <img src="{{ asset('/storage/podcast/' . $item->featured_image) }}"
                                            class="imagenPublicaciones">
                                        {{-- cuerpo de la publicacion --}}
                                        <div class="card-body">
                                            {{-- Titulo --}}
                                            <div class="card-title">
                                                <span class="letrasPublicaciones">
                                                    {{ $item->title }}
                                                </span>
                                                <br>
                                                {{-- fecha --}}
                                                <span class="fechaPublicacion">
                                                    {{ $item->created_at->format('d-m-Y') }}
                                                </span>
                                                <span style="font-size: 10px">
                                                    •
                                                </span>
                                                <span class="fechaPublicacion">
                                                    <i class="fas fa-globe-americas"></i>
                                                </span>
                                            </div>
                                            {{-- description --}}
                                            <p class="card-text">
                                                {{ $item->description }}
                                                <a href="{{ url('podcastRead/' . $item->id) }}">
                                                    <span class="text-primary">
                                                        Leer más
                                                        <i class="fas fa-book-reader"></i>
                                                    </span>
                                                </a>
                                            </p>
                                        </div>
                                        {{-- pie de publicacion --}}

                                        {{-- pie de pagina --}}
                                        <div class="card-footer justify-content-around d-flex">
                                            {{-- like --}}
                                            <input type="hidden" name="active"
                                                value="{{ $reactionActive = $item->likes->where('user_id', auth()->user()->id)->first() }} ">

                                            @if (!$item->userLikesNew)
                                                <form method="POST" action="{{ url('likeordislikepodcast') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="podcastID" value="{{ $item->id }}">
                                                    <input type="hidden" name="reactionActive" id="reactionActive"
                                                        value="0">
                                                    <button type="submit" class="btn btn-lg">
                                                        <h4 class="animate__heartBeat">
                                                            <i
                                                                class="far fa-thumbs-up btnLikeNone"></i>({{ $item->likes->where('active', 1)->count() }})
                                                        </h4>
                                                    </button>
                                                </form>
                                            @else

                                                @if ($reactionActive->active == 1)
                                                    {{-- si yo le doy like --}}
                                                    <form method="POST" action="{{ url('likeordislikepodcast') }}"
                                                        onsubmit="return checkSubmit();">
                                                        @csrf
                                                        <input type="hidden" name="podcastID" value="{{ $item->id }}">
                                                        <input type="hidden" name="reactionActive" id="reactionActive"
                                                            value="1">
                                                        <button type="submit" class="btn btn-lg btnLike ">
                                                            <h4 class="animate__heartBeat">
                                                                <i
                                                                    class="far fa-thumbs-up"></i>({{ $item->likes->where('active', 1)->count() }})
                                                            </h4>
                                                        </button>
                                                    </form>
                                                @else
                                                    {{-- inactivo --}}
                                                    <form method="POST" action="{{ url('likeordislikepodcast') }}"
                                                        onsubmit="return checkSubmit();">
                                                        @csrf
                                                        <input type="hidden" name="podcastID" id="podcastID"
                                                            value="{{ $item->id }}">
                                                        <input type="hidden" name="reactionActive" id="reactionActive"
                                                            value="0">
                                                        <button type="submit" class="btn btn-lg">
                                                            <h4 class="animate__heartBeat">
                                                                <i
                                                                    class="far fa-thumbs-up"></i>({{ $item->likes->where('active', 1)->count() }})
                                                            </h4>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            {{-- comentarios --}}
                                            <span class="text-primary">
                                                <i class="fas fa-comment"></i>
                                                <a href="{{ url('podcastRead/' . $item->id) }}">Comentarios</a>
                                            </span>

                                        </div>

                                    </div>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    @php
                        $countItems = 3;
                        $j = 0;
                    @endphp
                    @while (sizeof($podcasts) - $countItems >= 0)
                        <div class="card-deck mt-3">
                            @for ($i = 3; $i > 0; $i--)
                                <div class="card">
                                    <img src="{{ asset('/storage/podcast/' . $podcasts[$countItems - $i]->featured_image) }}"
                                        width="100%" style="max-height: 200px">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color:orange">
                                            {{ $podcasts[$countItems - $i]->title }}
                                        </h5>
                                        <p class="card-text">
                                            {{ $podcasts[$countItems - $i]->description }}
                                            <a href="{{ url('podcastRead/' . $podcasts[$countItems - $i]->id) }}"
                                                class="">
                                                <span class="text-primary">
                                                    Leer más
                                                    <i class="fas fa-book-reader"></i>
                                                </span>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="card-footer justify-content-around d-flex">
                                        <input type="hidden" name="active"
                                            value="{{ $reactionActive = $podcasts[$countItems - $i]->likes->where('user_id', auth()->user()->id)->first() }} ">
                                        @if (!$podcasts[$countItems - $i]->userLikesNew)
                                            <form method="POST" action="{{ url('likeordislikepodcast') }}"
                                                onsubmit="return checkSubmit();">
                                                @csrf
                                                <input type="hidden" name="podcastID"
                                                    value="{{ $podcasts[$countItems - $i]->id }}">
                                                <input type="hidden" name="reactionActive" id="reactionActive" value="0">
                                                <button type="submit" class="btn btn-lg">
                                                    <h4><i
                                                            class="far fa-thumbs-up"></i>({{ $podcasts[$countItems - $i]->likes->where('active', 1)->count() }})
                                                    </h4>
                                                </button>
                                            </form>
                                        @else
                                            @if ($reactionActive->active == 1)
                                                <form method="POST" action="{{ url('likeordislikepodcast') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="podcastID"
                                                        value="{{ $podcasts[$countItems - $i]->id }}">
                                                    <input type="hidden" name="reactionActive" id="reactionActive"
                                                        value="1">
                                                    <button type="submit" class="btn btn-lg btn-primary ">
                                                        <h4>
                                                            <i
                                                                class="far fa-thumbs-up"></i>({{ $podcasts[$countItems - $i]->likes->where('active', 1)->count() }})
                                                        </h4>
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ url('likeordislikepodcast') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="podcastID" id="podcastID"
                                                        value="{{ $podcasts[$countItems - $i]->id }}">
                                                    <input type="hidden" name="reactionActive" id="reactionActive"
                                                        value="0">
                                                    <button type="submit" class="btn btn-lg">
                                                        <h4>
                                                            <i
                                                                class="far fa-thumbs-up"></i>({{ $podcasts[$countItems - $i]->likes->where('active', 1)->count() }})
                                                        </h4>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                        <span> {{ $podcasts[$countItems - $i]->created_at->format('d-m-Y') }} </span>
                                        <span class="text-muted">
                                        </span>
                                        <span class="text-primary">
                                            <i class="fas fa-comment"></i>
                                            <a
                                                href="{{ url('podcastRead/' . $podcasts[$countItems - $i]->id) }}">Comentarios</a>
                                        </span>
                                    </div>
                                </div>
                            @endfor
                            @php
                                $countItems = $countItems + 3;
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
