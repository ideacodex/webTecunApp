@php
$namesUser = explode(' ', Auth::user()->name);
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
        <div class="card-header mt-5 text-center bg-theme-2" style="border-radius: 15px; color: white">
            <strong style="text-transform: uppercase;" class="card-title">CONSTANCIA LABORAL</strong>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 constancia" style="border-radius: 20px">
                <div class="row justify-content-around" style="margin-top: 4em;">
                    <img src="{{ asset('img/guatemala.png') }}" class="img-fluid" style="max-height: 150px;">
                </div>
                <div class="row justify-content-around">
                    <a class="text-light">
                        <button type="button" style="border-radius: 7px"
                            class="mt-3 btn btn-lg border border-primary modales" data-toggle="modal"
                            data-target="#requestConstanciaGtm">
                            <img width="40px" class="botonconstancia ml-auto mr-2" src="{{ asset('img/vacaciones.png') }}"
                                alt="">
                            <b>SOLICITA LA TUYA</b>
                        </button>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="requestConstanciaGtm" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 30px">
                            <div class="modal-body">
                                <h3 class="mt-4 text-center modales">
                                    <b>CONSULTAR MIS VACACIONES</b>
                                </h3>
                                <h4 class="text-center">Enviaremos la solicitud para que sea obtenida por correo electrónico
                                </h4>
                            </div>
                            <div class="modal-footer border-0">
                                <form method="POST" action="{{ url('mailRRHHConstancy') }}"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="emailUser" id="emailUser"
                                        value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="country" id="country" value="gtm">
                                    <input type="hidden" name="lastname" id="lastname"
                                        value="{{ auth()->user()->lastname }}">
                                    <button type="button" class="btn" data-dismiss="modal">
                                        <h5 class="text-primary"><i class="text-primary far fa-times-circle"></i>CERRAR</h5>
                                    </button>
                                    <button type="submit" class="btn">
                                        <h5 class="text-primary"><i class="text-primary fas fa-share-square"></i> ACEPTAR
                                        </h5>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 constancia" style="border-radius: 20px">
                <div class="row justify-content-around" style="margin-top: 4em;">
                    <img src="{{ asset('img/el-salvador.png') }}" class="img-fluid" style="max-height: 150px;">
                </div>
                <div class="row justify-content-around">
                    <a class="text-light">
                        <button type="button" style="border-radius: 7px"
                            class="mt-3 border border-primary modales btn btn-lg" data-toggle="modal"
                            data-target="#requestConstanciaSv">
                            <img width="40px" class="botonconstancia ml-auto mr-2"
                                src="{{ asset('img/vacaciones.png') }}" alt="">
                            <b>SOLICITA LA TUYA</b>
                        </button>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="requestConstanciaSv" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 30px">
                            <div class="modal-body">
                                <h3 class="mt-4 text-center modales">
                                    <b>CONSULTAR MIS VACACIONES</b>
                                </h3>
                                <h4 class="text-center">Enviaremos la solicitud para que sea obtenida por correo electrónico
                                </h4>
                            </div>
                            <div class="modal-footer border-0">
                                <form method="POST" action="{{ url('mailRRHHConstancy') }}"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="emailUser" id="emailUser"
                                        value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="country" id="country" value="sv">
                                    <input type="hidden" name="lastname" id="lastname"
                                        value="{{ auth()->user()->lastname }}">
                                    <button type="button" class="btn" data-dismiss="modal">
                                        <h5 class="text-primary"><i class="text-primary far fa-times-circle"></i>CERRAR</h5>
                                    </button>
                                    <button type="submit" class="btn">
                                        <h5 class="text-primary"><i class="text-primary fas fa-share-square"></i> ACEPTAR
                                        </h5>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 constancia" style="border-radius: 20px">
                <div class="row justify-content-around" style="margin-top: 4em;">
                    <img src="{{ asset('img/honduras.png') }}" class="img-fluid" style="max-height: 150px;">
                </div>
                <div class="row justify-content-around">
                    <a class="text-light">
                        <button type="button" style="border-radius: 7px"
                            class="mt-3 border border-primary modales btn btn-lg" data-toggle="modal"
                            data-target="#requestConstanciaHnd">
                            <img width="40px" class="botonconstancia ml-auto mr-2"
                                src="{{ asset('img/vacaciones.png') }}" alt="">
                            <b>SOLICITA LA TUYA</b>
                        </button>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="requestConstanciaHnd" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 30px">
                            <div class="modal-body">
                                <h3 class="mt-4 text-center modales">
                                    <b>CONSULTAR MIS VACACIONES</b>
                                </h3>
                                <h4 class="text-center">Enviaremos la solicitud para que sea obtenida por correo electrónico
                                </h4>
                            </div>
                            <div class="modal-footer border-0">
                                <form method="POST" action="{{ url('mailRRHHConstancy') }}"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="emailUser" id="emailUser"
                                        value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="country" id="country" value="hnd">
                                    <input type="hidden" name="lastname" id="lastname"
                                        value="{{ auth()->user()->lastname }}">
                                    <button type="button" class="btn" data-dismiss="modal">
                                        <h5 class="text-primary"><i class="text-primary far fa-times-circle"></i>CERRAR</h5>
                                    </button>
                                    <button type="submit" class="btn">
                                        <h5 class="text-primary"><i class="text-primary fas fa-share-square"></i> ACEPTAR
                                        </h5>
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
