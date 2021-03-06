@extends('layouts.admin')

@section('content')
    @if (!$categories->first())
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-warning">No hay categorias aún,
                <a href="{{ url('categories/create') }}">
                    Agregar
                    una nueva categoría
                </a>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (!$setting)
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-warning">No hay ajustes configurados aún,
                <a href="{{ url('adminSetting/crear') }}">
                    Agregar
                    la configuración de tus ajustes
                </a>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">NUEVA OFERTA DE EMPLEO</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('jobsAdmin') }}" enctype="multipart/form-data"
                onsubmit="return checkSubmit();">
                @csrf
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-heading"></i>
                            </span>
                        </div>
                        <input id="title" name="title" placeholder="Agregar titulo" type="text" size="100" maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('title') is-invalid @enderror"
                            title="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-align-left"></i>
                            </span>
                        </div>
                        <input id="description" placeholder="Descripcion o texto corto" type="text"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ old('description') }}" required autocomplete="description"
                            autofocus>

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
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-link"></i>
                            </span>
                        </div>
                        <input id="public_link" name="public_link" placeholder="Url de plaza externa" type="text" size="100"
                            maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('public_link') is-invalid @enderror"
                            public_link="public_link" value="{{ old('public_link') }}" autofocus>

                        @error('public_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('public_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="far fa-building"></i>
                            </span>
                        </div>
                        <input id="company" name="company" placeholder="Empresa" type="text" size="100" maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('company') is-invalid @enderror"
                            company="company" value="{{ old('company') }}" required autocomplete="company" autofocus>

                        @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-at"></i>
                            </span>
                        </div>
                        <input id="email" name="email" placeholder="correo electronico del reclutador" type="text"
                            size="100" maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('email') is-invalid @enderror"
                            email="email" @if ($setting) value=" {{ $setting->email_rrhh }} " @endif required
                            autocomplete="email" autofocus>

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
                    <div class="col-12">
                        <textarea id="summernote" name="editordata"></textarea>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('PUBLICAR EMPLEO') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Agrega aquí el contenido',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
            ]
        });

        // Multiples select 
        $('.js-example-basic-multiple').select2();

    </script>
@endsection
