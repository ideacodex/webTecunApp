@extends('layouts.admin')

@section('content')
    @if (!$categories->first())
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-warning">No hay categorias aun, <a href="{{ url('categories/create') }}">
                    Agregar un nueva categoria</a> </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">NUEVA PUBLICACIÓN</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('adminPost') }}" enctype="multipart/form-data"
                onsubmit="return checkSubmit();">
                @csrf
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="border-top-0 border-right-0 bg-input input-group-text transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-heading"></i>
                            </span>
                        </div>
                        <input id="title" name="title" placeholder="Agregar titulo" type="text" size="100" maxlength="100"
                            class="text-dark form-control border-top-0 border-right-0 border-left-0 bg-input @error('title') is-invalid @enderror"
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
                            <span class="border-top-0 border-right-0 bg-input input-group-text transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-align-left"></i>
                            </span>
                        </div>
                        <input id="description" placeholder="Descripcion o texto corto" type="text" size="250"
                            maxlength="250"
                            class="text-dark form-control border-top-0 border-right-0 border-left-0 bg-input @error('description') is-invalid @enderror"
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

                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="border-top-0 border-right-0 bg-input input-group-text transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-image"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="image/*" name="image" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong><i
                                            class="fas fa-exclamation-triangle"></i>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                            <label class="custom-file-label" for="inputGroupFile04">Elegir imagen de portada</label>
                        </div>
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="border-top-0 border-right-0 bg-input input-group-text transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-file-pdf"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="file_extension/*" name="pdf" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input border-top-0 form-control{{ $errors->has('pdf') ? ' is-invalid' : '' }}"
                                value="{{ old('pdf') }}">
                            @if ($errors->has('pdf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong><i
                                            class="fas fa-exclamation-triangle"></i>{{ $errors->first('pdf') }}</strong>
                                </span>
                            @endif
                            <label class="custom-file-label" for="inputGroupFile04">Elegir documento</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="border-top-0 border-right-0 bg-input input-group-text transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-question-circle"></i>
                            </span>
                        </div>
                        <select name="status_id" id="status_id"
                            class="form-control border-top-0 border-right-0 border-left-0 bg-input @error('status_id') is-invalid @enderror"
                            required>
                            <option value="0" selected>Estado</option>
                            @foreach ($status as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                        <select
                            class="js-example-basic-multiple js-states form-control @error('category_id') is-invalid @enderror"
                            name="category_id[]" id="category_id" multiple="multiple" required>
                            <option disabled selected>Categorias</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="border-top-0 border-right-0 bg-input input-group-text transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fab fa-youtube"></i>
                            </span>
                        </div>
                        <input id="video" placeholder="Código de Youtube" type="text" size="250"
                            title="Ejemplo: VYOjWnS4cMY" maxlength="250"
                            class="text-dark form-control border-top-0 border-right-0 border-left-0 bg-input @error('video') is-invalid @enderror"
                            name="video" value="{{ old('video') }}" autocomplete="video" autofocus>

                        @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('video')
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
                                    {{ __('GUARDAR NOTICIA') }}
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
    <script>
        $('.js-example-basic-multiple').select2();

    </script>
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

    </script>

@endsection
