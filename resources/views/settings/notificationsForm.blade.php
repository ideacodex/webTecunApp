@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Enviar Notificaciones</p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('notificaciones') }}" onsubmit="return checkSubmit();">
            @csrf
            <div class="form-row">
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-at"></i>
                        </span>
                    </div>
                    <input id="title" placeholder="Título" type="text"
                        class="text-primary form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('title')
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
                    <input id="message" placeholder="Mensaje" type="text"
                        class="text-primary form-control @error('message') is-invalid @enderror" name="message"
                        value="{{ old('message') }}" required autocomplete="message" autofocus>

                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <i class="fas fa-bell"></i>
                                {{ __('Enviar notificación') }}
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