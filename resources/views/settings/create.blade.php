@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Ajustes</p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('adminSetting') }}" onsubmit="return checkSubmit();">
            @csrf
            <div class="form-row">
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-at"></i>
                        </span>
                    </div>
                    <input id="emailRRHH" placeholder="Correo de RRHH" type="text"
                        class="text-primary form-control @error('emailRRHH') is-invalid @enderror" name="emailRRHH"
                        value="{{ old('emailRRHH') }}" required autocomplete="emailRRHH" autofocus>

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
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-at"></i>
                        </span>
                    </div>
                    <input id="emailReports" placeholder="Correo para reportes" type="text"
                        class="text-primary form-control @error('emailReports') is-invalid @enderror" name="emailReports"
                        value="{{ old('emailReports') }}" required autocomplete="emailReports" autofocus>

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
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-at"></i>
                        </span>
                    </div>
                    <input id="emailWarnings" placeholder="Correo para advertencias" type="text"
                        class="text-primary form-control @error('emailWarnings') is-invalid @enderror" name="emailWarnings"
                        value="{{ old('emailWarnings') }}" required autocomplete="emailWarnings" autofocus>

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
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-mobile"></i>
                        </span>
                    </div>
                    <input id="phoneSupport" type="text" placeholder="Número de soporte"
                        class="text-primary form-control @error('phoneSupport') is-invalid @enderror" name="phoneSupport"
                        value="{{ old('phoneSupport') }}" required autocomplete="phoneSupport">

                    @error('phoneSupport')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-mobile"></i>
                        </span>
                    </div>
                    <input id="phoneInfo" type="text" placeholder="Número para informacion"
                        class="text-primary form-control @error('phoneInfo') is-invalid @enderror" name="phoneInfo"
                        value="{{ old('phoneInfo') }}" required autocomplete="phoneInfo">

                    @error('phoneInfo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <i class="fas fa-save"></i>
                                {{ __('Guardar') }}
                            </button> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-5 justify-content-center">
        @if (Route::has('password.request'))
        <a class="m-t-5 btn btn-link text-light" href="{{ route('password.request') }}">
            {{ __('¿Olvidé la contraseña?') }}
        </a>
        <a class="btn btn-link text-light" href="{{ route('register') }}">
            {{ __('Crear cuenta') }}
        </a>
        @endif
    </div>
</div>
@endsection