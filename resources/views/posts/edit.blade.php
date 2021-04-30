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
                <strong class="card-title">ACTUALIZAR PUBLICACIÓN</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('adminPost/' . $record->id) }}" enctype="multipart/form-data"
                onsubmit="return checkSubmit();">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent bg-input border-top-0" id="inputGroup-sizing-sm">
                                <i class="fas fa-heading" style="color: #fa5e0a"></i>
                            </span>
                        </div>
                        <input id="title" name="title" placeholder="Agregar titulo" type="text" size="100" maxlength="100"
                            class="text-dark form-control bg-input border-top-0 border-left-0 @error('title') is-invalid @enderror"
                            title="title" value="{{ $record->title }}" required autocomplete="title" autofocus>

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
                            <span class="input-group-text transparent bg-input border-top-0" id="inputGroup-sizing-sm">
                                <i class="fas fa-align-left" style="color: #fa5e0a"></i>
                            </span>
                        </div>
                        <input id="description" placeholder="Descripcion o texto corto" type="text" size="250"
                            maxlength="250"
                            class="text-dark form-control bg-input border-top-0 border-left-0 @error('description') is-invalid @enderror"
                            name="description" value="{{ $record->description }}" required autocomplete="description"
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

                    @foreach ($categoryName as $items)
                        <input type="hidden" name="NamePostCategory[]" multiple="multiple" value="{{ $items->name }}">
                    @endforeach

                    <div class="col-12 col-md-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent bg-input border-top-0" id="inputGroup-sizing-sm">
                                <i class="fab fa-youtube" style="color: #fa5e0a"></i>
                            </span>
                        </div>
                        <input id="video" placeholder="Código Youtube" type="text" size="250" title="Ejemplo: VYOjWnS4cMY"
                            maxlength="250"
                            class="text-dark form-control bg-input border-top-0 border-left-0 @error('video') is-invalid @enderror"
                            name="video" value="{{ $record->featured_video }}" autocomplete="video" autofocus>

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

                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent bg-input border-top-0" id="inputGroup-sizing-sm">
                                <i class="fas fa-image" style="color: #fa5e0a"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="image/*" name="image" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                value="{{ $record->image }}">
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
                            <span class="input-group-text transparent bg-input border-top-0" id="inputGroup-sizing-sm">
                                <i class="fas fa-file-pdf" style="color: #fa5e0a"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="file_extension/*" name="pdf" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('pdf') ? ' is-invalid' : '' }}"
                                value="{{ $record->pdf }}">
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
                            <span class="input-group-text transparent bg-input border-top-0" id="inputGroup-sizing-sm">
                                <i class="fas fa-question-circle" style="color: #fa5e0a"></i>
                            </span>
                        </div>
                        <select name="status_id" id="status_id"
                            class="form-control @error('status_id') is-invalid @enderror" required>
                            <option value={{ $record->status_id }} selected>{{ $record->status->name }}</option>
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
                            name="category_id[]" id="category_id" multiple="multiple">
                            @foreach ($categoryName as $items)
                                <option selected value="{{ $items->id }}">{{ $items->name }}</option>
                            @endforeach

                            @foreach ($categories as $item)
                                <option selectd value="{{ $item->id }}">{{ $item->name }}</option>
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
                    <div class="col-12">
                        <textarea id="summernote" name="editordata">{{ $record->content }}</textarea>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col text-center mt-3">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('ACTUALIZAR') }}
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
