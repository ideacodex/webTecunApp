@extends('layouts.single')
@section('content')
<div class="container ">
    <div class="row justify-content-around" style="margin-top: 2em;">
        <img src="{{asset('img/user.png')}}" class="img-fluid" style="max-height: 150px;">
    </div>
    <div class="row justify-content-around">
        <a href="{{url('/')}}">
            <img src="{{asset('img/tecun/logoBlanco.png')}}" class="img-fluid" style="max-height: 75px;">
        </a>
    </div>
    <div class="row justify-content-around mt-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                        <i class="text-light fas fa-at"></i>
                    </span>
                </div>
                <input placeholder="Correo electronico" type="text" aria-label=" Sizing example input"
                    aria-describedby="inputGroup-sizing-sm"
                    class=" form-control text-light @error('email') is-invalid @enderror" name="email"
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
                        <i class="text-light fas fa-unlock-alt"></i>
                    </span>
                </div>
                <input placeholder="Contraseña" id="password" type="password" aria-label=" Sizing example input"
                    aria-describedby="inputGroup-sizing-sm"
                    class="text-light form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row justify-content-around ">
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
                        {{ __('Ingresar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-none row justify-content-center">
        @if (Route::has('password.request'))
        <a class="m-t-1 btn btn-link text-light" href="{{ route('password.request') }}">
            {{ __('¿Olvidé la contraseña?') }}
        </a>
        <a class="d-none btn btn-link text-light" href="{{ route('register') }}">
            {{ __('Crear cuenta') }}
        </a>
        @endif
    </div>
</div>
@endsection