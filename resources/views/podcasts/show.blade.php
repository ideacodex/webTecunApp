@extends('layouts.user')
@section('content')
    <!-- blog post area start -->
    <div class="blog-details mt-2 ptb--320 pb-4">
        <div class="container">
            @if (session('message'))
                <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
                    <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 ">
                    <div class="blog-info">
                        <div class="blog-thumbnail">
                            @if (isset($podcast->featured_video))
                                <iframe width="882" height="496" src="{{ $podcast->featured_video }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            @endif
                            @if (isset($podcast->featured_spotify))
                                <iframe src="{{ $podcast->featured_spotify }}" width="100%" height="232" frameborder="0"
                                    allowtransparency="true" allow="encrypted-media">
                                </iframe>
                            @endif
                            @if (isset($podcast->featured_audio))
                                <audio src="{{ asset('/storage/podcast/' . $podcast->featured_audio) }}" preload="auto"
                                    controls>
                                </audio>

                            @endif
                        </div>
                        <div class="card">
                            <div class="card-header text-center bg-theme-2" style="border-radius: 15px; color: white">
                                <strong style="text-transform: uppercase;"
                                    class="card-title">{{ $podcast->title }}</strong>
                            </div>
                        </div>
                        <div class="blog-meta">
                            <ul>
                                <li>
                                    <div class="card">
                                        <div class="card-header sombra bg-theme-1"
                                            style="border-radius: 15px; color: white">
                                            <strong class="card-title">{{ $podcast->created_at }}</strong>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-summery">
                            <p style="text-align: justify">{{ $podcast->desciption }}</p>
                            <br>
                            <p>@php echo($podcast->content) @endphp</p>
                            <br>

                            @if (isset($podcast->featured_document))
                                <p><a href="{{ asset('/storage/posts/' . $podcast->featured_document) }}" download>
                                        Descarga aqui el documento adjunto al podcast
                                    </a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4 ">
                    <!-- comment area start -->

                    <div class="mb-3 mt-5">
                        <div class="card">
                            <div class="card-header bg-theme-2" style="border-radius: 15px; color: white">
                                <strong class="card-title">CATEGORÍAS</strong>
                            </div>
                        </div>
                        <div>
                            @foreach ($categoryName as $item)
                                <span style="color: #030d4f">
                                    <b>{{ $item->name }}</b>
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 mt-5">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header bg-theme-1" style="border-radius: 15px;" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="text-light btn btn-link btn-block text-left collapsed" type="button"
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
                                                <h4 class="alert-heading"><strong style="color: #030d4f"><i
                                                            style="color: #fa5e0a" class="fas fa-user"></i>
                                                        <b>{{ $item->user->name }}
                                                            {{ $item->user->lastname }}</b></strong>
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
                                                    <button type="submit" style="border-radius: 10px"
                                                        class="text-light btn bg-theme-1 mb-2 ml-2">COMENTAR</button>
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
