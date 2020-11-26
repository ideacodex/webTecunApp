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
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="collapse" id="collapseExample">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="badge badge-primary badge-pill">14</span>
                         <i class="fas fa-user"> </i> Cras justo odio
                        <span class="badge badge-success badge-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Dapibus ac facilisis in
                        <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Morbi leo risus
                        <span class="badge badge-primary badge-pill">1</span>
                    </li>
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
