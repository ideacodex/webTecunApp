@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">AJUSTES</strong>
            </div>
        </div>
        <div class="mt-4">
            @if (sizeof($settingAll) >= 1)
                <form method="POST" action="{{ url('adminSetting/' . $setting->id) }}" onsubmit="return checkSubmit();">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-12 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0 transparent" id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-at" title="Correo de RRHH"></i>
                                </span>
                            </div>
                            <input id="emailRRHH" placeholder="Correo de RRHH" type="text" title="Correo de RRHH"
                                class="text-dark border-0 form-control @error('emailRRHH') is-invalid @enderror"
                                name="emailRRHH" value="{{ $setting->email_rrhh }}" disabled>

                            @error('emailRRHH')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('emailRRHH')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0 transparent" id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-at" title="Correo para reportes"></i>
                                </span>
                            </div>
                            <input id="emailReports" placeholder="Correo para reportes" type="text"
                                class="text-dark border-0 form-control @error('emailReports') is-invalid @enderror"
                                name="emailReports" value="{{ $setting->email_reports }}" disabled>

                            @error('emailReports')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('emailReports')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 input-group input-group-lg mb-3" title="Correo de ASOTECSA">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0 transparent" id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-at" title="Correo para advertencias"></i>
                                </span>
                            </div>
                            <input id="emailWarnings" placeholder="Correo de ASOTECSA" type="text"
                                class="text-dark border-0 form-control @error('emailWarnings') is-invalid @enderror"
                                name="emailWarnings" value="{{ $setting->email_warnings }}" disabled>

                            @error('emailWarnings')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('emailWarnings')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0 transparent" id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-mobile" title="N??mero de soporte"></i>
                                </span>
                            </div>
                            <input id="phoneSupport" type="text" placeholder="N??mero de soporte"
                                class="text-dark border-0 form-control @error('phoneSupport') is-invalid @enderror"
                                name="phoneSupport" value="{{ $setting->phone_support }}" disabled>

                            @error('phoneSupport')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0 transparent" id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-mobile" title="N??mero para informacion"></i>
                                </span>
                            </div>
                            <input id="phoneInfo" type="text" placeholder="N??mero para informacion"
                                class="text-dark border-0 form-control @error('phoneInfo') is-invalid @enderror"
                                name="phoneInfo" value="{{ $setting->phone_info }}" disabled>

                            @error('phoneInfo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </form>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ url('/adminSetting' . '/' . $setting->id . '/edit') }}" class="text-white">
                                <button class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="far fa-edit"> ACTUALIZAR AJUSTES</i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ url('/adminSetting/crear') }}" class="text-white">
                                <button class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="far fa-plus-square"> EMPIEZA A GESTIONAR TUS AJUSTES</i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
