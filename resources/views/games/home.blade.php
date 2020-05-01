@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-around" style="margin-top: 4em;">
        <img src="{{asset('img/game/trivia.png')}}" class="img-fluid" style="max-height: 250px;">
    </div>

    <div class="row justify-content-around">
        <!-- Button trigger modal -->
        <button type="button" class="btn bg-theme-1 btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
            <span class="text-light">
                Jugar
                <i class="fas fa-gamepad"></i>
            </span>
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content justify-content-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle">
                        Seleciona tu categoria favorita
                        <i class="fas fa-star ml-2  "></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 col-12 col-md-6 offset-md-3" role="group" aria-label="Basic example">
                        <a type="button" class="btn btn-lg btn-block btn-outline-warning d-flex"
                            href="{{url('question')}}">
                            <i class="fas fa-coins mr-3  justify-content-start"></i>
                            <span class="mr-3  justify-content-center">Comercial</span>
                            <span
                                class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                            </span>
                        </a>
                        <a type="button" class="btn btn-lg btn-block btn-outline-success d-flex"
                            href="{{url('question')}}">
                            <i class="fas fa-leaf mr-3  justify-content-start"></i>
                            <span class="mr-3  justify-content-center">Agronomia</span>
                            <span
                                class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                            </span>
                        </a>
                        <a type="button" class="btn btn-lg btn-block btn-outline-dark d-flex"
                            href="{{url('question')}}">
                            <i class="fas fa-tractor mr-3  justify-content-start"></i>
                            <span class="mr-3  justify-content-center">Automotores</span>
                            <span
                                class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                            </span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer d-none">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection