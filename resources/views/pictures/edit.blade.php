@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Actualizar Arte <i class="fas fa-newspaper"> </i></p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('adminPicture/'. $picture->id) }}" enctype="multipart/form-data"
            onsubmit="return checkSubmit();">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-heading"></i>
                        </span>
                    </div>
                    <input id="title" name="title" placeholder="Agregar titulo" type="text" size="100" maxlength="100"
                        class="text-primary form-control @error('title') is-invalid @enderror" title="title"
                        value="{{ $picture->title }}" required autocomplete="title" autofocus>

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

                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-question-circle"></i>
                        </span>
                    </div>
                    <select name="status_id" id="status_id"
                        class="form-control @error('status_id') is-invalid @enderror" required>
                        <option value={{ $picture->status_id }} selected>{{ $picture->status->name }}</option>
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
                        <label class="custom-file-label" for="inputGroupFile04">{{ $item->featured_image }}</label>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <i class="fas fa-save"></i>
                                {{ __('Guardar') }}
                            </button> 
                        </div>
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