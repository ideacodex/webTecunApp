@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
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
    <div class="container-fluid">
        <div class="card-group mt-5 mb-5">
            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="https://www.flaticon.com/svg/static/icons/svg/196/196123.svg" width="100 px">
                <div class="card-body">
                    <h5 class="card-title">Instructivo_seguro médico GyT</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ asset('files/InstructivoSeguromédicoGyT.pdf') }}" class="btn btn-primary btn-lg"> Descargar</a>
                </div>
            </div>
            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="https://irtraesfelicidad.files.wordpress.com/2019/08/logo-irtra.org_.png?w=200" width="100 px">
                <div class="card-body">
                    <h5 class="card-title">Formulario Irtra</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ asset('files/formularioIrtra.doc') }}" class="btn btn-primary btn-lg"> Descargar</a>
                </div>
            </div>
            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="https://www.flaticon.com/svg/static/icons/svg/3208/3208164.svg" width="100 px">
                <div class="card-body">
                    <h5 class="card-title">Constacia Laboral</h5>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterOthers">
                        Enviar solicitud
                    </button>
                </div>
            </div>

            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="{{ asset('img/entrevista.png') }}" width="100 px">
                <div class="card-body">
                    <h5 class="card-title">Procesos RRHH</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ route('proccessRRHH') }}" class="btn btn-primary btn-lg"> Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterOthers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Solicitud de constancia laboral</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Se esta procesando un correo electronico al encargado de su solicitud,

                    Para continuar con la solicitud sobre su constancia laboral
                    por favor presione Aceptar. Automaticamente se eviara un correo con tu informacion.
                    Se contactaran contigo lo mas pronto posible.
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ url('mailRRHHConstancy') }}" onsubmit="return checkSubmit();">
                        @csrf
                        <input type="hidden" name="emailUser" id="emailUser" value="{{ auth()->user()->email }}">
                        <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">
                            {{ __('Aceptar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
