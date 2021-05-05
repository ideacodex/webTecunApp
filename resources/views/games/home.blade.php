@extends('layouts.user')

@section('content')
    <div class="container-fluid">
        <div class="bg-theme-1 d-lg-none d-sm-inline"
            style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px">
            <div class="bg-theme-1 row justify-content-around d-lg-none d-sm-inline">
                <img src="{{ asset('img/app/bjuegos.png') }}" class="d-lg-none d-sm-inline img-fluid"
                    style="max-height: 100%; margin-top: 3%">
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

        <div class="row justify-content-around mt-1">
            <div class="row justify-content-around">
                <div class="card">
                    <div class="card-header bg-theme-2">
                        <a href="{{ url('trivia') }}" class="text-white">
                            <button class="btn text-light btn-lg bg-theme-2">TRIVIA
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <p>
                <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <style>
                        img,
                        button {
                            display: inline;
                        }

                    </style>
                    <img src="{{ asset('img/app/juegos-2.png') }}" class="mr-auto mt-4 ml-5 img-fluid mr-5" width="20%">
                    <button class="bg-primary mt-5 text-light mr-5" style="float: right">
                        <i class="text-light fas fa-star"></i> TOP 3
                    </button>
                </a>
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="collapse" id="collapseExample">
                <ul class="list-group caja">
                    <img src="{{ asset('img/app/juegos-3.png') }}" width="450em" alt="">

                    {{-- Posición 2 --}}
                    <h6 class="text-light texto1">{{ $score[1]->user->name }}
                        <br> {{ $score[1]->user->lastname }}
                    </h6>
                    <h6 class="text-light texto2"><b>{{ $score[1]->points }}</b></h6>

                    {{-- Posición 1 --}}
                    <h6 class="text-light texto3">{{ $score[0]->user->name }}
                        <br> {{ $score[0]->user->lastname }}
                    </h6>
                    <h6 class="text-primary texto4"><b>{{ $score[0]->points }}</b></h6>

                    {{-- Posición 3 --}}
                    <h6 class="text-light texto5">{{ $score[2]->user->name }}
                        <br> {{ $score[2]->user->lastname }}
                    </h6>
                    <h6 class="text-light texto6"><b>{{ $score[2]->points }}</b></h6>

                </ul>
            </div>
        </div>
    </div>
@endsection

{{-- <div class="row justify-content-center">
    <div class="collapse" id="collapseExample">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="">#</span>
                <i class="ml-2 fas fa-user"> </i>
                <span class="">Puntos</span>
            </li>
            @foreach ($score as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="badge badge-primary badge-pill">{{ $loop->index + 1 }}</span>
                    <i class="ml-3 fas fa-user"> {{ $item->user->name }} {{ $item->user->lastname }}</i>
                    <span class="ml-3 badge badge-success badge-pill">{{ $item->points }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div> --}}
