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
                <!-- blog details area start -->
                <div class="col-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
                    <div class="blog-info">
                        <div class="blog-thumbnail">
                            <img src="{{ asset('/storage/posts/' . $post->featured_image) }}" width="100%"
                                style="max-height: 300px">
                        </div>
                        <h2 class="blog-title"><a href="blog-details.html">{{ $post->title }}</a></h2>
                        <div class="blog-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i>{{ $post->created_at }}</li>
                            </ul>
                        </div>
                        <div class="blog-summery">
                            <p>{{ $post->desciption }}</p>
                            <br>
                            <p>@php echo($post->content) @endphp</p>
                            <br>

                            <video width="100%" style="max-height: 300px" controls loop>
                                <source src="{{ asset('/storage/posts/' . $post->featured_video) }}" type="video/mp4">
                            </video>

                            <a href="{{ asset('/storage/posts/' . $post->featured_document) }}" download>
                                Descarga el Pdf con las sugerencias para el agronomo
                            </a>

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
                            <h4>Visitor Comments <span>(03)</span></h4>
                        </div>
                        <ul class="comment-list">
                            <li class="comment-info-inner">
                                <article>
                                    @foreach ($comments as $items)
                                        <div class="comment-author">
                                            <img src="assets/img/author/author3.jpg" alt="image">
                                            <h2>{{ $items->user->name }} {{ $items->user->lastname }}</h2>
                                        </div>
                                        <div class="comment-content">
                                            <p>{{ $items->message }}</p>
                                        </div>
                                        <div class="comment-reply">
                                            <a href="#"><i class="fa fa-reply"></i></a>
                                        </div>
                                    @endforeach
                                </article>
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
                                <form method="POST" action="{{ url('comment') }}" onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="postId" id="postId" value="{{ $post->id }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}">
                                    <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                        <textarea id="comment" name="comment" placeholder="Mensaje" type="text" size="100"
                                            maxlength="100"
                                            class="text-primary form-control @error('comment') is-invalid @enderror"
                                            comment="comment" value="{{ old('comment') }}" autocomplete="comment"
                                            autofocus></textarea>

                                        @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $comment }}</strong>
                                        </span>
                                        @enderror

                                        @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $comment }}</strong>
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
                </div>
                <!-- blog details area end -->
            </div>
        </div>
    </div>
    <!-- blog post area end -->
@endsection
