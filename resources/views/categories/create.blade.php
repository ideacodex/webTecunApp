@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">AGREGAR CATEGORÍA</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('categories') }}" onsubmit="return checkSubmit();">
                @csrf
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-tags"></i>
                            </span>
                        </div>
                        <input id="name" placeholder="Categoría" type="text"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-align-left"></i>
                            </span>
                        </div>
                        <input id="description" placeholder="Descripcion (opcional)" type="text"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

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
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light">
                                    <i class="fas fa-save"></i>
                                    {{ __('GUARDAR CATEGORÍA') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
