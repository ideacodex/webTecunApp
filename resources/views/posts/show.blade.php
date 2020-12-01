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
                            <img src="{{ asset('/storage/posts/' . $post->featured_image) }}" style="max-height: 300px">
                            <br>
                            @if (isset($post->featured_video))
                                <iframe width="882" height="496" src="{{ $podcast->featured_video }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            @endif
                        </div>
                        <h1 class="blog-title text-center">{{ $post->title }}</h1>
                        <div class="blog-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i>{{ $post->created_at }}</li>
                            </ul>
                        </div>
                        <div class="blog-summery">
                            <p>{{ $post->desciption }}</p>
                            <br>
                            <div style="width: 100%">
                                @php echo($post->content) @endphp
                            </div>
                            <br>

                            @if (isset($post->featured_video))
                                <video width="100%" style="max-height: 300px" autoplay controls loop>
                                    <source src="{{ asset('/storage/posts/' . $post->featured_video) }}" type="video/mp4">
                                </video>
                            @endif

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
                        <h2>Categorias</h2>
                        <div>
                            @foreach ($categoryName as $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 mt-5">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Comentarios ({{ $comments->count() }})
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">

                                        @foreach ($comments as $item)
                                            <div class="alert alert-light" role="alert">
                                                <h4 class="alert-heading"><strong><i class="fas fa-user"></i>
                                                        {{ $item->user->name }} {{ $item->user->lastname }}</strong></h4>
                                                <hr>
                                                <p class="mb-0">{{ $item->message }}
                                                    @if (auth()->check() && $item->user_id == auth()->user()->id)
                                                        <a href="{{ url('comment/' . $item->id) }}"
                                                            class="btn btn-sm btn-danger">
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
                                                    <button type="submit" class="btn btn-primary mb-2 ml-2">Comentar</button>
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
