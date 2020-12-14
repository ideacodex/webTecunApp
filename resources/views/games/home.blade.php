@extends('layouts.user')

@section('content')
    <div class="container-fluid">
        @if (session('message'))
            <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
                <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row justify-content-around mt-3">
            <p>
                <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/3593/3593584.svg"
                        class="mx-auto d-block img-fluid" width="20%">
                </a>
            </p>
        </div>
        <div class="row justify-content-center">
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
        </div>


        <div class="row justify-content-around" style="margin-top: 4em;">
            <img src="{{ asset('img/game/trivia.png') }}" class="img-fluid" style="max-height: 250px;">
        </div>

        <div class="row justify-content-around">
            <a href="{{ url('question') }}" class="text-white">
                <button class="btn btn-lg btn-primary">
                    <i class="fas fa-gamepad"> Jugar</i>
                </button>
            </a>
        </div>
    </div>
@endsection
