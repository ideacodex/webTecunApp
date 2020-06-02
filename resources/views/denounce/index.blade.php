@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
<div class="mt-n5"></div>
<div class="container-fluid mt-n5">
    <div class="row justify-content-around" style="margin-top: 4em;">
        <img src="{{asset('img/denounce.png')}}" class="img-fluid" style="max-height: 250px;">
    </div>

    <div class="row justify-content-around">
        <p class="text-primary h2">Línea de denuncia</p>
    </div>
    <div class="row justify-content-around mt-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                        <i class="text-primary fas fa-user-secret"></i>
                    </span>
                </div>
                <input placeholder="Asunto" type="text" aria-label=" Sizing example input"
                    aria-describedby="inputGroup-sizing-sm"
                    class=" form-control text-primary @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                        <i class="text-primary fas fa-comment-dots"></i>
                    </span>
                </div>
                <textarea placeholder="Denunciar actividad" id="password" type="password" aria-label=" Sizing example input"
                    aria-describedby="inputGroup-sizing-sm"
                    class="text-primary form-control @error('password') is-invalid @enderror" name="password" required
                    ></textarea>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="d-none form-group row justify-content-around ">
                <div class=" ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label text-light" for="remember">
                            {{ __('Mantener la sesion activa') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-3 justify-content-around ">
                <div class="">
                    <button type="submit" class="btn btn-lg btn-block btn-dark">
                        {{ __('Denunciar') }}
                        <i class="fa fa-paper-plane"></i>
                    </button>
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