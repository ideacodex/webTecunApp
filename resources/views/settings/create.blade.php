@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">CREAR AJUSTES</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('adminSetting') }}" onsubmit="return checkSubmit();">
                @csrf
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-at"></i>
                            </span>
                        </div>
                        <input id="emailRRHH" placeholder="Correo de RRHH" type="text"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('emailRRHH') is-invalid @enderror"
                            name="emailRRHH" value="{{ old('emailRRHH') }}" required autocomplete="emailRRHH" autofocus>

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
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-at"></i>
                            </span>
                        </div>
                        <input id="emailReports" placeholder="Correo para reportes" type="text"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('emailReports') is-invalid @enderror"
                            name="emailReports" value="{{ old('emailReports') }}" required autocomplete="emailReports"
                            autofocus>

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
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-at"></i>
                            </span>
                        </div>
                        <input id="emailWarnings" placeholder="Correo de ASOTECSA" type="text"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('emailWarnings') is-invalid @enderror"
                            name="emailWarnings" value="{{ old('emailWarnings') }}" required autocomplete="emailWarnings"
                            autofocus>

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
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-mobile"></i>
                            </span>
                        </div>
                        <input id="phoneSupport" type="text" placeholder="Número de soporte"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('phoneSupport') is-invalid @enderror"
                            name="phoneSupport" value="{{ old('phoneSupport') }}" required autocomplete="phoneSupport">

                        @error('phoneSupport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-mobile"></i>
                            </span>
                        </div>
                        <input id="phoneInfo" type="text" placeholder="Número para informacion"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('phoneInfo') is-invalid @enderror"
                            name="phoneInfo" value="{{ old('phoneInfo') }}" required autocomplete="phoneInfo">

                        @error('phoneInfo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('GUARDAR AJUSTES') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
