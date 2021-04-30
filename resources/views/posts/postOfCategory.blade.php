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
            {{-- Select de categosias --}}
            @if ($categories->first())
                <div class="col-11 col-lg-7 col-md-7 col-sm-7 col-xs-7">
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
            @if (sizeof($posts) >= 1)
            <div class="col-12 col-lg-7 col-md-7 col-sm-7 col-xs-7">
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
                                    value="{{ $reactionActive = $item->likes->where('user_id', auth()->user()->id)->first() }} ">
                                @if (!$item->userLikesNew)
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
