@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Agregar</p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('users/'. $user->id) }}" onsubmit="return checkSubmit();">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-user-edit"></i>
                        </span>
                    </div>
                    <input id="name" placeholder="Nombres" type="text"
                        class="text-primary form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-user-edit"></i>
                        </span>
                    </div>
                    <input id="lastname" placeholder="Apellidos" type="text"
                        class="text-primary form-control @error('lastname') is-invalid @enderror" name="lastname"
                        value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

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
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-at"></i>
                        </span>
                    </div>
                    <input id="email" placeholder="Correo " type="text"
                        class="text-primary form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $user->email }}" required autocomplete="email" autofocus>

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
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-mobile"></i>
                        </span>
                    </div>
                    <input id="phone" type="text" placeholder="Número de móvil"
                        class="text-primary form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ $user->phone }}" required autocomplete="phone">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-id-card"></i>
                        </span>
                    </div>
                    <input id="dpi" placeholder="DPI" type="text"
                        class="text-primary form-control @error('dpi') is-invalid @enderror" name="dpi"
                        value="{{ $user->dpi }}" required autofocus>

                    @error('dpi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('dpi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-user-alt-slash"></i>
                        </span>
                    </div>
                    <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror"
                        required>
                <option value="{{$user->status_id}}" selected>{{$user->status->name}}</option>
                        @foreach($status as $item)
                        <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('status_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-user-shield"></i>
                        </span>
                    </div>
                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror"
                        required>
                        <option value="{{$user->role_id}}" selected>{{$user->getRoleNames()[0]}}</option>
                        @foreach($roles as $item)
                        <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-unlock-alt"></i>
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
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-unlock-alt"></i>
                        </span>
                    </div>
                    <input id="password-confirm" placeholder="Confirmar contraseña" type="password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <i class="fas fa-save"></i>
                                {{ __('Guardar') }}
                            </button> </div>
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