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
            <!-- blog details area start -->
            <div class="blog-info">
                <div class="blog-thumbnail">
                    <iframe width="882" height="496" src="{{ $podcast->featured_video }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                    <br>
                    <iframe src="https://open.spotify.com/embed-podcast/episode/2KEjuwECqFvmneRncRwrO6" 
                            width="100%" height="232" 
                            frameborder="0" 
                            allowtransparency="true" 
                            allow="encrypted-media">
                    </iframe>
                </div>
                <h1 class="blog-title text-center">{{ $podcast->title }}</h1>
                <div class="blog-meta">
                    <ul>
                        <li><i class="fa fa-calendar"></i>{{ $podcast->created_at }}</li>
                    </ul>
                </div>
                <div class="blog-summery">
                    <p>{{ $podcast->desciption }}</p>
                    <br>
                    <p>@php echo($podcast->content) @endphp</p>
                    <br>

                    @if(isset($podcast->featured_audio))
                        <audio src="{{ asset('/storage/podcast/' . $podcast->featured_audio) }}" 
                            preload="auto" controls>
                        </audio>

                    @endif

                    @if(isset($podcast->featured_document))
                        <p><a href="{{ asset('/storage/posts/' . $podcast->featured_document) }}" download>
                            Descarga aqui el documento adjunto al podcast
                        </a></p>
                    @endif

                    <div class="blog-single-tags">
                        <h2>Categorias</h2>
                        <div>
                            @foreach ($categoryName as $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- comment area start -->
            <div class="comment-area pb-5">
                <div class="comment-title">
                    <h4>Comentarios de la publicacion <span>({{ $comments->count() }})</span></h4>
                </div>
                <ul class="comment-list">
                    <li class="comment-info-inner">
                        @foreach ($comments as $item)
                            <article>
                                <div class="comment-author">
                                    <img src="{{ asset('/storage/userComment.jpg') }}" alt="image">
                                    <h2>{{ $item->user->name }} {{ $item->user->lastname }}</h2>
                                </div>
                                <div class="comment-content">
                                    <p>{{ $item->message }}</p>
                                    @if(auth()->check() && ($item->user_id == auth()->user()->id))
                                        <a href="{{ url('commentDeletepodcast/'. $item->id) }}" class="btn btn-sm btn-danger">
                                            Eliminar
                                        </a>
                                    @endif
                                </div>
                                <div class="comment-reply">
                                    <a href="#"><i class="fa fa-reply"></i></a>
                                </div>
                            </article>
                        @endforeach
                    </li>
                </ul>
            </div>
            <!-- comment area end -->
            <!-- leave comment area start -->
            @auth
                <div class="leave-comment">
                    <div class="comment-title">
                        <h4>Envia un comentario</h4>
                    </div>
                    <div class="row">
                        <form method="POST" action="{{ url('commentpodcast') }}" onsubmit="return checkSubmit();">
                            @csrf
                            <div class="blog-details mt-2 ptb--320 pb-4">
                                <input type="hidden" name="podcastID" value="{{ $podcast->id }}" >
                                <textarea id="message" name="message" placeholder="Mensaje" type="text" size="100"
                                    maxlength="100" class="text-primary form-control @error('message') is-invalid @enderror"
                                    message="message" value="{{ old('message') }}" autocomplete="Comentario" required autofocus></textarea>

                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-md-6 mb-5 ml-4">
                                <button type="submit" class=" btn btn-success btn-lg">
                                    {{ __('Publicar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endauth
            <!-- leave comment area end -->
            <!-- blog details area end -->
        </div>
    </div>
    <!-- blog post area end -->
@endsection