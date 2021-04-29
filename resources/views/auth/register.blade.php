@extends('layouts.single')
@section('content')

    <div class="container ">
       <br>
        <div class="row justify-content-around mt-4">
            <form method="POST" action="{{ route('register') }}" onsubmit="return checkSubmit();">
                @csrf
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-user-edit"></i>
                        </span>
                    </div>
                    <input id="name" placeholder="Nombres" type="text"
                        class="tesxt-dark form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-user-edit"></i>
                        </span>
                    </div>
                    <input id="lastname" placeholder="Apellidos" type="text"
                        class="tesxt-dark form-control @error('lastname') is-invalid @enderror" name="lastname"
                        value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-at"></i>
                        </span>
                    </div>
                    <input id="email" placeholder="Correo " type="text"
                        class="tesxt-dark form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-mobile"></i>
                        </span>
                    </div>
                    <input id="phone" type="text" placeholder="Número de móvil"
                        class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                        required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-unlock-alt"></i>
                        </span>
                    </div>
                    <input id="password" placeholder="Contraseña" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-unlock-alt"></i>
                        </span>
                    </div>
                    <input id="password-confirm" placeholder="Confirmar contraseña" type="password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group row justify-content-around ">
                    <div class=" ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-dark" for="remember">
                                {{ __('Términos y condiciones') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-3 justify-content-around ">
                        <button type="submit" style="border-radius: 10px" class="bg-botones btn btn-lg btn-block btn-dark">
                            {{ __('Registrarse') }}
                        </button>
                </div>
            </form>
        </div>
        <div class="d-none row mt-5 justify-content-center">
            @if (Route::has('password.request'))
                <a class="m-t-5 btn btn-link text-dark" href="{{ route('password.request') }}">
                    {{ __('¿Olvidé la contraseña?') }}
                </a>
                <a class="btn btn-link text-dark" href="{{ route('login') }}">
                    {{ __('Ya tengo una cuenta') }}
                </a>
            @endif
        </div>
    </div>



@endsection
