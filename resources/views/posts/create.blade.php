@extends('layouts.admin')

@section('content')
@if(!$categories->first())
<div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
<span class="badge badge-pill badge-warning">No hay categorias aun, <a href="{{url('categories/create')}}"> Agregar un nueva categoria</a> </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Nueva publicación <i class="fas fa-newspaper"> </i></p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('adminPost') }}" enctype="multipart/form-data" onsubmit="return checkSubmit();">
            @csrf
            <div class="form-row">
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-heading"></i>
                        </span>
                    </div>
                    <input id="title" name="title" placeholder="Agregar titulo" type="text" size="100" maxlength="100"
                        class="text-primary form-control @error('title') is-invalid @enderror" title="title"
                        value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-align-left"></i>
                        </span>
                    </div>
                    <input id="description" placeholder="Descripcion o texto corto" type="text" size="250"
                        maxlength="250" class="text-primary form-control @error('description') is-invalid @enderror"
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
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-question-circle"></i>
                        </span>
                    </div>
                    <select name="status_id" id="status_id"
                        class="form-control @error('status_id') is-invalid @enderror" required>
                        <option value="3" selected>Estado</option>
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
                        <span class="input-group-text text-primary" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-newspaper"></i> / <i class="text-primary fas fa-podcast"></i>
                        </span>
                    </div>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror"
                        required>
                        <option value="1" selected>Tipo</option>
                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                    @error('type_id')
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
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-image"></i>
                        </span>
                    </div>
                    <div class="custom-file">
                        <input title="Selecionar" type="file" accept="image/*" name="image" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04"
                            class="custom-file-input form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                            value="{{ old('image') }}">
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong><i class="fas fa-exclamation-triangle"></i>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                        <label class="custom-file-label" for="inputGroupFile04">Elegir imagen de portada</label>
                    </div>
                </div>
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-file-audio"></i>
                        </span>
                    </div>
                    <div class="custom-file">
                        <input title="Selecionar" type="file" accept="audio/*" name="audio" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04"
                            class="custom-file-input form-control{{ $errors->has('audio') ? ' is-invalid' : '' }}"
                            value="{{ old('audio') }}">
                        @if ($errors->has('audio'))
                        <span class="invalid-feedback" role="alert">
                            <strong><i class="fas fa-exclamation-triangle"></i>{{ $errors->first('audio') }}</strong>
                        </span>
                        @endif
                        <label class="custom-file-label" for="inputGroupFile04">Elegir audio de podcast</label>
                    </div>
                </div>
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-file-video"></i>
                        </span>
                    </div>
                    <div class="custom-file">
                        <input title="Selecionar" type="file" accept="video/*" name="video" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04"
                            class="custom-file-input form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                            value="{{ old('video') }}">
                        @if ($errors->has('video'))
                        <span class="invalid-feedback" role="alert">
                            <strong><i class="fas fa-exclamation-triangle"></i>{{ $errors->first('video') }}</strong>
                        </span>
                        @endif
                        <label class="custom-file-label" for="inputGroupFile04">Elegir video</label>
                    </div>
                </div>
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-file-pdf"></i>
                        </span>
                    </div>
                    <div class="custom-file">
                        <input title="Selecionar" type="file" accept="file_extension/*" name="pdf" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04"
                            class="custom-file-input form-control{{ $errors->has('pdf') ? ' is-invalid' : '' }}"
                            value="{{ old('pdf') }}">
                        @if ($errors->has('pdf'))
                        <span class="invalid-feedback" role="alert">
                            <strong><i class="fas fa-exclamation-triangle"></i>{{ $errors->first('pdf') }}</strong>
                        </span>
                        @endif
                        <label class="custom-file-label" for="inputGroupFile04">Elegir documento</label>
                    </div>
                </div>

                <div class="col-12">
                    @trix(\App\Article::class, 'content')
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