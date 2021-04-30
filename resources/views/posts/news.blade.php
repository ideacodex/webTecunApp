@extends('layouts.user')

@section('content')
    @if (session('message'))
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show ">
            <span
                class="animate__heartBeat badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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

        .letrasPublicaciones {
            font-size: 18px;
            font-family: Arial;
            color: {{ config('app.bg-theme-1') }};
        }

        .imagenPublicaciones {
            margin: auto;
            width: 250px;
            max-height: 250px;
            border-radius: 25px;
            border: 2px solid {{ config('app.bg-theme-1') }};
        }

        .btnLike {
            background-color: none;
            color: rgb(0, 89, 255);

        }

        /* si  no le doy like */
        .btnLikeNone {
            animation: beat 1s infinite alternate;
        }
        .btnLikeNone:hover {
            font-size: 20px;
            color: rgb(0, 89, 255);
        }

        /*  beat animacion */
        @keyframes beat {
            to {
                transform: scale(1.2);
            }
        }

    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">

            {{-- Select de categosias --}}
            @if ($categories->first())
                <div class="col-12 col-lg-7 col-md-7 col-sm-7 col-xs-7">

                    <form>
                        <select name="area" onChange="location = form.area.options[form.area.selectedIndex].value;"
                            class="selectCategoria">
                            <option value="{{ url('home') }}">Seleccione una Categoría</option>
                            @foreach ($categories as $item)
                                <option value="{{ url('category/post/' . $item->id) }}" title="{{ $item->name }}">
                                    ⚙️ {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                </div>
            @endif
            {{-- noticias --}}
            @if (sizeof($posts) >= 1)
                <div class="container-fluid">
                    <div class="row mt-2">
                        @foreach ($posts as $item)
                            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-2">
                                <div class="card">
                                    {{-- imagen --}}
                                    <img src="{{ asset('/storage/posts/' . $item->featured_image) }}"
                                        class="imagenPublicaciones">
                                    <div class="card-body">
                                        {{-- Titulo --}}
                                        <h5 class="card-title letrasPublicaciones">
                                            {{ $item->title }}
                                        </h5>
                                        {{-- description --}}
                                        <p class="card-text">
                                            {{ $item->description }}
                                            <a href="{{ url('newsRead/' . $item->id) }}">
                                                <span class="text-primary">
                                                    Leer más
                                                    <i class="fas fa-book-reader"></i>
                                                </span>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="card-footer justify-content-around d-flex">
                                        {{-- like --}}
                                        <input type="hidden" name="active"
                                            value="{{ $reactionActive = $item->likes->where('user_id', auth()->user()->id)->first() }} ">
                                        @if (!$item->userLikesNew)
                                            {{-- si yo no le doy like --}}
                                            <form method="POST" action="{{ url('likeordislike') }}"
                                                onsubmit="return checkSubmit();">
                                                @csrf
                                                <input type="hidden" name="postID" value="{{ $item->id }}">
                                                <input type="hidden" name="reactionActive" id="reactionActive" value="0">
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
                                                <form method="POST" action="{{ url('likeordislike') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="postID" value="{{ $item->id }}">
                                                    <input type="hidden" name="reactionActive" id="reactionActive"
                                                        value="1">
                                                    <button type="submit" class="btn btn-lg btnLike ">
                                                        <h4 class="animate__heartBeat">
                                                            <i
                                                                class="far fa-thumbs-up "></i>({{ $item->likes->where('active', 1)->count() }})
                                                        </h4>
                                                    </button>
                                                </form>
                                            @else
                                                {{-- inectivo --}}
                                                <form method="POST" action="{{ url('likeordislike') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="postID" id="postID"
                                                        value="{{ $item->id }}">
                                                    <input type="hidden" name="reactionActive" id="reactionActive"
                                                        value="0">
                                                    <button type="submit" class="btn btn-lg">
                                                        <h4 class="animate__heartBeat">
                                                            <i
                                                                class="far fa-thumbs-up "></i>({{ $item->likes->where('active', 1)->count() }})
                                                        </h4>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                        {{-- fecha --}}
                                        <span> {{ $item->created_at->format('d-m-Y') }} </span>
                                        {{-- comentarios --}}
                                        <span class="text-primary">
                                            <i class="fas fa-comment"></i>
                                            <a href="{{ url('newsRead/' . $item->id) }}">Comentarios</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
