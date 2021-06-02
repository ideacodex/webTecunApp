@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">ENVIAR NOTIFICACIONES</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('notificaciones') }}" onsubmit="return checkSubmit();">
                @csrf
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-heading"></i>
                            </span>
                        </div>
                        <input id="title" placeholder="Título" type="text"
                            class="border-top-0 border-left-0 bg-input text-dark form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-comment-dots"></i>
                            </span>
                        </div>
                        <input id="message" placeholder="Mensaje" type="text"
                            class="border-top-0 border-left-0 bg-input text-dark form-control @error('message') is-invalid @enderror"
                            name="message" value="{{ old('message') }}" required autocomplete="message" autofocus>

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
                                <div class="d-none input-group-prepend">
                                    <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                        id="inputGroup-sizing-sm">
                                        <i style="color: #fa5e0a" class="fas fa-save"></i>
                                    </span>
                                    <label style="height: 100%;" class="labelWithInput border-top-0 border-left-0 bg-input text-dark form-control @error('message') is-invalid @enderror">
                                        <input type="checkbox" name="isSave" id="isSave" value="1"> 
                                        Guardar esta notificacion
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-bell"></i>
                                    {{ __('ENVIAR NOTIFICACIÓN') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
