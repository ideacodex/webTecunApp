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
