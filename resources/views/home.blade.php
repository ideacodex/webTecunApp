@extends('layouts.user')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="mb-n1 text-center col-12 bg-primary  alert alert-warning alert-dismissible fade show" role="alert">
                <a href="{{ url('newsPodcast') }}">
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

            <div class="mb-n1 text-center col-12 bg-primary  alert alert-warning alert-dismissible fade show" role="alert">
                <a href="{{ url('news') }}">
                    <span class=" text-light">
                        Nuevas Noticias.
                        <strong>¡TECUN News!
                            <span class=" text-light justify-content-end">
                                <i class="far fa-newspaper ml-2  justify-content-start text-light"></i>
                            </span>
                        </strong>
                    </span>
                </a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <p></p>
            <div class="clearfix"></div>
            <div class="card-deck">
                <a href="{{ url('news')}}">
                    <div class="card">
                        <img src="{{ asset('/storage/userComment.jpg') }}" width="100%"
                            style="max-height: 600px">
                        <div class="card-footer justify-content-around d-flex">
                            <span style="text-decoration-color: black">Noticias!!!</span>
                        </div>
                    </div>
                </a>
                <a href="{{ url('podcasts')}}">
                    <div class="card">
                        <img src="{{ asset('/storage/userComment.jpg') }}" width="100%"
                            style="max-height: 600px">
                        <div class="card-footer justify-content-around d-flex">
                            <span style="text-decoration-color: black">Podcast!!!</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
