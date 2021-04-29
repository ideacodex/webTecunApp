@extends('layouts.single')
@section('content')
    @if (session('message'))
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container ">

        <div class="row justify-content-around mt-5">
            <form method="POST" action="{{ url('ldap') }}">
                @csrf
                {{-- correo --}}
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-at"></i>
                        </span>
                    </div>
                    <input placeholder="Correo electronico" type="text" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class=" form-control text-dark @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- password --}}
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="icono-color fas fa-unlock-alt"></i>
                        </span>
                    </div>
                    <input placeholder="Contraseña" id="password" type="password" aria-label=" Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"
                        class="text-dark form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- checked --}}
                <div class="form-group row justify-content-around ">
                    <div class=" ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-dark" for="remember">
                                {{ __('Mantener la sesion activa') }}
                            </label>
                        </div>
                    </div>
                </div>
                {{-- button --}}
                <div class="form-group row mt-3 justify-content-around ">
                    <button type="submit" style="border-radius: 10px" class="bg-botones btn btn-lg btn-block btn-dark">
                        {{ __('Ingresar') }}
                    </button>
                </div>


            </form>
        </div>

    </div>
@endsection
