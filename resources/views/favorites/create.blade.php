@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Agregar Contacto Favorito <i class="fas fa-star"></i></p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('favoriteAdmin') }}" onsubmit="return checkSubmit();">
            @csrf
            <div class="form-row">

                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-user-edit"></i>
                        </span>
                    </div>
                    <input id="name" placeholder="Nombre, empresa o departamento" type="text"
                        class="text-primary form-control @error('name') is-invalid @enderror" name="name"
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

                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary far fa-file-alt"></i>
                        </span>
                    </div>
                    <input id="description" placeholder="Descripcion corta" type="text"
                        class="text-primary form-control @error('description') is-invalid @enderror" name="description"
                        value="{{ old('description') }}" required autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-phone-square-alt"></i>
                        </span>
                    </div>
                    <input id="phone_one" placeholder="PBX principal (Opcional)" type="text"
                        class="text-primary form-control @error('phone_one') is-invalid @enderror" name="phone_one"
                        value="{{ old('phone_one') }}" autocomplete="phone_one" autofocus>

                    @error('phone_one')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('phone_one')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-phone-square-alt"></i>
                        </span>
                    </div>
                    <input id="phone_two" placeholder="PBX secundario (Opcional)" type="text"
                        class="text-primary form-control @error('phone_two') is-invalid @enderror" name="phone_two"
                        value="{{ old('phone_two') }}" autocomplete="phone_two" autofocus>

                    @error('phone_two')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('phone_two')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fab fa-whatsapp"></i>
                        </span>
                    </div>
                    <input id="mobile_one" placeholder="WhatsApp principal (Opcional)" type="text"
                        class="text-primary form-control @error('mobile_one') is-invalid @enderror" name="mobile_one"
                        value="{{ old('mobile_one') }}" autocomplete="mobile_one" autofocus>

                    @error('mobile_one')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('mobile_one')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fab fa-whatsapp"></i>
                        </span>
                    </div>
                    <input id="mobile_two" placeholder="WhatsApp secundario (opcional)" type="text"
                        class="text-primary form-control @error('mobile_two') is-invalid @enderror" name="mobile_two"
                        value="{{ old('mobile_two') }}" autocomplete="mobile_two" autofocus>

                    @error('mobile_two')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('mobile_two')
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
                            </button> </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection