@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">EDITAR CONTACTO</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('contactAdmin/' . $contact->id) }}" onsubmit="return checkSubmit();">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm" title="Nombre completo">
                                <i style="color: #fa5e0a" class="fas fa-user-edit"></i>
                            </span>
                        </div>
                        <input id="nombre" placeholder="Nombres" type="text" title="Nombre completo"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('nombre') is-invalid @enderror"
                            name="nombre" value="{{ $contact->nombre }}" required autocomplete="nombre" autofocus>

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Correo del contacto">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-at"></i>
                            </span>
                        </div>
                        <input id="correo" placeholder="Correo del contacto" type="text" title="Correo del contacto"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('correo') is-invalid @enderror"
                            name="correo" value="{{ $contact->correo }}" required autocomplete="correo" autofocus>

                        @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Pais">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fab fa-font-awesome-flag"></i>
                            </span>
                        </div>
                        <input id="pais" placeholder="Pais del contacto" type="text" title="Pais"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('pais') is-invalid @enderror"
                            name="pais" value="{{ $contact->pais }}" required autocomplete="pais" autofocus>

                        @error('pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3" title="Departamento laboral">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-building"></i>
                            </span>
                        </div>
                        <input id="departamento" placeholder="Departamento laboral" type="text" title="Departamento laboral"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('departamento') is-invalid @enderror"
                            name="departamento" value="{{ $contact->departamento }}" required autocomplete="departamento"
                            autofocus>

                        @error('departamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('departamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Sub Departamento">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="far fa-building"></i>
                            </span>
                        </div>
                        <input id="subDepartamento" placeholder="Sub Departamento" type="text" title="Sub Departamento"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('subDepartamento') is-invalid @enderror"
                            name="subDepartamento" value="{{ $contact->subDepartamento }}" autocomplete="subDepartamento"
                            autofocus>

                        @error('subDepartamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('subDepartamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Puesto de trabajo">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-briefcase"></i>
                            </span>
                        </div>
                        <input id="puesto" placeholder="Puesto de trabajo" type="text" title="Puesto de trabajo"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('puesto') is-invalid @enderror"
                            name="puesto" value="{{ $contact->puesto }}" required autocomplete="puesto" autofocus>

                        @error('puesto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('puesto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Número directo">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-mobile"></i>
                            </span>
                        </div>
                        <input id="numeroDirecto" type="text" placeholder="Número directo" title="Número directo"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('numeroDirecto') is-invalid @enderror"
                            name="numeroDirecto" value="{{ $contact->numeroDirecto }}" autocomplete="numeroDirecto">

                        @error('numeroDirecto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Extension del numero directo">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-mobile"></i>
                            </span>
                        </div>
                        <input id="extension" type="text" placeholder="Extension del numero directo"
                            title="Extension del numero directo"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('extension') is-invalid @enderror"
                            name="extension" value="{{ $contact->extension }}" autocomplete="extension">

                        @error('extension')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Celular del contacto">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-mobile"></i>
                            </span>
                        </div>
                        <input id="celular" type="text" placeholder="Celular del contacto" title="Celular del contacto"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('celular') is-invalid @enderror"
                            name="celular" value="{{ $contact->celular }}" autocomplete="celular">

                        @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Nombres de asistente">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-user-edit"></i>
                            </span>
                        </div>
                        <input id="asistente" placeholder="Nombres de asistente" type="text" title="Nombres de asistente"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('asistente') is-invalid @enderror"
                            name="asistente" value="{{ $contact->asistente }}" autocomplete="asistente" autofocus>

                        @error('asistente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('asistente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Extension de asistente">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-mobile"></i>
                            </span>
                        </div>
                        <input id="extensionAsistente" type="text" placeholder="Extension de asistente"
                            title="Extension de asistente"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('extensionAsistente') is-invalid @enderror"
                            name="extensionAsistente" value="{{ $contact->extensionAsistente }}"
                            autocomplete="extensionAsistente">

                        @error('extensionAsistente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Empresa">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-briefcase"></i>
                            </span>
                        </div>
                        <input id="empresa" placeholder="Empresa" type="text" title="Empresa"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('empresa') is-invalid @enderror"
                            name="empresa" value="{{ $contact->empresa }}" required autocomplete="empresa" autofocus>

                        @error('empresa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('empresa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Correo general">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-at"></i>
                            </span>
                        </div>
                        <input id="mailGeneral" placeholder="Correo general" type="text" title="Correo general"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('mailGeneral') is-invalid @enderror"
                            name="mailGeneral" value="{{ $contact->mailGeneral }}" autocomplete="mailGeneral" autofocus>

                        @error('mailGeneral')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('mailGeneral')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend" title="Comentarios del contacto">
                            <span class="input-group-text bg-input border-top-0 border-right-0 transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="far fa-comment"></i>
                            </span>
                        </div>
                        <textarea placeholder="Comentarios del contacto" id="comentarios" title="Comentarios del contacto"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('comentarios') is-invalid @enderror"
                            name="comentarios" required autofocus>{{ $contact->comentarios }}</textarea>
                        @error('comentarios')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('comentarios')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('ACTUALIZAR CONTACTO') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
