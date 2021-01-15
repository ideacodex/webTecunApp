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
        <div class="row mt-5">
            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-2">
                <div class="row justify-content-around" style="margin-top: 4em;">
                    <img src="{{ asset('img/guatemala.png') }}" class="img-fluid" style="max-height: 250px;">
                </div>
                <div class="row justify-content-around">
                    <a class="text-light">
                        <button type="button" class="btn btn-lg btn-primary" data-toggle="modal"
                            data-target="#requestConstanciaGtm">
                            <i class="fas fa-at"> Enviar solicitud</i>
                        </button>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="requestConstanciaGtm" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Solicitud de constancia laboral</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Se enviará un correo electronico con su solicitud,

                                Para continuar con la solicitud sobre su constancia laboral
                                por favor presione Aceptar.
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{ url('mailRRHHConstancy') }}"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="emailUser" id="emailUser"
                                        value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="country" id="country" value="gtm">
                                    <input type="hidden" name="lastname" id="lastname"
                                        value="{{ auth()->user()->lastname }}">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Aceptar') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-2">
                <div class="row justify-content-around" style="margin-top: 4em;">
                    <img src="{{ asset('img/el-salvador.png') }}" class="img-fluid" style="max-height: 250px;">
                </div>
                <div class="row justify-content-around">
                    <a class="text-light">
                        <button type="button" class="btn btn-lg btn-primary" data-toggle="modal"
                            data-target="#requestConstanciaSv">
                            <i class="fas fa-at"> Enviar solicitud</i>
                        </button>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="requestConstanciaSv" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Solicitud de constancia laboral</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Se enviará un correo electronico con su solicitud,

                                Para continuar con la solicitud sobre su constancia laboral
                                por favor presione Aceptar.
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{ url('mailRRHHConstancy') }}"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="emailUser" id="emailUser"
                                        value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="country" id="country" value="sv">
                                    <input type="hidden" name="lastname" id="lastname"
                                        value="{{ auth()->user()->lastname }}">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Aceptar') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-2">
                <div class="row justify-content-around" style="margin-top: 4em;">
                    <img src="{{ asset('img/honduras.png') }}" class="img-fluid" style="max-height: 250px;">
                </div>
                <div class="row justify-content-around">
                    <a class="text-light">
                        <button type="button" class="btn btn-lg btn-primary" data-toggle="modal"
                            data-target="#requestConstanciaHnd">
                            <i class="fas fa-at"> Enviar solicitud</i>
                        </button>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="requestConstanciaHnd" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Solicitud de constancia laboral</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Se enviará un correo electronico con su solicitud,

                                Para continuar con la solicitud sobre su constancia laboral
                                por favor presione Aceptar.
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{ url('mailRRHHConstancy') }}"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="emailUser" id="emailUser"
                                        value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="country" id="country" value="hnd">
                                    <input type="hidden" name="lastname" id="lastname"
                                        value="{{ auth()->user()->lastname }}">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Aceptar') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
