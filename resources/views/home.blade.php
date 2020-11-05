@extends('layouts.user')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="mb-n1 text-center col-12 bg-primary  alert alert-warning alert-dismissible fade show" role="alert">
                <a href="{{ url('podcast') }}">
                    <span class=" text-light">
                        Nuevos Episodios.
                        <strong>¡TECUN Podcast!
                            <span class=" text-light justify-content-end">
                                <i class="fas fa-podcast ml-2  justify-content-start text-light"></i>
                            </span>
                        </strong>
                    </span>
                </a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Filtrar</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Selecione una categoría...</option>
                    <option value="1">TECUN Automotores</option>
                    <option value="2">TECUN Comercial</option>
                    <option value="3">Salud y Seguridad</option>
                </select>
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
                <div class="card-deck">
                    @foreach ($posts as $item)
                        <div class="card">
                            <img src="{{ asset('/storage/posts/' . $item->featured_image) }}" width="100%"
                                style="max-height: 600px">
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
                                    value="{{ $ractionActive = $item->likes->where('user_id', auth()->user()->id)->first() }} ">
                                @if ($ractionActive->count() == 0)
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
                                    @if ($ractionActive->active == 1)
                                        <form method="POST" action="{{ url('likeordislike') }}"
                                            onsubmit="return checkSubmit();">
                                            @csrf
                                            <input type="hidden" name="postID" value="{{ $item->id }}">
                                            <input type="hidden" name="reactionActive" id="reactionActive" value="1">
                                            <button type="submit" class="btn btn-lg btn-primary ">
                                                <h4><i
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
                                                <h4><i
                                                        class="far fa-thumbs-up"></i>({{ $item->likes->where('active', 1)->count() }})
                                                </h4>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                <span> {{ $item->created_at }} </span>
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
