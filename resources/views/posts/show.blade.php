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
    <!-- blog post area start -->
    <div class="blog-details mt-2 ptb--320 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 ">
                    <div class="blog-info">
                        <div class="blog-thumbnail">
                            <img src="{{ asset('/storage/posts/' . $post->featured_image) }}" style="max-height: 300px">
                            <br>
                            @if (isset($post->featured_video))
                                <iframe width="882" height="496" src="{{ $post->featured_video }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-header text-center bg-theme-2" style="border-radius: 15px; color: white">
                                <strong style="text-transform: uppercase;" class="card-title">{{ $post->title }}</strong>
                            </div>
                        </div>
                        <div class="blog-meta">
                            <ul>
                                <li>
                                    <div class="card">
                                        <div class="card-header sombra bg-theme-1"
                                            style="border-radius: 15px; color: white">
                                            <strong class="card-title">{{ $post->created_at }}</strong>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-summery">
                            <p>{{ $post->desciption }}</p>
                            <br>
                            <div style="width: 100%">
                                @php echo($post->content) @endphp
                            </div>
                            <br>

                            @if (isset($post->featured_document))
                                <p><a href="{{ asset('/storage/posts/' . $post->featured_document) }}" download>
                                        Descarga aqui el documento adjunto a la noticia
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
                                    <button class="btn text-light btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        COMENTARIOS ({{ $comments->count() }})
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">

                                        @foreach ($comments as $item)
                                            <div class="alert alert-light" role="alert">
                                                <h4 class="alert-heading"><strong style="color: #030d4f"><i
                                                            style="color: #fa5e0a" class="fas fa-user"></i>
                                                        {{ $item->user->name }} {{ $item->user->lastname }}</strong>
                                                </h4>
                                                <hr>
                                                <img src="{{ asset('img/comments.png') }}" alt="">
                                                <p class="mb-0 animate__heartBeat">
                                                    {{ $item->message }}
                                                    @if (auth()->check() && $item->user_id == auth()->user()->id)
                                                        <a href="{{ url('comment/' . $item->id) }}"
                                                            class="rounded-circle btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    @endif
                                                </p>
                                            </div>
                                        @endforeach

                                        @auth
                                            <div class="mb-5">
                                                <form class="form-inline" method="POST" action="{{ url('comment') }}"
                                                    onsubmit="return checkSubmit();">
                                                    @csrf
                                                    <input type="hidden" name="postID" value="{{ $post->id }}">
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


            <!-- blog details area end -->
        </div>
    </div>
    <!-- blog post area end -->


@endsection
@section('js')
    <script>
        var frames;
        frames = document.getElementsByTagName("iframe");
        for (let index = 0; index < frames.length; index++) {
            frames[index].width = "100%";
            console.log("frames: ", frames);
        }

    </script>
@endsection
