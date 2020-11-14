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
                        <a class="nav-link" href="{{ url('news') }}"><span
                                class="text-light font-weight-bold">Artes</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-12 mt-1">
                <div class="form-group row">
                    <div class="col-12 pl-0 pr-0">
                        <div class="">
                            <div class="dropdown flatmenu bg-secondary">
                                <div class="btn btn-dark btn-block btn-lg dropdown-toggle text-justify" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span>Selecionar Categoría</span>
                                </div>
                                <div class="dropdown-menu w-100 bg-secondary" aria-labelledby="dropdownMenuButton">
                                    @foreach ($categories as $item)
                                        <a class="dropdown-item bg-secondary text-light" title="{{ $item->name }}"
                                            onclick="event.preventDefault();
                                                                    document.getElementById('formDel{{ $item->id }}').submit();">
                                            {{ $item->name }}
                                        </a>
                                        <form id="formDel{{ $item->id }}"
                                            action="{{ url('category/post/' . $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('message'))
                <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
                    <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (sizeof($posts) >= 1)
                @if ($posts->count() <= 3)
                    <div class="card-deck">
                        @foreach ($posts as $item)
                            <div class="card">
                                <img src="{{ asset('/storage/posts/' . $item->featured_image) }}" width="100%"
                                    style="max-height: 400px">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:orange">{{ $item->title }}</h5>
                                    <p class="card-text">
                                        {{ $item->description }}
                                        <a href="{{ url('newsRead/' . $item->id) }}" class="">
                                            <span class="text-primary">
                                                Leer más
                                                <i class="fas fa-book-reader"></i>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                                <div class="card-footer justify-content-around d-flex">
                                    <input type="hidden" name="active"
                                        value="{{ $reactionActive = $item->likes->where('user_id', auth()->user()->id)->first() }} ">
                                    @if ($item->userLikesNew->count() == 0)
                                        <form method="POST" action="{{ url('likeordislike') }}"
                                            onsubmit="return checkSubmit();">
                                            @csrf
                                            <input type="hidden" name="postID" value="{{ $item->id }}">
                                            <input type="hidden" name="reactionActive" id="reactionActive" value="0">
                                            <button type="submit" class="btn btn-lg">
                                                <h4><i
                                                        class="far fa-thumbs-up"></i>({{ $item->likes->where('active', 1)->count() }})
                                                </h4>
                                            </button>
                                        </form>
                                    @else
                                        @if ($reactionActive->active == 1)
                                            <form method="POST" action="{{ url('likeordislike') }}"
                                                onsubmit="return checkSubmit();">
                                                @csrf
                                                <input type="hidden" name="postID" value="{{ $item->id }}">
                                                <input type="hidden" name="reactionActive" id="reactionActive" value="1">
                                                <button type="submit" class="btn btn-lg btn-primary ">
                                                    <h4>
                                                        <i
                                                            class="far fa-thumbs-up"></i>({{ $item->likes->where('active', 1)->count() }})
                                                    </h4>
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ url('likeordislike') }}"
                                                onsubmit="return checkSubmit();">
                                                @csrf
                                                <input type="hidden" name="postID" id="postID" value="{{ $item->id }}">
                                                <input type="hidden" name="reactionActive" id="reactionActive" value="0">
                                                <button type="submit" class="btn btn-lg">
                                                    <h4>
                                                        <i
                                                            class="far fa-thumbs-up"></i>({{ $item->likes->where('active', 1)->count() }})
                                                    </h4>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                    <span> {{ $item->created_at->format('d-m-Y') }} </span>
                                    <span class="text-muted">
                                    </span>
                                    <span class="text-primary">
                                        <i class="fas fa-comment"></i>
                                        <a href="{{ url('newsRead/' . $item->id) }}">Comentarios</a>
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
                    @while (sizeof($posts) - $countItems >= 0)
                        <div class="card-deck mt-3">
                            @for ($i = 3; $i > 0; $i--)
                                <div class="card">
                                    <img src="{{ asset('/storage/posts/' . $posts[$countItems - $i]->featured_image) }}"
                                        width="100%" style="max-height: 400px">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color:orange">{{ $posts[$countItems - $i]->title }}
                                        </h5>
                                        <p class="card-text">
                                            {{ $posts[$countItems - $i]->description }}
                                            <a href="{{ url('newsRead/' . $posts[$countItems - $i]->id) }}" class="">
                                                <span class="text-primary">
                                                    Leer más
                                                    <i class="fas fa-book-reader"></i>
                                                </span>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="card-footer justify-content-around d-flex">
                                        <input type="hidden" name="active"
                                            value="{{ $reactionActive = $posts[$countItems - $i]->likes->where('user_id', auth()->user()->id)->first() }} ">
                                        @if ($posts[$countItems - $i]->userLikesNew->count() == 0)
                                            <form method="POST" action="{{ url('likeordislike') }}"
                                                onsubmit="return checkSubmit();">
                                                @csrf
                                                <input type="hidden" name="postID"
                                                    value="{{ $posts[$countItems - $i]->id }}">
                                                <input type="hidden" name="reactionActive" id="reactionActive" value="0">
                                                <button type="submit" class="btn btn-lg">
                                                    <h4><i
                                                            class="far fa-thumbs-up"></i>({{ $posts[$countItems - $i]->likes->where('active', 1)->count() }})
                                                    </h4>
                                                </button>
                                            </form>
                                        @else
                                            @if ($reactionActive->active == 1)
                                                <form method="POST" action="{{ url('likeordislike') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="postID"
                                                        value="{{ $posts[$countItems - $i]->id }}">
                                                    <input type="hidden" name="reactionActive" id="reactionActive"
                                                        value="1">
                                                    <button type="submit" class="btn btn-lg btn-primary ">
                                                        <h4>
                                                            <i
                                                                class="far fa-thumbs-up"></i>({{ $posts[$countItems - $i]->likes->where('active', 1)->count() }})
                                                        </h4>
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ url('likeordislike') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="postID" id="postID"
                                                        value="{{ $posts[$countItems - $i]->id }}">
                                                    <input type="hidden" name="reactionActive" id="reactionActive"
                                                        value="0">
                                                    <button type="submit" class="btn btn-lg">
                                                        <h4>
                                                            <i
                                                                class="far fa-thumbs-up"></i>({{ $posts[$countItems - $i]->likes->where('active', 1)->count() }})
                                                        </h4>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                        <span> {{ $posts[$countItems - $i]->created_at->format('d-m-Y') }} </span>
                                        <span class="text-muted">
                                        </span>
                                        <span class="text-primary">
                                            <i class="fas fa-comment"></i>
                                            <a href="{{ url('newsRead/' . $posts[$countItems - $i]->id) }}">Comentarios</a>
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
