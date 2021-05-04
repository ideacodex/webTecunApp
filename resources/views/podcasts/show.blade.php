@extends('layouts.user')
@section('content')
    @if (session('message'))
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <style>
        .categoriasEtiquetas {

            border-radius: 10px;
            color: {{ config('app.bg-theme-2') }};
        }

        .categoriasTitulo {
            border-radius: 15px;
            color: white;
            padding: 4%;
            height: 47px;
            background: {{ config('app.bg-theme-2') }};


        }

        .downloadDocPost {
            background: {{ config('app.bg-theme-2') }};

        }
        .downloadDocPost:hover {
            font-size: 18px;
            background: white;

        }

        .text-theme-1 {
            color: {{ config('app.bg-theme-1') }};
        }
        .text-theme-1:hover {
            color: {{ config('app.bg-theme-2') }};
        }

        .tituloPodcast {
            border-radius: 15px;
            color: white;
            background: {{ config('app.bg-theme-2') }};

        }
        .Archivo-Audio-mp3{
            background: rgb(0, 0, 224);
            width: 100%;
        }
        .fechaPodcastEstyle {
            color: {{ config('app.bg-theme-1') }};
        }
        .fechaPodcastEstyle-icon {
            color: {{ config('app.bg-theme-2') }};
        }
    </style>

    <!-- blog post area start -->
    <div class="blog-details mt-2 ptb--320 pb-4">
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 ">
                    <div class="blog-info">
                        <div class="blog-thumbnail">
                            {{-- youtube --}}
                            @if (isset($podcast->featured_video))
                                <iframe width="100%" height="400" src="{{ $podcast->featured_video }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            @endif
                            {{-- spotify --}}
                            @if (isset($podcast->featured_spotify))
                                <iframe src="{{ $podcast->featured_spotify }}" width="100%" height="232" frameborder="0"
                                    allowtransparency="true" allow="encrypted-media">
                                </iframe>
                            @endif
                            {{-- Audio mp3 --}}
                            @if (isset($podcast->featured_audio))
                                <audio src="{{ asset('/storage/podcast/' . $podcast->featured_audio) }}" preload="auto"
                                    controls class="Archivo-Audio-mp3">
                                </audio>

                            @endif
                        </div>
                        <h1 class="blog-title text-center tituloPodcast card-header ">{{ $podcast->title }}</h1>
                        <div class="blog-meta">
                            <ul>
                                <li><i class="fa fa-calendar fechaPodcastEstyle-icon"></i>
                                 <span class="fechaPodcastEstyle">
                                    {{ $podcast->created_at }}
                                 </span>
                                  
                                </li>
                            </ul>
                        </div>
                        <div class="blog-summery">
                            <p style="text-align: justify">{{ $podcast->desciption }}</p>
                            <br>
                            <p>@php echo($podcast->content) @endphp</p>
                            <br>

                            @if (isset($podcast->featured_document))
                                <p class="downloadDocPost">
                                    <a class=" text-theme-1 "
                                        href="{{ asset('/storage/posts/' . $podcast->featured_document) }}" download>
                                        Descarga aqui el documento adjunto al podcast
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4 ">
                    <!-- comment area start -->

                    <div class="mb-3 mt-5">
                        <h2 class=" categoriasTitulo">CATEGORÍAS</h2>
                        <div>
                            @foreach ($categoryName as $item)
                                <span class="border border-secondary categoriasEtiquetas">
                                    {{ $item->name }}
                                </span>

                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 mt-5">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header bg-theme-1" style="border-radius: 15px;" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn text-light btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            COMENTARIOS ({{ $comments->count() }})
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">

                                        @foreach ($comments as $item)
                                            <div class="alert alert-light" role="alert">
                                                <h4 class="alert-heading"><strong><i class="fas fa-user"></i>
                                                        {{ $item->user->name }} {{ $item->user->lastname }}</strong>
                                                </h4>
                                                <hr>
                                                <img src="{{ asset('img/comments.png') }}" alt="">
                                                <p class="mb-0">{{ $item->message }}
                                                    @if (auth()->check() && $item->user_id == auth()->user()->id)
                                                        <a href="{{ url('commentpodcast/' . $item->id) }}"
                                                            class="rounded-circle btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    @endif
                                                </p>

                                            </div>
                                        @endforeach

                                        @auth
                                            <div class="mb-5">
                                                <form class="form-inline" method="POST" action="{{ url('commentpodcast') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="podcastID" value="{{ $podcast->id }}">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <textarea name="message" id="message" rows="1"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn bg-theme-1 text-light mb-2 ml-2"
                                                        style="border-radius: 10px">COMENTAR</button>
                                                </form>
                                            </div>

                                        @endauth

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- blog details area start -->
        </div>
    </div>
    <!-- blog post area end -->
@endsection
