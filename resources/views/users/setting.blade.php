@extends('layouts.user')

@section('content')
    <style>
        .dropdown-toggle::after {}

        .firefox.dropdown-toggle::after {
            text-align: right;
            float: right;
            /*Firefox fix*/
            margin-top: -12px;
        }

        .chrome.dropdown-toggle::after {
            text-align: right;
            float: right;
            /*Chrome IE fix*/
            margin-top: 8px;
        }

        

    </style>

    <div class="container ">
        <div class="row justify-content-around" style="margin-top: 4em;">
            <img src="https://image.flaticon.com/icons/svg/2633/2633848.svg" class="img-fluid" width="20%"
                alt="Responsive image">
        </div>

        <div class="row justify-content-around">
            <h1 class="text-light">Actualizar cuenta</h1>
        </div>
        <div class="row justify-content-around mt-4">
            <form method="POST" action="{{ route('register') }}" onsubmit="return checkSubmit();">
                @csrf
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-light fas fa-user-edit"></i>
                        </span>
                    </div>
                    <input id="name" placeholder="Nombres" type="text"
                        class="text-light form-control @error('name') is-invalid @enderror" name="name"
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
                            <i class="text-light fas fa-user-edit"></i>
                        </span>
                    </div>
                    <input id="lastname" placeholder="Apellidos" type="text"
                        class="text-light form-control @error('lastname') is-invalid @enderror" name="lastname"
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
                            <i class="text-light fas fa-mobile"></i>
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
                <div class="form-group row mt-3 justify-content-around ">
                    <div class="">
                        <button type="submit" class="btn btn-lg btn-block btn-dark">
                            {{ __('Registrarse') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
